<?php
class SiteController{
	public function actionIndex(){
		$email = '';
		$password = '';
		if(isset($_POST['btn'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$errors = false;
			if(!User::checkEmail($email)){
				$errors[] = "No user with this email";
			}
			// метод проверяет пароль
			if(!User::checkPassword($password)){
				$errors[] = "Incorrect password";
			}
			// метод проверяет правильность email
			if(!User::checkEmailExists($email)){
				$errors[] = 'No user with this email';
			}
			if($errors == false){

			}
			//метод проверяет на наличие пользователя в бд
			$adminId = User::checkUserData($email,$password);
			$role = User::role($adminId);
            if($adminId == false){
	        $errors[] = "User with such data is not registered";
            }
            else{
            // метод сохраняет  пользователя в сессию если такой пользователь есть в бд
            	User::auth($adminId);
                if($role == 'admin'){
                header('Location: /admin/');
               } 
               if($role == "maneger"){
               	header("Location: /maneger/");
               }
               if($role == "security")
               	header("Location: /security/");
               if($role == "finance"){
               	header("Location: /finance/");
               }
               if($role == 'user'){
               	header("Location: /user/");
               }
               if($role == 'country-director'){
               	header("Location: /country-director/");
               }
               if($role == 'NgcaAreaCoordinator'){
               	header('Location: /NgcaAreaCoordinator/');
               }
               if($role == 'ngca-admin'){
               	header('Location: /ngca-admin/');
               }
               if($role == 'fleet-gca'){
               	header('Location: /fleet-gca/');
               }
               if($role == 'gca-admin'){
               	header('Location: /gca-admin/');
               }
               if($role == 'fleet-ngca'){
               	header('Location: /fleet-ngca/');
               }
                exit();	
            }

		}
		 	
				require_once(ROOT.'/view/site/index.php');
		return true;
	}
	public static function actionLogout(){
		unset($_SESSION['admin']);
		header('Location: /');
	}

}
?>