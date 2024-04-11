<?php
session_start();
$user_list = [
    ['login' => 'Mary', 'password' => password_hash(123,PASSWORD_DEFAULT)], //123
    ['login' => 'Alice', 'password' => password_hash(123,PASSWORD_DEFAULT)], //123
    ['login' => 'Margo', 'password' => password_hash(123,PASSWORD_DEFAULT)], //123
];