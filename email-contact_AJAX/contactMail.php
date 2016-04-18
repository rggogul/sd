<?php
extract($_REQUEST);
$currentmail="rggogul24@gmail.com";
$emailmsg = '<table align="center" width="600" border="1">
<tr><td>Name</td><td>'.$uname.'</td></tr>
<tr><td width="50%">Email</td><td>'.$email.'</td></tr>
<tr><td width="50%">Mobile</td><td>'.$mobile.'</td></tr>
<tr><td width="50%">Message</td><td>'.$message.'</td></tr>
</table>
';
$subject = 'New enquiry mail';
$to = $currentmail; 
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: admin@gogul.com \r\n";
mail($to, $subject, $emailmsg, $headers);
echo "Message Submitted Successfully";
?>