<?php
class GcaAdminController{
	public function actionIndex(){
   $adminId = User:: checkLoged();//меетод проверяет зарегестрирован ли пользователь
   $admin =   User::getUserById($adminId);//метод получаем масив данных о пользователи по id
   $role = User::role($adminId);
      require_once(ROOT.'/view/gcaAdmin/index.php');
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
		require_once(ROOT.'/view/gcaAdmin/edit-profile.php');
		return true;

	}
   // просмотр всех отправленных заявок пользователя 
	public function actionReviewApplication(){
		$travels = array();
        $adminId = User::checkLoged();
		$admin =   User::getUserById($adminId);
		$manedger =  $admin['name'];
		$role =    User::role($adminId);
		$str = "Within GCA";
		$str2 = "To GCA";

		$travels = Travel::getAllTravelForGcaAdmin($str,$str2);
		require_once(ROOT.'/view/gcaAdmin/review-application.php');
		return true;
	}	
// просмотр всех заявок пользователя 
	public function actionMytravel(){
		$travels = array();
        $adminId = User::checkLoged();
		$admin =   User::getUserById($adminId);
		$role =    User::role($adminId);
		$travels = User::getAllTravelForUser($adminId);
		require_once(ROOT.'/view/gcaAdmin/my-application.php');
		return true;
	}

