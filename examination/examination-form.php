<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>KCAV::시험 분석 신청서</title>
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
    	.panel table .no-padding{
    		padding:0;
    		
    	}
    	.panel table .no-padding .table{
    		margin:0;
    	}
    	.input-form{
    		border:none;
    		/*border-bottom: solid 1px #C8C8C8;*/
    		width:100%;
    		height:100%;
    		padding-bottom: 3px;
    		padding: 6px 5px;
    	}
    	th{
    		background-color: #efefef;
    	}

    	.table > tbody > tr > td, 
    	.table > tfoot > tr > td,
    	.table > thead > tr > td{
    		padding:0 3px;
    	}
    </style>
  </head>
  <?php include $_SERVER["DOCUMENT_ROOT"].'admin/includes/db.php'; ?>
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
		
		$row=mysqli_fetch_array($result);					
		$date = date("Y/m/d", strtotime($row['date_reg'])); 	
		
		$query = "select * from _kcav_examination_register_item r, _kcav_examination_item_test i ";
		$query .= "where r.reg_serial = '$no'";
		$query .= "and i.serial = r.item_serial";
		
		$result2 = mysqli_query ($db_conn, $query );
		
		if (! $result2) {
			$message = 'Invalid query: ' . mysqli_error () . "\n";
			$message .= 'Whole query: ' . $query;
			die ( $message );
		}

  ?>
  <body>
		<div class="container">
			<h3>시험의뢰신청서</h3>
		
		  <table class="table table-bordered panel-body">
		  	<tbody>
		  		<tr>
		  			<th>접수번호</th>
		  			<td><input class="input-form" type="text" value="<?php echo $row['serial'];?>"></td>
		  		</tr>
		  		<tr>
		  			<th>업체명</th>
		  			<td><input class="input-form" type="text" value="<?php echo $row['company_name'];?>"></td>
		  			<th>접수일자</th>
		  			<td><input class="input-form" type="text" value="<?php echo $date;?>"></td>
		  			<th rowspan="3">신청인</th>
		  			<th>성명</th>
		  			<td><input class="input-form" type="text"></td>
		  		</tr>
		  		<tr>
		  			<th>사업자등록번호</th>
		  			<td><input class="input-form" type="text"></td>
		  			<th>대표자</th>
		  			<td><input class="input-form" type="text"></td>
		  			<th>전화번호</th>
		  			<td><input class="input-form" type="text"></td>
		  		</tr>
		  		<tr>
		  			<th>주소</th>
		  			<td colspan="3"><input class="input-form" type="text"></td>
		  			<th>팩스번호</th>
		  			<td><input class="input-form" type="text"></td>
		  		</tr>
		  		<tr>
		  			<th>성적서 용도</th>
		  			<td colspan="6"><input class="input-form" type="text"></td>
		  		</tr>
		  		<tr>
		  			<th>처리구분</th>
		  			<td>일반 긴급</td>
		  			<th>성적서 발급매수</th>
		  			<td colspan="2">국문 ()부, 영문 ()부</td>
		  			<th>발급 예정일</th>
		  			<td><input class="input-form" type="text"></td>
		  		</tr>
		  		<tr>
		  			<th>성적서 수령방법</th>
		  			<td colspan="4">이메일, 방문수령 등기우송..</td>
		  			<th>변경발급 예정일</th>
		  			<td><input class="input-form" type="text"></td>
		  		</tr>
		  		<tr>
		  			<th>시료 전달방법</th>
		  			<td colspan="6">방문전달, 등기우송...</td>
		  		</tr>
		  		<tr>
		  			<th>기타 요구사항(실비 징수)</th>
		  			<td colspan="6"><input class="input-form" type="text"></td>
		  		</tr>
		  		<tr>
		  			<th>시료명</th>
		  			<td colspan="6"><input class="input-form" type="text" value="<?php echo $row['sample_name'];?>"></td>
		  		</tr>
		  		<tr>
		  			<th>기밀 여부</th>
		  			<td>예/아니오</td>
		  			<th>반복시험 실시여부</th>
		  			<td colspan="2">예/아니오</td>
		  			<th>SOP(GLP) 적용여부</th>
		  			<td>예/아니오</td>
		  		</tr>
		  			<th colspan="4">시험항목</th>
		  			<th>수량</th>
		  			<th>단가</th>
		  			<th>금액</th>
		  		</tr>
		  		<?php while ($item_row=mysqli_fetch_array($result2)){ ?>
		  		<tr>
		  			<td colspan="3"><input class="input-form" type="text" value="<?php echo $item_row['name'];?>"></td>
		  			<td><input class="input-form" type="text"></td>
		  			<td><input class="input-form" type="text" value="<?php echo $item_row['number'];?>"></td>
		  			<td><input class="input-form" type="text" value="<?php echo $item_row['price'];?>"></td>
		  			<td><input class="input-form" type="text" value="<?php echo $item_row['number']*$item_row['price'];?>"></td>
		  		</tr>
		  		<?php } ?>
		  		<tr>
		  			<td colspan="3"><input class="input-form" type="text"></td>
		  			<td><input class="input-form" type="text"></td>
		  			<td><input class="input-form" type="text"></td>
		  			<td><input class="input-form" type="text"></td>
		  			<td><input class="input-form" type="text"></td>
		  		</tr>
		  		<tr>
		  			<td colspan="3"><input class="input-form" type="text"></td>
		  			<td><input class="input-form" type="text"></td>
		  			<td></td>
		  			<td></td>
		  			<td></td>
		  		</tr>
		  		<tr>
		  			<td colspan="2">기본료:</td>
		  			<td colspan="2">부본료:</td>
		  			<td colspan="2">기타비용:</td>
		  			<td>총 금액:</td>
		  		</tr>
		  		<tr>
		  			<th>비고사항</th>
		  			<td colspan="6"></td>
		  		</tr>
		  		<tr>
		  			<th rowspan="6">시험 후 시료의 처리 방법</th>
		  			<td colspan="4">성적서 발급 시-반환요청 폐기요청</td>
		  			<th rowspan="3">시료반환 확인</th>
		  			<td>일자:</td>
		  		</tr>
		  		<tr>
		  			<td rowspan="2">보관 필요 시(시험담당자와 협의)</td>
		  			<td colspan="3">기간()</td>
		  			<td rowspan="2">인수자</td>
		  		</tr>
		  		<tr>
		  			<td colspan="3">보관기간 이후 시료처리: 반환, 폐기</td>
		  		</tr>
		  		<tr>
		  			<th>업체명</th>
		  			<td colspan="3"><input class="input-form" type="text"></td>
		  			<td colspan="2">성적서 발급 시, 시료반환 또는 신청내역 변경 시 위임자 일 경우 최초신청자에게 확인</td>
		  		</tr>
		  		<tr>
		  			<th>주소명</th>
		  			<td colspan="3"><input class="input-form" type="text"></td>
		  			<td colspan="2">수령(요청)일자</td>
		  		</tr>
		  		<tr>
		  			<th>시료명</th>
		  			<td colspan="3"><input class="input-form" type="text"></td>
		  			<td colspan="2"><input class="input-form" type="text"></td>
		  		</tr>
		  	</tbody>
		  </table>
		
		</div> 
  </body>
    <!-- jQuery 2.1.4 -->
    <script src="/admin/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>