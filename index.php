<?php

define('PATH_BASE', realpath(dirname(__FILE__) . '/..'));

require_once PATH_BASE . '/application/core/init.php';

$mvc = MvcClass::getInstance();
$mvc->run();
