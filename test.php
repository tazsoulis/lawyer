Your email address is: <?php echo $_POST["email"]; ?>

<?php
	if(isset($_POST['contactButton'])){
		$url='https://www.google.com/recaptcha/api/siteverify';
		$privatekey="6LdKEhATAAAAAGpA8QjM4n9xOeiW_FCXmrBz6MZe";

		$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	
		$data = json_decode($response);

		if(isset($data->sucess) AND $data->sucess==true){
			header('location: http://localhost/nomiki2/index.php?CaptchaPass=True');
		}else{
			header('location: http://localhost/nomiki2/index.php?CaptchaFail=True');
			echo"error";
		}
	}


?>

<?php if (isset($_GET['CaptchaPass'])) {?>
<div><span>Το Μήνυμα στάλθηκε</span></div>
<?php } ?>
<?php if (isset($_GET['CaptchaFail'])) {?>
<div><span>faild message Captchasend</span></div>
<?php } ?>