<?php include $_SERVER["DOCUMENT_ROOT"].'wp-load.php';?>
<?php include $_SERVER["DOCUMENT_ROOT"].'admin/includes/db.php'; ?>

<?php
$seminar_num = $_POST['seminar_num'];
$name 			= $_POST['name'];
$contact_01 = $_POST['contact1'];
$contact_02 = $_POST['contact2'];
$contact_03 = $_POST['contact3'];
$email			= $_POST['email'];
$company 		= $_POST['company'];
$dept 			= $_POST['dept'];
$positon 		= $_POST['posi'];
$uid = $_POST['uid'];

$dining = TRUE;
if($_POST['dining'] =='yes'){
	$dining = TRUE;
}else{
	$dining = FALSE;
}

$time = date("Y-m-d H:i:s");


$query="insert into _kcav_seminar_register ";
$query.=" (seminar_num, name, contact_01, contact_02, contact_03,";
$query.=" email, dining, company, dept, position, user_id , regi_date) ";
$query.=" values('$seminar_num', '$name' , '$contact_01', '$contact_02',  '$contact_03', ";
$query.=" '$email', '$dining', '$company', '$dept', '$positon', '$uid', '$time'); ";

$result = mysqli_query($db_conn, $query) or die("error:".mysqli_error());

if (! $result) {
	$message = 'Invalid query: ' . mysqli_error () . "\n";
	$message .= 'Whole query: ' . $query;
	die ( $message );
}else{
	//$email = "kmkmkm@daum.net";
	add_filter( 'wp_mail_content_type', 'set_html_content_type' );
	$to = $email;
	$subject = '[KCAV] 세미나 참가 신청이 완료되었습니다.';
	$body = '<p>안녕하세요 고객님! <b>주식회사 카브</b>입니다.</p>';
	$body .= '<p>고객님의 세미나 참가 신청이 성공적으로 접수되었습니다.<br>';
	$body .= '신청하신 세미나에 대한 자세한 정보는 아래 링크를 통해 확인하실 수 있으며, 참가비 입금이 확인되면 이메일을 통해 알려드리고 있사오니 참고하시기 바랍니다.</p>';
	$body .= '<p><a href="http://kcav.noblesys.co.kr/?page_id=450&n='.$seminar_num.'">http://kcav.noblesys.co.kr/?page_id=450&n='.$seminar_num.'</a></p>';
	$body.= '<p>기타 문의사항은 이메일로 회신 주시거나 전화(02-6461-0085)로 문의 바랍니다.</p>';
	$body .= '<p>감사합니다.</p>';
	$headers = "From: 주식회사 카브 <kcav_@naver.com>\r\n";

	if(wp_mail( $to, $subject, $body, $headers )){
		//echo "mail-success";
		//echo "<script>alert('가입이 완료되었습니다. 로그인 페이지로 이동합니다.');document.location.href='/wp-login.php';</script>";
	}
	else{
	//	echo "mail=fail";
	}
	remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

	mysqli_close($db_conn);
}
function set_html_content_type() {
	return 'text/html';
}
?>
<meta charset="UTF-8">
 <script>    
 alert('세미나 신청 완료.');    
 location.replace('/?page_id=138');    
 </script>