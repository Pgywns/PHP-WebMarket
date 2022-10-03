<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title></title>

<link href="./css/newproduct.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" type="text/css" href="./css/design.css">

</head>
<body>
  <header>
    	<?php include "main.php";?>
    </header>

<div id="wrapper1">
	<div id="newproduct" class="container">
		<div class="title">
			<h2>PANTS</h2>
			<span class="byline">하의</span> </div>

<?php
  if (isset($_GET["page"]))
    $page = $_GET["page"];
  else
    $page = 1;

      $con = mysqli_connect("localhost", "Project", "12345", "project");
    	$sql = "select * from product where pd_type='pants'";
    	$result = mysqli_query($con, $sql);
    	$total_record = mysqli_num_rows($result); // 전체 글 수

    	$scale = 10;
      $pdnum = 1;

    	// 전체 페이지 수($total_page) 계산
    	if ($total_record % $scale == 0)
    		$total_page = floor($total_record/$scale);
    	else
    		$total_page = floor($total_record/$scale) + 1;

    	// 표시할 페이지($page)에 따라 $start 계산
    	$start = ($page - 1) * $scale;

    	$number = $total_record - $start;

       for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
       {
          mysqli_data_seek($result, $i);
          // 가져올 레코드로 위치(포인터) 이동
          $row = mysqli_fetch_array($result);
          // 하나의 레코드 가져오기
        $pdnumresult = ($pdnum % 4);
        $num         = $row["num"];
        $pd_name     = $row["pd_name"];
        $pd_color    = $row["pd_color"];
        $pd_type     = $row["pd_type"];
    	  $file_name   = $row["file_name"];
        $pd_price    = $row["pd_price"];

?>

<?php
  if ($pdnumresult != 0) {
?>

<div class="column1">
  <div class="box"> <img src='./images/<?=$file_name?>' class="image image-full" />
    <span class="col5"><?=number_format($pd_price)?>￦</span>
    <br>
    <br>
    <a href="buy_form.php" class="button button-small">구매하기</a>
    <img src="images/cart.jpg" class="image imagecart" onclick="location.href='cart.php?num=<?=$num?>&page=<?=$page?>'"></div>
</div>

<?php
} else if ($pdnumresult == 0) {
?>

 <div class="column4">
   <div class="box"> <img src='./images/<?=$file_name?>' class="image image-full" />
     <span class="col5"><?=number_format($pd_price)?>￦</span>
     <br>
     <br>
     <a href="#" class="button button-small">구매하기</a>
     <img src="images/cart.jpg" class="image imagecart" onclick="location.href='cart.php?num=<?=$num?>&page=<?=$page?>'"></div>
 </div>

<?php
}
 ?>

    <?php
       	   $number--;
           $pdnum++;
       }
       mysqli_close($con);

    ?>
	</div>
</div>

<footer>
    <?php include "footer.php";?>
  </footer>
</body>
</html>
