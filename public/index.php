<?php

require_once "../vendor/autoload.php";

use Core\Kernel\Kernel;



ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

Kernel::run();
