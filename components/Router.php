<?
class Router{
	private $routes;
	public function __construct(){
		$routersPath = ROOT.'/config/routes.php';
		$this -> routes = include_once($routersPath);
}
// return uri method
private function getUri(){
	if(!empty($_SERVER['REQUEST_URI'])){
 return trim($_SERVER['REQUEST_URI'],'/');
		}//END IF
}


public function run(){
$uri = $this -> getUri();		
foreach($this->routes as $uriPattern => $path){

if (preg_match("~^$uriPattern$~", $uri)){
//echo '<br>Where replace ' . $uri;
//echo '<br> What replace' .$uriPattern;
//echo '<br> Who обрабатывает' . $path;
$internalRouter = preg_replace("~$uriPattern~", $path, $uri);


$segment = explode('/',$internalRouter);
$nameController = array_shift($segment).'Controller';
$nameController = ucfirst($nameController);//получаем контролер
$actionName = 'action' . ucfirst(array_shift($segment));//получаем action
$parametrs = $segment;

//echo '<br>Name controller ' . $nameController . '<br>';
//echo 'Name action ' . $actionName . '<br>';
//print_r($parametrs);
//ПОЛУЧАЕМ ФАЙЛ КОНТРОЛЕРА
$controllerFile = ROOT . '/controller/'.$nameController . '.php';
if(file_exists($controllerFile)){
	include_once($controllerFile);
}
$controllerObject = new $nameController;
//$result = $controllerObject -> $actionName();
$result = call_user_func_array(array($controllerObject,$actionName), $parametrs);
if($result != null){
	break;
}
}// END PREG_MATCH
}//END FOREACH

	}//END METHOD RUN
}//END CLASS ROUTER


