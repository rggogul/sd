<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample PHP Programs by Gogul.R.G</title>

<script type="text/javascript">
function validate()
{
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;   // For email validation..
var regexMobObj = /^\(?([7-9]{1})\)?([0-9]{9})$/;  // For mobile number validation

	if(document.getElementById("uname").value == '')
	{
		alert("Name should not be blank");
		document.getElementById("uname").focus();
		return false;
	}
	if(document.getElementById("email").value == '')
	{
		alert("Email should not be blank");
		document.getElementById("email").focus();
		return false;
	}
	if(!(reg.test(document.getElementById("email").value)))
	{
		alert("Please provide correct email id.");
		document.getElementById("email").focus();
		return false;
	}
	if(!(regexMobObj.test(document.getElementById("mobile").value)))
	{
		alert("Please provide correct Mobile No.");
		document.getElementById("mobile").focus();
		return false;
	}
	
	if(document.getElementById("mobile").value == '')
	{
		alert("Mobile No. should not be blank");
		document.getElementById("mobile").focus();
		return false;
	}
	if(document.getElementById("message").value == '')
	{
		alert("Messages should not be empty");
		document.getElementById("message").focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<script type="text/javascript">

function sendmail()
{
	if(validate())
	{
	var uname = document.getElementById("uname").value;
	var email = document.getElementById("email").value;
	var mobile = document.getElementById("mobile").value;
	var message = document.getElementById("message").value;
	var xmlhttp;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var dataString = "uname="+uname+"&email="+email+"&mobile="+mobile+"&message="+message;
	
	xmlhttp.open("POST", "contactMail.php?"+dataString, false);
	xmlhttp.send();
	alert(xmlhttp.responseText); return false;
	//alert("hi");
	//$("#message_sent").html(xmlhttp.responseText);
	//document.getElementById("message_sent").value = xmlhttp.responseText;
	document.getElementById("uname").value = '';
	document.getElementById("email").value = '';
	document.getElementById("mobile").value = '';
	document.getElementById("message").value = '';
	}
}
</script>
</head>

<body>
            <form>
                <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2"><label id="message_sent" style="color:#000"></label>
</td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>Enter your name</td>
                          </tr>
                          <tr>
                            <td><input type="text" value="" name="uname" id="uname"> </td>
                          </tr>
                          <tr>
                            <td>Enter your Email</td>
                          </tr>
                          <tr>
                            <td><input type="text" value="" name="email" id="email"> </td>
                          </tr>
                          <tr>
                            <td>Enter your Mobile No.</td>
                          </tr>
                          <tr>
                            <td><input type="text" value="" name="mobile" id="mobile"> </td>
                          </tr>
                        </table>

                    </td>
                    <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>Enter your message</td>
                      </tr>
                      <tr>
                        <td> <textarea style="height:60px; width:150px;" name="message" id="message"></textarea></td>
                      </tr>
                      <tr>
                      <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center"><input type="button" value="submit" name="btn_submit" onClick="sendmail();" style="background-color:; border:none; padding:3px; cursor:pointer;"></td>
                      </tr>
                    </table>

                    </td>
                  </tr>
                </table>
                
</form>
</body>
</html>