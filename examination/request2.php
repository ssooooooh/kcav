<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.4 -->
<link href="/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- DATA TABLES -->
<!--<link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />-->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.panel table .no-padding {
	padding: 0;
}
.panel table .no-padding .table {
	margin: 0;
}
</style>
</head>
<?php include $_SERVER["DOCUMENT_ROOT"].'wp-load.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].'admin/includes/db.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].'wp-load.php'; ?>
<body>
		
		<?php
	  	$no = $_GET['s'];
	 		//echo $no;
	 		$query = "select * from _kcav_examination_register_test ";
			$query .= "where serial = '$no'";
			$result = mysqli_query ($db_conn, $query );
			
			if (! $result) {
				$message = 'Invalid query: ' . mysqli_error () . "\n";
				$message .= 'Whole query: ' . $query;
				die ( $message );
			}
			
			$row  = mysqli_fetch_array($result);					
			$date = date("Y-m-d", strtotime($row['date_reg'])); 	
						
			/*$query = "select * from _kcav_examination_register_item r, _kcav_examination_item_test i ";
			$query .= "where r.reg_serial = '$no'";
			$query .= "and i.serial = r.item_serial";
			
			$result2 = mysqli_query ($db_conn, $query );
			
			if (! $result2) {
				$message = 'Invalid query: ' . mysqli_error () . "\n";
				$message .= 'Whole query: ' . $query;
				die ( $message );
			}
			*/
			$user = get_userdata($row['id']);

  	?>
		<div class="container">
			<h2>신청자</h2>
			<form class="form-horizontal" method="post" action="/examination/insert.php">
				<div class="form-group">
			  	<label class="col-sm-3 control-label with-required">신청인 성명</label>
			   	<div class="col-sm-9 form-inline">
			   		<p class="box form-control-static"><?php echo $user->display_name;?></p>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="email">이메일</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="email" name="email" class="box form-control" required value="<?php echo $row['email'];?>">
			   	</div>
		  	</div>
				<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_name">업체명</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_name" class="box form-control" required value="<?php echo $row['company_name'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_num">사업자등록번호</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_num" class="box form-control" required value="<?php echo $row['company_num'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_representive">대표자</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_representive" class="box form-control" required value="<?php echo $row['company_representive'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_address">주소</label>
			   	<div class="col-sm-9">
			   		<input type="text" name="company_address" class="box form-control" required value="<?php echo $row['company_address'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_phone">전화번호</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_phone" class="box form-control" required value="<?php echo $row['company_phone'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_fax">팩스</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_fax" class="box form-control" required value="<?php echo $row['company_fax'];?>">
			   	</div>
		  	</div>
				
				<h2>성적서</h2>
				<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="report_handle">처리구분</label>
			   	<div class="col-sm-9 form-inline">
			   		<label class="radio-inline">
						  <input type="radio" name="report_handle" value="default" selected>일반
						</label>
						<label class="radio-inline">
						  <input type="radio" name="report_handle" id="inlineRadio2" value="urgent">긴급
						</label>
			   	</div>
		  	</div>
				<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="report_use">성적서 용도</label>
			   	<div class="col-sm-9">
			   		<input type="text" name="report_use" class="box form-control" required value="<?php echo $row['report_use'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="report_korean">발급 매수</label>
			   	<div class="col-sm-9 form-inline">
			   		국문 <input type="number" name="report_korean" class="box form-control" style="width:70px;" required value="<?php echo $row['report_korean'];?>">매 
			   		영문<input type="number" name="report_english" class="box form-control" style="width:70px;" required value="<?php echo $row['report_english'];?>">매 
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="report_receive">수령 방법</label>
			   	<div class="col-sm-9 form-inline">
						<label class="radio-inline">
						  <input type="radio" name="report_receive" value="email">이메일
						</label>
						<label class="radio-inline">
						  <input type="radio" name="report_receive" value="visit">방문수령
						</label>
						<label class="radio-inline">
						  <input type="radio" name="report_receive" value="register">등기
						</label>
						<label class="radio-inline">
						  <input type="radio" name="report_receive" value="parcel">택배
						</label>
						<label class="radio-inline">
						  <input type="radio" name="report_receive" value="quick">퀵
						</label>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="report_receive_address">수령 주소</label>
			   	<div class="col-sm-9">
			   		<input type="text" name="report_receive_address" class="box form-control" required value="<?php echo $row['report_receive_address'];?>">
			   	</div>
		  	</div>
				<h2>시료</h2>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_name">시료명</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="sample_name" class="box form-control" required value="<?php echo $row['sample_name'];?>">
			   	</div>
		  	</div>
				<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_send">전달 방법</label>
			   	<div class="col-sm-9 form-inline">
			   		<label class="radio-inline">
						  <input type="radio" name="sample_send" value="visit">방문
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sample_send" value="register">등기
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sample_send" value="parcel">택배
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sample_send" value="quick">퀵
						</label>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_other_requirement">기타 요구사항</label>
			   	<div class="col-sm-9">
			   		<textarea rows="2" name="sample_other_requirement" class="box form-control" required value="<?php echo $row['other_requirement'];?>"></textarea>
			   	</div>
		  	</div>
		  	<h2>시험</h2>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="exam">시험 방법</label>
			   	<div class="col-sm-9 form-inline">
			   		<label class="checkbox-inline">
						  <input type="checkbox" name="is_secret" value="true">기밀
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="is_repeated" value="true">반복 시험 실시
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="is_sop" value="true">SOP(GLP)실시
						</label>

			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="items[]">시험 항목</label>
			   	<div class="col-sm-9">
			   		<?php

				   		$query = "select * from _kcav_examination_item_test";
							$result = mysqli_query ( $db_conn, $query ) or die(mysqli_error());
							
							if (! $result) {
								$message = 'Invalid query: ' . mysqli_error () . "\n";
								$message .= 'Whole query: ' . $query;
								die ( $message );
							}
							$i =1;
						?>
			   		<?php while($row3=mysqli_fetch_array($result)){ ?>
		      		<div class="checkbox">
			      		<label>
								  <input type="checkbox" name="items[]" value="<?php echo $row3['serial']; ?>"><?php echo $row3['name']; ?>
								</label>
							</div>
		        <?php } ?>
			   	</div>
		  	</div>
		  	
		  	<h2>시료 처리</h2>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_handle">시료 처리 방법</label>
			   	<div class="col-sm-9 form-inline">
			   		<label class="radio-inline">
						  <input type="radio" name="sample_handle" value="return">성적서 발급 시 반환
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sample_handle" value="drop">성적서 발급 시 폐기
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sample_handle" value="save">보관
						</label>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="save_period_1">보관 필요시 기간</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="sample_save_period" class="box form-control" required value="<?php echo $row['sample_save_period'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_after_save">보관 필요 시 보관 기간 이후</label>
			   	<div class="col-sm-9 form-inline">
			   		<label class="radio-inline">
						  <input type="radio" name="sample_after_save" value="return">반환
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sample_after_save" value="drop">폐기
						</label>
			   	</div>
		  	</div>
		  	<h2>이 아래는 왜 필요한지 모르겠음. 반환 시 주소가 다른 것인가.</h2>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_handle_company">업체명</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="sample_handle_company" class="box form-control" required value="<?php echo $row['sample_handle_company'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_handle_address">주소</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="sample_handle_address" class="box form-control" required value="<?php echo $row['sample_handle_address'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_handle_sample">시료명</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="sample_handle_sample" class="box form-control" required value="<?php echo $row['sample_handle_sample'];?>">
			   	</div>
		  	</div>
		  	<div class="form-group">
			   	<div class="col-sm-offset-3">
			   		<button type="submit" class="btn btn-primary">신청</button>
			   	</div>
		  	</div>
		  	
			</form>
		</div> 

    <!-- jQuery 2.1.4 -->
    <script src="/admin/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>
<?php mysqli_close ( $db_conn ); ?>
<!-- jQuery 2.1.4 -->
<script src="/admin/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>
