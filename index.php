<html>
<head>
<title>NRRU Booking</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.container-main {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: #7C24DD;
  background: -webkit-linear-gradient(-135deg, #7C24DD, #0099B9);
  background: -o-linear-gradient(-135deg, #7C24DD, #0099B9);
  background: -moz-linear-gradient(-135deg, #7C24DD, #0099B9);
  background: linear-gradient(-135deg, #7C24DD, #0099B9);
}
</style>
</head>
<body bgcolor="#7C24DD" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (bg_login.jpg - Slices: 00, 01, 02, 03, 04, 05, 06, 07, 08) -->
<div class="container-main">
<table id="Table_01" width="700" height="351" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<img src="images/Splad-Screen_01.gif" width="97" height="119" alt=""></td>
		<td colspan="3">
			<img src="images/Splad-Screen_02.gif" width="388" height="119" alt=""></td>
		<td>
			<img src="images/Splad-Screen_03.gif" width="215" height="119" alt=""></td>
	</tr>
	<tr>
		<td colspan="2"><a href='#' onclick='clickSignon()'>
			<img border="0" src="images/Splad-Screen_04.gif" width="163" height="56" alt=""></a> </td>
		<td colspan="3">
			<img src="images/Splad-Screen_05.gif" width="537" height="56" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/Splad-Screen_06.gif" width="296" height="175" alt=""></td>
		<td colspan="2">
			<img src="images/Splad-Screen_07.gif" width="404" height="175" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="97" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="66" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="133" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="189" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="215" height="1" alt=""></td>
	</tr>
</table>
</div>
<!-- End Save for Web Slices -->
</body>
</html>
<script>

	function deleteAllCookies(){
		   var cookies = document.cookie.split(";");
		   //console.log(cookies);
		   for (var i = 0; i < cookies.length; i++){
		     //console.log(i);
		     deleteCookie(cookies[i].split("=")[0]);
		    }
	}

	function setCookie(name, value, expirydays) {
		 var d = new Date();
		 d.setTime(d.getTime() + (expirydays*24*60*60*1000));
		 var expires = "expires="+ d.toUTCString();
		 document.cookie = name + "=" + value + "; " + expires;
	}

	function deleteCookie(name){
		  setCookie(name,"",-0.01);
	}

	function clickSignon(){
		//var url="https://cos.nrru.ac.th/php-azure/authen.php?workId=0654a160311f7b42c7cc56273ad6b94e5ce7664b";
		var url="http://localhost/military/login.php";

		window.location.replace(url);
	}
	 deleteAllCookies();
</script>