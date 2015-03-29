<?
$pagetitle ="Shark Design &amp; Marketing Ltd - Get in Touch - Contact Us" ;
$pagedescription = "Shark! is a Yorkshire based design and marketing agency specialising in branding, design for print, marketing strategy, and web design & development." ;
$pagekeywords = "shark!, shark, graphic, design, creative, marketing, branding, digital, logo, strategy, web, website, e-commerce, SEO, advertising, agency, agencies, new media, online, poster, take one, flyer, folder, mailing, mail pack, mail shot, POS, brochure, signage." ;

$as_wwa = "" ;
$as_ks = "" ;
$as_wwd = "" ;

$cs_one = "" ;
$cs_two = "" ;
$cs_three = "" ; 
$cs_four = "" ;
$cs_five = "" ;
$cs_archive = "" ;

$p_branding = "" ;
$p_digital = "" ;
$p_dfp = "" ;
$p_ls = "" ;

$git_contactus = "style='color:#ffffff;'" ;
$git_newsletter = "" ;


include 'include/header.php' ;
?>

<?

if (empty($_POST['txtName']) && empty($_POST['txtCompany']) && empty($_POST['txtContact']) && empty($_POST['txtEmail']) && empty($_POST['txtEnquiry'])) $newerror = "display:none;";
else $newerror = "";

$txtName = $_POST['txtName'] ;
$txtCompany = $_POST['txtCompany'] ;
$txtContact = $_POST['txtContact'] ;
$txtEmail = $_POST['txtEmail'] ;
$txtEnquiry = $_POST['txtEnquiry'] ;

$error ="" ;

if ($txtEnquiry == "") {$error = "Please enter your enquiry" ;}
if ($txtEmail == "") {$error = "Please enter an email address" ;}
if ($txtContact == "") {$error = "Please enter your telephone number" ;}
if ($txtCompany == "") {$error = "Please enter your company name" ;}
if ($txtName == "") {$error = "Please enter your name" ;}

if($error != "")

{

?>
<form action="getintouchcu.php" method="post" style="margin:0px;padding:0px;">
	<div id="left_cont">
		
			<div class="main_image">
				<img src="image/Contact-Banner-2.jpg" alt="Shark!" style="border:0;" />
				<span></span>
			</div>

		<h3 class="page_header wwd_fix"><img src="image/navi_cu.gif" alt="Contact us" style="border:0;" /><span>Contact us</span></h3>

			<p>If you want to have a chat about a particular project or want to see more of our work you can get in touch by calling <strong>01422 375 333</strong>, or emailing us at <a href="mailto:info@sharkdesign.co.uk?subject=Contact Shark! - website enquiry" title="Contact Shark! - website enquiry">info&#64;sharkdesign.co.uk</a>.</p>

			<p>Alternatively fill out the form below and we will contact you shortly.</p>

			<p>Required fields * <span style="display:inline;color:#85c7ee;padding-left:18px;<? echo $newerror; ?>"><? echo $error; ?></span></p>

			<p class="name">Your Name *</p>
			<p class="form"><input class="form" type="text" value="<? echo $txtName; ?>" name="txtName"/></p>

			<p class="name">Company Name *</p>
			<p class="form"><input class="form" type="text" value="<? echo $txtCompany; ?>" name="txtCompany"/></p>

			<p class="name">Telephone No. *</p>
			<p class="form"><input class="form" type="text" value="<? echo $txtContact; ?>" name="txtContact"/></p>

			<p class="name">Email Address *</p>
			<p class="form"><input class="form" type="text" value="<? echo $txtEmail; ?>" name="txtEmail"/></p>

			<p class="name">Enquiry *</p>
			<p class="form"><textarea class="form" name="txtEnquiry" rows="20" cols="80"><? echo $txtEnquiry; ?></textarea></p>

			<p>
			<input type="submit" name="submit" value="Submit" />
			</p>

			<br />

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

$pfw_header = "From: $txtEmail\n"
. "Reply-To: $txtEmail\n";

$pfw_subject = "Shark! Design Website Enquiry";

$pfw_email_to = "andrew.mccaul@sharkcomms.co.uk";

$pfw_message = "Name: $txtName\n"
. "Company: $txtCompany\n"
. "Telephone Number: $txtContact\n"
. "Email Address: $txtEmail\n"
. "Enquiry: $txtEnquiry\n"
. "Visitor's IP: $pfw_ip\n"
. "";

mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;
?>
<form action="getintouchcu.php" method="post">
			<div id="left_cont">
		
			<div class="main_image">
				<img src="image/Contact-Banner-2.jpg" alt="Shark!" style="border:0;" />
				<span></span>
			</div>

		<h3 class="page_header wwd_fix"><img src="image/navi_cu.gif" alt="Contact us" style="border:0;" /><span>Contact us</span></h3>

			<p>If you want to have a chat about a particular project or want to see more of our work you can get in touch by calling 01422 375 333. Alternatively fill out the form below and we will contact you shortly.</p>

			<p>Required fields * <span style="display:inline;color:#85c7ee;padding-left:18px;">Thank you for your email enquiry.</span></p>

			<p class="name" style="color:#cccccc;">Your Name *</p>
			<p class="form"><input class="form" type="text" name="txtName"/></p>

			<p class="name" style="color:#cccccc;">Company Name *</p>
			<p class="form"><input class="form" type="text" name="txtCompany"/></p>

			<p class="name" style="color:#cccccc;">Telephone No.*</p>
			<p class="form"><input class="form" type="text" name="txtPhone"/></p>

			<p class="name" style="color:#cccccc;">Email Address *</p>
			<p class="form"><input class="form" type="text" name="txtEmail"/></p>

			<p class="name" style="color:#cccccc;">Enquiry *</p>
			<p class="form"><textarea class="form" name="txtEnquiry" rows="20" cols="80"></textarea></p>

			<p>
			<input type="submit" name="submit" value="Submit" />
			</p>

			<br />

<?

}

?>		



		
	    
		<p>Shark! Design &amp; Marketing
		<br />
		1st Floor,
		<br />
		Unit B3,
		<br />
		Lowfields Close,
		<br />
		Elland
		<br />
		HX5 9DX
		<br />
		<br />
		Registered in England No:
		<br />
		581 7121</p>

		<br />

		<br />

	</div>
</form>
	
<?
include 'include/footer.php' ;
?>