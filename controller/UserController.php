<?
class UserController{
	public function actionIndex(){
   $adminId = User:: checkLoged();//меетод проверяет зарегестрирован ли пользователь
   $admin =   User::getUserById($adminId);//метод получаем масив данных о пользователи по id
   $role = User::role($adminId);
      require_once(ROOT.'/view/user/index.php');
		return true;
	}

	public function actionViewProfile(){
	 $adminId = User:: checkLoged();//меетод проверяет зарегестрирован ли пользователь
     $admin =   User::getUserById($adminId);//метод получаем масив данных о пользователи по id
     $role =    User::role($adminId);
     require_once(ROOT.'/view/site/view-profile.php');	
		return true;
	}

	public function actionEditProfile(){
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
		require_once(ROOT.'/view/user/edit-profile.php');
		return true;

	}
// просмотр всех заявок пользователя 
	public function actionReviewApplication(){
		$travels = array();
        $adminId = User::checkLoged();
		$admin =   User::getUserById($adminId);
		$role =    User::role($adminId);
		$travels = User::getAllTravelForUser($adminId);
		require_once(ROOT.'/view/user/review-application.php');
		return true;
	}
//выбор заявки по id_travel
	public function actionViewTravel($id){
        $adminId = User::checkLoged();
		$admin = User::getUserById($adminId);
		$role = User::role($adminId);
		$travel = User::getTravelForIdTravel($id);
		require_once(ROOT.'/view/user/view-travel.php');
		return true;
	}

