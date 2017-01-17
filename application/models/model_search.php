<?php

SELECT `import_id`, COUNT(*) FROM `search` WHERE `word` = 'Элемент' GROUP BY `import_id`
 `
class Model_Import extends Model
{
        public function test ($db){
           $sql = 'SELECT import_id FROM import ORDER BY import_id DESC LIMIT 1';                                
           $result = $db->Execute($sql);
           echo '<br>последний import_id из базы ';
           echo $result;
           echo "<br>";
        }
        public function get_last_data ($db){
            $sql = 'SELECT import_id, title, link, size, wordcount from import';
            $result = $db->getAll($sql);
            return $result;
        }
	public function get_data($request=null)
	{	
                $start = microtime(true);  
		$request_search = Requests::get('https://ru.wikipedia.org/w/api.php?action=query&list=search&srwhat=text&format=json&srsearch='.$request);
		$request_search = json_decode($request_search->body,true);                               
                
//              Если статья найдена
		if ($request_search['query']['searchinfo']['totalhits'] > 0) {
			
			$request_import = Requests::get('https://ru.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&explaintext=&exsectionformat=plain&titles='.current($request_search['query']['search'])['title']);
			$response = json_decode($request_import->body,true);
			$response = current($response['query']['pages']);
			$response['totalhits'] = true;
			$response['link'] = 'https://ru.wikipedia.org/wiki/'. $response['title'];
			$response['size'] = ceil (current($request_search['query']['search'])['size']/1000);
			$response['wordcount'] = current($request_search['query']['search'])['wordcount'];
                        
//                      Соединение с базой данных                        
                        $dsn = 'mysqli://wiki_import:123@localhost/wiki?persist';
			$db = NewADOConnection($dsn);
                        $db->SetCharSet('utf8');

			if (!$db) {
				$response ['data_from_base']['db_false'] = TRUE;
                                $response ['data_from_base']['db_message'] = 'Импорт статьи не удался. Попробуйте позже.';
                                $response ['data_from_base']['db_status'] = 'Соединение с базой не удалось';
			} else {
                            
//                      Если соединение удалось запись в базу полученной статьи                            
				$sql_import = 'INSERT INTO import (import_id,title,link,size,wordcount,text) VALUES (null,'
                                . $db-> qStr ($response ['title']) .','
                                . $db-> qStr ($response['link']) .','
                                . $response['size']. ','
                                . $response['wordcount']. ','
                                . $db-> qStr ($response['extract']) .
                                ')';                                
				$result = $db->Execute($sql_import);
                     
//                              Подготовка текста статьи для разьбиения на слова атомы
                                $response['extract'] = preg_replace ('/{.*}/','',$response['extract']);    // Удаляем возможную вики разметку
                                $text_for_atoms = preg_replace('/[^\w\s]/u', ' ', $response['extract']);   // Удаляем знаки препинания
                                $text_for_atoms = preg_replace("|[\s]+|i"," ",$text_for_atoms);          // Удаляем лишние пробелы

                                $array = explode (" ",$text_for_atoms);    // Разбиваем текс на слова атомы
                                foreach ($array as $key => $value) {      // Удаляем атомы меньше 3-х символов
                                    if(mb_strlen($value, 'utf8') < 3){
                                        unset($array[$key]);
                                    }
                                }                                
                                $response['data_from_base'] = $this -> get_last_data ($db);            // Берем последние данные импорта
                                $import_id = end ($response['data_from_base'])["import_id"];
                                
//                      Формируем строку запроса
                                $atoms_to_insert = '';
                                foreach ($array as $key => $value) {
                                    $atoms_to_insert .= '('. $import_id . ',' . $db-> qStr ($value) . '),';
                                }
                                $atoms_to_insert = substr($atoms_to_insert, 0,-1);                                
                                
//                      Запись в базу слов атомов
                                $sql_import_atoms = 'INSERT INTO search (import_id, word) VALUES '. $atoms_to_insert . ';';
                                $result_atoms = $db->Execute($sql_import_atoms);                                
                                if (!$result_atoms) {
                                    $response ['data_from_base']['db_false'] = TRUE;
                                    $response ['data_from_base']['db_status'] = 'Импорт слов-атомов не удался';
                                }
   
                                        
                                if (!$result) {
                                    $response ['data_from_base']['db_false'] = TRUE;
                                    $response ['data_from_base']['db_message'] = 'Импорт статьи не удался. Попробуйте позже.';
                                    $response ['data_from_base']['db_status'] = 'Импорт статьи не удался';
                                }
			}                        
                        $response['time_for_import'] = round ( microtime(true) - $start, 2); // Подсчет времени выполнения скрипта
                        $response['data_from_base']['db_false']  = FALSE;
                        return $response;
                        
		} else {
                    $response ['data_from_base']['db_false'] = TRUE;
                    $response ['data_from_base']['db_message'] = 'Статья, удовлетворяющая критериям поиска, не найдена.';
                    return $response; 
		}		
	}
}