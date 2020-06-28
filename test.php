<?php
require ('mysql.php');    // 引用函数
if(isset($_POST['userAccount'])){
	echo ins($_POST['exchangeCDKeyValue'],$_POST['userAccount'],$_POST['roleName']);
   
}

?>

