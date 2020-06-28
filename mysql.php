<?php

// 连接数据库函数
function link_mysql($sql){
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=card','root','asd59541511');  // 连接数据库 实例化
    $stmt = $pdo->prepare($sql);
    return $stmt;
}

// 新增数据
function ins($data1,$data2,$data3){
	$sql= "SELECT * FROM `code` WHERE codekey='$data1' and namer='1';";    //根据 Id值进行查询
    $stmt = link_mysql($sql);
    if($stmt->execute()) {
		$arry_data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($arry_data['codekey']!=""){
				up($data2,$data1);
				return json_encode(array('msg'=>'您的预约成功，将于7月28日以短信方式提醒您登陆游戏。祝您游戏愉快~'));
			}
		return json_encode(array('msg'=>'激活码输入有误!或已使用过！'));
    }else{
        return json_encode(array('msg'=>'激活码输入有误!或已使用过！'));
      }

}

function sel(){
	$sql= "SELECT * FROM `code` WHERE namer='1';";    //根据 Id值进行查询
    $stmt = link_mysql($sql);
    if($stmt->execute()) {
        $arry_data = $stmt->fetch(PDO::FETCH_ASSOC);// 将查询到的数据 读取显示
		while($arry_data = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>
			
			<tr>

        <td height="22" align="center" valign="middle"><?php echo $arry_data['codekey'];?></br></td>

        </tr>
			<?php
		}

    }

}


//修改数据
function add(){
	for ($x=0; $x<=10; $x++) {
		$sql= "INSERT INTO `code` VALUES (substring(MD5(RAND()),1,20) ,'1');"; // 根据ID值 将某字段修改为某参数
		$stmt = link_mysql($sql);
		$stmt->execute();
	}
	echo '成功创建十个激活码';
}

//修改数据
function up($name,$key){
    $sql= "UPDATE  `code` SET  namer =  '$name' WHERE  codekey='$key';"; // 根据ID值 将某字段修改为某参数
    $stmt = link_mysql($sql);
    if($stmt->execute()){
        return "修改成功！";
    }else{
        return "修改失败！";
    }

}

