<?php

namespace App\Controllers;

use App\Models\FileModel;
use Exception;

class FilesController extends BaseController
{
    public function showUploadForm()
    {
        $fileForm = $this->view->render('loadFile.phtml', [

        ]);
        $layoutContent = $this->view->render('layout.phtml', [
            'content' => $fileForm
        ]);

        print ($layoutContent);
    }

    /**
     * @return int
     * @throws Exception
     */
    public function addNewFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $about = $_POST['file']['about'] ?? 'Аватар';
            $file = $_FILES['jpg_img'];
        }

        if(isset($file) && isset($about)) {
        $model = new FileModel();
        $ret = $model->addFile($file, $about);

        }
        if(!isset($ret)) {
            throw new Exception('Загрузка не удалась.');
        }
        header('Location: /file_list');
    }

    public function showFiles()
    {
        $model = new FileModel();
        $listf = $model->getFileList();

        $fileList = $this->view->render('fileList.phtml', [
            'listf' => $listf
        ]);
        $layoutContent = $this->view->render('layout.phtml', [
            'content' => $fileList
        ]);

        print ($layoutContent);
    }
}