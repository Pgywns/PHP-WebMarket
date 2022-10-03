<?php

  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["level"]);
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
