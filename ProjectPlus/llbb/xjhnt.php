<?php error_reporting( E_ALL&~E_NOTICE );?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40">
	<head>
	<script type="text/javascript" src="../js/jquery.print.js"></script>
	 <script language="javascript">
			
			function preview() { 
			bdhtml=window.document.body.innerHTML; 
			sprnstr="<!--startprint-->"; 
			eprnstr="<!--endprint-->"; 
			prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
			prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
			window.document.body.innerHTML=prnhtml; 
			window.print(); 
			window.document.body.innerHTML=bdhtml; 
			}
		</script>
</script>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="../../css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="../../css/theme.css" rel="stylesheet">
    
    <!-- Custom styles for bootstrap-table -->
    <link href="../../css/bootstrap-table.min.css" rel="stylesheet">
    <link href="../../css/mycss.css" rel="stylesheet">
	<meta http-equiv=Content-Type  content="text/html; charset=UTF-8" ><meta name=ProgId  content=Word.Document ><meta name=Generator  content="Microsoft Word 14" ><meta name=Originator  content="Microsoft Word 14" ><title></title>
	
	<body>

		<!--<?php
				require("../../conn.php");
				 $scj1=$_GET["sjc1"];  
				 $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$scj1' ";
				 $result = $conn->query($sql);
