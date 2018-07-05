<?php include $_SERVER["DOCUMENT_ROOT"].'admin/includes/db.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].'wp-load.php'; ?>
    <style>
    	.panel table .no-padding{
    		padding:0;
    		
    	}
    	.panel table .no-padding .table{
    		margin:0;
    	}
    	.form-inline .form-group{
				margin:0;
			}
			
    </style>
    
		<?php
			global $current_user;
			get_currentuserinfo();
			$user_ID = get_current_user_id(); 
		?>
		<div class="container">
			<h2>신청자</h2>
			<form class="form-horizontal" method="post" action="/examination/insert.php">
				<div class="form-group">
			  	<label class="col-sm-3 control-label with-required">신청인 성명</label>
			   	<div class="col-sm-9 form-inline">
				<input type ="hidden" name ="id" value="<?php echo $user_ID;?>">
			   		<p class="box form-control-static"><?php echo $current_user->display_name;?></p>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="email">이메일</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="email" name="email" class="box form-control" required value="<?php echo $current_user->user_email;?>">
			   	</div>
		  	</div>
				<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_name">업체명</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_name" class="box form-control" required>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_num">사업자등록번호</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_num" class="box form-control" required>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_representive">대표자</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_representive" class="box form-control" required>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_address">주소</label>
			   	<div class="col-sm-9">
			   		<input type="text" name="company_address" class="box form-control" required>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_phone">전화번호</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_phone" class="box form-control" required>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="company_fax">팩스</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="company_fax" class="box form-control" required>
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
						  <input type="radio" name="report_handle" value="urgent">긴급
						</label>
			   	</div>
		  	</div>
				<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="report_use">성적서 용도</label>
			   	<div class="col-sm-9">
			   		<input type="text" name="report_use" class="box form-control" required>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="report_korean">발급 매수</label>
			   	<div class="col-sm-9 form-inline">
			   		<p>국문 <input type="number" name="report_korean" class="box form-control" style="width:70px;" required>&nbsp;매</p>
					<p>영문 <input type="number" name="report_english" class="box form-control" style="width:70px;" required>&nbsp;매 </p>
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
			   		<input type="text" name="report_receive_address" class="box form-control" required>
			   	</div>
		  	</div>
				<h2>시료</h2>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_name">시료명</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="sample_name" class="box form-control" required>
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
			   		<textarea rows="2" name="sample_other_requirement" class="box form-control" ></textarea>
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
						  <input type="checkbox" name="is_repeated" value="true">반복 시험 실시
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" name="is_sop" value="true">SOP(GLP)실시
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
			   		<?php while($row=mysqli_fetch_array($result)){ ?>
		      		<div class="checkbox form-inline">
			      		<label>
							
							  <input type="checkbox" name="items[]" onclick="countpage(this, <?php echo $i; ?>)"  value="<?php echo $row['serial']; ?>"><?php echo $row['name']; ?>
							  <span id="hidden_page<?php echo $i++; ?>" style="display:none;">                            
							  &nbsp;&nbsp;/&nbsp;수량 &nbsp; 
							  <input type="number" name="items_count[]" class="box form-control" style="width:70px;" >
							  </span>

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
						  <input type="radio" name="sample_handle" value="return" onClick="fixprice2(this)">성적서 발급 시 반환
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sample_handle" value="drop" onClick="fixprice2(this)">성적서 발급 시 폐기
						</label>
						<label class="radio-inline">
						  <input type="radio" name="sample_handle" value="save" onClick="fixprice(this)">보관
						</label>
			   	</div>
		  	</div>
            <div id="hiddenpage" style="display:none;">
			  	<div class="form-group">
                    <label class="col-sm-3 control-label with-required" for="save_period_1">보관 필요시 기간</label>
                    <div class="col-sm-9 form-inline">
                        <input type="text" name="save_period_1" class="box form-control" placeholder="YYYYMMDD" >
                        ~
                        <input type="text" name="save_period_2" class="box form-control" placeholder="YYYYMMDD" >
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
            
            </div><!-- page2 end-->
		  	
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_handle_company">업체명</label>
			   	<div class="col-sm-9 form-inline">
			   		<input type="text" name="sample_handle_company" class="box form-control" required>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_handle_address">주소</label>
			   	<div class="col-sm-9">
			   		<input type="text" name="sample_handle_address" class="box form-control" required>
			   	</div>
		  	</div>
		  	<div class="form-group">
			  	<label class="col-sm-3 control-label with-required" for="sample_handle_sample">시료명</label>
			   	<div class="col-sm-9 form-inline">
			   	  <input type="text" name="sample_handle_sample" class="box form-control" required />
			   	</div>
		  	</div>
		  	<div class="form-group">
			   	<div class="col-sm-offset-3">
			   		<button type="submit" class="btn btn-primary">신청</button>&nbsp;
                    <a type="submit" class="btn btn-danger" href="/?page_id=284">취소</a>
			   	</div>
		  	</div>
		  	
			</form>
		</div> 

    <!-- jQuery 2.1.4 -->
    <script src="/admin/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" language="JavaScript">
		function countpage(obj, i){
			if(obj.checked == true){
				var a = "hidden_page"+i;
				document.getElementById(a).style.display = "inline";
			}
			
			
			if(obj.checked == false){
				var a = "hidden_page"+i;
				document.getElementById(a).style.display = "none";
			}
			
			
		}
	
	
	
         function fixprice(obj) { //obj변수로 this 를 받습니다.
             if (obj.checked == true) { //obj의 checked 가 true 인지 비교하면되겠습니다^^
                 document.getElementById("hiddenpage").style.display = "block";
                 
             } else {
                 document.getElementById("hiddenpage").style.display = "none";
                 
             }
         }
		 
         function fixprice2(obj) { //obj변수로 this 를 받습니다.
             if (obj.checked == true) { //obj의 checked 가 true 인지 비교하면되겠습니다^^
                 
                 document.getElementById("hiddenpage").style.display = "none";
             } else {
                 document.getElementById("hiddenpage").style.display = "block";
                 
             }
         }		
     </SCRIPT>