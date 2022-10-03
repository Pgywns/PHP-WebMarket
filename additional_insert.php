<meta charset="utf-8">
<?php

    $pdname = $_POST["pdname"];
    $pdcolor = $_POST["pdcolor"];
    $pdprice = $_POST["pdprice"];
    $pdtype = $_POST["items"];

	$upload_dir = 'C:\xampp\htdocs\pjimg\imgs';

	$upfile_name	 = $_FILES["addfile"]["name"];
	$upfile_tmp_name = $_FILES["addfile"]["tmp_name"];
	$upfile_type     = $_FILES["addfile"]["type"];
	$upfile_size     = $_FILES["addfile"]["size"];
	$upfile_error    = $_FILES["addfile"]["error"];

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size  > 1000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
	else
	{
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
	}

	$con = mysqli_connect("localhost", "Project", "12345", "project");

	$sql = "insert into product(pd_name, pd_color, pd_type, pd_price, file_name, file_type, file_copied) ";
	$sql .= "values('$pdname', '$pdcolor', '$pdtype', '$pdprice', ";
	$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);

	mysqli_close($con);

	echo "
	   <script>
	    location.href = 'index.php';
	   </script>
	";
?>
