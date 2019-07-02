<?php
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;
	$sjcc =strtotime(".$sjc.");
	
	require("../conn.php");
$selectConnectString=$_POST["selectConnectString"];
		$inputConnectString=$_POST["inputConnectString"];
		$bumen = explode("//",$selectConnectString);
		$hsxa = explode("//",$inputConnectString);

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
			$sql1 = "INSERT INTO 工程管理人员 (工程时间戳,部门,岗位,姓名,联系方式) values (".strtotime(".$sjcc.").",'$bumen[$i]','$hsxa[$c]','$hsxa[$num1]','$hsxa[$num2]')";
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
		
		$sql2 = "INSERT INTO 工程动态添加手机 (时间戳,mobileZgs,mobileOther) values ('".strtotime(".$sjcc.")."','$zCompany','$otherCompany')";
			if ($conn->query($sql2) === TRUE) {
			   
				
			} else {
			   
			}
		
		
$conn->close();	
?>
