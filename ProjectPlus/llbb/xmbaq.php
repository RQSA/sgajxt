<?php error_reporting( E_ALL&~E_NOTICE );?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40"><head>
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
<meta http-equiv=Content-Type  content="text/html; charset=UTF-8" ><meta name=ProgId  content=Word.Document ><meta name=Generator  content="Microsoft Word 14" ><meta name=Originator  content="Microsoft Word 14" ><title>项目部安全检查及隐患整改记录表</title><!--[if gte mso 9]><xml><w:WordDocument><w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel><w:DisplayHorizontalDrawingGridEvery>0</w:DisplayHorizontalDrawingGridEvery><w:DisplayVerticalDrawingGridEvery>2</w:DisplayVerticalDrawingGridEvery><w:DocumentKind>DocumentNotSpecified</w:DocumentKind><w:DrawingGridVerticalSpacing>7.8 磅</w:DrawingGridVerticalSpacing><w:PunctuationKerning></w:PunctuationKerning><w:View>Web</w:View><w:Compatibility><w:DontGrowAutofit/><w:BalanceSingleByteDoubleByteWidth/><w:DoNotExpandShiftReturn/><w:UseFELayout/></w:Compatibility><w:Zoom>0</w:Zoom></w:WordDocument></xml><![endif]--><!--[if gte mso 9]><xml><w:LatentStyles DefLockedState="false"  DefUnhideWhenUsed="true"  DefSemiHidden="true"  DefQFormat="false"  DefPriority="99"  LatentStyleCount="260" >
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Normal" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="heading 1" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 2" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 3" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 4" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 5" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 6" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 7" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 8" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 9" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 7" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 8" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 9" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 1" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 2" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 3" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 4" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 5" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 6" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 7" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 8" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 9" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Normal Indent" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="footnote text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="annotation text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  UnhideWhenUsed="false"  Name="header" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="footer" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index heading" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="caption" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="table of figures" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="envelope address" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="envelope return" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="footnote reference" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="annotation reference" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="line number" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="page number" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="endnote reference" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="endnote text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="table of authorities" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="macro" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="toa heading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number 5" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Title" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Closing" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Signature" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  UnhideWhenUsed="false"  Name="Default Paragraph Font" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text Indent" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Message Header" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Subtitle" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Salutation" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Date" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text First Indent" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text First Indent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Note Heading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text Indent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text Indent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Block Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Hyperlink" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="FollowedHyperlink" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Strong" ></w:LsdException>
<w:LsdException Locked="true"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Emphasis" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Document Map" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Plain Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="E-mail Signature" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Normal (Web)" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Acronym" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Address" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Cite" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Code" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Definition" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Keyboard" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Preformatted" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Sample" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Typewriter" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Variable" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  QFormat="true"  Name="Normal Table" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="annotation subject" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="No List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Simple 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Simple 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Simple 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Classic 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Classic 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Classic 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Classic 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Colorful 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Colorful 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Colorful 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 7" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 8" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 7" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 8" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table 3D effects 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table 3D effects 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table 3D effects 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Contemporary" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Elegant" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Professional" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Subtle 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Subtle 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Web 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Web 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Web 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Balloon Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Table Grid" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Theme" ></w:LsdException>
<w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid" ></w:LsdException>
<w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid" ></w:LsdException>
<w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 6" ></w:LsdException>
</w:LatentStyles></xml><![endif]--><style>
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
font-size:10.5000pt;
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
</style></head><body style="tab-interval:21pt;text-justify-trim:punctuation;" ><!--StartFragment-->
	
