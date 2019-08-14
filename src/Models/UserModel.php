<?php

namespace App\Models;


class UserModel
{
    public function checkUniqueLogin(array $data)
    {
         $pdo = new ConnectDB();
         $user = $pdo->fetchOne('SELECT id FROM users WHERE login = :login',
             ['login' => $data['email']]);
    }

    public function saveUser(array $data)
    {
        $pdo = new ConnectDB();
        $sql = "INSERT into users (login, user_pass, user_name, age, descript) 
            VALUES (:login, :hash_pass, :user_name, :age, :descript)";

        $user = $pdo->exec($sql, [
            'login' => $data['login'],
            'hash_pass' => hash("sha256", $data['user_pass']),
            'user_name' => $data['user_name'],
            'age' => $data['user_age'],
            'descript' => $data['descript']
        ]);
        // TODO запись аватара в таблицу юзера или связь таблиц
        return $user;
    }

    public function getUserList()
    {
        $pdo =new ConnectDB();
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $userList = $pdo->fetchAll($sql);

        return $userList;
    }

}
