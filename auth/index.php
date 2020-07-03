<?php
session_start();
	include_once("../m/URLs.php");
	include_once("../m/modelJSAPI.php");
	include_once("../c/controllerAPI.php");

if (isset($_SESSION['session'])){

		$session=$_SESSION['session'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$options= array('session' => "$session",'ip' => "$ip");

		$config=new controllerAPI();
	$a=	$config->auth($options);
		        //  print_r($a);
		if($a['session']!=''){
				header('Location: ../index.php');
					}
}
if (isset($_POST['login']) && isset($_POST['password']))
		      {
		$login = @$_POST['login'];
		$login =strip_tags(@$login);
		$password = @$_POST['password'];
		$password = md5($password);
		$ip = $_SERVER['REMOTE_ADDR'];
		$options= array('login' => "$login",'password' => "$password",'ip' => "$ip");

		$config=new controllerAPI();
	$a=	$config->auth($options);
		         // print_r($a);
						//	$b=$config-> selectAll();
					//		print_r($b);
		if($a['session']!=''){ echo "string";
					//	$_SESSION['user_id']=$a['uid'];
						$_SESSION['login']=$login;
						$_SESSION['session']=$a['session']; //echo $_SESSION['session']; exit();
					//	$_SESSION['status']=$a['status']; ex
				//	exit();
				header('Location: ../index.php');
					}
}

		if (isset($_GET['logout']))
		{
			if (isset($_SESSION['session']))
            { echo $_GET['logout'];
							$user_id=$_SESSION['user_id'];
							$session=$_SESSION['session'];
							//logout ключ session
							$options= array('session' => "$session");

							$config=new controllerAPI();
						$a=	$config->logout($options);
								unset($_SESSION['login']);
							//	unset($_SESSION['user_id']);
								unset($_SESSION['session']);
							//	unset($_SESSION['status']);
								setcookie('login', '', 0, "/");
						//		setcookie('user_id', '', 0, "/");
								setcookie('session', '', 0, "/");
						//		setcookie('status', '', 0, "/");
		echo" Вы вышли из акаунта";// @$_SESSION['user_id'].
		            //exit;
		      }
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Единый Диспетчерский Центр</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href=""/>
	<link rel='stylesheet' type='text/css' href='style.css' />
</head>
<body>

		<div class="login_style">
			<h1 class='login_h1'> Единый <br> Диспетчерский <br> Центр  </h1>
				<form action="" enctype="multipart/form-data" method="POST" >
					<input class="login_input" type="text" name="login" placeholder="Логин" />
					<input class="login_input" type="password" name="password" placeholder="Пароль" />

				<input class="login_submit" type="submit" value="Вход" />
			</form>
		</div>

</body>
</html>
