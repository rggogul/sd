<?php
session_start();
include("../includes/functions.php");
getDB();
?>
<html>
<head>
<title>Sample Login Program by Gogul.R.G</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%"><tr>
<td>&nbsp;</td></tr>
</table>
<?php
if(isset($_POST["postback"]))
{
	extract($_POST);
	$rs = mysql_query("select * from users where username='$username' and password='$password'");
	if(mysql_num_rows($rs) > 0)
	{
		while($row = mysql_fetch_array($rs))
		{
			$_SESSION["username"] = $username;
			$_SESSION["admin_logged"] = 1;
			$_SESSION["user_id"] = $row['id'];
			$_SESSION["name"]=$row['name'];
			$_SESSION["lastlogin"]=$row['lastlogin'];
			
			mysql_query('update users set lastlogin = CURDATE() where id = '.$row['id']);
			$msg = "Login Successful";
			
		}
	}
	else
	{
		$msg = "Login Failed. Invalid Username / Password";
	}
}
?>
<form method="post" name="frmLogin">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <table width="300" align="center" border="0" cellspacing="1" cellpadding="5" class="table_border">
    	<tr><td colspan="2" class="tableheading">Admin Login</td></tr>
		<?php
			if(isset($msg))
			{
		?>
          <tr> 
            <td colspan="2" class="textarial"><?php echo $msg?></td>
          </tr>
		 <?php
		 	}
		?>
          <tr> 
            <td width="50%" class="body_title_menu">Username</td>
            <td width="50%"><input name="username" type="text" class="dropbox" id="username"></td>
          </tr>
          <tr> 
            <td class="body_title_menu">Password</td>
            <td><input name="password" type="password" class="dropbox" id="password"></td>
          </tr>
          <tr> 
            <td>  <input name="Submit" type="submit" class="button" value="Login"> <input type="hidden" name="postback" value="true"></td>
          </tr>
        </table></td>
  </tr>
</table>
</form>
</body>
</html>
