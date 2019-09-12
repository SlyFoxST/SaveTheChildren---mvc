<?php
// контороллер главной страницы главного администратора
class AdminController extends AdminBase{
	public function actionIndex(){
		$adminId = User::checkLoged();//метод проверки зарегестрированого пользователя
		$admin =   User::getUserById($adminId);//метод получаем масив данных о пользователи по id
		$role = User::role($adminId);
		require_once(ROOT. '/view/admin/index.php');
		return true;
	}
	//метод просмотра страницы пользователя
	public function actionView(){
		$adminId = User::checkLoged();
		$admin = User::getUserById($adminId);
		$role = User::role($adminId);
		require_once(ROOT.'/view/admin/view-profile.php');
		return true;
	}
	//метод обновления данных о пользователи
	public function actionEdit(){
		$adminId = User::checkLoged();
		$admin = User::getUserById($adminId);
		$role = User::role($adminId);
		$result = false;
		if(isset($_POST['submit-edit'])){
			$errors = false;
			$name = trim(htmlspecialchars(stripcslashes($_POST['name'])));
			$email =trim(htmlspecialchars(stripcslashes($_POST['email'])));
			$password = trim(htmlspecialchars(stripcslashes($_POST['password'])));
			$phone = trim(htmlspecialchars(stripcslashes($_POST['phone'])));
        if(!User::checkName($name)){
            $errors[] = 'Name must be at least 3 characters long';
        }
        if(!User::checkPassword($password)){
        	$errors[] = 'Password must be at least 8 characters long';
        }
        if(!User::checkPhone($phone)){
        	$errors[] = 'Invalid phone number format, +38 (066) 555-55-55';
        }
        if(User::getEmails($email,$adminId)){
        	$errors[] = 'A user with this email has already been registered';
        }
        if(User::getPassword($password,$adminId)){
        	$errors[] = 'A user with this password has already been registered';
        }
        if($errors == false){
        	$result = User::edit($name,$email,$password,$phone,$adminId);
        }
		}
		require_once(ROOT.'/view/admin/edit-profile.php');
		return true;
	}
	//метод добавления нового пользователя в бд
	public function actionAdd(){
		$adminId = User::checkLoged();
		$admin = User::getUserById($adminId);
		$role  = User::role($adminId);
		$result = false;
		$name = '';
		$email = '';
		$password = '';
		$phone = '';

		if(isset($_POST['add-user'])){
        $errors = false;
       	$name = trim(htmlspecialchars(stripcslashes($_POST['name'])));
		$email =trim(htmlspecialchars(stripcslashes($_POST['email'])));
		$password = trim(htmlspecialchars(stripcslashes($_POST['password'])));
		$phone = trim(htmlspecialchars(stripcslashes($_POST['phone'])));
  		$role = $_POST['radio'];
        if(!User::checkPassword($password)){
        	$errors[] = 'Password must be at least 8 characters long';
        }
        if(!User::checkPhone($phone)){
        	$errors[] = 'Invalid phone number format, +38 (066) 555-55-55';
        }
        if(User::checkEmailExists($email)){
        	$errors[] = 'A user with this email has already been registered';
        }
        if(User::checkPasswordExists($password)){
        	$errors[] = 'A user with this password has already been registered';
        }
        if(User::checkPhonedExists($phone)){
        	$errors[] = 'This phone number has already been registered';
        }
        if($errors == false){
        	$result = User::addUser($name,$email,$password,$phone,$role);
        }
     
	   }
		require_once(ROOT.'/view/admin/add-user.php');
		return true;
	}
	//метод просмотра всех пользователей
	public function actionViewUser(){
		$adminId =      User::checkLoged();
		$admin =        User::getUserById($adminId);
		$role  =        User::role($adminId);
		$getListUsers = array();
		$getListUsers = User::selectListUsers();
		require_once(ROOT.'/view/admin/users.php');
		return true;
	}
	//метод просмотра отдельной страницы пользователя
	public function actionViewUserInfo($id){
		$adminId = User::checkLoged();
		$admin =   User::getUserById($adminId);
		$getUser = User::selectListUsers();
		$user =    User::getUsersById($id);
		$role  =   User::role($adminId);
		if(isset($_POST['delete-user'])){
		$result = User::remove($id);
	}
		require_once(ROOT.'/view/admin/view-user.php');
	}
	//метод выберает все путевки с бд
	public function actionAllTravel(){
		$adminId = User::checkLoged();
		$admin   = User::getUserById($adminId);
		$role    = User::role($adminId);
		$ok      = User::getAllTravel();
		require_once(ROOT.'/view/admin/all-travel.php');
		return true;
	}
	public function actionTravelTripUser($id){
		$adminId = User::checkLoged();
		$admin =   User::getUserById($adminId);
		$role  = User::role($adminId);
        $travelTrip = User::getTravelForIdTravel($id); 
        $usId = $travelTrip['id_user'];  
        require_once(ROOT.'/view/admin/travel.php');
		return true;
	}
	public function actionDelete($id){
       $result = User::delete($id);
       if($result) echo "good";
       else echo "bad";
    return $result;
	}

}
?>