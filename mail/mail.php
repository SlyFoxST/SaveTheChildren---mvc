<?php

if(isset($_POST['ok'])){
	   	$errors = false;
	   	$name = htmlspecialchars(urldecode(trim($_POST['name'])))   ;
	   	$phone =htmlspecialchars(urldecode(trim($_POST['phone']))) ;
	   	$msg = $_POST['msg-txt'];
	   	if(User::regPhone($phone)){
        $errors[] = 'Не коректно введен номер телефона';
	   	}
	   	if($errors == false){
	   		$mail = 'yagoda303@gmail.com';
	        $subject = "Пользователь". $name .", хочет заказать консультацию по выбору ведущего";
	        $maseg = "Пользователь: " .$name. "\n Заказал(ла) консультацию по выбору ведущего. Контактный номер: " . $phone. "\nСообщение: " . $msg;	
	        $result = mail($mail,$subject,$maseg);
	        $result = true;

	   	}
	   }
	if(isset($_POST['show'])){
		$errors = false;
		$name_show = urldecode(trim(htmlspecialchars($_POST['show_name'])));
		$phone_show = urldecode(trim(htmlspecialchars($_POST['show_phone'])));
		$txt_show = urldecode(trim(htmlspecialchars($_POST['show_txt'])));
		if(User::regPhone($phone_show)){
			$errors[] = "Не коректно введен номер телефона";
		}
		if($errors == false){
			$mail_show = 'yagoda303@gmail.com';
			$subject_show = 'Пользователь' .$name_show.' ,хочет заказать консультацию по выбору шоу-программы.';
			$msg_show = "Пользователь: " .$name_show ."\n Заказал(ла) консультацию по выбору шоу-программы. \n Контактный телефон: " . $phone_show . "\n Сообщение: " .$txt_show;
			$result_show = mail($mail_show, $subject_show, $msg_show);
			$result_show = true;
		}
	}
	if(isset($_POST['music'])){
		$name_music = htmlspecialchars(trim(urldecode($_POST['name_music'])));
		$phone_music = htmlspecialchars(trim(urldecode($_POST['phone_music'])));
		$txt_music = htmlspecialchars(trim(urldecode($_POST['txt_music'])));
		$errors = false;
		if(User::regPhone($phone_music)){
			$errors = "Не коректно введен номер телефона";
		}
		if($errors == false){
			$mail_music = 'yagoda303@gmail.com';
			$subject_music = 'Пользователь: ' . $name_music. '. Хочет заказать консультацию по вопросам музыкального сопровождения';
			$msg_music = "Пользователь: ".$name_music . " Заказал(ла) консультацию по музыкальному сопровождению мероприятия. \n  Контактный номер телефона: " . $phone_music . "\n Сообщение: " .$txt_music;
			$result_music = mail($mail_music,$subject_music,$msg_music);
			$result_music = true;
		}
	}
	if(isset($_POST['dancer'])){
		$name_dancer = $_POST['name_dance'];
		$phone_dencer = $_POST['phone_dance'];
		$txt_dencer = $_POST['txt_dance'];
		$errors = false;
		if(User::regPhone($phone_dencer)){
			$errors[] = "Не коректно введен номер телефона";
		}
		if($errors == false){
			$mail_dencer = 'yagoda303@gmail.com';
			$subject_dencer = "Пользователь, " .$name_dancer . ". Хочет заказать консультацию.";
			$msg_dencer = "Пользователь: " .$name_dancer . " .Заказал(ла) консультацию. \n Контактный номер телефона: " .$phone_dencer . " \n Сообщение:" . $txt_dencer;
			$result_dencer = mail($mail_dencer,$subject_dencer,$msg_dencer);
			$result_dencer = true; 
		}
	}
	if(isset($_POST['btn_form1'])){
		$mail_form_footer = 'yagoda303@gmail.com';
		$name_form_footer = $_POST['name_form_footer'];
		$phone_form_footer = $_POST['phone_form_footer'];
		$textarea_form_footer = $_POST['textarea_form_footer'];
		$errors = false;
		if(User::regPhone($phone_form_footer)){
			 $errors[] = "Не коректно введен номер телефона";
		}
		if($errors == false){
$subject_form_footer = "Пользователь, " .$name_form_footer . ". Хочет заказать консультацию.";
			$msg_form_footer = "Пользователь: " .$name_form_footer . " .Заказал(ла) консультацию. \n Контактный номер телефона: " .$phone_form_footer . " \n Сообщение: " .$textarea_form_footer;
			$result_form_footer = mail($mail_form_footer,$subject_form_footer,$msg_form_footer);
			$result_form_footer = true; 
		}

	}	   
?>