	public function actionViewMyTravel($id)
	{
		 $adminId = User::checkLoged();
		$admin = User::getUserById($adminId);
		$role = User::role($adminId);
		$travel = User::getTravelForIdTravel($id);
		require_once(ROOT.'/view/gcaAdmin/my-travel.php');
		return true;
	}
//выбор заявки по id_travel
	public function actionViewTravel($id){
        $adminId = User::checkLoged();
		$admin = User::getUserById($adminId);
		$role = User::role($adminId);
		$travel = User::getTravelForIdTravel($id);
		    $name = $travel['name'];
			$type = $travel['type'];
			$departingFrom = $travel['departingFrom'];
			$destination = $travel['destination'];
			$returnto = $travel['returnto'];
			$purpose = $travel['purpose'];
		    $groupTravel = $travel['groupTravel'];
			$ifGroupTravelWho = $travel['ifGroupTravelWho'];
			$ChildSafeguardingTrainingCompleted = $travel['ChildSafeguardingTrainingCompleted'];
			$ifNoChildSafeguardingWhy = $travel['ifNoChildSafeguardingWhy'];
			$PersonalSSTraining = $travel['PersonalSSTraining'];
			$ifNoPersonalWhy = $travel['ifNoPersonalWhy'];
			$datedeparture = $travel['datedeparture'];
			$deteArrial = $travel['deteArrial'];
			$dateReturn = $travel['dateReturn'];
		    $email =  $travel['email'];
			$mobile = $travel['mobile'];
			$teamLeader = $travel['teamLeader'];
			$DetailedItinerary = $travel['DetailedItinerary'];
			$accommodationRequired = $travel['accommodationRequired'];
			$methodTravel = $travel['methodTravel'];
			$supportNeeded = $travel['supportNeeded'];
			$extraLuggage = $travel['extraLuggage'];
			$locationCountry = $travel['locationCountry'];
			$locationFrom = $travel['locationFrom'];
			$locationTo = $travel['locationTo'];
		    $locationCountry2 = $travel['locationCountry2'];
			$locationFrom2 = $travel['locationFrom2'];
			$locationTo2 = $travel['locationTo2'] ;
			$accountCode = $travel['accountCode'];
            $costCentre = $travel['costCentre'];
            $procent = $travel['procent'];
            $soft = $travel['procent'];
            $DEACode = $travel['DEACode'];
            $projectCode = $travel['projectCode'];
            $LineManager = $travel['LineManager'];
            $securityCoordinator = $travel['securityCoordinator'];
            $countryDirector = $travel['countryDirector'];
            $NgcaCoordinator = $travel['NgcaCoordinator'];
            $registration = $travel['registration'];
            $countryDirector = $travel['countryDirector'];
            $NgcaCoordinator = $travel['NgcaCoordinator'];
		$lm = $travel['LineManager'];
		$userEmail =  $travel['email'];
		$idTr = $travel['id_travel'];
			
		if(isset($_POST['approvad'])){
			switch($type){
				case 'Within GCA':
				$result = Travel::ApprovadGcaAdmin($count = 1,$idTr);
			    Travel::ApprovadNgcaAdmin($count = 1,$idTr);
				Travel::ApprovadFleetNgca($count = 1,$idTr);
                $emailgcaAdmin = Travel::get_Fleet_Gca();
                foreach ($emailgcaAdmin as $key) {
               	$emailgca = $key['email'];
                }
                $subject = 'New application pending approval';
             $message = "Application from:".$name ."\r\n Type of Travel:" . $type . "\r\n Date requested:" . $registration . "\r\nDeparting from:" .$departingFrom . "\r\n Date and time of departure:" . $datedeparture . "\n\r Destination:" . $destination . "\n\r Exp. Date & Time of Arrival:". $deteArrial . "\n\r Returning to: " . $returnto . "\n\r Date and time of return: " .$dateReturn . "\n\r Email: " . $email . "\n\r Mobile: " .$mobile . "\n\r Purpose of trip: " .$purpose . "\n\r Is it a group travel?" . $groupTravel . "\n\r If yes, specify with who:" . $ifGroupTravelWho . "\n\r Team Leader: " .$teamLeader. "\n\r Child Safeguarding Training Completed: " . $ChildSafeguardingTrainingCompleted . "\n\r If no, why?:" .$ifNoChildSafeguardingWhy ."\n\r Personal S&S Training Completed:" . $PersonalSSTraining . "\n\r If no, why?" .$ifNoPersonalWhy . "\n\r Detailed itinerary - to include known or assessed dates, locations, accommodation: "  . $DetailedItinerary ."\n\r Accommodation Required:" .$accommodationRequired . "\n\r Method of Travel: " . $methodTravel . "\n\r Support Needed: " . $supportNeeded. "\n\r Location: " . $locationCountry . "\n\r From: " . $locationFrom . "\n\r To: " . $locationTo . "\n\r Location:" .$locationFrom2 . "\n\r From: " . $locationFrom2 . "\n\r To: " . $locationTo2 . "\n\r Extra luggage/equipment : Type, size, weight: " . $extraLuggage . "\n\r Account Code: " . $accountCode . "\n\r Cost Centre: " . $costCentre . "\n\r %: " . $procent . "\n\r SOF: " . $soft . "\n\r DEA Code: " . $DEACode . "\n\r Project Code: " . $projectCode . "\n\r Line Manager: " . $LineManager . "\n\r Country Director: " . $countryDirector . "\n\r Security Coordinator: " . $securityCoordinator . "\n\r Ngca Area Coordinator(if needed): " . $NgcaCoordinator;
               mail($emailgca,$subject,$message);
				break;
				case 'To GCA':
				$result = Travel::ApprovadGcaAdmin($count = 1,$idTr);
			    Travel::ApprovadNgcaAdmin($count = 1,$idTr);
			    $fleetGca = Travel::get_FleetNgcaAdmin();
			    foreach ($fleetGca as $key) {
			        $emailFleetGca = $key['email'];
			    }
			    $subject = 'New application pending approval';
             $message = "Application from:".$name ."\r\n Type of Travel:" . $type . "\r\n Date requested:" . $registration . "\r\nDeparting from:" .$departingFrom . "\r\n Date and time of departure:" . $datedeparture . "\n\r Destination:" . $destination . "\n\r Exp. Date & Time of Arrival:". $deteArrial . "\n\r Returning to: " . $returnto . "\n\r Date and time of return: " .$dateReturn . "\n\r Email: " . $email . "\n\r Mobile: " .$mobile . "\n\r Purpose of trip: " .$purpose . "\n\r Is it a group travel?" . $groupTravel . "\n\r If yes, specify with who:" . $ifGroupTravelWho . "\n\r Team Leader: " .$teamLeader. "\n\r Child Safeguarding Training Completed: " . $ChildSafeguardingTrainingCompleted . "\n\r If no, why?:" .$ifNoChildSafeguardingWhy ."\n\r Personal S&S Training Completed:" . $PersonalSSTraining . "\n\r If no, why?" .$ifNoPersonalWhy . "\n\r Detailed itinerary - to include known or assessed dates, locations, accommodation: "  . $DetailedItinerary ."\n\r Accommodation Required:" .$accommodationRequired . "\n\r Method of Travel: " . $methodTravel . "\n\r Support Needed: " . $supportNeeded. "\n\r Location: " . $locationCountry . "\n\r From: " . $locationFrom . "\n\r To: " . $locationTo . "\n\r Location:" .$locationFrom2 . "\n\r From: " . $locationFrom2 . "\n\r To: " . $locationTo2 . "\n\r Extra luggage/equipment : Type, size, weight: " . $extraLuggage . "\n\r Account Code: " . $accountCode . "\n\r Cost Centre: " . $costCentre . "\n\r %: " . $procent . "\n\r SOF: " . $soft . "\n\r DEA Code: " . $DEACode . "\n\r Project Code: " . $projectCode . "\n\r Line Manager: " . $LineManager . "\n\r Country Director: " . $countryDirector . "\n\r Security Coordinator: " . $securityCoordinator . "\n\r Ngca Area Coordinator(if needed): " . $NgcaCoordinator;
               mail($emailFleetGca,$subject,$message);
				break;
				default: 
			    $result =  'Sorry, the tour is not approved. try again';
			}

		}
		 else if(isset($_POST['Notapprovad'])){
		 	$subject = 'Application denied';
			$message = 'The application for the permit card was rejected' . "\n\rType of Travel:" . $type . "\r\n Date requested:" . $registration ;
			$result2 = mail($userEmail, $subject, $message);
		 }

		require_once(ROOT.'/view/gcaAdmin/view-travel.php');
		return true;
	}


