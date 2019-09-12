<?php 
class User{
	//проверка на правильность email
	public static function checkEmail($email){
  $reg_exp = "/^([a-z0-9_-]+\.)*[a-z0-9_-]+@child\.org/";      
if(filter_var($email,FILTER_VALIDATE_EMAIL) && preg_match($reg_exp,$email)){ 
	return true;
}
return false;
	}
// проверка правильности ввода пароля
	public static function checkPassword($password){
if(strlen($password) >= 8){
	return true;
}
return false;

	}
//проверряем правильность ввода имени
public static function checkName($name){
	if(strlen($name) >= 3){
		return true;
	}
	return false;
}
//проверка на правильность ввода телефона
public static function checkPhone($phone){
	 $pattern = "/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/";
	if(preg_match($pattern, $phone)){
		return true;
	}
	return false;
}
//проверяем на наличие пользователя с таким email в бд
public static function checkEmailExists($email){
$db = Db::getConnection();
$sql = 'SELECT * FROM admin WHERE email = :email';
$result = $db->prepare($sql);
$result->bindParam(':email',$email,PDO::PARAM_STR);
$result->execute();
if($result->fetchColumn())
return true;
return false;
}

 //проверяет существует пользователь в бд
 public static function checkUserData($email,$password){
 $db = Db::getConnection();
$sql = 'SELECT * FROM admin WHERE email = :email AND password = :password';
$result=$db->prepare($sql);
$result->bindParam(':email',$email,PDO::PARAM_STR);
$result->bindParam(':password',$password,PDO::PARAM_STR);
$result->execute();
$admin = $result->fetch();
if($admin){
	return $admin['id'];
}
return false;
 }
 //выбераем роль пользователя по id
 public static function role($adminId){
 $db = Db::getConnection();
$sql = 'SELECT * FROM admin WHERE id = :adminId';
$result=$db->prepare($sql);
$result->bindParam(':adminId',$adminId,PDO::PARAM_STR);
$result->execute();
$admin = $result->fetch();
if($admin){
	return $admin['role'];
}
return false;
 }
  //выбераем  пользователя по id
 public static function getUserById($adminId){
 $db = Db::getConnection();
$sql = 'SELECT * FROM admin WHERE id = :adminId';
$result=$db->prepare($sql);
$result->bindParam(':adminId',$adminId,PDO::PARAM_STR);
$result->execute();
return $result->fetch();
 }
//Метод проверяет на наличие похожих email в бд
 public static function getEmails($email,$adminId){
    $db = Db::getConnection();
	$sql = 'SELECT * FROM admin WHERE email = :email AND id != :adminId';
	$result = $db->prepare($sql);
	$result->bindParam(':email',$email,PDO::PARAM_STR);
	$result->bindParam(':adminId',$adminId,PDO::PARAM_INT);
	$result->execute();
	if($result->fetch())
		return true;
	return false;
 }
//метод проверяет на наличие пользователя с таким паролем в бд
 public static function getPassword($password,$adminId){
   $db = Db::getConnection();
	$sql = 'SELECT * FROM admin WHERE password = :password AND id != :adminId';
	$result = $db->prepare($sql);
	$result->bindParam(':password',$password,PDO::PARAM_STR);
	$result->bindParam(':adminId',$adminId,PDO::PARAM_INT);
	$result->execute();
	if($result->fetch())
		return true;
	return false;
   }
//метод проверяет на наличие пароля в бд
public static function checkPasswordExists($password){
$db = Db::getConnection();
$sql = 'SELECT * FROM admin WHERE password = :password';
$result = $db->prepare($sql);
$result->bindParam(':password',$password,PDO::PARAM_STR);
$result->execute();
if($result->fetchColumn())
return true;
return false;
}   
//метод проверяет на наличие телефона в бд
public static function checkPhonedExists($phone){
$db = Db::getConnection();
$sql = 'SELECT * FROM admin WHERE phone = :phone';
$result = $db->prepare($sql);
$result->bindParam(':phone',$phone,PDO::PARAM_STR);
$result->execute();
if($result->fetchColumn())
return true;
return false;
} 
//метод сохраняет пользователя в сессию
 public static function auth($adminId){
 $_SESSION['admin'] =  $adminId ;
 }
 //проверяем авторизацию пользователя
 public static function checkLoged(){
 if(isset($_SESSION['admin'])){
 	return $_SESSION['admin'];
 }
 header("location: /");
 }
 public static function edit($name,$email,$password,$phone,$adminId){
 	$db =  Db::getConnection();
 	$sql = "UPDATE admin SET name = :name, email = :email, password = :password, phone = :phone WHERE id = :adminId";
 	$result = $db->prepare($sql);
 	$result->bindParam(':name',$name,PDO::PARAM_STR);
 	$result->bindParam(':email',$email,PDO::PARAM_STR);
 	$result->bindParam(':password',$password,PDO::PARAM_STR);
 	$result->bindParam(':phone',$phone,PDO::PARAM_STR);
 	$result->bindParam('adminId',$adminId,PDO::PARAM_STR);
 	 return $result->execute();
 }

//добавление нового пользователя в бд
public static function addUser($name,$email,$password,$phone,$role){
	$db =  Db::getConnection();
	$sql = "INSERT INTO admin (name,email,password,phone,role)VALUES(:name,:email,:password,:phone,:role)";
	$result = $db->prepare($sql);
	$result->bindParam(':name',$name,PDO::PARAM_STR);
	$result->bindParam(':email',$email,PDO::PARAM_STR);
	$result->bindParam(':password',$password,PDO::PARAM_STR);
	$result->bindParam(':phone',$phone,PDO::PARAM_STR);
	$result->bindParam(':role',$role,PDO::PARAM_STR);
	$ok = $result->execute();
	if($ok){
		return true;
	}
	return false;
}
//выбор всех пользователей с бд
public static function selectListUsers(){
	$db =  Db::getConnection();
	$listUser = array();
	$sql = "SELECT * FROM admin  WHERE role != 'admin' ORDER BY id DESC ";
    $result = $db->query($sql);
     $i = 0;
while($row = $result->fetch()){
	$listUser[$i]['id'] = $row['id'];
    $listUser[$i]['name'] = $row['name'];
    $listUser[$i]['email'] = $row['email'];
    $listUser[$i]['password'] = $row['password'];
    $listUser[$i]['phone'] = $row['phone'];
    $listUser[$i]['role'] = $row['role'];
    $i++;
}
return $listUser;
}

public static function getUsersById($id){
	$id = intval($id);
	if($id){
		$db =  Db::getConnection();
		$sql = "SELECT * FROM admin WHERE id =".$id;
		$result = $db->query($sql);
		 	$result -> setFetchMode(PDO::FETCH_ASSOC);
            $userItem = $result->fetch();
       	 	return $userItem;
	}
}
//класс обьекта удаляет пользователя с бд
public static function remove($id){
    $db = Db::getConnection();
    $sql = "DELETE FROM admin WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':id',$id,PDO::PARAM_INT);
    return $result->execute();
}
//выбераем все заявки адимнов
public static function getAllTravel(){
	$db = Db::getConnection();
	$travelList = array();
	$sql = "SELECT * FROM travel,admin WHERE travel.id_user = admin.id ORDER BY travel.registration DESC";
	$result = $db->query($sql);
	$i = 0;
    while($row = $result->fetch()){
    $travelList[$i]['id_travel'] = $row['id_travel'];
    $travelList[$i]['id_user'] = $row['id_user'];	
    $travelList[$i]['name'] = $row['name'];	
    $travelList[$i]['type'] = $row['type'];	
    $travelList[$i]['departingFrom'] = $row['departingFrom'];	
    $travelList[$i]['destination'] = $row['destination'];
    $travelList[$i]['registration'] = $row['registration'];	
    $travelList[$i]['status'] = $row['status']; 
    $i++;
    }
    return $travelList;
}
//получаем заявку по id_travel
    public static function getTravelForIdTravel($id){
    $db = Db::getConnection();
    $sql = "SELECT * FROM travel WHERE id_travel = ".$id;
   	$result = $db->query($sql);
		 	$result -> setFetchMode(PDO::FETCH_ASSOC);
            $trevel = $result->fetch();
       	 	return $trevel;
    }
//выбераем security c бд
    public static function getSecurity(){
        $sec = array();
       $db = Db::getConnection();
       $sql = 'SELECT * FROM admin WHERE role = "security"';
       $result = $db->prepare($sql);
       $result->execute();
       $i=0;
       while($row = $result->fetch()){
       $sec[$i]['id'] = $row['id'];
       $sec[$i]['name'] = $row['name'];
       $sec[$i]['email'] = $row['email'];
       $sec[$i]['phone'] = $row['phone'];
       $i++;
       }
     return $sec;
    }
//выбераем менеджеров c бд
    public static function getManedger(){
        $manedger = array();
       $db = Db::getConnection();
       $sql = 'SELECT * FROM admin WHERE role = "maneger"';
       $result = $db->prepare($sql);
       $result->execute();
       $i=0;
       while($row = $result->fetch()){
       $manedger[$i]['id'] = $row['id'];
       $manedger[$i]['name'] = $row['name'];
       $manedger[$i]['email'] = $row['email'];
       $manedger[$i]['phone'] = $row['phone'];
       $i++;
       }
     return $manedger;
    }
//выбераем country director c бд
    public static function getCountryDirector(){
        $country = array();
       $db = Db::getConnection();
       $sql = 'SELECT * FROM admin WHERE role = "country-director"';
       $result = $db->prepare($sql);
       $result->execute();
       $i=0;
       while($row = $result->fetch()){
       $country[$i]['id'] = $row['id'];
       $country[$i]['name'] = $row['name'];
       $country[$i]['email'] = $row['email'];
       $country[$i]['phone'] = $row['phone'];
       $i++;
       }
     return $country;
    }
//выбераем NGCA AREA COORDINATOR c бд
 public static function getNgcaAreaCoordinator(){
  $NgcaCoordinator = array();
  $db = Db::getConnection();
  $sql = 'SELECT * FROM admin WHERE role = "NgcaAreaCoordinator"';
  $result = $db->prepare($sql);
  $result->execute();
  $i=0;
  while($row = $result->fetch()){
  $NgcaCoordinator[$i]['name'] = $row['name'];
  $NgcaCoordinator[$i]['email'] = $row['email'];
  $NgcaCoordinator[$i]['phone'] = $row['phone'];
  }
  return $NgcaCoordinator;
 }  
//выбор отпускного листа для travel по id_user
public static function getTravelForUserId($id = false){
	$db = Db::getConnection();
	$trev = array();
	$sql = "SELECT * FROM travel WHERE id_user = :id";
	$result = $db->prepare($sql);
	$result->bindParam(':id',$id,PDO::PARAM_INT);
	$result->execute();
	$i = 0;
    while($row = $result->fetch()){
    $trev[$i]['id_user'] = $row['id_user'];	
    $trev[$i]['name'] = $row['name'];	
    $trev[$i]['type'] = $row['type'];	
    $trev[$i]['departingFrom'] = $row['departingFrom'];	
    $trev[$i]['destination'] = $row['destination'];
    $trev[$i]['dateRequested'] = $row['dateRequested'];	
    $trev[$i]['returnto'] = $row['returnto'];
    $trev[$i]['datedeparture'] = $row['datedeparture'];	
    $trev[$i]['deteArrial'] = $row['deteArrial'];	
    $trev[$i]['dateReturn'] = $row['dateReturn'];
    $trev[$i]['purpose'] = $row['purpose'];
    $trev[$i]['groupTravel'] = $row['groupTravel'];
    $trev[$i]['ifGroupTravelWho'] = $row['ifGroupTravelWho'];
    $trev[$i]['ChildSafeguardingTrainingCompleted'] = $row['ChildSafeguardingTrainingCompleted'];
    $trev[$i]['ifNoChildSafeguardingWhy'] = $row['ifNoChildSafeguardingWhy'];
    $trev[$i]['PersonalS&STraining'] = $row['PersonalS&STraining'];
    $trev[$i]['ifNoPersonalWhy'] = $row['ifNoPersonalWhy'];
    $trev[$i]['DetailedItinerary'] = $row['DetailedItinerary'];
    $trev[$i]['email'] = $row['email'];
    $trev[$i]['mobile'] = $row['mobile'];
    $trev[$i]['teamLeader'] = $row['teamLeader'];
    $trev[$i]['accommodationRequired'] = $row['accommodationRequired'];
    $trev[$i]['locationCountry'] = $row['locationCountry'];
    $trev[$i]['locationCountry2'] = $row['locationCountry2'];
    $trev[$i]['locationFrom'] = $row['locationFrom'];
    $trev[$i]['locationTo'] = $row['locationTo'];
    $trev[$i]['locationFrom2'] = $row['locationFrom2'];
    $trev[$i]['locationTo2'] = $row['locationTo2'];
    $trev[$i]['methodTravel'] = $row['methodTravel'];
    $trev[$i]['supportNeeded'] = $row['supportNeeded'];
    $trev[$i]['accountCode'] = $row['accountCode'];
    $trev[$i]['extraLuggage'] = $row['extraLuggage'];
    $trev[$i]['accountCode'] = $row['accountCode'];
    $trev[$i]['costCentre'] = $row['costCentre'];
    $trev[$i]['projectCode'] = $row['projectCode'];
    $trev[$i]['%'] = $row['%'];
    $trev[$i]['soft'] = $row['soft'];
    $trev[$i]['DEACode'] = $row['DEACode'];
    $trev[$i]['LineManager'] = $row['LineManager'];
    $trev[$i]['securityCoordinator'] = $row['securityCoordinator'];
    $trev[$i]['NgcaCoordinator'] = $row['NgcaCoordinator'];
    $trev[$i]['countryDirector'] = $row['countryDirector'];
    $i++;
    }
    return $trev; 
} 

//выбор всех заявок с таблицы travel по id_user
public static function getAllTravelForUser($id = false){
	$db = Db::getConnection();
	$all_travel = array();
	$sql = "SELECT * FROM travel WHERE id_user = :id";
	$result = $db->prepare($sql);
	$result->bindParam(':id',$id,PDO::PARAM_INT);
	$result->execute();
	$i = 0;
    while($row = $result->fetch()){
    $all_travel[$i]['id_travel'] = $row['id_travel'];	
    $all_travel[$i]['name'] = $row['name'];	
    $all_travel[$i]['registration'] = $row['registration'];
    $all_travel[$i]['status'] = $row['status'];		
    $i++;
    }
    return $all_travel;
}

// получаем информацию о пользователе по id заявки
public  static function getUserForTravelId($id){
     $userInfo = array();
   $db =  Db::getConnection();
   $sql = 'SELECT * FROM admin WHERE id = :id';
   $result = $db -> prepare($sql);
   $result -> bindParam(':id',$id,PDO::PARAM_STR);
   $result -> execute();
   $i = 0;
   while($row = $result->fetch()){
    $userInfo['name'][$i] = $row['name'];
    $userInfo['role'][$i] = $row['role'];
    $i++;
   }
   return $userInfo; 
}
//delete travel
public static function delete($id){
    $db =  Db::getConnection();
   $sql = "DELETE FROM travel WHERE id_travel = :id";
   $result = $db -> prepare($sql);
   $result->bindParam(':id',$id,PDO::PARAM_INT);
   $result->execute();
   if($result->execute()){
    header("Location: /all-travel/");
    return true;
   }
}
}

?>