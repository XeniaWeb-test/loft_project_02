<?php


namespace App\Tools;

class Session
{
    const KEY_USER = 'user';

    /**
     * Проверяет, является ли пользователь авторизованным
     *
     */
    public function isGuest()
    {
        return empty($_SESSION[self::KEY_USER]);
    }

    /**
     * Получить авторизованного пользователя
     * @return mixed
     */
    public function getUser()
    {
        if ($this->isGuest()) {
            return null;
        }

        return $_SESSION[self::KEY_USER];
    }

    /**
     * Авторизация пользователя
     * @param $userId int
     */
    public function login($userId)
    {
        $_SESSION[self::KEY_USER] = $userId;
    }

    /**
     * Завершение сессии
     */
    public function logout()
    {
        $_SESSION[self::KEY_USER] = null;
    }

    /**
     * Установить key/value в сессию.
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Получить значение установленное в сессии по ключу
     *
     * @return bool|mixed
     * @var mixed
     */
    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key]:false;
    }

    /**
     * Получить глобальную переменную сессии
     *
     * @return array
     */
    public function getSession()
    {
        return $_SESSION;
    }
}