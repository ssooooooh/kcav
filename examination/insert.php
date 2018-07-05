<meta charset="utf-8">
<?php include $_SERVER["DOCUMENT_ROOT"].'wp-load.php';?>
<?php include $_SERVER["DOCUMENT_ROOT"].'admin/includes/db.php'; ?>
<?php

$id						= $_POST['id'];
$email				= $_POST['email'];

$company_name = $_POST['company_name'];
$company_num 	= $_POST['company_num'];
$company_representive = $_POST['company_representive'];
$company_address 			= $_POST['company_address'];
$company_phone 				= $_POST['company_phone'];
$company_fax					= $_POST['company_fax'];

$report_use 	= $_POST['report_use'];
$report_handle= $_POST['report_handle'];
$report_korean= $_POST['report_korean'];
$report_english=$_POST['report_english'];

$report_receive_visit 	= 0;
$report_receive_register= 0;
$report_receive_parcel	= 0;
$report_receive_quick 	= 0;
 
if($_POST['report_receive']=='visit'){
	$report_receive_visit=1;
}
else if($_POST['report_receive']=='register'){
	$report_receive_register=1;
}
else if($_POST['report_receive']=='parcel'){
	$report_receive_parcel=1;
}
else if($_POST['report_receive']=='quick'){
	$report_receive_quick=1;
}

$report_receive_address = $_POST['report_receive_address'];

$sample_send = $_POST['sample_send'];
$sample_other_requirement = $_POST['sample_other_requirement'];
$sample_name 	= $_POST['sample_name'];

if($_POST['is_secret']=='true'){
	$is_secret=1;
}else{
	$is_secret=0;
}
if($_POST['is_repeated']=='true'){
	$is_repeated=1;
}else{
	$is_repeated=0;
}
if($_POST['is_sop']=='true'){
	$is_sop=1;
}else{
	$is_sop=0;
}
//$is_secret 	= (int)$_POST['is_secret'];
//$is_repeated= (int)$_POST['is_repeated'];
//$is_sop			= (int)$_POST['is_sop'];

$sample_handle			= $_POST['sample_handle'];
$sample_save_period	= $_POST['save_period_1'].'~'.$_POST['save_period_2'];
$sample_after_save	= $_POST['sample_after_save'];

$sample_handle_company 	= $_POST['sample_handle_company'];
$sample_handle_address 	= $_POST['sample_handle_address'];
$sample_handle_sample		= $_POST['sample_handle_sample'];

$exam_items 	= $_POST['items'];
$exam_items_count 	= $_POST['items_count'];

$date = date("Y-m-d H:i:s");

$query  = "insert into _kcav_examination_register_test ";
$query .= "(id, email, company_name, company_num, company_representive, company_address, company_phone, company_fax, ";
$query .= "report_use, report_handle, report_korean, report_english, ";
$query .= "report_receive_visit, report_receive_register, report_receive_parcel, report_receive_quick, report_receive_address,";
$query .= "sample_send, sample_other_requirement, sample_name, is_secret, is_repeated, is_sop, ";
$query .= "sample_handle, sample_save_period, sample_after_save, ";
$query .= "sample_handle_company, sample_handle_address, sample_handle_sample, date_reg) ";

$query .= "values ";
$query .= "($id, '$email', '$company_name', '$company_num', '$company_representive', '$company_address', '$company_phone', '$company_fax',";
$query .= "'$report_use', '$report_handle', '$report_korean', '$report_english', ";
$query .= "$report_receive_visit, $report_receive_register, $report_receive_parcel, $report_receive_quick, '$report_receive_address',";
$query .= "'$sample_send', '$sample_other_requirement', '$sample_name', $is_secret, $is_repeated, $is_sop, ";
$query .= "'$sample_handle', '$sample_save_period', '$sample_after_save', ";
$query .= "'$sample_handle_company', '$sample_handle_address', '$sample_handle_sample','$date') ;";

echo $query;
//exit();
$result = mysqli_query ( $db_conn, $query ) or die(mysqli_error());

if (! $result) {
	$message = 'Invalid query: ' . mysqli_error () . "\n";
	$message .= 'Whole query: ' . $query;
	die ( $message );
}

echo "insert complete<br>";

$insert_id = mysqli_insert_id($db_conn);

//echo $insert_id;

for ($i=0; $i < sizeof($exam_items); $i++) {
	$val = $exam_items[$i];
	$val2 = $exam_items_count[$val-1];
	$query  = "insert into _kcav_examination_register_item ";
	$query .= "(reg_serial, item_serial, count) ";
	$query .= "values('$insert_id', '$val' , '$val2'); ";
 
 	echo $query;

 	$result = mysqli_query ( $db_conn, $query ) or die(mysqli_error());
	
	if (! $result) {
		$message = 'Invalid query: ' . mysqli_error () . "\n";
		$message .= 'Whole query: ' . $query;
		die ( $message );
	}
	else{
		
	}
}
if (! $result) {
	$message = 'Invalid query: ' . mysqli_error () . "\n";
	$message .= 'Whole query: ' . $query;
	die ( $message );
}
else{
	add_filter( 'wp_mail_content_type', 'set_html_content_type' );
	$to = $email;
	$subject = '[KCAV] 시험 의뢰 신청이 완료되었습니다.';
	$body = '<p>안녕하세요 고객님! <b>주식회사 카브</b>입니다.</p>';
	$body .= '<p>시험 의뢰 신청이 성공적으로 완료되었습니다.<br>';
	$body .= '빠른 시일 내에 담당자가 확인 후 견적을 작성하여 통보해 드릴 예정이며, 향후 진행 사항에 대해서는 이메일을 통해 알려드리고 있으니 참고하시길 바랍니다.</p>';
	$body.= '기타 문의사항은 이메일로 회신 주시거나 전화(02-6461-0085)로 문의 바랍니다.<br>';
	$body .= '<p>감사합니다.</p>';
	$headers = "From: 주식회사 카브 <kcav_@naver.com>\r\n";
	
	if(wp_mail( $to, $subject, $body, $headers )){
		//echo "mail-success";
	}
	else{
	//	echo "mail=fail";
	}
	remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
}


function set_html_content_type() {
	return 'text/html';
}

?>
<meta charset="UTF-8">
 <script>    
 alert('시험 의뢰 신청이 완료되었습니다. 자세한 사항은 이메일을 통해 확인하실 수 있습니다.');    
 location.replace('/?page_id=510');    
 </script>