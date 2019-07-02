<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">

<!-- saved from url=(0064)http://www.17sucai.com/preview/137615/2015-01-15/demo/index.html -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><HTML 

xmlns="http://www.w3.org/1999/xhtml"><HEAD><META content="IE=11.0000" 

http-equiv="X-UA-Compatible">

 

<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<TITLE>登录页面</TITLE> 

<SCRIPT src="../js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
   
    
 

<STYLE>
body{
	background: #039936;
	font-family: "Helvetica Neue","Hiragino Sans GB","Microsoft YaHei","\9ED1\4F53",Arial,sans-serif;
	color: #222;
	font-size: 12px;
}
*{padding: 0px;margin: 0px;}
.top_div{
	background: #039936;
	width: 100%;
	height: 400px;
}
.ipt{
	border: 1px solid #039936;
	padding: 10px 10px;
	width: 290px;
	border-radius: 4px;
	padding-left: 35px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s
}
.ipt:focus{
	border-color: #66afe9;
	outline: 0;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}
.u_logo{
	background: url("../img/username.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 43px;
	left: 40px;

}
.p_logo{
	background: url("../img/password.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 12px;
	left: 40px;
}
a:link{color: #080808;
		font-size: 20px;
		font-style: italic;
		font-family: "宋体";
}
a:visited{color: #000099;}
/*a:link {
	font-family:宋体;    <!--字体-->  
    font-size:36px;      <!--字体大小-->  
    color:#000000;      <!--字体颜色-->  
	text-decoration:underline;    <!--字体下划线等;underline:下划线，overline上划线，linethrough:线在中间-->  
	cursor:pointer;     <!--鼠标在字上时显示小手-->  }      /* 未访问链接*/
/*a:visited {color:#00FF00;}  /* 已访问链接 */
/*a:hover {color:#000000;}   鼠标移动到链接上*/ 
/*a:active {color:#0000FF;}   鼠标点击时 */

</STYLE>

     

<SCRIPT type="text/javascript">
$(function(){
	//得到焦点
	$("#password").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#password").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});
});
</SCRIPT>

 

<META name="GENERATOR" content="MSHTML 11.00.9600.17496"></HEAD> 

<BODY>

	<DIV class="top_div"><img   style="margin: 40px 35px 20px 650px;font-size:50px;" src="../img/huaxi.png" > <img   style="margin: 0px 35px 20px 380px;font-size:50px;" src="../img/huaxi5.png" ><img   style="margin: 310px 35px 20px 530px;font-size:50px;"    src="../img/huaxi3.png" ></DIV>
	

		<DIV style="background: rgb(255, 255, 255); margin: -100px 35px 20px 500px; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; height: 200px; text-align: center;">
			
			<DIV style="width: 165px; height: 96px; position: absolute;">

				<DIV class="tou"></DIV>

				<DIV class="initial_left_hand" id="left_hand"></DIV>

					<DIV class="initial_right_hand" id="right_hand"></DIV></DIV>
					<form id="aqxcform" name="aqxcform" method="post" class="form-horizontal" role="form" action="loginyz.php">
					<P style="padding: 30px 0px 10px; position: relative;"><SPAN class="u_logo"></SPAN>         
						<INPUT class="ipt" id="username" name="username" type="text" placeholder="请输入用户名或邮箱" value=""> 
					</P>

					<P style="position: relative;"><SPAN class="p_logo"></SPAN>         

						<INPUT class="ipt" id="password" name="password" type="password" placeholder="请输入密码" value="">   
					
					</P>

					<DIV style="height: 50px; line-height: 50px; margin-top: 30px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">

					<P style="margin: 0px 35px 20px 45px;">
						<SPAN style="float: left;"><A style="color: rgb(204, 204, 204);" href="#"><!--忘记密码?--></A></SPAN> 

           <SPAN style="float: right;"><A style="color: rgb(204, 204, 204); margin-right: 10px;" 

href="#"><!--注册--></A>  
				
              <button class="btn btn-primary" id="save10">登录</button>
         <!--     <input type="submit" id="save10"  class="btn btn-primary" name="save10" value="登录">-->

           </SPAN>         </P></DIV>
		</form>
		</DIV>

		   <div style="text-align:center;">

<a  href="hxajxtapp/操作手册.docx" class="link" download="操作手册">点击下载操作手册</a>

</div>
	   <script type="text/javascript">
				$("#save10").click(function(){ 
					$.ajax({
		                cache: true,
		                type: "POST",
		                url:'loginyz.php',
		                data:$('#aqxcform').serialize(),// 你的formid
		                async: false,
		                error: function(request) {
		                    alert("Connection error");
		                },
		                success: function(data) {
//		                    alert("123");
		                }
		            });
				});  
	    </script>
</BODY></HTML>


