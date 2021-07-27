<?php

session_start();

require_once __DIR__ . '/vendor/SplClassLoader.php';

// Autoload
require_once __DIR__ . '/config/autoload.php';

// Router
require_once 'config/routes.php';
