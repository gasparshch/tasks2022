<?php

require_once 'tasks.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto
}

$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        showHome();
        break;
    default:
        echo '404 not found';
        break;
}