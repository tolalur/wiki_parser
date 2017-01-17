<?php

require_once "./vendor/autoload.php";

/*
$response = Requests::get('https://ru.wikipedia.org/w/api.php?action=query&titles=Путин,%20Владимир Владимирович&prop=extracts&format=json');

$response = json_decode($response->body,true);
$text = $response['query']['pages'][5723]['extract'];

echo '<pre>';
echo $text; 
echo '</pre>';
$text = preg_replace ('(\<(/?[^>]+)>)','',$text);
file_put_contents ('text.txt',$text);
*/

ini_set('display_errors', 1);
require_once 'application/router.php';
require_once 'application/core/controller.php';
require_once 'application/core/view.php';
require_once 'application/core/model.php';

$router = new Router;
