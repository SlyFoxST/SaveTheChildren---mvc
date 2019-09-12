<?php
//класс авторизации пользователей с распределением ролей и входом
abstract class AdminBase{
//проверяем авторизирован ли опльзователь, если нет делаем редирект на форму входа
	public static function checkLog(){
$userId = User::checkLoged(); 
	}
}
?>