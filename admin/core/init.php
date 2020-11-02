<?php
/**
 * Title: Core Initializer
 */

session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'cube'
    ),
    
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'sessions' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
    'server' => array(
        'name' => 'http://127.0.0.1/cube/'
    )
);

require_once $_SERVER['DOCUMENT_ROOT'] . '/cube/admin/functions/functions.php';

spl_autoload_register(function($class) {
  require_once $_SERVER['DOCUMENT_ROOT'] . '/cube/admin/classes/' . $class . '.php';
});

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('sessions/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
} else {
    $user = new User();
}

$errmsg = $succmsg = $page = $link = "";