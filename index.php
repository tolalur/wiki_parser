<?php

require_once "./vendor/autoload.php";

ini_set('display_errors', 1);
require_once 'application/router.php';
require_once 'application/core/controller.php';
require_once 'application/core/view.php';
require_once 'application/core/model.php';

$router = new Router;
