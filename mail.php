<?php
$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$mail = 'yagoda303@gmail.com';
$subject = 'Письмо с сайта 3dvoice'
$msg = "Пользоватедь" . $name . "Хочет заказать консультацию";
$result = mail($mail, $subject, $msg);

?>