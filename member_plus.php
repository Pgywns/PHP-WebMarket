<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)");  // 가입 날짜


    $con = mysqli_connect("localhost", "Project", "12345", "project");

	$sql = "insert into member(id, pass, name, email, regist_day, level) ";
	$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 5)";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>
