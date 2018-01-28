<title>AOVPN | เติมเงินอัตโนมัติ</title>
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
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<style>
/* Add animation (Chrome, Safari, Opera) */
@-webkit-keyframes example {
    from {top:-100px;opacity: 0;}
    to {top:0px;opacity:1;}
}

/* Add animation (Standard syntax) */
@keyframes example {
    from {top:-100px;opacity: 0;}
    to {top:0px;opacity:1;}
}

/* The modal's background */
.modal {
  display: none;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
}

/* Display the modal when targeted */
.modal:target {
  display: table;
  position: absolute;
}

/* The modal box */
.modal-dialog {
  display: table-cell;
  vertical-align: middle;
}

/* The modal's content */
.modal-dialog .modal-content {
  margin: auto;
  position: relative;
  padding: 0;
  outline: 0;
  border: 1px #777 solid;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

  /* Add animation */
  -webkit-animation-name: example; /* Chrome, Safari, Opera */
  -webkit-animation-duration: 0.5s; /* Chrome, Safari, Opera */
  animation-name: example;
  animation-duration: 0.5s;
}

/* The button used to close the modal */
.closebtn {
  text-decoration: none;
  float: right;
  font-size: 25px;
  font-weight: bold;
  color: #fff;
}

.closebtn:hover,
.closebtn:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.container {
  padding: 2px 16px;
}

header {
  background-color: #f0ad4e;
  font-size: 25px;
  color: white;
}

footer {
  background-color: #f0ad4e;
  font-size: 20px;
  color: white;
}
</style>
 <style> 
@font-face {
    font-family: myFirstFont;
    src: url(/asset/css/woff.ttf);
}

div {
    font-family: myFirstFont;
}
</style>
	<div class="bs-example" data-example-id="nav-tabs-with-dropdown"> <h5><ul class="nav nav-tabs"> <li role="presentation"><a href="https://aovpn.in.th/">หน้าหลัก</a></li> <li role="presentation" class="active"><a href="https://aovpn.in.th/tmwallet/">เติมเงิน</a></li> <li role="presentation"><a href="https://aovpn.in.th/speedtest/">speedtest</a></li>  </ul> </li> <h5></ul> </div>
	<div class="container">
		<div class="center-form">
			<br>
							</div>
		<font size="2">
				<?php
				mysql_connect($db_host,$db_user,$db_pass) or die("Error connect Database");
				mysql_select_db($db_name) or die("Error Select Database");
				if($_POST[send]){
					if(strlen($_POST[transactionid])<10){
						echo "<script>alert('กรุณากรอก เลขที่อ้างอิง ให้ครบ!');location='';</script>";
					}else{
						$returnserver=tmtopupconnect($tmapi_user,$tmpapi_assword,$truewall_email,$truepassword,my_ip(),$_POST[session],$_POST[transactionid],"yes",$_POST[ref1]);
					}
					if(substr($returnserver,0,2)=="ok"){
		$money_total=substr($returnserver,2); //จำนวนเงินที่ได้รับ
		//-------------------------------------------------กรบวนการเซ็คสำเร็จ สามารถนำไปพัฒนาต่อ อัพเดทยอดบนฐานข้อมูลลูกค้า
		//โดยมี $money_total เป็นค่ายอดเงิน , $_POST[ref1] เป็นตัวอ้างอิง id ลูกค้าที่แจ้งเข้ามา
		mysql_query("update user set saldo = saldo + $money_total where username='$_POST[ref1]' ");
		echo "<p><h4 style='color:green'>เรียบร้อย</h4></p>
		<p>จำนวนเงิน คือ $money_total บาท</p>
		<p>ขอบคุณที่ใช้บริการครับ !</p>";
		//-------------------------------------------------------------------------------------------
	}else{
		$error=$returnserver;//ค่าผิดพลาด ที่ส่งกลับมา
		
		//-------------------------------------------------------------------------------------------
		echo "<p><h4>ไม่สำเร็จ </h4></p>
		<p>$error</p>
		<p><a href=''>[กลับไปลองอีกครั้ง]</a> </p>";
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
				document.getElementById("loadvip").innerHTML=char_load;
				setTimeout("loading()", 100);
			}	
		}

	</script>
	<div  class="panel-group" id="accordion">
		<div  class="panel panel-primary">
			<div  class="panel-heading">
				<h4  class="panel-title">
					<img src="https://wallet.truemoney.com/v1web/assets/images/vas/logo.png" width="25px"></i>  <label style="width: 250px;">ระบบฝากเงินอัตโนมัติ</label>
				</h4>
			</div>
			<center>
				<div class="panel-body">
					<div class="col-sm-0">
						<form method="POST" name="tmtopup"  action="success.php">
							<INPUT TYPE="hidden" NAME="send" value="ok">
							<INPUT TYPE="hidden" NAME="session" value="<?=$capchar_session?>">


							<div class="form-group">
								<strong><h2>เติมเงินขั้นต่ำ 10 บาท</h2></strong>
								<strong><font color="red">ถ้าเติมต่ำกว่า 10 บาทเงินจะไม่เข้า</font></strong><br><br>
							</div>
							<div class="box-body text-left">
								<div class="form-group">
									<label>Wallet</label>
									<select name="rekening" id="hp" class="form-control">
										<option value="<?php echo $truewall_phone; ?>"><?php echo $truewall_phone; ?></option>
									</select>
								</div>
								<div class="form-group">
									<label>Username</label>
									<INPUT TYPE="text" NAME="ref1" placeholder="Username" class="form-control"  value="<?php echo $_GET[ref1]; ?>">
								</div>
								<div class="form-group">
									<label>เลขอ้างอิง</label>
									<input name="transactionid" value="" class="form-control" maxlength="<?php echo $transaction_leng; ?>" placeholder="เลขที่อ้างอิง">
								</div>
								<div class="form-group">
									<div id="loadvip"></div>
									<input align="center" type="submit" class="btn btn-primary btn-block" value="แจ้งโอน" name="send" onClick="this.disabled=1;this.value='รอสักครู่กำลังตรวจสอบเลขบัตร...';document.forms[0].submit();loading()">
								</div>
								<a type="button" class="btn btn-warning btn-block" href="#id01">ตัวอย่างเลขอ้างอิง</a>
							</div>
