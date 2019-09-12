<?php

class Travel{

	//отправка заявки пользователем
public static function getForm($type,$name,$departingFrom,$destination,$returnto,$purpose,$LineManager,$Idadmin,$groupTravel,$ifGroupTravelWho,$ChildSafeguardingTrainingCompleted,$ifNoChildSafeguardingWhy,$registration,$ifNoPersonalWhy,$datedeparture,$deteArrial,$dateReturn,$email,$mobile,$teamLeader,$DetailedItinerary,$accommodationRequired,$methodTravel,$supportNeeded,$extraLuggage,$locationCountry,$locationFrom,$locationTo,$locationCountry2,$locationFrom2,$locationTo2,$accountCode,$costCentre,$soft,$DEACode,$projectCode,$procent,$countryDirector,$securityCoordinator,$NgcaCoordinator,$PersonalSSTraining,$count,$count2){
	$db =  Db::getConnection();
    $sql = "INSERT INTO travel (type,name,departingFrom,destination,returnto,purpose,LineManager,id_user,groupTravel,ifGroupTravelWho,ChildSafeguardingTrainingCompleted,ifNoChildSafeguardingWhy,registration,ifNoPersonalWhy,datedeparture,deteArrial,dateReturn,email,mobile,teamLeader,DetailedItinerary,accommodationRequired,methodTravel,supportNeeded,extraLuggage,locationCountry,locationFrom,locationTo,locationCountry2,locationFrom2,locationTo2,accountCode,costCentre,soft,DEACode,projectCode,procent,countryDirector,securityCoordinator,NgcaCoordinator,PersonalSSTraining,finance_status,lineManedgerStatus)
    VALUES(:type,:name,:departingFrom,:destination,:returnto,:purpose,:LineManager,:Idadmin,:groupTravel,:ifGroupTravelWho,:ChildSafeguardingTrainingCompleted,:ifNoChildSafeguardingWhy,:registration,:ifNoPersonalWhy,:datedeparture,:deteArrial,:dateReturn,:email,:mobile,:teamLeader,:DetailedItinerary,:accommodationRequired,:methodTravel,:supportNeeded,:extraLuggage,:locationCountry,:locationFrom,:locationTo,:locationCountry2,:locationFrom2,:locationTo2,:accountCode,:costCentre,:soft,:DEACode,:projectCode,:procent,:countryDirector,:securityCoordinator,:NgcaCoordinator,:PersonalSSTraining,:count,:count2)";
    $result = $db->prepare($sql);
    $result->bindParam(':type',$type,PDO::PARAM_STR);
    $result->bindParam(':name',$name,PDO::PARAM_STR);
    $result->bindParam(':departingFrom',$departingFrom,PDO::PARAM_STR);
    $result->bindParam(':destination',$destination,PDO::PARAM_STR);
    $result->bindParam(':returnto',$returnto,PDO::PARAM_STR);
    $result->bindParam(':purpose',$purpose,PDO::PARAM_STR);
    $result->bindParam(':LineManager',$LineManager);
    $result->bindParam(':Idadmin',$Idadmin);
    $result->bindParam(':groupTravel',$groupTravel);
    $result->bindParam(':ifGroupTravelWho',$ifGroupTravelWho);
    $result->bindParam(':ChildSafeguardingTrainingCompleted',$ChildSafeguardingTrainingCompleted);
    $result->bindParam(':ifNoChildSafeguardingWhy',$ifNoChildSafeguardingWhy);
    $result->bindParam(':registration',$registration);
    $result->bindParam(':ifNoPersonalWhy',$ifNoPersonalWhy);
    $result->bindParam(':datedeparture',$datedeparture);
    $result->bindParam(':deteArrial',$deteArrial);
    $result->bindParam(':dateReturn',$dateReturn);
    $result->bindParam(':email',$email);
    $result->bindParam(':mobile',$mobile);
    $result->bindParam(':teamLeader',$teamLeader);
    $result->bindParam(':DetailedItinerary',$DetailedItinerary);
    $result->bindParam(':accommodationRequired',$accommodationRequired);
    $result->bindParam(':methodTravel',$methodTravel);
    $result->bindParam(':supportNeeded',$supportNeeded);
    $result->bindParam(':extraLuggage',$extraLuggage);
    $result->bindParam(':locationCountry',$locationCountry);
    $result->bindParam(':locationFrom',$locationFrom);
    $result->bindParam(':locationTo',$locationTo);
    $result->bindParam(':locationCountry2',$locationCountry2);
    $result->bindParam(':locationFrom2',$locationFrom2);
    $result->bindParam(':locationTo2',$locationTo2);
    $result->bindParam(':accountCode',$accountCode);
    $result->bindParam(':costCentre',$costCentre);
    $result->bindParam(':soft',$soft);
    $result->bindParam(':DEACode',$DEACode);
    $result->bindParam(':projectCode',$projectCode);
    $result->bindParam(':procent',$procent);
    $result->bindParam(':countryDirector',$countryDirector);
    $result->bindParam(':securityCoordinator',$securityCoordinator);
    $result->bindParam(':NgcaCoordinator',$NgcaCoordinator);
    $result->bindParam(':PersonalSSTraining',$PersonalSSTraining);
    $result->bindParam(':count',$count);
    $result->bindParam(':count2',$count2);
    $ok = $result->execute();
    if($ok){
        return true;
    }
    return false;
}
public static function getFinance(){
	$finance = array();
	$db = Db::getConnection();
	$sql = 'SELECT * FROM admin WHERE role = "finance"';
	$result = $db->prepare($sql);
	$result -> execute();
	$i=0;
	while($row = $result->fetch()){
     $finance[$i]['id'] = $row['id'];
     $finance[$i]['name'] = $row['name'];
     $finance[$i]['email'] = $row['email'];
     $i++;
	}
	return $finance;
}
//отправляем данные на почту
public static function mail($email,$subject,$message){
	$result = mail($email,$subject,$message);
	return $result;
}
//получаем line manedgera по name
 
