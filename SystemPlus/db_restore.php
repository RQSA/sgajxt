<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

//$filename = "test20101216923.sql";
//
//$host="localhost"; //主机名
//
//$user="root"; //MYSQL用户名
//
//$password="123456"; //密码
require("../conn.php");

//$dbname="test"; //在此指定您要恢复的数据库名，不存在则必须先创建,请自已修改数据库名
//$sqlFile=$_POST["sqlFile"];
$filename = "hxadmin1.sql";
//$host="localhost"; //主机名
//$user="root"; //MYSQL用户名
//$password="123456"; //密码
//$dbname="test"; //在此指定您要恢复的数据库名，不存在则必须先创建,请自已修改数据库名
mysql_connect($host,$user,$password);
mysql_select_db($dbname);
$mysql_file="data/".$filename; //指定要恢复的MySQL备份文件路径,请自已修改此路径
restore($mysql_file); //执行MySQL恢复命令
function restore($fname)
 {
  if (file_exists($fname)) {
   $sql_value="";
   $cg=0;
   $sb=0;
   $sqls=file($fname);
   foreach($sqls as $sql)
   {
    $sql_value.=$sql;
   }
   $a=explode(";\r\n", $sql_value);  //根据";\r\n"条件对数据库中分条执行
   $total=count($a)-1;
   mysql_query("set names 'utf8'");
   for ($i=0;$i<$total;$i++)
   {
    mysql_query("set names 'utf8'");
    //执行命令
    if(mysql_query($a[$i]))
    {
     $cg+=1;
    }
    else
    {
     $sb+=1;
     $sb_command[$sb]=$a[$i];
    }
   }
   echo "操作完毕，共处理 $total 条命令，成功 $cg 条，失败 $sb 条";
   //显示错误信息 
   if ($sb>0)
   {
    echo "


失败命令如下：
";
    for ($ii=1;$ii<=$sb;$ii++)
    {
     echo "
第 ".$ii." 条命令（内容如下）：
".$sb_command[$ii]."

";
    }
   }   //-----------------------------------------------------------
  }else{
   echo "MySQL备份文件不存在，请检查文件路径是否正确！";
  }
 }
?>