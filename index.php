<?php

require_once 'user.php';

// Пример
$user = new User();
$user->performAuthentication('app_user', 'app_password', 'app');
$user->performAuthentication('mobile_user', 'mobile_password', 'mobile');


