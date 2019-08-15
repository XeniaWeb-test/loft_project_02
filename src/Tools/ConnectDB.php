<?php

namespace App\Tools;

use PDO;


class ConnectDB
{
    private $pdo;

    private function getConnectDB(): PDO
    {
        if (!isset($this->pdo)) {
            $dbType = DB_TYPE;
            $dbHost = DB_HOST;
            $dbUser = DB_USER;
            $dbName = DB_NAME;
            $dbPassword = DB_PASSWORD;
            $this->pdo = new PDO("$dbType:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
        }
        return $this->pdo;
    }

    public function exec(string $query, array $params = []): int
    {
        $pdo = $this->getConnectDB();
        $prepared = $pdo->prepare($query);
        $ret = $prepared->execute($params);
        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return -1;
        }
        $affectedRows = $prepared->rowCount();

        return $affectedRows;
    }

    public function fetchAll(string $query , array $params = [])
    {
        $pdo = $this->getConnectDB();
        $prepared = $pdo->prepare($query);
        $ret = $prepared->execute($params);
        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return [];
        }
        $data = $prepared->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }
    public function fetchOne(string $query , array $params = [])
    {
        $data = $this->fetchAll($query, $params);
        return $data ? reset($data) : [];
    }
}
