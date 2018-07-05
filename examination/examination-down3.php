<?php
//header("Content-type: application/msword");
//header("Cache-Control: public");
//header( "Content-Disposition: attachment; filename=$filename" );
//header("Content-Description: PHP4 Generated Data");
///header("Content-charset=euc-kr");
//ader("Pragma: public");
//header("Expires: 0");
//header("Cache-Control: must-revalidate, post-check=0,pre-check=0");

?>
<!DOCTYPE html>
<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
  <head>
    <meta charset="UTF-8">
    <title>KCAV::시험 분석 신청서</title>
    <meta http-equiv="Content-Type" content="application/msword;charset=euc-kr">
    <style>
	<!-- 
@page
{
    size:21cm 29.7cmt;  /* A4 */
    margin:1cm 1cm 1cm 1cm; /* Margins: 2.5 cm on each side */
    mso-page-orientation: portrait;  
}
@page container { }
div.container { page:Section1; }

    	.panel table .no-padding{
    		padding:0;
    		
    	}
    	.panel table .no-padding .table{
    		margin:0;
    	}
    	.input-form{
    		border:none;
    		border-bottom: solid 1px #C8C8C8;
    		width:100%;
    		height:100%;
    		padding-bottom: 3px;
    	}
		table{ width:19cm;}
		body{ padding:0; font-size:10pt;}
		.container{ padding:0;}

