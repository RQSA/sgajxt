<?php
	
	$sjcc =$_POST["sjc"];
	
	require("../conn.php");
		$selectConnectString=$_POST["selectConnectString"];
		$inputConnectString=$_POST["inputConnectString"];
		$xg=$_POST["xg"];
		$bumen = explode("//",$selectConnectString);
		$hsxa = explode("//",$inputConnectString);
		$modify=explode("//",$xg);
		for($k=0;$k<count($modify)/5;$k++){
			$sql="update 工程管理人员 set 部门='".$modify[$k*5+1]."',岗位='".$modify[$k*5+2]."',姓名='".$modify[$k*5+3]."',联系方式='".$modify[$k*5+4]."' where id='".$modify[$k*5]."'";
			$result=$conn->query($sql);
		}
		
		$num1=0;
		$num2=0;
		$c=0;
		$zCompany="";
		$otherCompany="";
        for($i=0;$i<count($bumen)-1;$i++) 
		{   
			$c=$num2;
			if($i>=1){
				$c=$c+1;
			}
			$num1=$c+1;
			$num2=$c+2;
			$sql1 = "INSERT INTO 工程管理人员 (工程时间戳,部门,岗位,姓名,联系方式) values ('$sjcc','$bumen[$i]','$hsxa[$c]','$hsxa[$num1]','$hsxa[$num2]')";
			if ($conn->query($sql1) === TRUE) {
			    echo "保存成功";
				
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			} 
			
			
			//组合手机号码
			if($bumen[$i]=="总公司"){
				$zCompany.=$hsxa[$num2].",";
			}else{
				$otherCompany.=$hsxa[$num2].",";
			}
		}
		
		
		//先查询 工程动态添加手机 这张表是否有记录
		$sql2 = "select * from 工程动态添加手机 where 时间戳 = '".$sjcc."'";
		$result = $conn->query($sql2);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$zgsSave=$row["mobileZgs"].$zCompany;
				$otherSave=$row["mobileOther"].$otherCompany;
				$sqli = "update 工程动态添加手机 set mobileZgs='$zgsSave',mobileOther='$otherSave' where 时间戳='".$sjcc."'";
				if ($conn->query($sqli) === TRUE) {
					
				} else {
					
				}
			}
		}else{
			$sql2 = "INSERT INTO 工程动态添加手机 (时间戳,mobileZgs,mobileOther) values ('$sjcc','$zCompany','$otherCompany')";
			if ($conn->query($sql2) === TRUE) {
			   
				
			} else {
			   
			}
		}
		
$conn->close();	
?>
