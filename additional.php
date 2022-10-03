<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/additional.css">

<script>
  function check_input() {
      if (!document.additional.pdname.value)
      {
          alert("상품정보를 입력하세요!");
          document.additional.pdname.focus();
          return;
      }
      if (!document.additional.pdcolor.value)
      {
          alert("상품정보를 입력하세요!");
          document.additional.pdcolor.focus();
          return;
      }
      if (!document.additional.pdprice.value)
      {
          alert("상품정보를 입력하세요!");
          document.additional.pdprice.focus();
          return;
      }

      document.additional.submit();
   }
</script>

</head>
<body>
	<header>
    	<?php include "main.php";?>
    </header>
	<section>
     	<div id="board_box">
  	    <h3 id="board_title">
  	    		상품 추가
  		</h3>
  	    <form  name="additional" method="post" action="additional_insert.php" enctype="multipart/form-data">
  	    	 <ul id="board_form">
  				<li>
  					<span class="col1">이름 : </span>
  					<span class="col2"><input name="pdname" type="text"></span>
  				</li>
  	    		<li>
  	    			<span class="col1">색상 : </span>
  	    			<span class="col2"><input name="pdcolor" type="text"></span>
  	    		</li>
  	    		<li>
  	    			<span class="col1">가격 : </span>
              <span class="col2"><input name="pdprice" type="text"></span>
  	    			</span>
  	    		</li>
            <li>
              <span class="col1">종류 : </span>
              <select name="items">
  			           <option value="top">상의</option>
  			           <option value="pants">하의</option>
  			           <option value="outer">아우터</option>
                   <option value="shoes">신발</option>
  		           </select>
            </li>
  	    		<li>
  			        <span class="col1"> 첨부 파일</span>
  			        <span class="col2"><input type="file" name="addfile"></span>
  			    </li>
  	    	    </ul>
  	    	<ul class="buttons">
  				<li><button type="button" onclick="check_input()">완료</button></li>
  			</ul>
  	    </form>
  	</div> <!-- board_box -->
	</section>
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
