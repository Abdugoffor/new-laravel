<?php
session_start();
use App\App;

include "app/Helpers/helpers.php";
include "autoloader.php";
include "web.php";
$app = new App();
$app->run();

