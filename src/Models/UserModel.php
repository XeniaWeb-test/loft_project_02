<?php

namespace App\Models;

use App\Tools\ConnectDB;
use PDO;

class UserModel
{
    public function checkUser(array $data)
    {
         $pdo = new ConnectDB();
         $userId = $pdo->fetchOne('SELECT id FROM users WHERE login = :login',
             ['login' => $data['login']]);

         return $userId;
    }
    public function checkUniqueLogin(array $data)
    {
         $pdo = new ConnectDB();
         $user = $pdo->fetchAll('SELECT id FROM users WHERE login = :login',
             ['login' => $data['email']]);
    }

    public function getAllAboutUserById($userId)
    {
        $pdo = new ConnectDB();
        $userAll = $pdo->fetchOne('SELECT * FROM users WHERE id = :id',
            ['id' => $userId]);

        return $userAll;
    }
    public function getHashPass($user_pass)
    {
        return hash("sha256", $user_pass);
    }

    public function saveUser(array $data)
    {
        $pdo = new ConnectDB();
        $sql = "INSERT into users (login, user_pass, user_name, age, descript) 
            VALUES (:login, :hash_pass, :user_name, :age, :descript)";

        $newUserId = $pdo->exec($sql, [
            'login' => $data['login'],
            'hash_pass' => $this->getHashPass($data['user_pass']),
            'user_name' => $data['user_name'],
            'age' => $data['user_age'],
            'descript' => $data['descript']
        ]);

        return $newUserId;
    }

    public function getUserList()
    {
        $pdo =new ConnectDB();
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $userList = $pdo->fetchAll($sql);

        return $userList;
    }

}
