<?php


namespace App\Models;


class View
{
    private $templatePath;
    private $data = [];

    public function __construct($path = '')
    {
        $this->templatePath = $path;
    }

    public function setTemplatePath($path)
    {
        $this->templatePath = $path;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        $this->$name = $value;
    }

    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return '';
    }

    function render($tplName, array $data) {
        $tplName = TPL_DIR  . $tplName;
        $result = '';

        if (!file_exists($tplName)) {
            // echo 'Нет такого шаблона!';
            return $result;
        }

        ob_start();
        extract($data);
        require $tplName;

        $result = ob_get_clean();

        return $result;
    }
}