 public static function get_Line_Menadger($name){
 $db = Db::getConnection();
$sql = 'SELECT * FROM admin WHERE name = :name';
$result=$db->prepare($sql);
$result->bindParam(':name',$name,PDO::PARAM_STR);
$result->execute();
return $result->fetch();
 }
 //получаем всех менеджеров
 public static function get_Manedger(){
    $manedger = array();
     $db = Db::getConnection();
    $sql = "SELECT  * FROM  admin WHERE role='maneger'";
    $result  = $db->prepare($sql);
    $result -> execute();
    $i = 0;
    while($row = $result->fetch()){
        $manedger[$i]['id'] = $row["id"];
        $manedger[$i]['name'] = $row["name"];
        $manedger[$i]['email'] = $row["email"];
        $i++;
    }
    return $manedger;
 }
//получаем country-director по name
 
 public static function get_Country_Director(){
    $country = array();
	$db = Db::getConnection();
	$sql = 'SELECT * FROM admin WHERE role = "country-director"';
	$result = $db->prepare($sql);
	$result -> execute();
	$i=0;
	while($row = $result->fetch()){
     $country[$i]['id'] = $row['id'];
     $country[$i]['name'] = $row['name'];
     $country[$i]['email'] = $row['email'];
     $i++;
	}
	return $country;
 } 
//получаем данные о fleet-gca
  public static function get_Fleet_Gca(){
    $country = array();
  $db = Db::getConnection();
  $sql = 'SELECT * FROM admin WHERE role = "fleet-gca"';
  $result = $db->prepare($sql);
  $result -> execute();
  $i=0;
  while($row = $result->fetch()){
     $country[$i]['id'] = $row['id'];
     $country[$i]['name'] = $row['name'];
     $country[$i]['email'] = $row['email'];
     $i++;
  }
  return $country;
 } 



  //получаем данные о security
 public static function get_Security(){
    $security = array();
    $db = Db::getConnection();
    $sql = 'SELECT * FROM admin WHERE role = "security"';
    $result = $db->prepare($sql);
    $result -> execute();
    $i=0;
    while($row = $result->fetch()){
     $security[$i]['id'] = $row['id'];
     $security[$i]['name'] = $row['name'];
     $security[$i]['email'] = $row['email'];
     $i++;
    }
    return $security;
 } 

  //получаем данные о ngca area coordinator
  public static function get_NgcaAreaCoordinator(){
    $NgcaAreaCoordinator = array();
    $db = Db::getConnection();
    $sql = 'SELECT * FROM admin WHERE role = "NgcaAreaCoordinator"';
    $result = $db->prepare($sql);
    $result -> execute();
    $i=0;
    while($row = $result->fetch()){
     $NgcaAreaCoordinator[$i]['id'] = $row['id'];
     $NgcaAreaCoordinator[$i]['name'] = $row['name'];
     $NgcaAreaCoordinator[$i]['email'] = $row['email'];
     $i++;
    }
    return  $NgcaAreaCoordinator;
 } 
 //получаем данные о cantry director
  public static function get_CountryDirector($name){
    $country = array();
    $db = Db::getConnection();
    $sql = 'SELECT * FROM admin WHERE role = "country-director" AND name = :name';
    $result = $db->prepare($sql);
    $result->bindParam(':name',$name);
    $result -> execute();
    $i=0;
    while($row = $result->fetch()){
     $country[$i]['id'] = $row['id'];
     $country[$i]['name'] = $row['name'];
     $country[$i]['email'] = $row['email'];
     $i++;
    }
    return $country;
 } 

