<?php
session_start();
	include_once("m/URLs.php");
include_once("m/modelJSAPI.php");
//error_reporting(0);
if (isset($_SESSION['session']) or isset($_POST['session'])){

$login=@$_SESSION['login'].@$_POST['login'];
  $session=@$_SESSION['session'].@$_POST['session'];
//  $user_id=@$_SESSION['user_id'].@$_POST['user_id'];
//  $status=@$_SESSION['status'].@$_POST['status'];
//  $interface=@$_SESSION['status'].@$_POST['status'];

		$session=$_SESSION['session'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$options= array('session' => "$session",'ip' => "$ip");

		$config=new controllerAPI();
	  $a=	$config->auth($options);
		        //  print_r($a);
		if($a['session']!=''){


  //  define( 'UID', "$user_id" );

  //  define( 'INTERFACES', "$interface" );

  ///  $branchs =$row->branchId;

    $HS= "<input type='hidden' name='SessId' id='SessId' value='$session' />";
  //  $UT= "<input type='hidden' name='UT' id='UT' value='$status' />";
  //  $UI= "<input type='hidden' name='UI' id='UI' value='$interface' />";
  //  $UID= "<input type='hidden' name='UID' id='UID' value='$user_id' />";
		$UIL= "<input type='hidden' name='UIL' id='UIL' value='$login' />";
    define( 'HS', "$HS" );
  //  define( 'UT', "$UT" );
  //  define( 'UI', "$UI" );
  //  define( 'UIDs', "$UID" );
		define( 'UIL', "$UIL" );


    //  header('Location: index.php');

	}else{//echo '2'.$a['session']; exit();
            echo "<html><head>
          <meta http-equiv='refresh' content='0;URL=auth/' />
          </head></html>"; }//echo '2'.$a['session']; exit();
}else{//echo '1_'.$_SESSION['session'];exit();
  echo "<html><head>
<meta http-equiv='refresh' content='0;URL=auth/' />
</head></html>"; }// echo '1_'.$_SESSION['session'];exit();
