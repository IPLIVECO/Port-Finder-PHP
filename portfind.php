<?php
set_time_limit(0);
$ip = $_GET["ip"];
for($i = 1; $i < 65535; ++$i) {
	if(get_data($ip,$i)){
		$server_port = $ip.":".$i;
		storeValid($server_port);
		echo $server_port."<br>";
		ob_flush();
		flush();
		//sleep(1);
	}else{
		$server_port = $ip.":".$i;
		storeInvalid($server_port);
	}
}
function storeInvalid($url){
	$myfile = fopen("badports.txt", "a+") or die("Unable to open file!");
$txt = $url."\n";
fwrite($myfile, $txt);
fclose($myfile);
}
function storeValid($url){
	$myfile = fopen("goodports.txt", "a+") or die("Unable to open file!");
$txt = $url."\n\n";
fwrite($myfile, $txt);
fclose($myfile);
}
function get_data($url,$port)  
{  
$host = $url; 
$waitTimeoutInSeconds = 1; 
if($fp = @fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
   return true;
} else {
   return false; 
} 
@fclose($fp);
}  
function refresh(){
	header("Refresh:0");
}

?>