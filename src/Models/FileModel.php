<?php

namespace App\Models;

use App\Tools\ConnectDB;

class FileModel
{
    public function addFile($file, $data)
    {
        if (isset($file['name']) && !empty ($file['name'])) {
            $file_name = $file['tmp_name'];
            $file_type = mime_content_type($file_name);
            if ($file_type !== "image/png" & $file_type !== "image/jpeg" & $file_type !== "image/jpg") {
                $errors['avatar'] = 'Загрузите картинку в формате JPG, JPEG или PNG';
            } else {
                if ($file_type === "image/png") {
                    $file_name = uniqid() . '.png';
                } elseif ($file_type === "image/jpg") {
                    $file_name = uniqid() . '.jpg';
                } elseif ($file_type === "image/jpeg") {
                    $file_name = uniqid() . '.jpeg';
                }
                $file_path = IMG_DIR . DIRECTORY_SEPARATOR;
                $file_url = '/img/' . $file_name;
                move_uploaded_file($file['tmp_name'], $file_path . $file_name);
            }
        }
        $pdo = new ConnectDB();
        $sql = "INSERT into files (file_name, about, user_id) 
            VALUES (:file_name, :about, :user_id)";

        $user = $pdo->exec($sql, [
            'file_name' => $file_url,
            'about' => $data,
            'user_id' => 1 // TODO $_SESSION['user_id']
        ]);
        return $user;
    }

    public function getFileList()
    {
        $pdo =new ConnectDB();
        $sql = "SELECT * FROM files ORDER BY id DESC";
        $fileList = $pdo->fetchAll($sql);

        return $fileList;
    }
}