  //получаем данные о gca admin
  public static function get_GcaAdmin(){
    $gcaAdmin = array();
    $db = Db::getConnection();
    $sql = 'SELECT * FROM admin WHERE role = "gca-admin"';
    $result = $db->prepare($sql);
    $result -> execute();
    $i=0;
    while($row = $result->fetch()){
     $gcaAdmin[$i]['id'] = $row['id'];
     $gcaAdmin[$i]['name'] = $row['name'];
     $gcaAdmin[$i]['email'] = $row['email'];
     $i++;
    }
    return $gcaAdmin;
 } 


  //получаем данные о ngca admin
  public static function get_NgcaAdmin(){
    $ngcaAdmin = array();
    $db = Db::getConnection();
    $sql = 'SELECT * FROM admin WHERE role = "ngca-admin"';
    $result = $db->prepare($sql);
    $result -> execute();
    $i=0;
    while($row = $result->fetch()){
     $ngcaAdmin[$i]['id'] = $row['id'];
     $ngcaAdmin[$i]['name'] = $row['name'];
     $ngcaAdmin[$i]['email'] = $row['email'];
     $i++;
    }
    return $ngcaAdmin;
 } 

   //получаем данные о fleet gca
  public static function get_FleetNgcaAdmin(){
    $fleetngcaAdmin = array();
    $db = Db::getConnection();
    $sql = 'SELECT * FROM admin WHERE role = "fleet-ngca"';
    $result = $db->prepare($sql);
    $result -> execute();
    $i=0;
    while($row = $result->fetch()){
     $fleetngcaAdmin[$i]['id'] = $row['id'];
     $fleetngcaAdmin[$i]['name'] = $row['name'];
     $fleetngcaAdmin[$i]['email'] = $row['email'];
     $i++;
    }
    return $fleetngcaAdmin;
 } 
   //получаем данные о fleet gca
  public static function get_FleetGcaAdmin(){
    $fleetngcaAdmin = array();
    $db = Db::getConnection();
    $sql = 'SELECT * FROM admin WHERE role = "fleet-gca"';
    $result = $db->prepare($sql);
    $result -> execute();
    $i=0;
    while($row = $result->fetch()){
     $fleetngcaAdmin[$i]['id'] = $row['id'];
     $fleetngcaAdmin[$i]['name'] = $row['name'];
     $fleetngcaAdmin[$i]['email'] = $row['email'];
     $i++;
    }
    return $fleetngcaAdmin;
 } 

//выбераем все путевки с условием для finance departament
 public static function getAllTravelForFinance(){
    $db = Db::getConnection();
    $all_travel = array();
    $sql = "SELECT * FROM travel WHERE  `finance_status` = 0";
    $result = $db->prepare($sql);
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

//выбераем все путевки с условием для line manedger
 public static function getAllTravelForManedger($manedger,$type){
    $db = Db::getConnection();
    $type = "Expats Personal Travel > 10km";
    $all_travel = array();
    $sql = "SELECT * FROM travel WHERE `finance_status` = 1 AND `LineManager` = :manedger AND `type` != :type AND `lineManedgerStatus` = 0";
    $result = $db->prepare($sql);
    $result->bindParam(':manedger',$manedger,PDO::PARAM_INT);
    $result->bindParam(':type',$type,PDO::PARAM_INT);
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
//выбераем все путевки с условием country director
 public static function getAllTravelForCountryDirector($type){
    $db = Db::getConnection();
    $type = "Within NGCA";
    $all_travel = array();
    $sql = "SELECT * FROM travel WHERE `finance_status` = 1 AND `lineManedgerStatus` = 1 AND `type` != :type AND `CountryDirectorStatus` = 0";
    $result = $db->prepare($sql);
    $result->bindParam(':type',$type);
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
//выбераем все путевки с условием security coordinator
 public static function getAllTravelForSecurity(){
    $db = Db::getConnection();
    $all_travel = array();
    $sql = "SELECT * FROM travel WHERE `finance_status` = 1 AND `lineManedgerStatus` = 1  AND `CountryDirectorStatus` = 1 AND `NgcaAreaCstatus` = 1 AND `securytiStatus` = 0";
    $result = $db->prepare($sql);
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

//выбераем все путевки с условием NGA AREA coordinator
 public static function getAllTravelForNgcaArea($str){
    $db = Db::getConnection();
    $all_travel = array();
    $sql = "SELECT * FROM travel WHERE `finance_status` = 1 AND `lineManedgerStatus` = 1  AND `CountryDirectorStatus` = 1  AND type != :str AND `NgcaAreaCstatus` = 0";
    $result = $db->prepare($sql);
    $result->bindParam(':str',$str,PDO::PARAM_INT);
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

//выбераем все путевки с условием GCA ADMIN
 public static function getAllTravelForGcaAdmin($str,$str2){
    $db = Db::getConnection();
    $gca_admin = array();
    $sql = "SELECT * FROM travel WHERE `type` = :str OR `type` = :str2 ";
    $result = $db->prepare($sql);
    $result->bindParam(':str',$str);
    $result->bindParam(':str2',$str2);
    $result->execute();
    $i = 0;
    while($row = $result->fetch()){
    $gca_admin[$i]['id_travel'] = $row['id_travel'];   
    $gca_admin[$i]['name'] = $row['name']; 
    $gca_admin[$i]['registration'] = $row['registration'];
    $gca_admin[$i]['status'] = $row['status'];     
    $i++;
    }
    return $gca_admin;
}

//выбераем все путевки с условием NGCA ADMIN
 public static function getAllTravelForNgcaAdmin($str,$str2){
    $db = Db::getConnection();
    $ngca_admin = array();
    $sql = "SELECT * FROM travel WHERE type = :str OR type = :str2";
    $result = $db->prepare($sql);
    $result->bindParam(':str',$str,PDO::PARAM_STR);
    $result->bindParam(':str2',$str2,PDO::PARAM_STR);
    $result->execute();
    $i = 0;
    while($row = $result->fetch()){
    $ngca_admin[$i]['id_travel'] = $row['id_travel'];   
    $ngca_admin[$i]['name'] = $row['name']; 
    $ngca_admin[$i]['registration'] = $row['registration'];
    $ngca_admin[$i]['status'] = $row['status'];     
    $i++;
    }
    return $ngca_admin;
}

//выбераем все путевки с условием Fleet NGCA ADMIN
 public static function getAllTravelForFleetNgcaAdmin($str,$str2){
    $db = Db::getConnection();
    $fleet_ngca_admin = array();
    $sql = "SELECT * FROM travel WHERE  type != :str AND type != :str2";
    $result = $db->prepare($sql);
    $result->bindParam(':str',$str,PDO::PARAM_STR);
    $result->bindParam(':str2',$str2,PDO::PARAM_STR);
    $result->execute();
    $i = 0;
    while($row = $result->fetch()){
    $fleet_ngca_admin[$i]['id_travel'] = $row['id_travel'];   
    $fleet_ngca_admin[$i]['name'] = $row['name']; 
    $fleet_ngca_admin[$i]['registration'] = $row['registration'];
    $fleet_ngca_admin[$i]['status'] = $row['status'];     
    $i++;
    }
    return $fleet_ngca_admin;
}
//выбераем все путевки с условием Fleet GCA ADMIN
 public static function getAllTravelForFleetgcaAdmin($str,$str2){
    $db = Db::getConnection();
    $fleet_ngca_admin = array();
    $sql = "SELECT * FROM travel WHERE   type != :str AND type != :str2";
    $result = $db->prepare($sql);
    $result->bindParam(':str',$str,PDO::PARAM_STR);
    $result->bindParam(':str2',$str2,PDO::PARAM_STR);
    $result->execute();
    $i = 0;
    while($row = $result->fetch()){
    $fleet_ngca_admin[$i]['id_travel'] = $row['id_travel'];   
    $fleet_ngca_admin[$i]['name'] = $row['name']; 
    $fleet_ngca_admin[$i]['registration'] = $row['registration'];
    $fleet_ngca_admin[$i]['status'] = $row['status'];     
    $i++;
    }
    return $fleet_ngca_admin;
}








//одобрение заявки финансовым отделом
 public static function Approval($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET `finance_status` = $count WHERE id_travel = $travelId";
    $result = $db->prepare($sql);
     return $result->execute();
   }
//одобрение заявки line manedger
    public static function ApprovalManedger($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET `lineManedgerStatus` = $count WHERE id_travel = $travelId";
    $result = $db->prepare($sql);
     return $result->execute();
   }

   //одобрение заявки line manedger
    public static function ApprovadCountryDirector($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET `CountryDirectorStatus` = $count WHERE id_travel = $travelId";
    $result = $db->prepare($sql);
     return $result->execute();
   }
     //одобрение заявки finance вхллдная функция
    public static function InsertFinance($count){
  $db = Db::getConnection();
  $sql = "INSERT INTO `travel` (`finance_status`) VALUES (:count)";
    $result = $db->prepare($sql);
    $result -> bindParam(':count',$count);
     return $result->execute();
   }
   


//обновляем статус security
       public static function ApprovadSecurity($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET securytiStatus = $count, status = $count WHERE  id_travel = :travelId";
    $result = $db->prepare($sql);
    $result->bindParam(':travelId',$travelId);
     return $result->execute();
   }
//обновляем статус ngcaAreaCoordinator
       public static function ApprovadWithinNgcaCoordinator($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET NgcaAreaCstatus = $count  WHERE  id_travel = :travelId";
    $result = $db->prepare($sql);
    $result->bindParam(':travelId',$travelId);
     return $result->execute();
   }

   //обновляем статус CountryDirector
       public static function CountryCoordinator($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET CountryDirectorStatus = $count  WHERE  id_travel = :travelId";
    $result = $db->prepare($sql);
    $result->bindParam(':travelId',$travelId);
     return $result->execute();
   }


 //обновляем статус gcaAdmin
       public static function ApprovadGcaAdmin($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET GcaStatus = $count  WHERE  id_travel = :travelId";
    $result = $db->prepare($sql);
    $result->bindParam(':travelId',$travelId);
     return $result->execute();
   }  

    //обновляем статус ngcaAdmin
       public static function ApprovadNgcaAdmin($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET `NgcaAdminStatus` = $count  WHERE  id_travel = :travelId";
    $result = $db->prepare($sql);
    $result->bindParam(':travelId',$travelId);
     return $result->execute();
   }  

       //обновляем статус fleetNgca
       public static function ApprovadFleetNgca($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET `FleetNgcaStatus` = $count  WHERE  id_travel = :travelId";
    $result = $db->prepare($sql);
    $result->bindParam(':travelId',$travelId);
     return $result->execute();
   }  

   //обновляем статус в fleet gca

         public static function ApprovadFleetGca($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET `FleetGcaStatus` = $count  WHERE  id_travel = :travelId";
    $result = $db->prepare($sql);
    $result->bindParam(':travelId',$travelId);
     return $result->execute();
   }  
//обновляем статус путевки
       public static function ApprovadStatus($count = 1,$travelId){
  $db = Db::getConnection();
  $sql = "UPDATE travel SET `status` = $count  WHERE  id_travel = :travelId";
    $result = $db->prepare($sql);
    $result->bindParam(':travelId',$travelId);
     return $result->execute();
   }  

//дегелируем права пользователя
   public static function Delegate($name1,$name2){
    $db = Db::getConnection();
    $sql = "INSERT INTO degelation (who_degel,was_degel) VALUES (:name1,:name2)";
    $result = $db->prepare($sql);
    $result->bindParam(':name1',$name1);
    $result->bindParam(':name2',$name2);
    return $result->execute();
   }

//проверяем передовал ли менеджер права
   public static function getDelegateManedger($name){
   $db = Db::getConnection();
   $sql = "SELECT * FROM degelation WHERE who_degel = :name";
   $result = $db -> prepare($sql);
   $result-> bindParam(':name',$name,PDO::PARAM_STR);
    $result->execute();
    $res = $result->fetch();
     return $res;
   }
//проверяем передовал ли менеджер права для формы
   public static function getDelegateWasMenader($name){
   $was = array();
   $db = Db::getConnection();
   $sql = "SELECT * FROM degelation WHERE who_degel = :name";
   $result = $db -> prepare($sql);
   $result-> bindParam(':name',$name,PDO::PARAM_STR);
    $result->execute();
     return  $result->fetch();
   }
//про
// выбираем пользователя которому делегировавали права
   public static function getDelegateAdmin($name){
    $db = Db::getConnection();
    $was_degel = array();
    $sql = "SELECT * FROM degelation WHERE who_degel = :name";
    $result = $db->prepare($sql);
    $result -> bindParam(":name",$name,PDO::PARAM_STR);
    $result -> execute();
    $i=0;
    while($row = $result->fetch()){
      $was_degel[$i]['was_degel'] = $row['was_degel'];
      $i++;
     }
    return $was_degel;
   }
   //удаляем делегированого менеджера с бд
   public static function delateManedgerDelegation($name){
     $db = Db::getConnection();
    $sql = "DELETE FROM degelation WHERE who_degel = :name";
    $result = $db->prepare($sql);
    $result->bindParam(':name',$name,PDO::PARAM_STR);
    return $result->execute();
   }

}
?>