.userbg{  background-color:#DDD; text-align:center; }
.userbg-line2{ border-left:1px solid black; border-right:1px solid black; border-bottom:1px solid black; background-color:#DDD; text-align:center;}
.userbg-line3{ border-right:1px solid black; border-bottom:1px solid black; background-color:#DDD; text-align:center;}
.line1{ border-top:1px solid black; border-right:1px solid black; border-bottom:1px solid black;}
.line2{ border-left:1px solid black; border-right:1px solid black; border-bottom:1px solid black;}
.line3{ border-right:1px solid black; border-bottom:1px solid black;}
.top-bar{
	background-color: #eee;
	padding: 10px 20px;
	margin-bottom: 10px;
}
@media print{
	.top-bar{
		display:none;
	}
}
    </style>
  </head>
  <body>
  <div class="top-bar">
  	<button class="btn btn-default" onclick="javascript:window.print()">인쇄</button>
  	<button class="btn btn-default" onclick="javascript:window.close()">창 닫기</button>
  </div>
  <div class="wrap">
  <?php include $_SERVER["DOCUMENT_ROOT"].'admin/includes/db.php'; ?>
  <?php
  	$no = $_GET['s'];
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
		
		
		$query = "select * from _kcav_examination_register_item inner join _kcav_examination_item_test";
		$query .= " on _kcav_examination_register_item.item_serial = _kcav_examination_item_test.serial";
		$query .= " where reg_serial = '$no'";
		
		$result3 = mysqli_query ($db_conn, $query );
		
		if (! $result3) {
			$message = 'Invalid query: ' . mysqli_error () . "\n";
			$message .= 'Whole query: ' . $query;
			die ( $message );
		}		
		
?>
		<div class="container">

<table cellpadding="0" cellspacing="0" style="border:0;" >
  <tr style="height:0.4cm;">
    <td rowspan="3" width="5%" align="center" style="border:1px solid black; width:1cm;"><p>접</p>
    <p>수</p></td>
    <td align="center" style="border-right:1px solid black; border-bottom:1px solid black; border-top:1px solid black; width:1.8cm;">작성</td>
    <td  align="center"  style="border-right:1px solid black; border-bottom:1px solid black; border-top:1px solid black; width:1.8cm;">승인</td>
    <td rowspan="3"   style="border-top:0;" align="center">
    <img src="http://kcav.noblesys.co.kr/logo.jpg" width="179" height="50">
	</td>
    <td rowspan="3"  align="center" style="border:1px solid black; width:1cm;" ><p>기</p>
    <p>술</p></td>
    <td align="center" style="border-right:1px solid black; border-bottom:1px solid black; border-top:1px solid black; width:1.8cm;">승인</td>
    <td  align="center" style="border-right:1px solid black; border-bottom:1px solid black; border-top:1px solid black; width:3cm;">시험자 배정</td>
  </tr>
  <tr style="height:0.7cm;">
    <td rowspan="2"  style="border-right:1px solid black;  border-bottom:1px solid black;"></td>
    <td rowspan="2"  style="border-right:1px solid black;  border-bottom:1px solid black;">&nbsp;</td>
    <td rowspan="2" style="border-right:1px solid black; border-bottom:1px solid black; ">&nbsp;</td>
    <td style="border-right:1px solid black; border-bottom:1px solid black;">일자 : </td>
  </tr>
  <tr style="height:0.7cm;">
    <td  style="border-right:1px solid black; border-bottom:1px solid black;">성명 : </td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
<tr style="height:0.2cm;"><td colspan="3" >&nbsp;</td></tr>
  <tr style="height:0.4cm;">
    <td style="width:2.7cm;"><strong><u>※신청인께서는</u>&nbsp;</strong> </td>
    <td style="border:1px solid black; background-color:#DDD; width:1.5cm;">&nbsp;</td>
    <td><strong>&nbsp;<u>바탕부분 해당란에만 기재하시기 바랍니다.</u></strong> </td>
  </tr>
  <tr style="height:0.4cm;"><td colspan="3" >&nbsp;</td></tr>
</table>


<table class="table table-bordered panel-body" border="0" cellpadding="0" cellspacing="0">
  <tr style="height:0.6cm;">
    <td style=" border:1px solid black; width:2.8cm;" align="center"><strong>접&nbsp;수&nbsp;번&nbsp;호</strong></td>
    <td style="width:3.8cm;" class="line1" align="center"><?php echo $no; ?></td>
    <td colspan="6" style=" border-bottom:1px solid black;" align="center" >
	&nbsp;&nbsp;<strong><u>시&nbsp;험&nbsp;분&nbsp;석&nbsp;□&nbsp;신&nbsp;청&nbsp;서&nbsp;/&nbsp;□&nbsp;견&nbsp;적&nbsp;서</u></strong></td>
  </tr>
  <tr style="height:0.6cm;">
    <td class="userbg-line2" ><strong>업&nbsp;체&nbsp;명</strong></td>
    <td class="line3" >&nbsp;<?php echo $row['company_name']; ?></td>
    <td class="userbg-line3" style="width:2.8cm;" ><strong>접수일자</strong></td>
    <td class="line3" style="width:2.3cm;">&nbsp;
	<?php 
	$date = date_create($row['date_reg']);
    echo date_format($date,"Y/m/d");
	?></td>
    <td rowspan="3" class="userbg-line3" style=" width:1.2cm;" ><strong>신청인</strong></td>
    <td class="userbg-line3" style="width:2.8cm;" ><strong>성&nbsp;명</strong></td>
    <td colspan="2" class="line3"  >&nbsp;</td>
    </tr>
  <tr style="height:0.6cm;">
    <td class="userbg-line2"><strong>사업자 등록번호</strong></td>
    <td class="line3"  >&nbsp;<?php echo $row['company_num']; ?></td>
    <td class="userbg-line3" ><strong>대&nbsp;표&nbsp;자</strong></td>
    <td class="line3"  >&nbsp;<?php echo $row['company_representive']; ?></td>
    <td class="userbg-line3" ><strong>전화번호</strong></td>
    <td colspan="2" class="line3" >&nbsp;</td>
    </tr>
  <tr style="height:0.6cm;">
    <td class="userbg-line2" ><strong>주&nbsp;소</strong></td>
    <td colspan="3" class="line3" >&nbsp;<?php echo $row['company_address']; ?></td>
    <td class="userbg-line3"><strong>팩스번호</strong></td>
    <td colspan="2" class="line3" >&nbsp;</td>
    </tr>
  <tr style="height:1cm;">
    <td class="userbg-line2"><strong>수신인 이메일</strong></td>
    <td colspan="7" class="line3" >&nbsp;</td>
  </tr>
  <tr style="height:0.6cm;">
    <td class="userbg-line2"><strong>성적서 용도</strong></td>
    <td colspan="7" class="line3" >&nbsp;<?php echo $row['report_use']; ?></td>
  </tr>
  <tr style="height:1cm;">
    <td class="userbg-line2" ><strong>처리구분</strong></td>
    <td class="line3"  align="center">
<strong>    	<?php 
		if( $row['report_handle']=='urgent'){
			echo" □ 일반, ■ 긴급";
			}else{
				
				echo" ■ 일반, □ 긴급";
				}
		
		?> </strong>
   </td>
    <td class="userbg-line3"><strong>성적서<br />발급매수</strong></td>
    <td colspan="3" class="line3" align="center" >
  <strong>   
    <?php
    	echo"국문(".$row['report_korean'].")부, 영문(".$row['report_english'].")부";
	?></strong>
    </td>
    <td class="line3"  align="center" >
      <strong>발급<br />
      예정일</strong></td>
    <td class="line3" >&nbsp;</td>
  </tr>
  <tr style="height:0.6cm;">
    <td class="userbg-line2"><strong>성적서<br />수령방법</strong></td>
    <td class="line3" >
    &nbsp;
    <strong>
    <?php
	if( $row['report_receive_visit']==1){
		echo "&nbsp;이  메  일 □";
		echo "&nbsp;방문 수령 ■";
	}else if($row['report_receive_register']==1 || $row['report_receive_parcel']==1 ||  $row['report_receive_quick']==1){
		echo "&nbsp;이  메  일 □<br>";
		echo "&nbsp;방문 수령 □";
	}else{
		echo "&nbsp;이  메  일 ■<br>";
		echo "&nbsp;방문 수령 □";
	}
	?>
    </strong>
    </td>
    <td colspan="4" class="line3" >
    &nbsp;
      <strong>
        <?php
	if( $row['report_receive_register']==1){
		echo "&nbsp;■ 등기 우송, 기타 착불우송(□ 택배, □ 퀵 서비스)<br>";
		echo "&nbsp;수령 주소 : ".$row['report_receive_address'];
	}else if(  $row['report_receive_parcel']==1){
		echo "&nbsp;□ 등기 우송, 기타 착불우송(■ 택배, □ 퀵 서비스)<br>";
		echo "&nbsp;수령 주소 : ".$row['report_receive_address'];
	}else if( $row['report_receive_quick']==1){
		echo "&nbsp;□ 등기 우송, 기타 착불우송(□ 택배, ■ 퀵 서비스)<br>";
		echo "&nbsp;수령 주소 : ".$row['report_receive_address'];
	}else if($row['report_receive_visite']==1){
		echo "&nbsp;□ 등기 우송, 기타 착불우송(□ 택배, □ 퀵 서비스)<br>";
		echo "&nbsp;수령 주소 : ".$row['report_receive_address'];
	}else{
		echo "&nbsp;□ 등기 우송, 기타 착불우송(□ 택배, □ 퀵 서비스)<br>";
		echo "&nbsp;수령 주소 : ".$row['report_receive_address'];
	}
	?>    
        </strong>
    </td>
    <td class="line3" align="center" style="width:1.6cm">
      <strong>변경발급<br />
        예정일</strong>
    </td>
    <td class="line3" >&nbsp;</td>
  </tr>
  <tr style="height:0.6cm;">
    <td class="userbg-line2"><strong>시료전달방법</strong></td>
    <td colspan="7" class="line3" >
    &nbsp;
    <strong>
     <?php
	if( $row['sample_send']=='visit'){
		echo "&nbsp;■ 방문전달   	□등기 우송, 기타 착불우송(□택배, □퀵 서비스)";
	}else if( $row['sample_send']=='register'){
		echo "&nbsp;□ 방문전달   	■등기 우송, 기타 착불우송(□택배, □퀵 서비스)";
	}else if( $row['sample_send']=='parcel'){
		echo "&nbsp;□ 방문전달   	□등기 우송, 기타 착불우송(■택배, □퀵 서비스)";
	}else if( $row['sample_send']=='quick'){
		echo "&nbsp;□ 방문전달   	□등기 우송, 기타 착불우송(□택배, ■퀵 서비스)";
	}
	?>  
    </strong>
    </td>
  </tr>
  <tr style="height:1cm;">
    <td class="userbg-line2"><strong>기타 요구사항<br />
(실비접수)</strong></td>
    <td colspan="7" class="line3" >&nbsp;<?php echo $row['sample_other_requirement']; ?></td>
  </tr>
  <tr style="height:1cm;">
    <td class="userbg-line2"><strong>시&nbsp;료&nbsp;명</strong></td>
    <td colspan="7" class="line3" >&nbsp;<?php echo $row['sample_name']; ?></td>
  </tr>
</table>




<table class="table table-bordered panel-body" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="userbg-line2"><strong>기밀여부</strong></td>
    <td style="width:3.2cm;" class="line3">
    
    <strong>
    <?php
		if($row['is_secret'] == 1){
 		   echo "&nbsp;■ 예<br>&nbsp;□ 아니오";
		}else{
			echo "&nbsp;□ 예<br>&nbsp;■ 아니오";
		}
	?>
    </strong>
    </td>
    <td style="width:3.3cm;" class="userbg-line3"><strong>반복시험<br />실시여부</strong></td>
    <td style="width:3.2cm;" class="line3">
    <strong>
 	<?php 
 		if($row['is_repeated'] == 1){
 		   echo "&nbsp;■ 예<br>&nbsp;□ 아니오";
		}else{
			echo "&nbsp;□ 예<br>&nbsp;■ 아니오";
		}
 	?> 
    </strong>  
    </td>
    <td style="width:3.3cm;" class="userbg-line3"><strong>SOP(GLP)<br />적용여부</strong></td>
    <td style="width:3.2cm;" class="line3">
    <strong>
    <?php
		if($row['is_sop'] == 1){
 		   echo "&nbsp;■ 예<br>&nbsp;□ 아니오";
		}else{
			echo "&nbsp;□ 예<br>&nbsp;■ 아니오";
		}
	?>
    </strong>
    </td>
  </tr>
</table>


<table class="table table-bordered panel-body" border="0" cellpadding="0" cellspacing="0">
  <tr style="height:0.6cm">
    <td style="width:10cm;" colspan="2" class="userbg-line2"><strong>시험항목</strong></td>
    <td style="width:1.5cm; text-align:center;" class="userbg-line3">수량</td>
    <td style="width:3cm; text-align:center;" class="line3" >단가</td>
    <td class="line3" align="center" >금액</td>
    <?php  while($row3=mysqli_fetch_array($result3)){?>
  </tr>
  <tr style="height:0.8cm">
    <td class="line2" style="width:8cm; border-bottom:1px solid black;" align="center" ><?php echo $row3['name']; ?></td>
    <td class="line3" style="width:2cm; border-bottom:1px solid black;">&nbsp;</td>
    <td class="line3" style="border-bottom:1px solid black;" align="center"><?php echo $row3['count']; ?></td>
    <td class="line3" style="border-bottom:1px solid black;"><?php echo $row3['price']; ?></td>
    <td class="line3" style="border-bottom:1px solid black;"><?php echo $row3['price']*$row3['count']; ?></td>
  </tr>
  <?php }?>
</table>
		



<table class="table table-bordered panel-body" border="0" cellpadding="0" cellspacing="0">
   <tr style="height:0.8cm">
    <td class="line2" style="width:2cm; border-right:0;">기본료 :</td>
    <td class="line3" style="width:1.9cm;"><?php echo $row['charge_default']; ?></td>
    <td class="line3" style="width:1.9cm; border-right:0;">부본료 :</td>
    <td class="line3" style="width:1.9cm;"><?php echo $row['charge_copy']; ?></td>
    <td class="line3" style="width:1.9cm; border-right:0;">기타비용 :</td>
    <td class="line3" style="width:1.9cm;"><?php echo $row['charge_other']; ?></td>
    <td class="line3" style="width:2.5cm; border-right:0;">총 금액 :</td>
    <td class="line3" style="width:5cm;"><?php echo $row['charge_sum']; ?></td>
  </tr>
</table>

<table class="table table-bordered panel-body" border="0" cellpadding="0" cellspacing="0">
  <tr style="height:1cm">
    <td style="width:2.8cm;" class="line2">비고사항</td>
    <td class="line3"><?php echo $row['charge_note']; ?></td>
  </tr>
</table>


<table class="table table-bordered panel-body" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="6" style="width:2.8cm;" class="userbg-line2"><strong>시험 후<br />시료의<br />처리 방법</strong></td>
    <td colspan="3" style="width:10cm;" class="line3">
	<?php if( $row['sample_handle'] == 'return'){ ?>
		<strong>■성적서 발급 시: ⇒ ■반환요청, □폐기요청</strong>
	<?php }else if( $row['sample_handle'] == 'drop'){ ?>
		<strong>■성적서 발급 시: ⇒ □반환요청, ■폐기요청</strong>
	<?php }else{ ?>
		<strong>□성적서 발급 시: ⇒ □반환요청, □폐기요청</strong>
	<?php }?>
	</td>
    <td rowspan="3" class="line3" align="center"><strong>시료반환<br />확인</strong></td>
    <td class="line3"><strong>일자 :</strong></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="2" style="width:5cm;" class="line3">
	<?php if($row['sample_handle'] == 'save'){ ?>	
		<strong>■보관 필요 시<br />(시험담당자와 협의)</strong>
        
	<?php }else{ ?>
    	<strong>□보관 필요 시<br />(시험담당자와 협의)</strong>
        <?php } ?>
	</td>
    <td style="width:5cm;" class="line3"><strong>기간 (<?php echo $row['sample_save_period']; ?>)</strong></td>
    <td rowspan="2" class="line3"><strong>인수자:	(서명) </strong>
	
</td>
  </tr>
  <tr>
    <td class="line3"><strong>보관기간 이후 시료처리 : <br />
   <?php if($row['sample_after_save'] == 'return'){ ?>
    ■반환, □폐기
    <?php }else if($row['sample_after_save'] == 'drop'){ ?>
	 □반환, ■폐기
     <?php  }else{ ?>
     □반환, □폐기
     <?php } ?>
    </strong></td>
  </tr>
  <tr>
    <td style="width:2.5cm;" class="userbg-line3"><strong>업체명</strong></td>
    <td colspan="2" style="width:7.5cm;" class="line3">
    &nbsp;
    <?php echo $row['sample_handle_company']; ?>
    </td>
    <td colspan="2"class="line3"><strong>성적서 발급 시, 시료반환 또는<br />신청내역 변경 시 위임자 일 경우<br />최초신청자에게 확인</strong></td>
  </tr>
  <tr style="height:0.6cm">
    <td style="width:2.5cm;" class="userbg-line3"><strong>주소명</strong></td>
    <td colspan="2" style="width:7.5cm;" class="line3">
    &nbsp;
    <?php echo $row['sample_handle_address']; ?>
    </td>
    <td colspan="2"class="line3"><strong>수령(요청)일자:</strong></td>
  </tr>
  <tr style="height:0.6cm">
    <td style="width:2.5cm;" class="userbg-line3"><strong>시료명</strong></td>
    <td colspan="2" style="width:7.5cm;" class="line3">
    &nbsp;
    <?php echo $row['sample_handle_sample']; ?>
    </td>
    <td colspan="2"class="line3">&nbsp;</td>
  </tr>
</table>

<br />
<table class="table table-bordered panel-body" border="0" cellpadding="0" cellspacing="0" style="text-align:center; font-weight:bold; border-top:1px solid black;">
  <tr style="height:0.6cm">
    <td colspan="4" class="userbg-line2" >※상기 내역과 같이 시험 신청하며 유의사항에 대하여 확인하였음.</td>
  </tr>
  <tr style="height:0.8cm">
    <td style="width:2.8cm;"  class="line2">권한</td>
    <td class="line3">작성자(의뢰자)</td>
    <td class="line3">검토자(시험자)</td>
    <td class="line3">승인자(대표)</td>
  </tr>
  <tr style="height:0.8cm">
    <td class="line2">이름</td>
    <td class="line3">(&nbsp;서&nbsp;&nbsp;명&nbsp;)</td>
    <td class="line3">(&nbsp;서&nbsp;&nbsp;명&nbsp;)</td>
    <td class="line3">(&nbsp;서&nbsp;&nbsp;명&nbsp;)</td>
  </tr>
  <tr style="height:0.8cm">
    <td class="line2">일자</td>
    <td class="line3">20&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="line3">20&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="line3">20&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>

		</div> </div>
  </body>

</html>