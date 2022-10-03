<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title></title>

<link href="./css/main.css" rel="stylesheet" type="text/css" media="all" />

<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["level"])) $level = $_SESSION["level"];
    else $level = "";
?>
</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="menu1">
				<?php
				    if(!$userid) {
				?>
				<ul>
				<li><a href="login_form.php"  title="">LOGIN</a></li>
				<li><a href="member_form.php"  title="">JOIN</a></li>
				<li><a href="cart_form.php"  title="">CART</a></li>
				<li><a href="#"  title="">MEMBER BOARD</a></li>
				<li><a href="#"  title="">REVIEW</a></li>
			</ul>
				<?php
      } else if($level == 5) {
				?>
				<ul>
				<li><a href="logout_check.php"  title="">LOGOUT</a></li>
				<li><a href="member_form.php"  title="">JOIN</a></li>
				<li><a href="cart_form.php"  title="">CART</a></li>
				<li><a href="#"  title="">MEMBER BOARD</a></li>
				<li><a href="#"  title="">REVIEW</a></li>
			</ul>
        <?php
      } else if($level ==1) {
        ?>
        <ul>
        <li><a href="logout_check.php"  title="">LOGOUT</a></li>
        <li><a href="member_form.php"  title="">JOIN</a></li>
        <li><a href="management.php"  title="">MANAGEMENT</a></li>
        <li><a href="#"  title="">MEMBER BOARD</a></li>
        <li><a href="#"  title="">REVIEW</a></li>
      </ul>

        <?php
      }
				?>

		</div>
		<div id="logo">
			<h1><a href="index.php">SHOP</a></h1>
			 </div>
		<div id="menu">
      <?php
      if($level == 5 || !$userid) {

      ?>
			<ul>
				<li><a href="top.php"  title="">TOP</a></li>
				<li><a href="pants.php"  title="">PANTS</a></li>
				<li><a href="outer.php"  title="">OUTER</a></li>
				<li><a href="shoes.php"  title="">SHOES</a></li>
			</ul>
      <?php
    } else if ($level == 1) {
      ?>
      <ul>
        <li><a href="top.php"  title="">TOP</a></li>
        <li><a href="pants.php"  title="">PANTS</a></li>
        <li><a href="outer.php"  title="">OUTER</a></li>
        <li><a href="shoes.php"  title="">SHOES</a></li>
        <li><a href="additional.php"  title="">ADDITIONAL</a></li>
        <li><a href="delete_form.php"  title="">DELETE</a></li>
      </ul>
      <?php
    }
      ?>
		</div>
	</div>
</div>

</body>
</html>