<div class="Section0"  style="layout-grid:15.6000pt;padding-bottom: 3em;" ><p class=MsoNormal  align=center  style="text-align:center;" ><b><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-weight:bold;font-size:18.0000pt;mso-font-kerning:1.0000pt;" ><font face="仿宋_GB2312" >项目部安全检查及隐患整改记录表</font></span></b><b><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-weight:bold;font-size:18.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p>
<?php
           require("../../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
		   $table_two_waring="";
		    $table_two_ask="";
           $sql = "select * from 通知单 a,我的工程 b where a.时间戳='$sjc1' and a.工程id='$gcid1' and a.通知单编号='$tzdbh1' and a.工程id=b.id ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $Gcname=$row["工程名称"];
		   $fgsyj=$row["批复意见"];
		   $zgsyj=$row["总公司批复"];
		   $T=$row["所属公司"];
		   $n=strlen($Gcname);
		   if($n<60){
		   		echo '<p class=MsoNormal  align=left  style="text-align:lift;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;工程名称：'.$Gcname.'<span class=MsoNormal  align=left  style="text-align:lift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编号：'.$row["通知单编号"].'</span></P>'.'<p  class=MsoNormal  align=left  style="text-align:lift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;施工单位：'.$T.'</p>';
		   }
		   else{
		   	
		   	echo '<p class=MsoNormal  align=left  style="text-align:lift;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;工程名称：'.$Gcname.'</P>'.'<p  class=MsoNormal  align=left  style="text-align:lift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;施工单位：'.$T.'<span class=MsoNormal  align=left  style="text-align:lift;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编号：'.$row["通知单编号"].'</span></p>';
		   }
		?>

<table align="center" class=MsoTableGrid  style="border-collapse:collapse;width:492.7000pt;mso-table-layout-alt:fixed;mso-padding-alt:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;" ><tr style="height:27.7500pt;" ><td width=179 rowspan="3"  valign=center  style="width:50.4000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >检查人</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  align=center  style="text-align:center;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >员签名</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p></td>
  <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span class="MsoNormal" style="text-align:center;"><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" > 姓&nbsp;&nbsp;名</span><span style="font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" >
  <o:p></o:p>
</span></span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
           
		   echo $row["项目经理"];
		?>
      </span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
           
		   echo $row["生产经理"];
		?>
      </span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
           
		   echo $row["安全总监"];
		?>
      </span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
           
		   echo $row["安全员"];
		  
		?>
      </span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
          
		   echo $row["机械管理员"];
		?>
      </span></td>
      </tr>
    <tr style="height:27.7500pt;" >
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span class="MsoNormal" style="text-align:center;"><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" >部&nbsp;&nbsp;门</span><span style="font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" >
        <o:p></o:p>
      </span></span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
           
		   echo $row["检查单位"];
		?>
      </span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
           
		   echo $row["检查单位"];
		?>
      </span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
           
		   echo $row["检查单位"];
		?>
      </span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
        <?php
           
		   echo $row["检查单位"];
		  
		?>
      </span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><font face="宋体" >
        <?php
          
		   echo $row["检查单位"];
			}
			$conn->close();
														
		?>
      </font></td>
    </tr>
    <tr style="height:27.7500pt;" >
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span class="MsoNormal" style="text-align:center;"><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" >职务（职称）</span><span style="font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" >
        <o:p></o:p>
      </span></span></td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" >项目经理</td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" >生产经理</td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" >安全总监</td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" >安全员</td>
      <td align="center"  valign=center  style="width:72.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" >机械管理员</td>
    </tr>
  <tr><td  colspan=9 align="left"  valign=top  style="width:492.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  style="text-align:left;line-height:18.0000pt;mso-line-height-rule:exactly;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >检查情况及存在的隐患：</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p>
      <p class=MsoNormal1  align=center  style="text-align:left;padding-left:2em;" >
        <o:p><span id="chufa" style="text-align: left ;font-size:11pt; ">
          <?php
            require("../../conn.php");
		    $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
		   $text="";
		   $part="";
           $sql = "select * from 处罚条目 where 时间戳='".$sjc1."' and 工程id='".$gcid1."' and 通知单编号='".$tzdbh1."'";
           $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
        	$text=$row["内容"];
        	$part=$row["对象"];
        }
        	
//         $sql="SELECT a.工程id,a.内容,b.违章部位 FROM 处罚条目  a,预览数据表  b WHERE a.工程id=b.工程id AND a.通知单编号=b.通知单编号 AND a.通知单编号='".$tzdbh1."' AND a.工程id='$gcid1'";
			$sql="select * from 预览数据表 where 通知单时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1'";
           $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 		
	  		//      	表二数据↓
        	$table_two_waring.=$row["违章现象"]."|*|";
        	$table_two_ask.=$row["项目部回复"]."|*|";
