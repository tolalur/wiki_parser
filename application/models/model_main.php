<?php

class Model_Main extends Model
{
	
	public function get_data($request = NULL)
	{
//          Соединение с базой данных 
            $dsn = 'mysqli://wiki_import:123@localhost/wiki?persist';
            $db = NewADOConnection($dsn);
            $db->SetCharSet('utf8');
            //$db->debug=true;

            if (!$db) {
//          Если соединение не удалось
		$response['data_from_base'] = 
                    array (
                        'db_false'  => TRUE,
                        'db_message'  => 'соединение с базой не удалось'
                    );
		} else {
//            Если соединение удалось вывод импортированных статей
                    $sql = 'SELECT import_id, title, link, size, wordcount from import';
                    $result = $db->getAll($sql);
                    if ($result) {                        
                        $response['data_from_base'] =  $result;
                        $response['data_from_base']['db_false']  = FALSE;                    
                        } else {
                            $response['data_from_base'] = 
                                array (
                                    'db_false'  => TRUE,
                                    'db_message'  => 'чтение из базы не удалось или пустой ответ'
                                );                            
                        }                       
            return $response;
            }
        }
}