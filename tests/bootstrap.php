<?php

if (file_exists(__DIR__ . '/credentials.php')) {
    require_once('credentials.php');
}

define('API_ENVIRONMENT', 'sandbox');
define('API_BASE_URI',    'https://sandbox.boletosimples.com.br/api/v1');
define('API_TOKEN',       'zjuio96wkixkzy6z98sy');
define('API_APP',         'MyApp (myapp@example.com)');
