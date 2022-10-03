<!DOCTYPE html>

<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["level"])) $level = $_SESSION["level"];
    else $level = "";

    if(!$userid) {
      echo("
        <script>
        alert('로그인 후 이용해주세요!!');
        history.go(-1)
        </script>
        ");
      exit;
    }

    if($level == 1) {
      echo("
        <script>
        alert('관리자 아이디로는 불가능합니다!!');
        history.go(-1)
        </script>
        ");
      exit;
    }

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "Project", "12345", "project");

    $sql = "select * from product where num= $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $pd_name = $row['pd_name'];
    $pd_color = $row['pd_color'];
    $pd_type = $row['pd_type'];
    $pd_price = $row['pd_price'];
    $file_name = $row['file_name'];

    $sql = "insert into cart (num, id, pd_name, pd_color, pd_type, pd_price, file_name)";
    $sql .= "values('$num', '$userid', '$pd_name', '$pd_color', '$pd_type', '$pd_price', '$file_name')";
    mysqli_query($con, $sql);

    echo("
      <script>
      alert('장바구니에 추가되었습니다.');
      </script>
      ");

    mysqli_close($con);                // DB 연결 끊기

    echo "
      <script>
      history.go(-1)
      </script>
      ";
?>
