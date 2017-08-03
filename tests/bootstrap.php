<?php

if (file_exists(__DIR__ . '/credentials.php')) {
    require_once('credentials.php');
}

define('BOLETO_SIMPLES_ENVIRONMENT', 'sandbox');
define('BOLETO_SIMPLES_BASE_URI',    'https://sandbox.boletosimples.com.br/api/v1');
define('BOLETO_SIMPLES_TOKEN',       'zjuio96wkixkzy6z98sy');
define('BOLETO_SIMPLES_APP_NAME',    'MyApp (myapp@example.com)');