//      	表二数据↑ 	
}
			$c=explode("||",$text);
			$p=explode("||",$part);
			$d=count($c)-1;
			for($i=0;$i<$d;$i++){
				$nee=(strlen($c[$i])+mb_strlen($c[$i],"UTF8"))/2;
				$nee2=(strlen($par[$i])+mb_strlen($par[$i],"UTF8"))/2;
				$zd=$nee+$nee2+12;
				$Nee=intval($zd/92);
				$Mee=$zd%92;
				if($Mee!=0){
					$sq=$Nee+1;
				}else if($Mee==0){
					$sq=$Nee;
				}
				$sume=$sume+$sq;
				
			}
//echo $sume.'||';
			if($part!==""){
				$part=explode("||",$part);
			}
			else{
				for($add=0;$add<$d;$add++){
				  $part.=$part."|*|";
				}
				$part=explode("|*|",$part);
			}
			if($sume<14){
			for($b=0;$b<$d;$b++){
					$e=$b+1;
					echo $e.".".$c[$b]."。(部位：".$part[$b].")</br>";
				}
			
			 $y=17-$sume;
            	for($z=0;$z<$y;$z++){
            		echo '<p class=MsoNormal  align=center  style="text-align:center;margin:0px;" >&nbsp;</p>';
            }
		 
			}
			else {
				for($b=0;$b<$d;$b++){
					$e=$b+1;
					echo '<p class=MsoNormal  style="text-align:left;" ><span style="font-size:9pt;text-align: left ; ">'.$e.".".$c[$b]."。(部位：".$part[$b].")</span></p>";
				}
			
		 	$y=20-$sume;
            	for($z=0;$z<$y;$z++){
            		echo '<p class=MsoNormal  align=center  style="text-align:center;margin:0px;" >&nbsp;</p>';
		 }
			
			}
		$conn->close();
		?>
				<?php
		    if($sume>22){
		    	echo "<script>alert('数据过多！！！')</script>";
		    }
//echo $sume;
//echo "...";
//echo $d;
														
		?>										
		
        </span></o:p>
        <span style="text-align: left">
          <o:p> </o:p>
          <o:p></o:p>
        </span></p>
      <p class=MsoNormal1  align=center  style="text-align:left;padding-left:2em;" ></p>
      <p class=MsoNormal  style="text-align:left;line-height:18.0000pt;mso-line-height-rule:exactly;; font-family: &quot;仿宋_GB2312&quot;; font-size: 10.5000pt" >&nbsp;</p></td></tr><tr><td  colspan=9 align="left"  valign=top  style="width:492.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  style="text-align:left;line-height:18.0000pt;mso-line-height-rule:exactly;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >整改要求：</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  align=center  style="text-indent:15.7500pt;mso-char-indent-count:1.5000;text-align:left;line-height:18.0000pt;mso-line-height-rule:exactly;" ><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p><span style="text-align: left">
      <?php
           require("../../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 预览数据表 where 通知单时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           $huifuNeirong="";
           while($row = $result->fetch_assoc()) { 
//			echo str_replace("||","。</br>",$row["内容"]);
            //echo $row["项目部回复"];
            $huifuNeirong.=$row["项目部回复"]."//";
           }
           $huifuNeirongArray=explode("//",$huifuNeirong);
		   $sl=count($huifuNeirongArray)-1;
		   if($sl<6){
           for($i=0;$i<count($huifuNeirongArray)-1;$i++){
           	  echo ($i+1).".".$huifuNeirongArray[$i]."&nbsp;&nbsp;&nbsp;";
           }
		   }else{
		   	for($i=0;$i<count($huifuNeirongArray)-1;$i++){
//         	  echo ($i+1).".".$huifuNeirongArray[$i].$sl."&nbsp;&nbsp;&nbsp;";
				echo '<span style="font-size:9pt;text-align: left ; ">'.($i+1).".".$huifuNeirongArray[$i]."&nbsp;&nbsp;&nbsp;"."</span>";
		   }}
			$conn->close();
														
		?>
      </span></o:p></span></p>
          <p class=MsoNormal  align=center  style="text-indent:15.7500pt;mso-char-indent-count:1.5000;text-alignleft;line-height:18.0000pt;mso-line-height-rule:exactly;" >&nbsp;</p>
          <p class=MsoNormal  align=center  style="text-indent:15.7500pt;mso-char-indent-count:1.5000;line-height:18.0000pt;mso-line-height-rule:exactly;text-align: right;" >             <span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
            <?php
           require("../../conn.php");
		  $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $a = explode(" ",$row["整改期限"]);
		   $b = explode("-",$a[0]);
		   echo $b[0];
		?>
年
<?php
           
		   echo $b[1];
		?>
月<font face="宋体" >
<?php
           
		   echo $b[2];
			}
			$conn->close();
														
		?>
