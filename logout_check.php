<script>
	function delCheck() {
		var ans = confirm("로그아웃하시겠습니까?");
    if (ans == true) {
      var ref;
      ref = "logout.php";
      location = ref;
	}
  else {
            location.href = 'index.php';
  }
}
  delCheck();
</script>
