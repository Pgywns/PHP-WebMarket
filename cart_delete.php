<script>
  function delCheck() {
    var ans = confirm("삭제하시겠습니까?");
  }
</script>
<?php

echo"
<script>
    delCheck();
</script>
";

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "Project", "12345", "project");
    $sql = "select * from cart where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $sql = "delete from cart where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'cart_form.php?page=$page';
	     </script>
	   ";
?>
