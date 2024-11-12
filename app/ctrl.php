<?php
require_once dirname (__FILE__).'/../config.php';
require_once $conf->root_path.'/app/security/LoginCtrl.class.php';
require_once $conf->root_path.'/app/database/DatabaseCtrl.class.php';

// Split address to $_GET params format: $params[0], $params[1] etc.
$request = str_replace($conf->app_root."/", "", $_SERVER['REQUEST_URI']);
$params = mb_split("/", $request);
//Installation script
if ($params[0] == "install"){
	if ( isset($params[1]) && ($params[1] == "framework") ) {
		global $conf;
		include_once $conf->root_path.'/app/install/InstallCtrl.class.php';
		$ctrl = new InstallCtrl();
		$ctrl->install();
	}
}
// Login routing
if ($params[0] == "account"){
	$ctrl = new LoginCtrl();
	$ctrl->redirect();
}
if ($params[0] == "login"){
	$ctrl = new LoginCtrl();
	$ctrl->doLogin();
}
if ($params[0] == "logout"){
	$ctrl = new LoginCtrl();
	$ctrl->doLogout();
}
// View routing
if ($params[0] == "view"){
	if ($params[1] == "start"){
		include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
		$ctrl = new ShowCtrl(null);
		$ctrl->showStart();
	}
	else if ($params[1] == "ajax"){
		include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
		$ctrl = new ShowCtrl(null);
		$ctrl->showAJAX();
	}
	// /view/5 lub /view/5/
	else if ( (isset($params[1]) && is_numeric($params[1]) && !isset($params[2]))  ||  
	     (isset($params[1]) && is_numeric($params[1]) && (isset($params[2]))  &&  ($params[2] == ''))){
			include $conf->root_path.'/app/security/user.php';
			include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
			$ctrl = new ShowCtrl($params[1]);
			$ctrl->showOne($params[1]);
	}
	// /view/all lub /view/all/
	else if ( (isset($params[1]) && ($params[1]=="all") && !isset($params[2])) ||  
	     (isset($params[1]) && ($params[1]=="all") && (isset($params[2]))  && ($params[2] == ''))){
				include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
				$ctrl = new ShowCtrl(null);
				$ctrl->showAll();
	}
	else{
		echo 'runtime error';
	}	
}
// AJAX requests
if ($params[0] == "get"){
	if ( isset($params[1]) && ($params[1] == "categories") ) {
		global $conf;
		include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
		$ctrl = new ShowCtrl(null);
		$ctrl->getCat();
	}
	if ( isset($params[1]) && ($params[1] == "msg") ) {
		global $conf;
		include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
		$ctrl = new ShowCtrl(null);
		$ctrl->getMsg();
	}
	if ( isset($params[1]) && ($params[1] == "demo") ) {
		global $conf;
		include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
		$ctrl = new ShowCtrl(null);
		$ctrl->getDemo();

	}
}
if ($params[0] == "set"){
	if ( isset($params[1]) && ($params[1] == "msg") ) {
		global $conf;
		include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
		$ctrl = new ShowCtrl(null);
		$ctrl->setMsg();
	}
}
if ($params[0] == "del"){
	if ( isset($params[1]) && ($params[1] == "msg") ) {
		global $conf;
		include_once $conf->root_path.'/app/show/ShowCtrl.class.php';
		$ctrl = new ShowCtrl();
		$ctrl->delMsg();
	}
}
?>
