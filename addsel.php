<?php
require ('mysql.php');    // 引用函数
if(isset($_GET['addsel'])){
	
	if($_GET['addsel']=='add'){
		echo add();
	}else{
		echo sel();
	}
   
}

?>