//				  $id1=array();
				 while($row = $result->fetch_assoc()) {
//				 	$id1=$row["id"];//实测实量数据搜得对应条目的最后一条的id
				 }
   					?>
   					<!--<?php echo $id1;?>-->
			<?php
		           require("../../conn.php");
				    $sjc1=$_GET["sjc1"];
					$sjc = array();
					$sjc = explode(',', $sjc1);
					for($j=0;$j<count($sjc);$j++){
		           $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='".$sjc[$j]."' and 记录表类型='现浇混凝土结构观感质量及尺寸偏差'";
		//					                   echo $scj1;
		           $result = $conn->query($sql);
		           while($row = $result->fetch_assoc()) {    					
		           $fegcmc=$row["分项工程名称"];
		           $gcmc=$row["工程名称"];
		           
		           }
			?>
			<h2 align="center" style="font-family: 宋体;font-size: 20.0000pt;">现浇混凝土结构观感质量及尺寸偏差检验批验收记录表</h2>
		<table border="1px" cellspacing="0px" align="center" width="600px" height="300px" style="font-size: 12.0000pt; font-family: '宋体'">
			
				
			<tr>
				<td	colspan="4" align="center" width="50%" style="font-size: 16.0000pt;">单位（子单位)<br>工程名称</td>
				<td colspan="10" align="center" width="50%" style="font-size: 16.0000pt;">
					<?php echo $gcmc; ?>
						
					</td>
			</tr>
			
			<tr>
				<td colspan="4"  align="center" width="40%" style="font-size: 16.0000pt;">分项工程名称</td>
				<td colspan="10" align="center" width="60%" style="font-size: 16.0000pt;">
					<?php echo $fegcmc; ?>
					
				</td>
			</tr>
			<tr>
				<?php
					                   require("../../conn.php");
									   $scj1=$_GET["sjc1"];  
					                   $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='现浇混凝土结构观感质量及尺寸偏差' and 检查内容='现浇混凝土-垂直度'";					                   
					                   $result = $conn->query($sql);
					                   $d=array();
					                   $d1=array();
					                   while($row = $result->fetch_assoc()) {    					
					                   		
					                   		$d[0]=$row['D1'];
					                   		$d[1]=$row['D2'];
					                   		$d[2]=$row['D3'];
					                   		$d[3]=$row['D4'];
					                   		$d[4]=$row['D5'];
					                   		$d[5]=$row['D6'];
					                   		$d[6]=$row['D7'];
					                   		$d[7]=$row['D8'];
					                   		$d[8]=$row['D9'];
					                   		$d[9]=$row['D10'];
					                   		$d1[0]=$row['状态1'];
					                   		$d1[1]=$row['状态2'];
					                   		$d1[2]=$row['状态3'];
					                   		$d1[3]=$row['状态4'];
					                   		$d1[4]=$row['状态5'];
					                   		$d1[5]=$row['状态6'];
					                   		$d1[6]=$row['状态7'];
					                   		$d1[7]=$row['状态8'];
					                   		$d1[8]=$row['状态9'];
					                   		$d1[9]=$row['状态10'];
					                   		
					                   }
	?>
				<td align="center" width="12%">垂直<br>度</td>
				<td align="center" width="12%">层<br>高</td>
				<td align="center" width="8%">≦6m</td>
				<td align="center" width="8%">10mm</td>
					<?php
					if($d1[0]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[0];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[0];?></td>
						<?php
					}
					if($d1[1]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[1];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[1];?></td>
						<?php
					}
					if($d1[2]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[2];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[2];?></td>
						<?php
					}
					if($d1[3]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[3];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[3];?></td>
						<?php
					}
					if($d1[4]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[4];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[4];?></td>
						<?php
					}
					if($d1[5]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[5];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[5];?></td>
						<?php
					}
					if($d1[6]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[6];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[6];?></td>
						<?php
					}
					if($d1[7]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[7];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[7];?></td>
						<?php
					}
					if($d1[8]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[8];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[8];?></td>
						<?php
					}
					if($d1[9]==0){
						?>
						<td width="40" align="center"><u><?php echo $d[9];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $d[9];?></td>
						<?php
					}
					?>
				
			</tr>
			<tr>
				<?php
					                   require("../../conn.php");
									   $scj1=$_GET["sjc1"];  
					                   $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='现浇混凝土结构观感质量及尺寸偏差' and 检查内容='现浇混凝土-表面平整度'";
					                   $result = $conn->query($sql);
					                   $e=array();
					                   $e1=array();
					                   while($row = $result->fetch_assoc()) {    					
					                   		
					                   		$e[0]=$row['D1'];
					                   		$e[1]=$row['D2'];
					                   		$e[2]=$row['D3'];
					                   		$e[3]=$row['D4'];
					                   		$e[4]=$row['D5'];
					                   		$e[5]=$row['D6'];
					                   		$e[6]=$row['D7'];
					                   		$e[7]=$row['D8'];
					                   		$e[8]=$row['D9'];
					                   		$e[9]=$row['D10'];
					                   		$e1[0]=$row['状态1'];
					                   		$e1[1]=$row['状态2'];
					                   		$e1[2]=$row['状态3'];
					                   		$e1[3]=$row['状态4'];
					                   		$e1[4]=$row['状态5'];
					                   		$e1[5]=$row['状态6'];
					                   		$e1[6]=$row['状态7'];
					                   		$e1[7]=$row['状态8'];
					                   		$e1[8]=$row['状态9'];
					                   		$e1[9]=$row['状态10'];
					                   		
					                   }
	?>
				<td align="center" width="12%">表面平<br>整度</td>
				<td align="center" width="12%">允许偏<br>差</td>
				<td colspan="2" align="center" width="16%">8mm</td>
				<?php
					if($e1[0]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[0];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[0];?></td>
						<?php
					}
					if($e1[1]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[1];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[1];?></td>
						<?php
					}
					if($e1[2]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[2];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[2];?></td>
						<?php
					}
					if($e1[3]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[3];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[3];?></td>
						<?php
					}
					if($e1[4]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[4];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[4];?></td>
						<?php
					}
					if($e1[5]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[5];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[5];?></td>
						<?php
					}
					if($e1[6]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[6];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[6];?></td>
						<?php
					}
					if($e1[7]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[7];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[7];?></td>
						<?php
					}
					if($e1[8]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[8];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[8];?></td>
						<?php
					}
					if($e1[9]==0){
						?>
						<td width="40" align="center"><u><?php echo $e[9];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $e[9];?></td>
						<?php
					}
					?>
			</tr>
			<tr>
				<?php
					                   require("../../conn.php");
									   				 $scj1=$_GET["sjc1"];  
					                   $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='现浇混凝土结构观感质量及尺寸偏差' and 检查内容='现浇混凝土-截面尺寸'";
					                   $result = $conn->query($sql);
					                   $f=array();
					                   $f1=array();
					                   while($row = $result->fetch_assoc()) {    					
					                   		
					                   		
					                   		$f[0]=$row['D1'];
					                   		$f[1]=$row['D2'];
					                   		$f[2]=$row['D3'];
					                   		$f[3]=$row['D4'];
					                   		$f[4]=$row['D5'];
					                   		$f[5]=$row['D6'];
					                   		$f[6]=$row['D7'];
					                   		$f[7]=$row['D8'];
					                   		$f[8]=$row['D9'];
					                   		$f[9]=$row['D10'];
					                   		$f1[0]=$row['状态1'];
					                   		$f1[1]=$row['状态2'];
					                   		$f1[2]=$row['状态3'];
					                   		$f1[3]=$row['状态4'];
					                   		$f1[4]=$row['状态5'];
					                   		$f1[5]=$row['状态6'];
					                   		$f1[6]=$row['状态7'];
					                   		$f1[7]=$row['状态8'];
					                   		$f1[8]=$row['状态9'];
					                   		$f1[9]=$row['状态10'];
					                   		
					                   }
	?>
				<td align="center" width="12%">截面尺<br>寸</td>
				<td align="center" width="12%">允许偏<br>差</td>
				<td colspan="2" align="center" width="16%">+10,-5</td>
				<?php
					if($f1[0]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[0];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[0];?></td>
						<?php
					}
					if($f1[1]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[1];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[1];?></td>
						<?php
					}
					if($f1[2]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[2];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[2];?></td>
						<?php
					}
					if($f1[3]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[3];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[3];?></td>
						<?php
					}
					if($f1[4]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[4];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[4];?></td>
						<?php
					}
					if($f1[5]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[5];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[5];?></td>
						<?php
					}
					if($f1[6]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[6];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[6];?></td>
						<?php
					}
					if($f1[7]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[7];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[7];?></td>
						<?php
					}
					if($f1[8]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[8];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[8];?></td>
						<?php
					}
					if($f1[9]==0){
						?>
						<td width="40" align="center"><u><?php echo $f[9];?></u></td>
						<?php
					}
					else{
						?>
						<td width="40" align="center"><?php echo $f[9];?></td>
						<?php
					}
					?>
			</tr>
		</table>
		<br /><br /><br /><br /><br /><br /><br /><br />
		<?php
		}
			?>
	</body>
</html>
