<?php

class Model_Search extends Model
{
	public function search_data($request)
	{                      
//                      Соединение с базой данных                        
                        $dsn = 'mysqli://wiki_import:123@localhost/wiki?persist';
                        $db = NewADOConnection($dsn);
                        $db->SetCharSet('utf8');
                        //$db->debug=true;

			if (!$db) {
//                      Если соединение не удалось
                            $response ['db'] = FALSE;
			} else {
                            $response ['db'] = TRUE;                            
                            $request = urldecode($request);
                            
//                      Если соединение удалось поиск в базе по словам атомам                           
				$sql = 'SELECT search.import_id, '
                                . 'import.title, import.text, '
                                . 'COUNT(search.import_id)  AS "count" FROM `search` '
                                . 'LEFT JOIN `import` USING(import_id) '
                                . 'WHERE `word` = ' 
                                . $db-> qStr ($request)
                                . ' GROUP BY search.import_id ORDER BY COUNT(search.import_id) DESC;';                                
                                $result = $db->getAll($sql);
                     
			}
                       
//                      Если ничего не найдено
                        if (empty($result)) {
                            $response['search_status'] = FALSE;
                            $response ['all_count'] = 0;
                            
                        } else {
                            
//                      Иначе готовим данные для вывода в шаблон                            
                            $response['search_status'] = TRUE;                            
                            $response ['all_count'] = count ($result);
                            $response['result'] = $result;
                        }
                        return $response;
            
        }		
}