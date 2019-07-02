<?php error_reporting( E_ALL&~E_NOTICE );?>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			@font-face{
			font-family:"Times New Roman";
			}

			@font-face{
			font-family:"宋体";
			}

			@font-face{
			font-family:"Calibri";
			}

			@font-face{
			font-family:"Wingdings";
			}

			@font-face{
			font-family:"Arial";
			}
			p.MsoNormal{
			mso-style-name:正文;
			mso-style-parent:"";
			margin:0pt;
			margin-bottom:.0001pt;
			mso-pagination:none;
			text-align:justify;
			text-justify:inter-ideograph;
			font-family:Calibri;
			mso-fareast-font-family:宋体;
			mso-bidi-font-family:'Times New Roman';
			font-size:15.5000pt;
			mso-font-kerning:1.0000pt;
			}
			
			span.10{
			font-family:Calibri;
			}
			
			span.15{
			font-family:Calibri;
			font-size:9.0000pt;
			}
			
			span.16{
			font-family:Calibri;
			font-size:9.0000pt;
			}
			
			p.MsoHeader{
			mso-style-name:页眉;
			mso-style-noshow:yes;
			margin:0pt;
			margin-bottom:.0001pt;
			border-bottom:1.0000pt solid windowtext;
			mso-border-bottom-alt:0.7500pt solid windowtext;
			padding:0pt 0pt 1pt 0pt ;
			layout-grid-mode:char;
			mso-pagination:none;
			text-align:center;
			font-family:Calibri;
			mso-fareast-font-family:宋体;
			mso-bidi-font-family:'Times New Roman';
			font-size:9.0000pt;
			mso-font-kerning:1.0000pt;
			}
			
			p.MsoFooter{
			mso-style-name:页脚;
			mso-style-noshow:yes;
			margin:0pt;
			margin-bottom:.0001pt;
			layout-grid-mode:char;
			mso-pagination:none;
			text-align:left;
			font-family:Calibri;
			mso-fareast-font-family:宋体;
			mso-bidi-font-family:'Times New Roman';
			font-size:9.0000pt;
			mso-font-kerning:1.0000pt;
			}
			
			p.19{
			mso-style-name:"List Paragraph";
			margin:0pt;
			margin-bottom:.0001pt;
			text-indent:21.0000pt;
			mso-char-indent-count:2.0000;
			mso-pagination:none;
			text-align:justify;
			text-justify:inter-ideograph;
			font-family:Calibri;
			mso-fareast-font-family:宋体;
			mso-bidi-font-family:'Times New Roman';
			font-size:10.5000pt;
			mso-font-kerning:1.0000pt;
			}
			
			span.msoIns{
			mso-style-type:export-only;
			mso-style-name:"";
			text-decoration:underline;
			text-underline:single;
			color:blue;
			}
			
			span.msoDel{
			mso-style-type:export-only;
			mso-style-name:"";
			text-decoration:line-through;
			color:red;
			}
			
			table.MsoNormalTable{
			mso-style-name:普通表格;
			mso-style-parent:"";
			mso-style-noshow:yes;
			mso-tstyle-rowband-size:0;
			mso-tstyle-colband-size:0;
			mso-padding-alt:0.0000pt 5.4000pt 0.0000pt 5.4000pt;
			mso-para-margin:0pt;
			mso-para-margin-bottom:.0001pt;
			mso-pagination:widow-orphan;
			font-family:'Times New Roman';
			font-size:10.0000pt;
			mso-ansi-language:#0400;
			mso-fareast-language:#0400;
			mso-bidi-language:#0400;
			}
			
			table.MsoTableGrid{
			mso-style-name:网格型;
			mso-tstyle-rowband-size:0;
			mso-tstyle-colband-size:0;
			mso-padding-alt:0.0000pt 5.4000pt 0.0000pt 5.4000pt;
			mso-border-top-alt:0.5000pt solid windowtext;
			mso-border-left-alt:0.5000pt solid windowtext;
			mso-border-bottom-alt:0.5000pt solid windowtext;
			mso-border-right-alt:0.5000pt solid windowtext;
			mso-border-insideh:0.5000pt solid windowtext;
			mso-border-insidev:0.5000pt solid windowtext;
			mso-para-margin:0pt;
			mso-para-margin-bottom:.0001pt;
			mso-pagination:widow-orphan;
			font-family:'Times New Roman';
			font-size:10.0000pt;
			mso-ansi-language:#0400;
			mso-fareast-language:#0400;
			mso-bidi-language:#0400;
			}
			@page{mso-page-border-surround-header:no;
				mso-page-border-surround-footer:no;}@page Section0{
			margin-top:72.0000pt;
			margin-bottom:72.0000pt;
			margin-left:90.0000pt;
			margin-right:90.0000pt;
			size:595.3000pt 841.9000pt;
			layout-grid:15.6000pt;
			}
			
			div.Section0{page:Section0;}
		</style>
	</head>
	<body style="tab-interval:36pt;">
	<?php
       require("../../conn.php");
	    $sjc1=$_GET["sjc1"];
		$sjc = array();
		$sjc = explode(',', $sjc1);
		for($j=0;$j<count($sjc);$j++){
		$t=array();
		$i=0;
       $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='填充墙砌体工程' order by id";
       $result = $conn->query($sql);
       while($row = $result->fetch_assoc()) {    					
       $jlblx1=$row["记录表类型"];
       $fegcmc=$row["分项工程名称"];
       $gcmc=$row["工程名称"];
       $t[$i]=$row['检查内容'];
	   $i++;
       }
	?>
		<br />
		<br />
		<div class="Section0" style="layout-grid:18.0000pt;">
			<p class="MsoNormal" align="center" style="text-align:center;line-height:18.0000pt;mso-line-height-rule:exactly;">
				<b>
					<span style="mso-spacerun:'yes';font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-weight:bold;font-size:16.0000pt;mso-font-kerning:0.0000pt;">
						<font face="微软雅黑" >填充墙砌体工程检验批质量验收记录表</font>
					</span>
				</b>
				<b>
					<span style="mso-spacerun:'yes';font-family:Tahoma;mso-fareast-font-family:微软雅黑;mso-bidi-font-family:'Times New Roman';font-weight:bold;font-size:16.0000pt;mso-font-kerning:0.0000pt;">
					</span>
				</b>
			</p>
			<table  class="MsoNormalTable" align="center" border="1px" cellspacing="0px" style="border-collapse:collapse;width:498.1000pt;mso-table-layout-alt:fixed;mso-padding-alt:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;">
				<br />
				<tr style="height:70.4000pt;width:26.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:none;;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;">
					<th colspan="4">单位（子单位）工程名称</th>
					<td colspan="10" align="center">
						<?php echo $gcmc; ?>
					</td>
				</tr>
				<tr style="height:50.4000pt;width:26.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:none;;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;">
					<th colspan="4">分项工程名称</th>
					<td colspan="10" align="center">
						<?php echo $fegcmc; ?>
					</td>
				</tr>
				<tr style="height:40.4000pt;width:26.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:none;;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;">
					<th  width="35" align="center" valign="middle" rowspan="3" style="width:26.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:none;;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;">
						
						<p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
			      			
			      			<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:0.0000pt;" >一
			      			</span>
			      			
			      		</p>
				        <p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
				        	<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:0.0000pt;" >般
				       		</span>
						    
				        </p>
				        <p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
					        <span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:0.0000pt;" >项
					        </span>
					        
				        </p>
				        <p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
				        	<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:0.0000pt;" >目
				        	</span>
				        	
				        </p>
					</th>
					<th rowspan="2" align="center">
						<p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
			      			
			      			<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:0.0000pt;" >墙面垂直度
			      			</span>
			      		</p>
			      		<?php
						if($t[0]=='填充墙砌体-墙面垂直度≤3m、≤5mm')
						{
							?>
							<td><input type="checkbox" checked="checked">≤3m</td><td>≤5mm</td>
								<?php
						}
						else
						{
							?>
							<td><input type="checkbox">≤3m</td><td>≤5mm</td>
								<?php
						}
						?>
			      		
			      		
					</th>
					
					<?php
					                   $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='填充墙砌体工程' and 检查内容='填充墙砌体-墙面垂直度≤3m、≤5mm'";				                   									   
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
					                   		$t1=$row['检查内容'];
					                   }
	?>
					
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
				<?php
					                   $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='填充墙砌体工程' and 检查内容='填充墙砌体-墙面垂直度>3m、≤10mm'";
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
					                   		$t2=$row['检查内容'];
					                   }
	?>
				<tr style="height:40.4000pt;width:26.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:none;;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;">
				<?php
						if($t[0]=='填充墙砌体-墙面垂直度>3m、≤10mm')
						{
							?>
							<td><input type="checkbox" checked="checked">3m</td><td>≤10mm</td>
								<?php
						}
						else
						{
							?>
							<td><input type="checkbox">3m</td><td>≤10mm</td>
								<?php
						}
						?>
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
				<tr style="height:40.4000pt;width:26.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:none;;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;">
				
				<th align="center">
					<p class=MsoNormal  align=center  style="margin-bottom:0.0000pt;text-align:center;" >
		      			
		      			<span style="font-family:微软雅黑;mso-ascii-font-family:Tahoma;mso-hansi-font-family:Tahoma;mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:0.0000pt;" >表面平整度
		      			</span>
		      		</p>
				</th>
				<?php
					                   $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='填充墙砌体工程' and 检查内容='填充墙砌体-表面平整度'";
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
				<td colspan="2" align="center">≤ 8 mm</td>
				
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
		</div>
		<br /><br /><br /><br /><br /><br />
		<?php
		}
			?>
	</body>
</html>