</font>日</span>前完成整改</p></td></tr><tr style="height:35.5000pt;" ><td  valign=center  colspan=2  style="width:70.3500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >整改期限</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p></td><td  valign=center  colspan=2  style="width:169.0500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
          <?php
           require("../../conn.php");
		  $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $A = explode(" ",$row["整改期限"]);
		   echo $A[0];
		?>
          </span>&nbsp;</o:p></span></p></td><td  valign=center  colspan=2  style="width:126.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >整改班组（部门）</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p></td><td  colspan=2  valign=center  style="width:127.3000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
          <?php
           
		   //echo $row["检查单位"];
		?>
          </span>&nbsp;</o:p></span></p></td></tr><tr style="height:30.9000pt;" ><td  valign=center  colspan=2  style="width:70.3500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >整改责任人</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p></td><td  valign=center  colspan=2  style="width:169.0500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;">
          <?php
           
		   echo $row["责任人"];
		?>
          </span>&nbsp;</o:p></span></p></td><td  valign=center  colspan=2  style="width:126.0000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >安全员</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p></td><td  valign=center  colspan=2  style="width:127.3000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p><font face="宋体" >
          <?php
           
		   echo $row["安全员"];
			}
			$conn->close();
														
		?>
          </font>&nbsp;</o:p></span></p></td></tr><tr style="height:93.8000pt;" ><td  valign=center  colspan=2  style="width:70.3500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><p class=MsoNormal  align=center  style="text-align:center;" ><span style="mso-spacerun:'yes';font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" >复查意见</span><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p></td><td  colspan=7 align="left"  valign=center  style="width:422.3500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:none;;mso-border-left-alt:none;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;border-top:none;;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;" ><span style="font-family:仿宋_GB2312;mso-hansi-font-family:'Times New Roman';mso-bidi-font-family:'Times New Roman';font-size:10.5000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span>          
              <p class=MsoNormal2  align=center  style="text-align:left;padding-left:2em" ><p class=MsoNormal  align=center  style="text-align:center;" >&nbsp;</p><span style="font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:12.0000pt;mso-font-kerning:1.0000pt;" >
                <?php
           require("../../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
//			echo str_replace("||","。</br>",$row["内容"]);
            echo $row["批复意见"];
            for($z=0;$z<4;$z++){
            	echo '<p class=MsoNormal  align=center  style="text-align:center;" >&nbsp;</p>';
            }
		}
		$conn->close();
														
		?>
              <o:p>&nbsp;</o:p>
            </span></p>
            <p class=MsoNormal2  align=center  style="text-align:center;" ><span style="font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" >
                <o:p></o:p>
              </span></p>
<p class=MsoNormal2  align=center  style="text-align:left;padding-left:10em;"  >&nbsp;</p>
              <p class=MsoNormal2  align=center  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" >复查人（签名）：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;复查日期：
                <?php
           require("../../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $b = explode("-",$row["批复日期"]);
		   $c = count($b);
		   if($c<3){
		   	$b=array(" "," "," ");
		   }
//		   echo $b[0];
		?>
                &nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;
  <?php
           
//		   echo $b[1];
		?>
                &nbsp;&nbsp;月<font face="宋体" > </font>&nbsp;&nbsp;
  <?php
           
//		   echo $b[2];
			}
			$conn->close();
														
		?>
  &nbsp;&nbsp;日</span><span style="font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" >
  <o:p></o:p>
