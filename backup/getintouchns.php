<?
$pagetitle ="Shark Design &amp; Marketing Ltd - Newsletter Sign Up" ;
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

$git_contactus = "" ;
$git_newsletter = "style='color:#ffffff;'" ;

include 'include/header.php' ;
?>

<?

if (empty($_POST['txtName']) && empty($_POST['txtCompany'])  && empty($_POST['txtEmail'])) $newerror = "display:none;";
else $newerror = "";

$txtName = $_POST['txtName'] ;
$txtCompany = $_POST['txtCompany'] ;
$txtEmail = $_POST['txtEmail'] ;

$error ="" ;

if ($txtEmail == "") {$error = "Please enter an email address" ;}
if ($txtCompany == "") {$error = "Please enter your company name" ;}
if ($txtName == "") {$error = "Please enter your name" ;}

if($error != "")

{

?>
<form action="getintouchns.php" method="post" style="margin:0px;padding:0px;">
	<div id="left_cont">
   
			<div class="main_image">
				<img src="image/Contact-Banner-2.jpg" alt="Shark!" style="border:0;" />
				<span></span>
			</div>
	
	
		<h3 class="page_header wwd_fix"><img src="image/navi_nsu.gif" alt="Newsletter Sign Up" style="border:0;" /><span>Newsletter Sign Up</span></h3>

		<p>Newsletter sign up</p>

		<p>Want to keep up to date on all things Shark!? Sign up for our quarterly newsletter to receive information on Shark!, case studies, research and interesting things we've come across. Don't worry we aren't going to pass your details on to any 3rd parties.</p>

		<p>Required fields * <span style="display:inline;color:#85c7ee;padding-left:18px;<? echo $newerror; ?>"><? echo $error; ?></span></p>

		<p class="name">Your Name *</p>
		<p class="form"><input class="form" type="text" value="<? echo $txtName; ?>" name="txtName" /></p>

		<p class="name">Company Name*</p>
		<p class="form"><input class="form" type="text" value="<? echo $txtCompany; ?>" name="txtCompany" /></p>

		<p class="name">Email Address*</p>
		<p class="form"><input class="form" type="text" value="<? echo $txtEmail; ?>" name="txtEmail" /></p>

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
$txtEmail = $_POST['txtEmail'] ;

$pfw_header = "From: $txtEmail\n"
. "Reply-To: $txtEmail\n";

$pfw_subject = "Shark! Design Newsletter Sign Up";

$pfw_email_to = "andrew.mccaul@sharkcomms.co.uk";

$pfw_message = "Name: $txtName\n"
. "Company: $txtCompany\n"
. "Email Address: $txtEmail\n"
. "Visitor's IP: $pfw_ip\n"
. "";

mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;
?>
<form action="getintouchns.php" method="post">
	<div id="left_cont">
   
			<div class="main_image">
				<img src="image/Contact-Banner-2.jpg" alt="Shark!" style="border:0;" />
				<span></span>
			</div>
	
	
		<h3 class="page_header wwd_fix"><img src="image/navi_nsu.gif" alt="Newsletter Sign Up" style="border:0;" /><span>Newsletter Sign Up</span></h3>

		<p>Newsletter sign up</p>

		<p>Want to keep up to date on all things Shark!? Sign up for our quarterly newsletter to receive information on Shark!, case studies, research, and interesting things we've come across. Don't worry we aren't gong to pass your details on to any 3rd parties.</p>

		<p>Required fields * <span style="display:inline;color:#85c7ee;padding-left:18px;">Thank you for signing up to our newsletter.</span></p>

		<p class="name" style="color:#cccccc;">Your Name *</p>
		<p class="form"><input class="form" type="text" name="txtName" /></p>

		<p class="name" style="color:#cccccc;">Company Name*</p>
		<p class="form"><input class="form" type="text" name="txtCompany" /></p>

		<p class="name" style="color:#cccccc;">Email Address*</p>
		<p class="form"><input class="form" type="text" name="txtEmail" /></p>

		<p>
		<input type="submit" name="submit" value="Submit" />
		</p>

		<br />

<?

}

?>		

        <br />

		<br />

	</div>
</form>
	
<?
include 'include/footer.php' ;
?>