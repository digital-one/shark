<!-- Add this to the header -->
<form action="contact.php" method="POST">



<!-- Add this to the php -->
<?

// assign variable to POST data


if (empty($_POST['txtName']) && empty($_POST['txtCompany']) && empty($_POST['txtContact']) && empty($_POST['txtEmail']) && empty($_POST['txtEnquiry'])) $newerror = "display:none;";
else $newerror = "";

$txtName = $_POST['txtName'] ;

$txtCompany = $_POST['txtCompany'] ;

$txtContact = $_POST['txtContact'] ;
$txtEmail = $_POST['txtEmail'] ;
$txtEnquiry = $_POST['txtEnquiry'] ;


// create empty error variable

$error ="" ;



// check for empty data in required fields


if ($txtEnquiry == "") {$error = "Please enter any comments" ;}

if ($txtEmail == "") {$error = "Please enter an email address" ;}
if ($txtContact == "") {$error = "Please enter your telephone number" ;}
if ($txtCompany == "") {$error = "Please enter your company name" ;}
if ($txtName == "") {$error = "Please enter your name" ;}


if($error != "")

{

?>

<!-- Contact page forms etc -->


						<p class="top">

						You can get in touch by filling in the simple form below and submitting your enquiry. Alternatively use the contact details below.

						</p>

						<p>Required fields* <span style="display:inline;color:#ff0000;padding-left:18px;<? echo $newerror; ?>">(<? echo $error; ?>)</span></p>


						<p class="form_text">Your Name*</p>

						<p class="form"><input type="text" name="txtName" value="<? echo $txtName; ?>" style="width:215px; height:18px; border:solid #999 1px;"></p>

						<p class="form_text">Company Name*</p>

						<p class="form"><input type="text" name="txtCompany" value="<? echo $txtCompany; ?>" style="width:215px; height:18px; border:solid #999 1px;"></p>

						<p class="form_text">Your Telephone Number*</p>

						<p class="form"><input type="text" name="txtContact" value="<? echo $txtContact; ?>"style="width:215px; height:18px; border:solid #999 1px;"></p>

						<p class="form_text">Your Email Address*</p>

						<p class="form"><input type="text" name="txtEmail" value="<? echo $txtEmail; ?>" style="width:215px; height:18px; border:solid #999 1px;"></p>

						<p class="form_text">Your Enquiry*</p>

						<p class="form"><textarea type="text" name="txtEnquiry" style="width:215px; height:104px; border:solid #999 1px;"><? echo $txtEnquiry; ?></textarea></p>


						<p>

							<INPUT TYPE="image" name="submit" SRC="images/submitbutton.jpg" style="height:26px; width:56px; padding-bottom:0px; margin-bottom:0px; padding-left:0px; ">

						</p>


<?

}

else

{

?>

<?

$pfw_ip= $_SERVER['REMOTE_ADDR'];


$txtName = $_POST['txtName'] ;

$txtCompany = $_POST['txtCompany'] ;

$txtContact = $_POST['txtContact'] ;
$txtEmail = $_POST['txtEmail'] ;
$txtEnquiry = $_POST['txtEnquiry'] ;


//Sending Email to form owner

$pfw_header = "From: $txtEmail\n"

  . "Reply-To: $txtEmail\n";

$pfw_subject = "Industria Medica Limited Website Enquiry";

$pfw_email_to = "charlottemidgley@aim.com";

$pfw_message = "Name: $txtName\n"
. "Campany: $txtCompany\n"

. "Contact Number: $txtContact\n"

. "Email Address: $txtEmail\n"

. "Comments: $txtEnquiry\n"
. "Visitor's IP: $pfw_ip\n"

. "";


mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;



?>

<!-- Thank You page code -->

						<p class="top">

						You can get in touch by filling in the simple form below and submitting your enquiry. Alternatively use the contact details below.

						</p>

						<p>Required fields* <span style="display:inline;color:#ff0000;padding-left:18px;">Thank you for your email enquiry.</span></p>


						<p class="form_text" style="color:#cccccc;">Your Name*</p>

						<p class="form"><input type="text" name="txtName" style="width:215px; height:18px; border:solid #ccc 1px;"></p>

						<p class="form_text" style="color:#cccccc;">Company Name*</p>

						<p class="form"><input type="text" name="txtCompany" style="width:215px; height:18px; border:solid #ccc 1px;"></p>

						<p class="form_text" style="color:#cccccc;">Your Telephone Number*</p>

						<p class="form"><input type="text" name="txtContact" style="width:215px; height:18px; border:solid #ccc 1px;"></p>

						<p class="form_text" style="color:#cccccc;">Your Email Address*</p>

						<p class="form"><input type="text" name="txtEmail" style="width:215px; height:18px; border:solid #ccc 1px;"></p>

						<p class="form_text" style="color:#cccccc;">Your Enquiry*</p>

						<p class="form"><textarea type="text" name="txtEnquiry" style="width:215px; height:104px; border:solid #ccc 1px;"></textarea></p>


						<p>

							<INPUT TYPE="image" name="submit" SRC="images/submitbutton.jpg" style="height:26px; width:56px; padding-bottom:0px; margin-bottom:0px; padding-left:0px; ">

						</p>


<?

}

?>

						

				<? include "includes/" .$banner_link1; ?>		


</form>



</body>

</html>