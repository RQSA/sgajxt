<?php error_reporting( E_ALL&~E_NOTICE );?>
<html>
	<head>
		<meta charset="UTF-8">
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
		<meta http-equiv=Content-Type  content="text/html; charset=UTF-8" ><meta name=ProgId  content=Word.Document ><meta name=Generator  content="Microsoft Word 14" ><meta name=Originator  content="Microsoft Word 14" ><title>饰面砖粘贴检验批质量验收记录表</title>
	</head>
	<body>
		
		<?php
           require("../../conn.php");
		    $sjc1=$_GET["sjc1"];
			$sjc = array();
			$sjc = explode(',', $sjc1);
			for($j=0;$j<count($sjc);$j++){
			$t=array();
			$i=0;
           $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='饰面砖粘贴'";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {    					
//					                   $jlblx1=$row["记录表类型"];
           $fegcmc=$row["分项工程名称"];
           $gcmc=$row["工程名称"];
           $t[$i]=$row['检查内容'];
		   $i++;
           }
	?>
		<h2 align="center" style="font-family: 宋体;font-size: 20.0000pt;">饰面砖粘贴检验批质量验收记录表</h2>
		
		<table border="2px" cellspacing="0px" align="center" width="600px" height="300px" style="font-size: 10.0000pt; font-family: '宋体'">
			<tr>
				<td	colspan="4" align="center" width="50%" style="font-size: 16.0000pt;">单位（子单位)工程名称</td>
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
				<th  rowspan="2" align="center"  width="8%">
			      			<p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
					        <span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:12.000pt;mso-font-kerning:0.0000pt;" >项
					        </span>
					        
				        </p>
				        <p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
				        	<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:12.000pt;mso-font-kerning:0.0000pt;" >次
				        	</span>
				        	
				        </p>
				<th  rowspan="2" align="center"  width="8%">
			      			<p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
			      				<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:12.0000pt;mso-font-kerning:0.0000pt;" >项目
		      			</span>
				<th colspan="2" align="center">
						<p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
			      			
			      			<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:12.000pt;mso-font-kerning:0.0000pt;" >允许偏差
			      			</span>
				<th colspan="10" rowspan="2" align="center">
			      			<p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
			      				<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:15.5000pt;mso-font-kerning:0.0000pt;" >实测值
			      			</span>
			<tr style="height:40.4000pt;width:26.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:none;;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;">
				<?php
		if($t[0]=='饰面砖粘贴-立面垂直度-外墙面砖' or $t[0]=='饰面砖粘贴-表面平整度-外墙面砖')
			{
				?>
				<td align="center" width="12%">外墙面砖<br><input type="checkbox" checked="checked"></td>
				<?php
			}
		else
			{
				?>
				<td align="center" width="12%">外墙面砖<br><input type="checkbox"></td>
				<?php
			}
		if($t[0]=='饰面砖粘贴-立面垂直度-内墙面砖' or $t[0]=='饰面砖粘贴-表面平整度-内墙面砖')
			{
				?>
				<td align="center" width="12%">内墙面砖<br><input type="checkbox" checked="checked"></td>
				<?php
			}
		else
			{
				?>
				<td align="center" width="12%">内墙面砖<br><input type="checkbox"></td>
				<?php
			}
				?>
			</tr>
			
			<tr>
				<?php
					                   $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='饰面砖粘贴' and (检查内容='饰面砖粘贴-立面垂直度-外墙面砖' or 检查内容='饰面砖粘贴-立面垂直度-内墙面砖')";		                   
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
				<td align="center" width="8%">1</td>
				<td align="center" width="8%">立面<br>垂直度</td>
				<td align="center" width="12%">3</td>
				<td align="center" width="12%">2</td>
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
					                   $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='饰面砖粘贴' and (检查内容='饰面砖粘贴-表面平整度-外墙面砖' or 检查内容='饰面砖粘贴-表面平整度-内墙面砖')";
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
				<td align="center" width="8%">2</td>
				<td align="center" width="8%">表面<br>平整度</td>
				<td align="center" width="12%">4</td>
				<td align="center" width="12%">3</td>
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
		</table>	
		<br /><br /><br /><br /><br /><br /><br /><br />
		<?php
			}
		?>
	</body>
</html>
