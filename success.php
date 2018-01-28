	<?php
	ob_start();
	session_start();
	header("Content-type: text/html; charset=utf-8");
	set_time_limit(0);
	$datenow=date("Y-m-d");
	$transaction_leng=14;
	include 'common.php';
	include 'config.php';
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>ระบบฝากเงิน</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="KeyWords" content="True money,ทรูมันนี่ ,ตัดบัตรทรู ,auto truemoney" />
		<META content="Copyright (c) 2010 thaighost.net All Rights Reserved. Tmtopup.thaighost.net V.1" name=copyright>
		<meta name="robots" content="all" />
		<meta content='index, follow, all' name='robots'/>
		<META Name="Googlebot" Content="index,follow">
		<meta name="revisit-after" content="1 days">
		<meta name="MSSmartTagsPreventParsing" content="True" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<div class="bs-example" data-example-id="nav-tabs-with-dropdown"> <ul class="nav nav-tabs"> <li role="presentation"><a href="https://aovpn.in.th/">หน้าหลัก</a></li> <li role="presentation" class="active"><a href="https://aovpn.in.th/tmwallet/">เติมเงิน</a></li>  </ul> </li> </ul> </div>
	<center>
	<div class="container">
		<div class="center-form">
			
	</div>

	<?php
				mysql_connect($db_host,$db_user,$db_pass) or die("Error connect Database");
				mysql_select_db($db_name) or die("Error Select Database");
				if($_POST[send]){
					if(strlen($_POST[transactionid])<10){
						echo "<script>alert('กรุณากรอก เลขที่อ้างอิง ให้ครบ!');location='https://aovpn.in.th/tmwallet/';</script>";
					}else{
						$returnserver=tmtopupconnect($tmapi_user,$tmpapi_assword,$truewall_email,$truepassword,my_ip(),$_POST[session],$_POST[transactionid],"yes",$_POST[ref1]);
					}
					if(substr($returnserver,0,2)=="ok"){
			$money_total=substr($returnserver,2); 
			mysql_query("update user set saldo = saldo + $money_total where username='$_POST[ref1]' ");
			echo "<strong><p><h4 style='color:green'>เรียบร้อย</h4></p></strong>
			<strong><p>จำนวนเงิน คือ $money_total บาท</p></strong>
			<strong><p>ขอบคุณที่ใช้บริการครับ !</p></strong>
			<strong><p><a href='https://aovpn.in.th/'>กลับไปหน้าหลัก</a> </p></strong>";
			//-------------------------------------------------------------------------------------------
		}else{
			$error=$returnserver;
			
			//-------------------------------------------------------------------------------------------
			echo "<strong><p><h4>ไม่สำเร็จ </h4></p></strong>
			<strong><p>$error</p></strong>
			<strong><p><a href='https://aovpn.in.th/tmwallet/'>[กลับไปลองอีกครั้ง]</a> </p></strong>";
			//-------------------------------------------------------------------------------------------
		}
	} else{
		$capchar_session=capchar(my_ip(),$tmapi_user);
		$returnserver=tmtopupconnect($tmapi_user,$tmpapi_assword,"","","","","","","");
		if($returnserver=="ready"){
			?>
			<script>
				co=0;
				function loading(){
					co=co+1;
					switch(co)
					{
					
					}
					document.getElementById("loadvip").innerHTML=char_load;
					setTimeout("loading()", 100);
				}	

			</script>

				
	<?php 
													}else if($returnserver=="noready"){
														echo "<p><img src='busy.png'></p><p><b>กำลังมีผู้ทำรายการอยู่ โปรดรอประมาณ 20 วินาที</b> </p>
														<p><a href=''>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
													}else if($returnserver=="not_connect"){
														echo "<p><img src='notcon.png'></p><p><b>ไม่สามารถติดต่อ Server True Money ได้ โปรดรอสักครู่..</b> </p>
														<p><a href=''>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
													}else if($returnserver=="block_ip"){
														echo "<p><img src='block_ip.png'></p><p><b>ถูก block ip ชั่วคราว เนื่องจากทำรายการไม่ถูกต้อง เกิน 6 ครั้ง</b> </p>
														<p><a href=''>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
													}else{
														echo "<p>ยังไม่พร้อมใช้งาน โปรดติดต่อผู้ดูแลระบบ</p>";
													}
												}
												?>

		</center>
	</body>
	</html><?php
	ob_start();
	session_start();
	header("Content-type: text/html; charset=utf-8");
	set_time_limit(0);
	$datenow=date("Y-m-d");
	$transaction_leng=14;
	include 'common.php';
	include 'config.php';
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>ระบบฝากเงิน</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="KeyWords" content="True money,ทรูมันนี่ ,ตัดบัตรทรู ,auto truemoney" />
		<META content="Copyright (c) 2010 thaighost.net All Rights Reserved. Tmtopup.thaighost.net V.1" name=copyright>
		<meta name="robots" content="all" />
		<meta content='index, follow, all' name='robots'/>
		<META Name="Googlebot" Content="index,follow">
		<meta name="revisit-after" content="1 days">
		<meta name="MSSmartTagsPreventParsing" content="True" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<div class="bs-example" data-example-id="nav-tabs-with-dropdown"> <ul class="nav nav-tabs"> <li role="presentation"><a href="https://aovpn.in.th/">หน้าหลัก</a></li> <li role="presentation" class="active"><a href="https://aovpn.in.th/tmwallet/">เติมเงิน</a></li>  </ul> </li> </ul> </div>
	<center>
	<div class="container">
		<div class="center-form">
			
	</div>

	<?php
				mysql_connect($db_host,$db_user,$db_pass) or die("Error connect Database");
				mysql_select_db($db_name) or die("Error Select Database");
				if($_POST[send]){
					if(strlen($_POST[transactionid])<10){
						echo "<script>alert('กรุณากรอก เลขที่อ้างอิง ให้ครบ!');location='https://aovpn.in.th/tmwallet/';</script>";
					}else{
						$returnserver=tmtopupconnect($tmapi_user,$tmpapi_assword,$truewall_email,$truepassword,my_ip(),$_POST[session],$_POST[transactionid],"yes",$_POST[ref1]);
					}
					if(substr($returnserver,0,2)=="ok"){
			$money_total=substr($returnserver,2); 
			mysql_query("update user set saldo = saldo + $money_total where username='$_POST[ref1]' ");
			echo "<p><h4 style='color:green'>เรียบร้อย</h4></p>
			<p>จำนวนเงิน คือ $money_total บาท</p>
			<p>ขอบคุณที่ใช้บริการครับ !</p>";
			//-------------------------------------------------------------------------------------------
		}else{
			$error=$returnserver;
			
			//-------------------------------------------------------------------------------------------
			echo "<strong><p><h4>ไม่สำเร็จ </h4></p></strong>
			<strong><p>$error</p></strong>
			<strong><p><a href='https://aovpn.in.th/tmwallet/'>[กลับไปลองอีกครั้ง]</a> </p></strong>";
			//-------------------------------------------------------------------------------------------
		}
	} else{
		$capchar_session=capchar(my_ip(),$tmapi_user);
		$returnserver=tmtopupconnect($tmapi_user,$tmpapi_assword,"","","","","","","");
		if($returnserver=="ready"){
			?>
			<script>
				co=0;
				function loading(){
					co=co+1;
					switch(co)
					{
					
					}
					document.getElementById("loadvip").innerHTML=char_load;
					setTimeout("loading()", 100);
				}	

			</script>

				
	<?php 
													}else if($returnserver=="noready"){
														echo "<p><img src='busy.png'></p><p><b>กำลังมีผู้ทำรายการอยู่ โปรดรอประมาณ 20 วินาที</b> </p>
														<p><a href=''>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
													}else if($returnserver=="not_connect"){
														echo "<p><img src='notcon.png'></p><p><b>ไม่สามารถติดต่อ Server True Money ได้ โปรดรอสักครู่..</b> </p>
														<p><a href=''>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
													}else if($returnserver=="block_ip"){
														echo "<p><img src='block_ip.png'></p><p><b>ถูก block ip ชั่วคราว เนื่องจากทำรายการไม่ถูกต้อง เกิน 6 ครั้ง</b> </p>
														<p><a href=''>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
													}else{
														echo "<p>ยังไม่พร้อมใช้งาน โปรดติดต่อผู้ดูแลระบบ</p>";
													}
												}
												?>

		</center>
	</body>
	</html>