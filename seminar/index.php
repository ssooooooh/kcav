<?php include $_SERVER["DOCUMENT_ROOT"].'admin/includes/db.php'; ?>
<?php
    $query = "select * from _kcav_seminar";
    $result = mysqli_query ( $db_conn, $query );
    
    if (! $result) {
        $message = 'Invalid query: ' . mysqli_error () . "\n";
        $message .= 'Whole query: ' . $query;
        die ( $message );
    }
    $i =1;
	
	
	
?>


<?php global $current_user;
      get_currentuserinfo();
/*      echo $current_user->user_login; */
?>

<script>
function check_onclick(){
	theForm = document.frm1;
	if(theForm.seminar.value == "" || theForm.name.value == "" || theForm.company.value == "" || theForm.dept.value == "" || theForm.posi.value == "" ||
	    theForm.contact1_1.value == "" || theForm.contact1_2.value == "" || theForm.contact1_3.value == "" ||
		theForm.contact2_1.value == "" || theForm.contact2_2.value == "" || theForm.contact2_3.value == "" ||
		theForm.contact3_1.value == "" || theForm.contact3_2.value == "" || theForm.contact3_3.value == "" ||
		theForm.email.value == "" || theForm.dining.value == ""){
			
			alert("empty.");
			
			
			
			}
	}

</script>
  <form class="form-horizontal" action="/seminar/seminar.php" method="post" name=:"frm1">
  
  
   <div class="form-group">
      <label class="col-sm-2 control-label">세미나</label>
      <div class="col-sm-10">
      
          <select class="form-control" name="seminar">
            <option>참석할 세미나를 선택해주세요.</option>
            <?php while($row=mysqli_fetch_array($result)){ ?> 
            <option value="<?php echo $row['seminar_num']; ?>"><?php echo $row['seminar_name']; ?></option>
            <?php } ?>
          </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">이름</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">회사명</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="company" placeholder="Company">
      </div>
    </div>
    
    <div>
      <div class="form-group col-sm-6">
        <label class="col-xs-4 control-label">부서명</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" name="dept" placeholder="Department">
        </div>
      </div>
      <div class="form-group col-sm-6">
        <label class="col-xs-4 control-label">직급</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" name="posi" placeholder="Position">
        </div>
      </div>
      
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">전화</label>
      <div class="col-sm-10 row">
        <div class="col-xs-3">
          <select class="form-control" name="contact1_1">
            <option>선택하세요</option>
            <option>02</option>
            <option>031</option>
            <option>032</option>
            <option>033</option>
            <option>041</option>
            <option>042</option>
            <option>043</option>
            <option>044</option>
            <option>051</option>
            <option>052</option>
            <option>053</option>
            <option>054</option>
            <option>055</option>
            <option>061</option>
            <option>062</option>
            <option>063</option>
            <option>064</option>
          </select>
        </div>
        <div class="col-xs-1 testpadding">)</div>
        <div class="col-xs-3">
          <input type="text" class="form-control"  name="contact1_2" placeholder="123">
        </div>
        <div class="col-xs-1">-</div>
        <div class="col-xs-4">
          <input type="text" class="form-control"  name="contact1_3" placeholder="4567">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">핸드폰</label>
      <div class="col-sm-10">
        <div class="col-xs-3">
          <select class="form-control" name="contact2_1">
            <option>선택하세요</option>
            <option>010</option>
            <option>011</option>
            <option>017</option>
          </select>
        </div>
        <div class="col-xs-1"> ) </div>
        <div class="col-xs-3">
          <input type="text" class="form-control"  name="contact2_2" placeholder="1234">
        </div>
        <div class="col-xs-1"> - </div>
        <div class="col-xs-4">
          <input type="text" class="form-control"  name="contact2_3" placeholder="5678">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">팩스</label>
      <div class="col-sm-10">
        <div class="col-xs-3">
          <select class="form-control" name="contact3_1">
            <option>선택하세요</option>
            <option>010</option>
            <option>011</option>
            <option>017</option>
          </select>
        </div>
        <div class="col-xs-1"> ) </div>
        <div class="col-xs-3">
          <input type="text" class="form-control"  name="contact3_2" placeholder="1234">
        </div>
        <div class="col-xs-1"> - </div>
        <div class="col-xs-4">
          <input type="text" class="form-control"  name="contact3_3" placeholder="5678">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">식사참석 유무</label>
      <div class="col-sm-10">
        <label class="radio-inline">
          <input type="radio"name="dining" value="yes">
          참석 </label>
        <label class="radio-inline">
          <input type="radio" name="dining" value="no">
          불참 </label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
      	<input type="hidden" name="uid" value="<? echo $current_user->user_login; ?>" />
        <button type="submit" value="Report Abduction" class="btn btn-default"  onclick="check_onclick()">Sign in</button>
      </div>
    </div>
  </form>
