<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>报名表测试</title>
<style>
@font-face {
font-family:"Times New Roman";
}
@font-face {
font-family:"&#23435;&#20307;";
}
@font-face {
font-family:"Arial";
}
table{border-collapse:collapse;border-color:#000;}
td{ border-color:#000; padding:10px 5px; vertical-align:middle;}
h1{ text-align:center}
h3{ text-align:right;}
</style>
<!--[if gte mso 9]><xml><w:WordDocument><w:View>Print</w:View><w:TrackMoves>false</w:TrackMoves><w:TrackFormatting/><w:ValidateAgainstSchemas/><w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid><w:IgnoreMixedContent>false</w:IgnoreMixedContent><w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText><w:DoNotPromoteQF/><w:LidThemeOther>EN-US</w:LidThemeOther><w:LidThemeAsian>ZH-CN</w:LidThemeAsian><w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript><w:Compatibility><w:BreakWrappedTables/><w:SnapToGridInCell/><w:WrapTextWithPunct/><w:UseAsianBreakRules/><w:DontGrowAutofit/><w:SplitPgBreakAndParaMark/><w:DontVertAlignCellWithSp/><w:DontBreakConstrainedForcedTables/><w:DontVertAlignInTxbx/><w:Word11KerningPairs/><w:CachedColBalance/><w:UseFELayout/></w:Compatibility><w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel><m:mathPr><m:mathFont m:val="Cambria Math"/><m:brkBin m:val="before"/><m:brkBinSub m:val="--"/><m:smallFrac m:val="off"/><m:dispDef/><m:lMargin m:val="0"/> <m:rMargin m:val="0"/><m:defJc m:val="centerGroup"/><m:wrapIndent m:val="1440"/><m:intLim m:val="subSup"/><m:naryLim m:val="undOvr"/></m:mathPr></w:WordDocument></xml><![endif]-->
</head>
<body>
<h1>报名表测试</h1>
<h3>编号：{$number}</h3>
<table border="1" cellpadding="3" cellspacing="0" >
<tr >
<td width="93" valign="center" colspan="2" >姓名</td>
<td width="160" valign="center" colspan="4" >{$username}</td>
<td width="89" valign="center" colspan="2" >报考专业</td>
<td width="156" valign="center" colspan="3" >{$Zhiyuan[$zyid]['name']}</td>
<td width="125" colspan="2" rowspan="4" align="center" valign="middle" ><img src="{$Config.siteurl}upload/bm_avatar/{$id}/180x180.jpg" width="120" height="120" /></td>
</tr>
<tr >
<td width="93" valign="center" colspan="2" >性别</td>
<td width="72" valign="center" colspan="2" >{:Sex($sex)}</td>
<td width="88" valign="center" colspan="2" >出生年月</td>
<td width="89" valign="center" colspan="2" >{$birthday}</td>
<td width="68" valign="center" >民族</td>
<td width="87" valign="center" colspan="2" >{$ethnic}</td>
</tr>
<tr >
<td width="93" valign="center" colspan="2" >身高</td>
<td width="72" valign="center" colspan="2" >{$height}</td>
<td width="88" valign="center" colspan="2" >体重</td>
<td width="89" valign="center" colspan="2" >{$weight}</td>
<td width="68" valign="center" >视力</td>
<td width="87" valign="center" colspan="2" >{$vision}</td>
</tr>
<tr >
<td width="93" valign="center" colspan="2" >手机</td>
<td width="160" valign="center" colspan="4" >{$mobile}</td>
<td width="89" valign="center" colspan="2" >固定电话</td>
<td width="156" valign="center" colspan="3" >{$tel}</td>
</tr>
<tr >
<td width="93" valign="center" colspan="2"  style="width:93px;">家庭住址</td>
<td width="530" valign="center" colspan="11" >{$address}</td>
</tr>
<tr >
<td width="53" valign="center" rowspan="2" >毕业学校</td>
<td width="570" valign="center" colspan="12" ><strong>小学：</strong>{$xschool}</td>
</tr>
<tr >
<td width="570" valign="center" colspan="12" ><strong>中学：</strong>{$zschool}</td>
</tr>
<tr >
<td width="53" valign="center" rowspan="3" >父母或监护人情况</td>
<td width="81" valign="center" colspan="2" >姓&nbsp;&nbsp;名</td>
<td width="52" valign="center" colspan="2" >籍贯</td>
<td width="104" valign="center" colspan="2" >身高</td>
<td width="127" valign="center" colspan="3" >工作单位</td>
<td width="90" valign="center" colspan="2" >学历</td>
<td width="114" valign="center" >电&nbsp;&nbsp;话</td>
</tr>
<tr >
<td width="81" valign="center" colspan="2" >{$father[0]}</td>
<td width="52" valign="center" colspan="2" >{$father[5]}</td>
<td width="104" valign="center" colspan="2" >{$father[1]}</td>
<td width="127" valign="center" colspan="3" >{$father[3]}</td>
<td width="90" valign="center" colspan="2" >{$father[2]}</td>
<td width="114" valign="center" >{$father[4]}</td>
</tr>
<tr >
<td width="81" valign="center" colspan="2" >{$mother[0]}</td>
<td width="52" valign="center" colspan="2" >{$mother[5]}</td>
<td width="104" valign="center" colspan="2" >{$mother[1]}</td>
<td width="127" valign="center" colspan="3" >{$mother[3]}</td>
<td width="90" valign="center" colspan="2" >{$mother[2]}</td>
<td width="114" valign="center" >{$mother[4]}</td>
</tr>
<tr >
<td width="53" valign="center" >学习培训简历</td>
<td width="570" valign="center" colspan="12" >{$training}</td>
</tr>
<tr >
<td width="53" valign="center" >专项&nbsp;成绩&nbsp;获奖&nbsp;情况</td>
<td width="570" valign="center" colspan="12" >{$training}</td>
</tr>
</table>
</body>
</html>