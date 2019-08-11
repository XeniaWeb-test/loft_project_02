<?php


namespace App\Modules\Controllers;

use App\Core\View;

class FilesController
{
    public function showFiles()
    {
        $render = new View();
        $fileList = $render->render('fileList.phtml', [

        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $fileList
        ]);

        print ($layoutContent);
    }
}