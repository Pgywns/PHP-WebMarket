<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">

<title></title>

<link href="./css/newproduct.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" type="text/css" href="./css/design.css">

<script>
  function check_input() {
      document.management.submit();
   }
</script>

</head>
<body>
  <header>
    	<?php include "main.php";?>
    </header>

<section>

<div id="wrapper1">
	<div id="newproduct" class="container">
		<div class="title">
			<h2>NEW</h2>
			<span class="byline">신상품 목록</span>

<form  name="management" method="post" action="management_insert.php" enctype="multipart/form-data">

</div>

<?php

$con = mysqli_connect("localhost", "Project", "12345", "project");
$sql = "select * from newproduct where pdnum='1'";
$sql2 = "select * from newproduct where pdnum='2'";
$sql3 = "select * from newproduct where pdnum='3'";
$sql4 = "select * from newproduct where pdnum='4'";

$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql2);
$result3 = mysqli_query($con, $sql3);
$result4 = mysqli_query($con, $sql4);

while ($row = mysqli_fetch_array($result))
{
  $src = $row['file_name'];
}

while ($row2 = mysqli_fetch_array($result2))
{
  $src2 = $row2['file_name'];
}

while ($row3 = mysqli_fetch_array($result3))
{
  $src3 = $row3['file_name'];
}

while ($row4 = mysqli_fetch_array($result4))
{
  $src4 = $row4['file_name'];
}
 ?>

		<div class="column1">
			<div class="box"> <a href="#"><img src='./images/<?=$src?>' class="image image-full" /></a>
	       <span class="col2"><input type="file" name="upfile1"></span>
				 </div>
		</div>

		<div class="column2">
			<div class="box"> <a href="#"><img src='./images/<?=$src2?>' class="image image-full" /></a>
        <span class="col2"><input type="file" name="upfile2"></span>
				 </div>
		</div>

		<div class="column3">
			<div class="box"> <a href="#"><img src='./images/<?=$src3?>' class="image image-full" /></a>
        <span class="col2"><input type="file" name="upfile3"></span>
				 </div>
		</div>

		<div class="column4">
			<div class="box"> <a href="#"><img src='./images/<?=$src4?>' class="image image-full" /></a>
	       <span class="col2"><input type="file" name="upfile4"></span>
				 </div>
		</div>

    <div class="corr">
    <ul>
  <span class="byline"><button type="button" onclick="check_input()">수정완료</button></span>
</ul>
</div>
  </form>
	</div>
</div>

</section>
<footer>
    <?php include "footer.php";?>
  </footer>
</body>
</html>
