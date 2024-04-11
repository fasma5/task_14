<?php

// Возвращаем массив всех пользователей
function getUsersList()
{
    include 'user_data_storage.php';
    return $user_list;
};

// Проверка существования пользователя
function existsUser($login)
{
    $all_users = getUsersList();
    foreach ($all_users as $user) {
        if ($user['login'] === $login) {
            return true;
        }
    }
    return false;
}

// Проверка на существование пользователя и правильность ввода пароля
function checkPassword($login, $password)
{
    $all_users = getUsersList();
    foreach ($all_users as $user) {
        if ($user['login'] === $login) {
            if (password_verify($password, $user['password'])) {
                return true;
            }
        }
    }
    return false;
}

// Возвращает имя вошедшего на сайт пользователя
function getCurrentUser()
{
    if (isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser'])) {
        return $_SESSION['currentUser'];
    } else return null;
}

// Ведет подсчет кол-ва дней до ДР и если ДР, то выводит акцию
function getDateDifferent($date_birthday)
{
    $DateToday = new DateTime(date('d.m.Y')); // Текущая дата
    $DateBirth = new DateTime($date_birthday);  // Дата рождения
    $DateBirth->setDate($DateToday->format('Y'), $DateBirth->format('m'), $DateBirth->format('d')); // Меняем год на текущий
    print_r($DateBirth);
    print_r($DateToday);
    $different = $DateBirth->diff($DateToday);  // Вычисляем разницу между датами
    if ($different->invert) // отрицательный период(т.е. сегодняшняя дата меньше даты др)
    {
        return $different->days;  // выводим кол-во дней 
    }                               
    else {   
        if ($different->days === 0){    // если период и интервал дней = 0, значит сегодня др
            return $different->days;
        }
        else { // все  остальное значит что др уже прошел
        $DateBirth->modify('+1year');   // добавляем год к дате рождения, для подсчета дней от сегодняшней даты до след др
        $different = $DateBirth->diff($DateToday); // снова вычисляем разницу между датами
        return $different->days;
        }
    } 




}
         