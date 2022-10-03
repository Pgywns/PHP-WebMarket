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
    $sql = "select * from product where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $sql = "delete from product where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'delete_form.php?page=$page';
	     </script>
	   ";
?>
