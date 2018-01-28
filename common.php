<?php
function tmtopupconnect($tmuser,$tmpassword,$trueemail,$truepassword,$ip,$session,$transactionid,$action,$ref1){
	$url="http://tmwallet.thaighost.net/apiwallet.php";
	$urlconnect=$url."?username=$tmuser&password=$tmpassword&action=$action&tmemail=$trueemail&truepassword=$truepassword&session=$session&transactionid=$transactionid&clientip=$ip&ref1=$ref1";
	$callback=file_get_contents($urlconnect);
	return $callback;
}
function capchar($ip,$tmuser){
	return md5($tmuser.$ip);
}

function my_ip(){
	if ($_SERVER['HTTP_CLIENT_IP']) { 
		$IP = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (ereg("[0-9]",$_SERVER["HTTP_X_FORWARDED_FOR"] )) { 
		$IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
	} else { 
		$IP = $_SERVER["REMOTE_ADDR"];
	}
		return $IP;
}
?>