<!-- 
										<table align="center" cellpadding="0" cellspacing="0">
											<strong><h2>เติมเงินขั้นต่ำ 10 บาท</h2></strong>
											<strong><font color="red">ถ้าเติมต่ำกว่า 10 บาทเงินจะไม่เข้า</font></strong><br><br>
											<div class="box-body">
												<div class="form-group">
													<p><b>Wallet</b></p>
													<select name="rekening" id="hp" class="form-control">
														<option value="<?php echo $truewall_phone; ?>"><?php echo $truewall_phone; ?></option></select>
														<div class="form-group">
															<tr><div class="form-group">
																<p><b>Username</b></p>
																<INPUT TYPE="text" NAME="ref1" placeholder="Ref1 Username" class="form-control"  value="<?php echo $_GET[ref1]; ?>"><br>

																<div class="form-group">
																	<p><b>เลขอ้างอิง</b></p>
																	<input name="transactionid" value="" class="form-control" maxlength="<?php echo $transaction_leng; ?>" placeholder="เลขที่อ้างอิง"></td>
																</tr><br>
																<td><div id="loadvip"></div></td>
																<td><input align="center" type="submit" class="btn btn-primary btn-block" value="แจ้งโอน" name="send" onClick="this.disabled=1;this.value='รอสักครู่กำลังตรวจสอบเลขบัตร...';document.forms[0].submit();loading()">
																</td></tr>
															</table> -->
														</form>
														<br>
														
													</div><br>
													
													
													

<div id="id01" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <header class="container"> 
        <a href="#" class="closebtn">×</a>
        <p>ตัวอย่างเลขอ้างอิง</p>
      </header>
      <div>
        <img src="https://www.aovpn.in.th/tmwallet/img1.jpg" width="90%" >
      </div>
      
    </div>
  </div>
</div>

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
										</div>
										<!-- <script type="text/javascript">
											function openmodal() {
												$('#opload').show();
											}
										</script> -->
</INPUT>
</div>
</div>
</INPUT>
</INPUT>
									</body>
									</html>
<center><h5><footer class="main-footer">
  &nbsp;&nbsp;Copyright © 2017 <a href="https://aovpn.in.th/">AOVPN</a>. All rights
    reserved.
  </footer></center>