	public function actionAddTrip(){
		$travels = array();
        $adminId = User:: checkLoged();//меетод проверяет зарегестрирован ли пользователь
        $admin =   User::getUserById($adminId);//метод получаем масив данных о пользователи по id
		$role = User::role($adminId);
		$security = User::getSecurity();
		$manedger = User::getManedger();
		$country  = User::getCountryDirector();
		$areaCoordinator = User::getNgcaAreaCoordinator();
		$Idadmin = $admin['id'];
	    $name = $admin['name'];
        require_once(ROOT.'/model/Travel.php');
		if(isset($_POST['submit-form'])){
		    $name;
			$type = $_POST['type'];
			$departingFrom = $_POST['departingFrom'];
			$destination = $_POST['destination'];
			$returnto = $_POST['returnto'];
			$purpose = $_POST['purpose'];
		    $groupTravel = $_POST['groupTravel'];
			$ifGroupTravelWho = $_POST['ifGroupTravelWho'];
			$ChildSafeguardingTrainingCompleted = $_POST['ChildSafeguardingTrainingCompleted'];
			$ifNoChildSafeguardingWhy = $_POST['ifNoChildSafeguardingWhy'];
			$PersonalSSTraining = $_POST['PersonalS&STraining'];
			$ifNoPersonalWhy = $_POST['ifNoPersonalWhy'];
			$datedeparture = $_POST['datedeparture'];
			$deteArrial = $_POST['deteArrial'];
			$dateReturn = $_POST['dateReturn'];
		    $email =  $_POST['email'];
			$mobile = $_POST['mobile'];
			$teamLeader = $_POST['teamLeader'];
			$DetailedItinerary = $_POST['DetailedItinerary'];
			$accommodationRequired = $_POST['accommodationRequired'];
			$methodTravel = $_POST['methodTravel'];
			$supportNeeded = $_POST['supportNeeded'];
			$extraLuggage = $_POST['extraLuggage'];
			$locationCountry = $_POST['locationCountry'];
			$locationFrom = $_POST['locationFrom'];
			$locationTo = $_POST['locationTo'];
		    $locationCountry2 = $_POST['locationCountry2'];
			$locationFrom2 = $_POST['locationFrom2'];
			$locationTo2 = $_POST['locationTo2'] ;
			$accountCode = $_POST['accountCode'];
            $costCentre = $_POST['costCentre'];
            $procent = $_POST['procent'];
            $soft = $_POST['procent'];
            $DEACode = $_POST['DEACode'];
            $projectCode = $_POST['projectCode'];
            $securityCoordinator = $_POST['securityCoordinator'];
            $countryDirector = $_POST['countryDirector'];
            $NgcaCoordinator = $_POST['NgcaCoordinator'];
            $registration = $_POST['registration'];
            $countryDirector = $_POST['countryDirector'];
            $NgcaCoordinator = $_POST['NgcaCoordinator'];
            $Line = $_POST['LineManager'];
            $res = Travel::getDelegateWasMenader($Line);  
            $menadger = $res['was_degel'];
            if(!empty($menadger) && $menadger != " "){
            	if(empty($LineManager)){
            $LineManager = $menadger;
            }
            }
            else{
            	$LineManager = $_POST['LineManager'];
            }
            if($accountCode !=0 || $costCentre != 0 || $procent !=0 || $soft !=0 && $DEACode !=0 || $projectCode !=0 && $type !== 'Expats Personal Travel > 10km'){
            $count = 0;
            $count2 = 0;
            $finance = Travel::getFinance();
            	foreach ($finance as $fin) {
            	 $email_fin = $fin['email'];
                 $fin_name = $fin['name'];
             }
            	$subject = "TAR: approval requested for "  . $name  . " to " . $destination ." on " . $datedeparture;
                  $message = "Dear " .  $fin_name ."," . "\n\r\n\r" . $name . " has successfully submitted travel authorisation request which is pending your approval. ". $name ." is trevelling to " . $destination . " on ".  $datedeparture . "\n\r\n\r" . 'Please click   here to review the travel information, and approve or reject this request.' ."\n\r" ."Please dont reply to this email! " . "\n\r" . "Stay safe!";
                  $headers = "From: Save the children\r\n" . 'Content-type: text/html; charset= utf-8';
                 $result_mail = Travel::mail($email_fin,$subject,$message);
                             	
            }
            else if($accountCode !=0 || $costCentre != 0 || $procent !=0 && $soft !=0 || $DEACode !=0 && $projectCode !=0 && $type == 'Expats Personal Travel > 10km'){
            $count = 0;
            $count2 = 0;
            $finance = Travel::getFinance();
            	foreach ($finance as $fin) {
            	 $email_fin = $fin['email'];
                 $fin_name = $fin['name'];
             }
            	 $subject = "TAR: approval requested for "  . $name  . " to " . $destination ." on " . $datedeparture;
                  $message = "Dear " .  $fin_name ."," . "\n\r\n\r" . $name . " has successfully submitted travel authorisation request which is pending your approval. ". $name ." is trevelling to " . $destination . " on ".  $datedeparture . "\n\r\n\r" . 'Please click   here to review the travel information, and approve or reject this request.' ."\n\r" ."Please dont reply to this email! " . "\n\r" . "Stay safe!";
                  $headers = "From: Save the children\r\n" . 'Content-type: text/html; charset= utf-8';
                 $result_mail = Travel::mail($email_fin,$subject,$message);
            	
            }
            else if($accountCode ==0 && $costCentre == 0 && $procent == 0 && $soft == 0 && $DEACode == 0 && $projectCode == 0 && $type !== 'Expats Personal Travel > 10km'){
                 $count = 1;
                 $count2 = 0;
            	 $line_man = Travel::get_Line_Menadger($LineManager);
                 $mail_manedger =  $line_man['email'];
                  $subject = "TAR: approval requested for "  . $name  . " to " . $destination ." on " . $datedeparture;
                  $message = "Dear " . $LineManager ."," . "\n\r\n\r" . $name . " has successfully submitted travel authorisation request which is pending your approval. ". $name ." is trevelling to " . $destination . " on ".  $datedeparture . "\n\r\n\r" . 'Please click   here to review the travel information, and approve or reject this request.' ."\n\r" ."Please dont reply to this email! " . "\n\r" . "Stay safe!";
                  $headers = "From: Save the children\r\n" . 'Content-type: text/html; charset= utf-8';
    
                 $result_mail = Travel::mail($mail_manedger,$subject,$message,$headers);
            }

            else if($accountCode ==0 && $costCentre == 0 && $procent == 0 && $soft == 0 && $DEACode == 0 && $projectCode == 0 && $type == 'Expats Personal Travel > 10km'){
           $Director = Travel::get_Country_Director($countryDirector);
           $count2 = 1;
           $count = 1;
           foreach ($Director as $key) {
           	$email_country = $key['email'];
           }
           $subject = "TAR: approval requested for "  . $name  . " to " . $destination ." on " . $datedeparture;
           $message = "Dear " . $countryDirector ."," . "\n\r\n\r" . $name . " has successfully submitted travel authorisation request which is pending your approval. ". $name ." is trevelling to " . $destination . " on ".  $datedeparture . "\n\r\n\r" . "Please click here to review the travel information, and approve or reject this request." ."\n\r" ."Please dont reply to this email! " . "\n\r" . "Stay safe!";
            $headers = "From: Save the children\r\n". 
                       "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n";

                 $result_mail = Travel::mail($email_country,$subject,$message,$headers);
         
        }

   $result_form = Travel::getForm($type,$name,$departingFrom,$destination,$returnto,$purpose,$LineManager,$Idadmin,$groupTravel,$ifGroupTravelWho,$ChildSafeguardingTrainingCompleted,$ifNoChildSafeguardingWhy,$registration,$ifNoPersonalWhy,$datedeparture,$deteArrial,$dateReturn, $email,$mobile,$teamLeader,$DetailedItinerary,$accommodationRequired,$methodTravel,$supportNeeded,$extraLuggage,$locationCountry,$locationFrom,$locationTo,$locationCountry2,$locationFrom2,$locationTo2,$accountCode,$costCentre,$soft,$DEACode,$projectCode,$procent,$countryDirector,$securityCoordinator,$NgcaCoordinator,$PersonalSSTraining,$count,$count2);

		}
		require_once(ROOT.'/view/user/add-trip.php');
		return true;
	}
	//выход с админки юзер
	public function actionFinish(){
			unset($_SESSION['admin']);
			header('Location: /');
		}
	

}
?>