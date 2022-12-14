<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" type="text/css" href="./css/design.css">
<link rel="stylesheet" type="text/css" href="./css/cart.css">
</head>
<body>

  <?php
  if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
  else $userid = "";
  ?>

<header>
    <?php include "main.php";?>
</header>
<section>
   	<div id="board_box">
      <h3>
        장바구니
    </h3>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">이름</span>
					<span class="col3">색상</span>
					<span class="col4">가격</span>
					<span class="col5">종류</span>
          <span class="col7">삭제</span>
				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	$con = mysqli_connect("localhost", "Project", "12345", "project");
	$sql = "select * from cart order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	$scale = 5;

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

    $id          = $row["id"];
	  $num         = $row["num"];
	  $pd_name     = $row["pd_name"];
	  $pd_color    = $row["pd_color"];
	  $pd_type     = $row["pd_type"];
    $pd_price    = $row["pd_price"];
    $file_name   = $row["file_name"];

?>

<?php
if ($userid == $id) {
 ?>

				<li>
					<span class="col1"><img src='./images/<?=$file_name?>' width="70" height="70"/></span>
					<span class="col2"><?=$pd_name?></span>
					<span class="col3"><?=$pd_color?></span>
					<span class="col4"><?=number_format($pd_price)?></span>
					<span class="col5"><?=$pd_type?></span>
          <button onclick="location.href='cart_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button>
				</li>

<?php
}
?>

<?php
   	   $number--;
   }
   mysqli_close($con);

?>
	    	</ul>
			<ul id="page_num">
<?php
	if ($total_page>=2 && $page >= 2)
	{
		$new_page = $page-1;
		echo "<li><a href='cart_form.php?page=$new_page'>◀ 이전</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='cart_form.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)
   	{
		$new_page = $page+1;
		echo "<li> <a href='cart_form.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";
?>
				</li>
			</ul>
	</div> <!-- board_box -->
</section>
<footer>
    <?php include "footer.php";?>
  </footer>
</body>
</html>