	public function actionViewProfile(){
	 $adminId = User:: checkLoged();//меетод проверяет зарегестрирован ли пользователь
     $admin =   User::getUserById($adminId);//метод получаем масив данных о пользователи по id
     $role =    User::role($adminId);
     require_once(ROOT.'/view/gcaAdmin/view-profile.php');	
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
            	 $subject = 'Letter of Approval for the Booking Application';
            	 $message = "Application from:".$name ."\r\n Type of Travel:" . $type . "\r\n Date requested:" . $registration . "\r\nDeparting from:" .$departingFrom . "\r\n Date and time of departure:" . $datedeparture . "\n\r Destination:" . $destination . "\n\r Exp. Date & Time of Arrival:". $deteArrial . "\n\r Returning to: " . $returnto . "\n\r Date and time of return: " .$dateReturn . "\n\r Email: " . $email . "\n\r Mobile: " .$mobile . "\n\r Purpose of trip: " .$purpose . "\n\r Is it a group travel?" . $groupTravel . "\n\r If yes, specify with who:" . $ifGroupTravelWho . "\n\r Team Leader: " .$teamLeader. "\n\r Child Safeguarding Training Completed: " . $ChildSafeguardingTrainingCompleted . "\n\r If no, why?:" .$ifNoChildSafeguardingWhy ."\n\r Personal S&S Training Completed:" . $PersonalSSTraining . "\n\r If no, why?" .$ifNoPersonalWhy . "\n\r Detailed itinerary - to include known or assessed dates, locations, accommodation: "  . $DetailedItinerary ."\n\r Accommodation Required:" .$accommodationRequired . "\n\r Method of Travel: " . $methodTravel . "\n\r Support Needed: " . $supportNeeded. "\n\r Location: " . $locationCountry . "\n\r From: " . $locationFrom . "\n\r To: " . $locationTo . "\n\r Location:" .$locationFrom2 . "\n\r From: " . $locationFrom2 . "\n\r To: " . $locationTo2 . "\n\r Extra luggage/equipment : Type, size, weight: " . $extraLuggage . "\n\r Account Code: " . $accountCode . "\n\r Cost Centre: " . $costCentre . "\n\r %: " . $procent . "\n\r SOF: " . $soft . "\n\r DEA Code: " . $DEACode . "\n\r Project Code: " . $projectCode . "\n\r Line Manager: " . $LineManager . "\n\r Country Director: " . $countryDirector . "\n\r Security Coordinator: " . $securityCoordinator . "\n\r Ngca Area Coordinator(if needed): " . $NgcaCoordinator;
                 $result_mail = Travel::mail($email_fin,$subject,$message);
            	}
            }
            else if($accountCode !=0 || $costCentre != 0 || $procent !=0 && $soft !=0 || $DEACode !=0 && $projectCode !=0 && $type == 'Expats Personal Travel > 10km'){
            $count = 0;
            $count2 = 0;
            $finance = Travel::getFinance();
            	foreach ($finance as $fin) {
            	 $email_fin = $fin['email'];
            	 $subject = 'Letter of Approval for the Booking Application';
            	 $message = "Application from:".$name ."\r\n Type of Travel:" . $type . "\r\n Date requested:" . $registration . "\r\nDeparting from:" .$departingFrom . "\r\n Date and time of departure:" . $datedeparture . "\n\r Destination:" . $destination . "\n\r Exp. Date & Time of Arrival:". $deteArrial . "\n\r Returning to: " . $returnto . "\n\r Date and time of return: " .$dateReturn . "\n\r Email: " . $email . "\n\r Mobile: " .$mobile . "\n\r Purpose of trip: " .$purpose . "\n\r Is it a group travel?" . $groupTravel . "\n\r If yes, specify with who:" . $ifGroupTravelWho . "\n\r Team Leader: " .$teamLeader. "\n\r Child Safeguarding Training Completed: " . $ChildSafeguardingTrainingCompleted . "\n\r If no, why?:" .$ifNoChildSafeguardingWhy ."\n\r Personal S&S Training Completed:" . $PersonalSSTraining . "\n\r If no, why?" .$ifNoPersonalWhy . "\n\r Detailed itinerary - to include known or assessed dates, locations, accommodation: "  . $DetailedItinerary ."\n\r Accommodation Required:" .$accommodationRequired . "\n\r Method of Travel: " . $methodTravel . "\n\r Support Needed: " . $supportNeeded. "\n\r Location: " . $locationCountry . "\n\r From: " . $locationFrom . "\n\r To: " . $locationTo . "\n\r Location:" .$locationFrom2 . "\n\r From: " . $locationFrom2 . "\n\r To: " . $locationTo2 . "\n\r Extra luggage/equipment : Type, size, weight: " . $extraLuggage . "\n\r Account Code: " . $accountCode . "\n\r Cost Centre: " . $costCentre . "\n\r %: " . $procent . "\n\r SOF: " . $soft . "\n\r DEA Code: " . $DEACode . "\n\r Project Code: " . $projectCode . "\n\r Line Manager: " . $LineManager . "\n\r Country Director: " . $countryDirector . "\n\r Security Coordinator: " . $securityCoordinator . "\n\r Ngca Area Coordinator(if needed): " . $NgcaCoordinator;
                 $result_mail = Travel::mail($email_fin,$subject,$message);
            	}
            }
            else if($accountCode ==0 && $costCentre == 0 && $procent == 0 && $soft == 0 && $DEACode == 0 && $projectCode == 0 && $type !== 'Expats Personal Travel > 10km'){
                 $count = 1;
                 $count2 = 0;
            	 $line_man = Travel::get_Line_Menadger($LineManager);
                 $mail_manedger =  $line_man['email'];
                 $subject = 'Letter of Approval for the Booking Application';
            	 $message = "Application from:".$name ."\r\n Type of Travel:" . $type . "\r\n Date requested:" . $registration . "\r\nDeparting from:" .$departingFrom . "\r\n Date and time of departure:" . $datedeparture . "\n\r Destination:" . $destination . "\n\r Exp. Date & Time of Arrival:". $deteArrial . "\n\r Returning to: " . $returnto . "\n\r Date and time of return: " .$dateReturn . "\n\r Email: " . $email . "\n\r Mobile: " .$mobile . "\n\r Purpose of trip: " .$purpose . "\n\r Is it a group travel?" . $groupTravel . "\n\r If yes, specify with who:" . $ifGroupTravelWho . "\n\r Team Leader: " .$teamLeader. "\n\r Child Safeguarding Training Completed: " . $ChildSafeguardingTrainingCompleted . "\n\r If no, why?:" .$ifNoChildSafeguardingWhy ."\n\r Personal S&S Training Completed:" . $PersonalSSTraining . "\n\r If no, why?" .$ifNoPersonalWhy . "\n\r Detailed itinerary - to include known or assessed dates, locations, accommodation: "  . $DetailedItinerary ."\n\r Accommodation Required:" .$accommodationRequired . "\n\r Method of Travel: " . $methodTravel . "\n\r Support Needed: " . $supportNeeded. "\n\r Location: " . $locationCountry . "\n\r From: " . $locationFrom . "\n\r To: " . $locationTo . "\n\r Location:" .$locationFrom2 . "\n\r From: " . $locationFrom2 . "\n\r To: " . $locationTo2 . "\n\r Extra luggage/equipment : Type, size, weight: " . $extraLuggage . "\n\r Account Code: " . $accountCode . "\n\r Cost Centre: " . $costCentre . "\n\r %: " . $procent . "\n\r SOF: " . $soft . "\n\r DEA Code: " . $DEACode . "\n\r Project Code: " . $projectCode . "\n\r Line Manager: " . $LineManager . "\n\r Country Director: " . $countryDirector . "\n\r Security Coordinator: " . $securityCoordinator . "\n\r Ngca Area Coordinator(if needed): " . $NgcaCoordinator;
                 $result_mail = Travel::mail($mail_manedger,$subject,$message);
            }

            else if($accountCode ==0 && $costCentre == 0 && $procent == 0 && $soft == 0 && $DEACode == 0 && $projectCode == 0 && $type == 'Expats Personal Travel > 10km'){
           $Director = Travel::get_Country_Director($countryDirector);
           $count2 = 1;
           $count = 1;
           foreach ($Director as $key) {
           	$email_country = $key['email'];
           }
            $subject = 'Letter of Approval for the Booking Application';
            	 $message = "Application from:".$name ."\r\n Type of Travel:" . $type . "\r\n Date requested:" . $registration . "\r\nDeparting from:" .$departingFrom . "\r\n Date and time of departure:" . $datedeparture . "\n\r Destination:" . $destination . "\n\r Exp. Date & Time of Arrival:". $deteArrial . "\n\r Returning to: " . $returnto . "\n\r Date and time of return: " .$dateReturn . "\n\r Email: " . $email . "\n\r Mobile: " .$mobile . "\n\r Purpose of trip: " .$purpose . "\n\r Is it a group travel?" . $groupTravel . "\n\r If yes, specify with who:" . $ifGroupTravelWho . "\n\r Team Leader: " .$teamLeader. "\n\r Child Safeguarding Training Completed: " . $ChildSafeguardingTrainingCompleted . "\n\r If no, why?:" .$ifNoChildSafeguardingWhy ."\n\r Personal S&S Training Completed:" . $PersonalSSTraining . "\n\r If no, why?" .$ifNoPersonalWhy . "\n\r Detailed itinerary - to include known or assessed dates, locations, accommodation: "  . $DetailedItinerary ."\n\r Accommodation Required:" .$accommodationRequired . "\n\r Method of Travel: " . $methodTravel . "\n\r Support Needed: " . $supportNeeded. "\n\r Location: " . $locationCountry . "\n\r From: " . $locationFrom . "\n\r To: " . $locationTo . "\n\r Location:" .$locationFrom2 . "\n\r From: " . $locationFrom2 . "\n\r To: " . $locationTo2 . "\n\r Extra luggage/equipment : Type, size, weight: " . $extraLuggage . "\n\r Account Code: " . $accountCode . "\n\r Cost Centre: " . $costCentre . "\n\r %: " . $procent . "\n\r SOF: " . $soft . "\n\r DEA Code: " . $DEACode . "\n\r Project Code: " . $projectCode . "\n\r Line Manager: " . $LineManager . "\n\r Country Director: " . $countryDirector . "\n\r Security Coordinator: " . $securityCoordinator . "\n\r Ngca Area Coordinator(if needed): " . $NgcaCoordinator;
                 $result_mail = Travel::mail($email_country,$subject,$message);
         
        }

   $result_form = Travel::getForm($type,$name,$departingFrom,$destination,$returnto,$purpose,$LineManager,$Idadmin,$groupTravel,$ifGroupTravelWho,$ChildSafeguardingTrainingCompleted,$ifNoChildSafeguardingWhy,$registration,$ifNoPersonalWhy,$datedeparture,$deteArrial,$dateReturn, $email,$mobile,$teamLeader,$DetailedItinerary,$accommodationRequired,$methodTravel,$supportNeeded,$extraLuggage,$locationCountry,$locationFrom,$locationTo,$locationCountry2,$locationFrom2,$locationTo2,$accountCode,$costCentre,$soft,$DEACode,$projectCode,$procent,$countryDirector,$securityCoordinator,$NgcaCoordinator,$PersonalSSTraining,$count,$count2);

		}
		require_once(ROOT.'/view/gcaAdmin/add-trip.php');
		return true;
	}
	//выход с админки юзер
	public function actionFinish(){
			unset($_SESSION['admin']);
			header('Location: /');
		}
}

?>