<?php


$router->get('/', ['IndexController','home']);
$router->get('/{name}', ['IndexController','name']);