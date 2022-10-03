<meta charset="utf-8">
<?php

	$upload_dir = 'C:\xampp\htdocs\pjimg\imgs';

	$upfile_name	 = $_FILES["upfile1"]["name"];
	$upfile_tmp_name = $_FILES["upfile1"]["tmp_name"];
	$upfile_type     = $_FILES["upfile1"]["type"];
	$upfile_size     = $_FILES["upfile1"]["size"];
	$upfile_error    = $_FILES["upfile1"]["error"];

	$upfile_name2	 = $_FILES["upfile2"]["name"];
	$upfile_tmp_name2 = $_FILES["upfile2"]["tmp_name"];
	$upfile_type2     = $_FILES["upfile2"]["type"];
	$upfile_size2     = $_FILES["upfile2"]["size"];
	$upfile_error2    = $_FILES["upfile2"]["error"];

	$upfile_name3	 = $_FILES["upfile3"]["name"];
	$upfile_tmp_name3 = $_FILES["upfile3"]["tmp_name"];
	$upfile_type3     = $_FILES["upfile3"]["type"];
	$upfile_size3     = $_FILES["upfile3"]["size"];
	$upfile_error3    = $_FILES["upfile3"]["error"];

	$upfile_name4	 = $_FILES["upfile4"]["name"];
	$upfile_tmp_name4 = $_FILES["upfile4"]["tmp_name"];
	$upfile_type4     = $_FILES["upfile4"]["type"];
	$upfile_size4     = $_FILES["upfile4"]["size"];
	$upfile_error4    = $_FILES["upfile4"]["error"];

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s_1");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file = $upload_dir.$copied_file_name;

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

	if ($upfile_name2 && !$upfile_error2)
	{
		$file2 = explode(".", $upfile_name2);
		$file_name2 = $file2[0];
		$file_ext2  = $file2[1];

		$new_file_name2 = date("Y_m_d_H_i_s_2");
		$new_file_name2 = $new_file_name2;
		$copied_file_name2 = $new_file_name2.".".$file_ext2;
		$uploaded_file2 = $upload_dir.$copied_file_name2;

		if (!move_uploaded_file($upfile_tmp_name2, $uploaded_file2) )
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
		$upfile_name2      = "";
		$upfile_type2      = "";
		$copied_file_name2 = "";
	}

	if ($upfile_name3 && !$upfile_error3)
	{
		$file3 = explode(".", $upfile_name3);
		$file_name3 = $file3[0];
		$file_ext3  = $file3[1];

		$new_file_name3 = date("Y_m_d_H_i_s_3");
		$new_file_name3 = $new_file_name3;
		$copied_file_name3 = $new_file_name3.".".$file_ext3;
		$uploaded_file3 = $upload_dir.$copied_file_name3;

		if (!move_uploaded_file($upfile_tmp_name3, $uploaded_file3) )
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
		$upfile_name3      = "";
		$upfile_type3      = "";
		$copied_file_name3 = "";
	}

	if ($upfile_name4 && !$upfile_error4)
	{
		$file4 = explode(".", $upfile_name4);
		$file_name4 = $file4[0];
		$file_ext4  = $file4[1];

		$new_file_name4 = date("Y_m_d_H_i_s_4");
		$new_file_name4 = $new_file_name4;
		$copied_file_name4 = $new_file_name4.".".$file_ext4;
		$uploaded_file4 = $upload_dir.$copied_file_name4;

		if (!move_uploaded_file($upfile_tmp_name4, $uploaded_file4) )
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
		$upfile_name4      = "";
		$upfile_type4      = "";
		$copied_file_name4 = "";
	}

	$con = mysqli_connect("localhost", "Project", "12345", "project");

	$sql = "delete from newproduct";
	mysqli_query($con, $sql);

	$sql = "insert into newproduct (pdnum, file_name, file_type, file_copied) ";
	$sql .= "values(1, '$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	$sql = "insert into newproduct (pdnum, file_name, file_type, file_copied) ";
	$sql .= "values(2, '$upfile_name2', '$upfile_type2', '$copied_file_name2')";
	mysqli_query($con, $sql);

	$sql = "insert into newproduct (pdnum, file_name, file_type, file_copied) ";
	$sql .= "values(3, '$upfile_name3', '$upfile_type3', '$copied_file_name3')";
	mysqli_query($con, $sql);

	$sql = "insert into newproduct (pdnum, file_name, file_type, file_copied) ";
	$sql .= "values(4, '$upfile_name4', '$upfile_type4', '$copied_file_name4')";
	mysqli_query($con, $sql);

	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'index.php';
	   </script>
	";
?>
