<?php

$captcha = $_POST['captcha'];

	if ($captcha <> "") {
		
	header("Location: ../fail.html");
		exit;
		
}


/* Subject and email variables */

	$emailSubject = 'Website Feedback Email';
	$webMaster = 'mail@digibug.co.uk';
	
/* Gathering Data Variables */	

	$Name = $_POST['Name'];
	$Company = $_POST['Company'];
	$Phone = $_POST['Phone'];
	$Email = $_POST['Email'];
	$Message = $_POST['Message'];

	$body = <<<EOD
<html>
<body>
<table width="300px">
  <tr>
    <td align="left" valign="top"><p>The following email has been completed online and sent to you by $Email. <br>
    Please see the comments they have sent below..<br></p>
      <table width="550" align="left" valign="top">
        <tr>
          <td colspan="2" valign="top"><h2>Enquiry Details...</h2></td>
        </tr>
        <tr>
          <td width="50%" valign="top"><strong>Name:</strong></td>
          <td width="50%" valign="top">$Name</td>
        </tr>
        <tr>
          <td valign="top"><strong>Company: </strong></td>
          <td valign="top"> $Company</td>
        </tr>
        <tr>
          <td valign="top"><strong>Telephone Number: </strong></td>
          <td valign="top"> $Phone</td>
        </tr>
        <tr>
          <td valign="top"><strong>Email: </strong></td>
          <td valign="top"> $Email</td>
        </tr>

        <tr>
          <td valign="top"><strong>Comments: </strong></td>
          <td valign="top"> $Message</td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
EOD;

	$headers = "From: $Email\r\n";
	$headers .= "Content-type: text/html\r\n";
	$success = mail($webMaster, $emailSubject, $body, $headers);
	header("Location: ../thankyou.html");

?>