<?
$servername = "localhost";
$username = "admin";
$password = "123";
$dbname = "mvc3d";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
$sql = mysqli_query($conn,"INSERT INTO `user` (`name`, `email`, `password`)
VALUES ('".$name."', '".$email."', '".$password."')");
if($sql ==  true){
	echo "Вы успешно зарагестрировались";
}
else echo "Не удалось зарегестрироваться";
?>