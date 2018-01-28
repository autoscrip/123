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
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
<head>
<meta name="KeyWords" content="True money,ทรูมันนี่ ,ตัดบัตรทรู ,auto truemoney" />
<META content="Copyright (c) 2010 thaighost.net All Rights Reserved. Tmtopup.thaighost.net V.1" name=copyright>
<meta name="robots" content="all" />
<meta content='index, follow, all' name='robots'/>
<META Name="Googlebot" Content="index,follow">
<meta name="revisit-after" content="1 days">
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="https://boostvpn-ssh.shop/asset/css/sb-admin-2.css" rel="stylesheet"><link href="https://boostvpn-ssh.shop/asset/css/bootstrap-datepicker3.min.css" rel="stylesheet"><link href="https://boostvpn-ssh.shop/asset/css/bootstrap-dialog.min.css" rel="stylesheet"><script src="https://code.jquery.com/jquery-2.1.3.min.js"></script><link rel="shortcut icon" href="https://boostvpn-ssh.shop/images/ico/favicon.ico"><link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://boostvpn-ssh.shop/images/ico/apple-touch-icon-144-precomposed.png"><link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://boostvpn-ssh.shop/images/ico/apple-touch-icon-114-precomposed.png"><link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://boostvpn-ssh.shop/images/ico/apple-touch-icon-72-precomposed.png"><link rel="apple-touch-icon-precomposed" href="https://boostvpn-ssh.shop/images/ico/apple-touch-icon-57-precomposed.png"></head>
<body>
<center><br><br>
	<a href="aovpn.in.th" target="_bank"><img width="40%" height="40%" src="https://dy0hrz8ka0ezi.cloudfront.net/wp-content/uploads/2017/08/wallet-logo.png"></a>
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
		case 1:
		char_load="";
		break;
		case 2:
		char_load="";
		break;
		case 3:
		char_load="";
		break;
		case 4:
		char_load="";
		co=0;
		break;
	}
	document.getElementById("loadvip").innerHTML=char_load;
	setTimeout("loading()", 100);
}	

</script>

<br>
<br>
	
	<a href="https://aovpn.in.th" class="btn btn-primary"><i class="fa fa-download fa-fw"></i> กลับไปหน้าหลัก</a>
	<br>
	<br>
	
       <div align="center" class="col-sm-2">
			  		
    			<div  class="panel-group" id="accordion">
        <div  class="panel panel-primary">
            <div  class="panel-heading">
                <h4  class="panel-title">
                     <i class="fa fa-cog fa-spin"></i> <label style="width: 250px;">ระบบฝากเงินอัตโนมัติ</label>
                </h4>
            </div>
            <center>
                <div class="panel-body">
                   <div class="col-sm-0">
			  		<form method="POST" name="tmtopup">
			  		<INPUT TYPE="hidden" NAME="send" value="ok">
					<INPUT TYPE="hidden" NAME="session" value="<?=$capchar_session?>">
					<div class="box-body">
                    <table  cellpadding="0" cellspacing="0">
					<strong><h2>เติมเงินขั้นต่ำ 10 บาท</h2></strong>
					<strong><font color="red">ถ้าเติมต่ำกว่า 10 บาทเงินจะไม่เข้า</font></strong>
					
					<tr>
                         <td>เบอร์ Admin</td>
                         <td><select name="rekening" id="hp" class="form-control">
																					<option value="<?php echo $truewall_phone; ?>"><?php echo $truewall_phone; ?></option>
								
													</select>
                         <font color="red">โอนเงินไปยังหมายเลขที่ขึ้นอยู่ด้านบน</font></strong></td>
                    </tr>
                    <br>
                    <br>
					<tr>
                         <td>Username</td>
                         <td><INPUT TYPE="text" NAME="ref1" placeholder="Ref1 Username" class="form-control" value="<?php echo $_GET[ref1]; ?>" style="height:10%;"><strong><font color="red">สั่งเกตุที่ช่อง Username ด้วยนะครับ</font></strong></td>

                    </tr>
                    <br>	
					<tr>
                         <td>เลขอ้างอิง</td>
                         <td><input name="transactionid" class="form-control" value="" maxlength="<?php echo $transaction_leng; ?>" placeholder="เลขที่อ้างอิง" style="height:10%;"><strong><font color="red">เช็ค เลขอ้างอิงให้ถูกต้องด้วยนะครับ</font></strong></td></td>
                    </tr>
                    
					
					<center><td>
					<div id="loadvip"></div><input class="btn btn-primary" type="submit" value="แจ้งโอน" name="send" onClick="this.disabled=1;this.value='รอสักครู่กำลังตรวจสอบเลขบัตร...';document.forms[0].submit();loading()"></center>
					
                   </td>
                   </table>
					
                   </form>  

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ตัวอย่าง เลขอ้างอิง</h4>
        </div>
        <div class="modal-body">
          <img src="https://www.aovpn.in.th/tmwallet/img1.jpg" height="70%" width="70%" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



</center></form></div>
</div>
</div>
</div>
</div>
</div>


  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ตัวอย่าง เลขอ้างอิง</button>

  


	<!-- js -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.0.0/metisMenu.min.js"></script>
	<script src="https://boostvpn-ssh.shop/asset/js/sb-admin-2.js"></script>
	<script src="https://boostvpn-ssh.shop/asset/js/bootstrap-datepicker.min.js"></script>
	<script src="https://boostvpn-ssh.shop/asset/js/bootstrap-dialog.min.js"></script>
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

</body>
</html>
