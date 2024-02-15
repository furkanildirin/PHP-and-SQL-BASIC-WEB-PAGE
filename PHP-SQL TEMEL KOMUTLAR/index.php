<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<title>furkan ildirin Final Projesi</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap">
<style>
  #myMessage {
    font-family: 'Dancing Script', cursive;
    font-weight: bold;
  }
</style>

<?php 
	$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	$url_components = parse_url($url);
	
	if( isset( $url_components["query"] ) )
	{
		parse_str($url_components["query"], $params);
	}
	
	if( !isset($params["login"]) )
	{
		if( !session_status() === PHP_SESSION_NONE )
			session_destroy();
	}
	else
		session_start();
?>
<script>
	function formTemizle()
	{
		document.getElementById("name").value = "";
		document.getElementById("surname").value = "";
		document.getElementById("adress").value = "";
		document.getElementById("username").value = "";
		document.getElementById("password").value = "";
	}
	
	function topluSil()
	{
		var checkboxes = document.getElementsByName("deleteCheckbox");
		var idsToDelete = [];
		
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].checked) {
				idsToDelete.push(checkboxes[i].value);
			}
		}
		
		if (idsToDelete.length > 0) {
			if (confirm("Seçili satırları silmek istediğinize emin misiniz?")) {
				window.location = "login.php?delete=true&id=" + idsToDelete.join(",");
			}
		} else {
			alert("Lütfen silmek istediğiniz satırları seçin.");
		}
	}
</script>
</head>
	
<body>
<form id="form1" name="form1" method="post" action="login.php">
  <table align="center" width="200" border="0">
    <tbody>
      <tr>
        <td>Ad:</td>
        <td><label for="textfield"></label>
        <input type="text" name="name" id="name" value='<?php echo isset( $_SESSION["name"] ) ? $_SESSION["name"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>Soyad:</td>
        <td><input type="text" name="surname" id="surname" value='<?php echo isset( $_SESSION["surname"] ) ? $_SESSION["surname"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>Adres:</td>
        <td><input type="text" name="adress" id="adress" value='<?php echo isset( $_SESSION["adress"] ) ? $_SESSION["adress"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>Kullanıcı Adı:</td>
        <td><input type="text" name="username" id="username" value='<?php echo isset( $_SESSION["username"] ) ? $_SESSION["username"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>Şifre:</td>
        <td><input type="text" name="password" id="password" value='<?php echo isset( $_SESSION["password"] ) ? $_SESSION["password"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">
          <input type="submit" name="submit" id="submit" value="Gönder">
          <input type="button" name="reset" id="reset" value="Sıfırla" onClick="formTemizle();">
        </td>
      </tr>
    </tbody>
  </table>
</form>
<?php
	$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	$url_components = parse_url($url);
	
	if( isset( $url_components["query"] ) )
	{
		parse_str($url_components["query"], $params);
	}
	
	if( isset($params["name"] ) && $params["name"] == "empty" )
		echo "Please enter a name for the user!";
	if( isset($params["surname"] ) && $params["surname"] == "empty" )
		echo "Please enter a surname for the user!";
	if( isset($params["adress"] ) && $params["adress"] == "empty" )
		echo "Please enter an adress for the user!";
	if( isset($params["username"] ) && $params["username"] == "empty" )
		echo "Please enter a username for the user!";
	if( isset($params["password"] ) && $params["password"] == "empty" )
		echo "Please enter a password for the user!";
?>
<div align="center" id="myMessage">
  <h2><i class="far fa-laugh"></i></i></h2>
</div>
<div align="center" id="myMessage">
  <h4>FURKAN İLDİRİN <i class="far fa-laugh"></i></i></h4>
</div>


</body>
</html>