</span></p></td></tr></table><p class=MsoNormal  align=center  style="text-align:center;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >注：本表一式二份，项目部、受检班组（部门）各一份</font></span><span style="mso-spacerun:'yes';font-family:宋体;mso-bidi-font-family:'Times New Roman';font-size:10.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p></div>


              
<!--EndFragment-->

<div class="Section0" style="padding-top:50px;" >
<?php
           require("../../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 图片附件 a ,处罚条目 b  where a.时间戳='$sjc1' and a.工程id='$gcid1' and a.通知单编号='$tzdbh1' and a.时间戳=b.时间戳 and a.工程id=b.工程id and a.通知单编号=b.通知单编号 " ;
            
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $hello = explode("~*^*~",$row["草稿附件"]);
		   $hello1 = explode("~*^*~",$row["回复附件"]);
		    if($hello1[0]==""){
		   	$numbhello=count($hello);
		   
		   	$hello1="";
		   	for($i=0;$i<$numbhello;$i++){
		   		$hello1.="add.jpg~*^*~";
		   		if($i==$numbhello-1){
		   		 $hello1 = explode("~*^*~",$hello1);
		   		}
		   	}
		   }
		   $hello2=explode("||",$row["内容"]);
//          echo $row["项目部回复"];
//			$huifuNeirong.=$row["项目部回复"]."//";
//         $huifuNeirongArray=explode("//",$huifuNeirong);
			
			}
			for($index=0;$index<count($hello)-1;$index++) 
			{
				 if($index==0||$index%3==0){
			 ?>
			    <div style="align-content: center;"><p style="font-size: 18pt; text-align: center;font-weight: bold;">安全隐患图片</p></div>
	    <?php	
			    } 
		?>
		
<div class="row"  style="text-align:center;padding-bottom: 60px;" >
	<div class="col-xs-6 col-md-6" style="text-align:right;position: relative;">		
		<img src="../../sgajxtcs/upload/<?php echo $hello[$index];?>"  alt="草稿<?php echo $index;?>" style="width:275px;height:248px;"/>
				<div style="position: absolute;width:275px;height:50px;bottom: -50px;right: 15px;word-break:break-all;font-size:8.0000pt;">
			<div style="text-align:left;border:1px solid #000;height: 100%;overflow: hidden;text-overflow:ellipsis;
				margin: auto;width: 100%;padding: 10px;" >
				<?php echo $hello2[$index]; ?>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-6" style="text-align:left;position: relative;">
		<img src="../../sgajxtcs/upload/<?php echo $hello1[$index];?>" alt="回复<?php echo $index;?>" style="width:275px;height:248px;"/> 
		 <div style="position: absolute;width:275px;height:50px;bottom: -50px;left: 15px;word-break:break-all;font-size:8.0000pt;">
			<!--<input style="width: 100%;" type="text"  readonly="readonly" value="<?php echo $huifuNeirongArray[$index]; ?>"  />-->
			<div style="text-align:left;border:1px solid #000;height: 100%;overflow: hidden;text-overflow:ellipsis;
				margin: auto;width: 100%;padding: 10px;" >
				<?php echo $huifuNeirongArray[$index]; ?>
			</div>
		</div>
	</div>
</div>
<?php
//	echo $index;
	if(($index+1)%3==0){
		echo '<br><br><br><br>';
					}
	 }
			$conn->close();
														
		?>
<!--<div style="margin-left: 50;">
						<input id="button" type="button" style="height:40 ;width:100;" value="点击打印预览" onClick="preview()">
							
						</div>-->
</div>
	<!--<div style="margin-left: 50;">
						
	<a class="word-export hidden-print" href="javascript:void(0)"><button type="button" style="height:40 ;width:100;">导出word</button> </a></div>-->
	<script src="../../js/jquery-1.10.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../../js/FileSaver.js" type="text/javascript" charset="utf-8"></script>
	<script src="../../js/jquery.wordexport.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
	 jQuery(document).ready(function($) {
	   $("a.word-export").click(function(event) {
		$("#page-content").wordExport();
		});
		});
		</script>	
	
	</script>
</body></html>