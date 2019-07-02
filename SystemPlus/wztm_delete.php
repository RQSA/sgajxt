<?php
require("../conn.php");
$flage=$_POST["flage"];
$id=$_POST["id"];
$wzzt=$_POST["wzzt"];

if($flage=="a"){
$sql="DELETE FROM `违章数据库` WHERE 违章状态='安全' and id='".$id."' and 状态='1'";
if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}else if($flage=="z"){
$sql="DELETE FROM `违章数据库` WHERE 违章状态='质量' and id='".$id."' and 状态='1'";
if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}else if($flage=="all"){
$sql="DELETE FROM `违章数据库` WHERE 违章状态='".$wzzt."' and 状态='1'";
if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();	
?>