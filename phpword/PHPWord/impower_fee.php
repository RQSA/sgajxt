<?php
require_once 'PHPWord.php';

$text = '恭喜您申请的专利已经通过了国家知识产权局的审查。在收到本通知后，请在回复绝限前缴纳下表所列的专利申请的专利登记费、专利证书印花税、年费，在您缴纳上述费用后，国家知识产权局将在2-3个月内颁发专利证书，并在国家知识产权局的网站上予以公告。根据专利法的规定，未按规定缴纳上述费用的，视为放弃取得专利的权利，专利权终止后不再办理专利权恢复手续，如果放弃下表所列的专利或部分专利，请您在通知书上写明“放弃”字样并签名或加盖公章，在回复绝限前寄回或传真回我司，我司将相应的专利结案。在此非常感谢您配合和支持我们的工作。';
 /*$str = array(
'珠海格兰新材料科技有限公司',
'2017年6月23日',
'2017年7月15日',
'款胡','0258-9652154','12563254257',
'光八戒','0125-6325142','12563254251',
'广发银行中山彩虹支行',
'中山市中亿星诚知识产权服务有限公司',
'9550 8802 0597 3200 158'
);
//表格数据
$data = array();
$data[0] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[1] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[2] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[3] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[4] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[5] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[6] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[7] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[8] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
$data[9] = array('2016214399863','一种环保防水板材','2016-12-27','205','90','100','395');
*/
$str_get = $_POST['xtid'];
$str2 = $_POST['xtmc'];

$str = explode(",", $str_get);
$arr_str2 = explode(",", $str2);
//print_r($str);

$arr_length = count($arr_str2);
for($i=0;$i<($arr_length-1)/8;$i++){
	$data[$i][0] = $arr_str2[$i*8+1];
	$data[$i][1] = $arr_str2[$i*8+2];
	$data[$i][2]= $arr_str2[$i*8+3];
	$data[$i][3] = $arr_str2[$i*8+4];
	$data[$i][4] = 0;
	$data[$i][5] = $arr_str2[$i*8+5];
	$data[$i][6] = $arr_str2[$i*8+7];
}

$count = $arr_str2[$arr_length-1];

$PHPWord = new PHPWord();
$num_flag = count($data);
if($num_flag > 10){
	echo '<script type="text/javascript">alert("费用数量大于10行，请联系开发人员更新！");</script>';
	echo '<script type="text/javascript">window.close();</script>';
	exit;
}
$docfile_name = "i".$num_flag.".docx";
//$docfile_name = iconv('utf-8', 'GB2312//IGNORE',$docfile_name);
//echo '<script type="text/javascript">alert("'.$docfile_name.'")</script>';
$document = $PHPWord->loadTemplate($docfile_name);

$arr_date = explode("-", $str[3]);
$end_str = $arr_date[0]."年".$arr_date[1]."月 ".$arr_date[2]."日 ";

$arr_date2 = explode("-", $str[4]);
$star_str = $arr_date2[0]."年".$arr_date2[1]."月 ".$arr_date2[2]."日";

//基本信息
$document->setValue('client',iconv('utf-8', 'GB2312//IGNORE', $str[1]));
$document->setValue('end',iconv('utf-8', 'GB2312//IGNORE', $end_str));
$document->setValue('star',iconv('utf-8', 'GB2312//IGNORE', $star_str));

$document->setValue('linkman0',iconv('utf-8', 'GB2312//IGNORE', $str[5]));
$document->setValue('fixed0',iconv('utf-8', 'GB2312//IGNORE', $str[6]));
$document->setValue('phone0', iconv('utf-8', 'GB2312//IGNORE', $str[7]));
$document->setValue('mail0', iconv('utf-8', 'GB2312//IGNORE', $str[8]));

$document->setValue('linkman1',iconv('utf-8', 'GB2312//IGNORE', $str[9]));
$document->setValue('fixed1',iconv('utf-8', 'GB2312//IGNORE', $str[10]));
$document->setValue('phone1',iconv('utf-8', 'GB2312//IGNORE', $str[11]));
$document->setValue('mail1', iconv('utf-8', 'GB2312//IGNORE', $str[12]));

$document->setValue('bank',iconv('utf-8', 'GB2312//IGNORE', $str[13]));
$document->setValue('company',iconv('utf-8', 'GB2312//IGNORE', $str[14]));
$document->setValue('account',iconv('utf-8', 'GB2312//IGNORE', $str[15]));
$document->setValue('text',iconv('utf-8', 'GB2312//IGNORE', $text));


//if($num_flag == 1){
//	foreach($data as $key_0 => $value_0){
//		$txt = "value".$key_0;
//		$document->setValue($txt,iconv('utf-8', '', $value_0));
//	}
//	$document->setValue('count',iconv('utf-8', 'GB2312//IGNORE', $data[6]));	
//}else{
	$i=0;
	foreach($data as $key_0 => $value_0){
		foreach($value_0 as $key_1 => $value_1){
			$txt = "value".$i;
			$document->setValue($txt,iconv('utf-8', '', $value_1));
			$i++;
		}
	}
	$document->setValue('count',iconv('utf-8', 'GB2312//IGNORE', $count));
//}


$document->save('person/example1.docx');

 

//下载
	$file_name = "example1.docx"; 
	$file_dir = "person/"; 
	echo $file_dir;
if (!file_exists($file_dir . $file_name)) { //检查文件是否存在 
echo "文件找不到"; 
exit; 
} else { 
$file = fopen($file_dir . $file_name,"r"); // 打开文件 
// 输入文件标签 
	Header("Content-type: application/octet-stream"); 
	Header("Accept-Ranges: bytes"); 
	Header("Accept-Length: ".filesize($file_dir . $file_name)); 
	Header("Content-Disposition: attachment; filename=" . $file_name); 
// 输出文件内容 
echo fread($file,filesize($file_dir . $file_name)); 
fclose($file); 
exit;} 
?>