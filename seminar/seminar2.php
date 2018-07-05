<? 
$uid = $_POST['uid'];
echo $uid;
?>
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
<script>
function check_onclick(){
	//theForm = document.frm1;
	if(document.f.seminar.value == "" || document.f.name.value == "" || document.f.company.value == "" || document.f.dept.value == "" || document.f.posi.value == "" ||
	    document.f.contact1_1.value == "" || document.f.contact1_2.value == "" || document.f.contact1_3.value == "" ||
		document.f.contact2_1.value == "" || document.f.contact2_2.value == "" || document.f.contact2_3.value == "" ||
		document.f.contact3_1.value == "" || document.f.contact3_2.value == "" || document.f.contact3_3.value == "" ||
		document.f.email.value == "" || document.f.dining.value == ""){			
			  alert("비밀번호를 입력하지 않았습니다.");
 // document.f.pw1.focus();
 				 return;
			}
	}

</script>
</head>

<body>
<div class="container">
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
 <form class="form-horizontal" action="seminar.php" method="post" name="f">
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
        <label class="col-sm-4 control-label">부서명</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="dept" placeholder="Department">
        </div>
      </div>
      <div class="form-group col-sm-6">
        <label class="col-sm-4 control-label">직급</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="posi" placeholder="Position">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">전화</label>
      <div class="col-sm-10">
        <div class="col-sm-3">
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
        <div class="col-sm-1"> ) </div>
        <div class="col-sm-3">
          <input type="text" class="form-control"  name="contact1_2" placeholder="123">
        </div>
        <div class="col-sm-1"> - </div>
        <div class="col-sm-4">
          <input type="text" class="form-control"  name="contact1_3" placeholder="4567">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">핸드폰</label>
      <div class="col-sm-10">
        <div class="col-sm-3">
          <select class="form-control" name="contact2_1">
            <option>선택하세요</option>
            <option>010</option>
            <option>011</option>
            <option>017</option>
          </select>
        </div>
        <div class="col-sm-1"> ) </div>
        <div class="col-sm-3">
          <input type="text" class="form-control"  name="contact2_2" placeholder="1234">
        </div>
        <div class="col-sm-1"> - </div>
        <div class="col-sm-4">
          <input type="text" class="form-control"  name="contact2_3" placeholder="5678">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">팩스</label>
      <div class="col-sm-10">
        <div class="col-sm-3">
          <select class="form-control" name="contact3_1">
            <option>선택하세요</option>
            <option>010</option>
            <option>011</option>
            <option>017</option>
          </select>
        </div>
        <div class="col-sm-1"> ) </div>
        <div class="col-sm-3">
          <input type="text" class="form-control"  name="contact3_2" placeholder="1234">
        </div>
        <div class="col-sm-1"> - </div>
        <div class="col-sm-4">
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
        <button type="submit" value="Report Abduction" class="btn btn-default" onClick="check_onclick()">Sign in</button>
      </div>
    </div>
  </form>
</div>
</body>
<!-- jQuery 2.1.4 -->
<script src="/admin/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>
