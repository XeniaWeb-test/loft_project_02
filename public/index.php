<?php

require_once '../src/Core/init.php';


echo 'я здесь!';
use App\Core\ConnectDB;
////$pdo = new PDO('mysql:host=127.0.0.1;dbname=oks_mvc', 'root', '');
//
$db = new ConnectDB();

$db->exec('INSERT into users (login, user_name, age, `description`) VALUES (:log, :nam, :age, :des)',
    ['log' => 'Ух', 'nam' => 'Вася', 'age' => 55, 'des' => 'Обо мне' ]);

$rrr = $db->fetchOne('SELECT * FROM users');
