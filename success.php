<?php 
	session_start();

	$url = $_SERVER['REQUEST_URI'];
	$parts = parse_url($url);
	parse_str($parts['query'], $query);
	$tmp=$query['t'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="assets/img/logo.ico">
	<title>Νομική Συμβουλή</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/sweetalert.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php

	//check if the payment is success or fail
	if(isset($tmp)){
		echo '<script type="text/javascript">';
	  	echo 'setTimeout(function () { swal("Σας ευχαριστούμε!","Η αποστολή των στοιχείων σας έγινε με απόλυτη επιτυχία.!","success");';
	  	echo '}, 1000);</script>';
		// contact form after successfull payment
			$name = $_SESSION['data']['fname'];
			$email = $_SESSION['data']['email'];
			$message = $_SESSION['data']['text']; 
			$formcontent="Απο: $name \n \n email: $email \n \n Μήνυμα: $message";
			$recipient = "mitronatsios@gmail.com, nikodimosstavridis@gmail.com";
			$subject = "Contact Form";
			$mailheader = "From: $email \r\n";
			mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	} else{
		echo '<script type="text/javascript">';
	  	echo 'setTimeout(function () { swal("Λυπούμαστε!","Η συναλλαγή δεν ολοκληρώθηκε!","error");';
	  	echo '}, 1000);</script>';
	}


?>
	<div class="container">
		<div class="row">
			<div class="col s12 m8 offset-m2">
				<div class="card blue-grey darken-1">
					<div class="row">
						<div class="col s10 offset-s1 m4 offset-m4">
							<div class="center-align">
								<img class="logo" src="assets/img/logo.png">
							</div>
						</div>
						<div class="col s12 m10 offset-m1">
							<h5 class=" white-text center-align spacer-90">ΨΑΧΝΕΤΕ ΛΥΣΗ ΣΤΟ ΠΡΟΒΛΗΜΑ ΣΑΣ;<br><br>ΡΩΤΗΣΤΕ ΜΑΣ ΤΩΡΑ!</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s10 offset-s1">
							<h5 class="white-text full-text first-paragraph"><p >Το νομικό μας επιτελείο έχοντας πολυετή εμπειρία είναι σε θέση να απαντήσει σε κάθε νομικό σας ζήτημα ελληνικού δικαίου με απόλυτη εχεμύθεια.</p><p> Θέστε μας παρακάτω το θέμα που σας απασχολεί και εμείς δεσμευόμαστε να σας απαντήσουμε εντός τριών ωρών*.</p><p>Χωρίς δεσμεύσεις, χωρίς εγγραφές χρηστών. Τα στοιχεία σας χρησιμοποιούνται μόνο για την έκδοση απόδειξης/τιμολογίου.</p>ΤΙΜΗ 20 ευρώ η ερώτηση (ΤΟ ΦΠΑ 23% ΣΥΜΠΕΡΙΛΑΜΒΑΝΕΤΑΙ)</p><p>ΕΓΓΥΗΣΗ ΕΠΙΣΤΡΟΦΗΣ ΧΡΗΜΑΤΩΝ</p><p>Αν δεν σας απαντήσουμε εντός 24 ωρών σας επιστρέφουμε τα χρήματα σας!</p></h5>

							<form action="create_order.php" method="POST" onsubmit="return checkforblank()"  class="col s12 spacer-50">
								<div class="row">
									<div class="input-field col l10 offset-l1 m12">
										<i class="material-icons prefix">perm_identity</i>
										<input  name="fname" id="fname" type="text" class="validate" >
										<label for="icon_prefix">Oνοματεπώνυμο</label>
									</div>
									<div class="input-field col l10 offset-l1 m12">
										<i class="material-icons prefix">email</i>
										<input  name="email" id="email" type="text" class="validate" >
										<label for="icon_prefix">Email</label>
									</div>
									<div class="input-field col l10 offset-l1 m12">
										<i class="material-icons prefix">mode_edit</i>
										<textarea name="text" id="text" type="text" class="materialize-textarea"></textarea>
										<label for="icon_prefix2">Κείμενο...</label>
									</div>
								</div>
								<p class="center-align">
									<input type="checkbox" name="checked" id="checked" />
									<label for="checked">Αποδέχομαι τους</label>
									<a class="waves-effect waves-light  modal-trigger" href="#modal1"> όρους χρήσης</a>
								</p>
								<div class="row">
									<div class="center-align">
										<button type="submit" style="width:205px;" class="waves-effect waves-light btn-large">ΡΩΤΗΣΤΕ ΜΑΣ ΤΩΡΑ!</button>	
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col s10 offset-s1" style="margin-bottom:-50px;">
							<p class="full-text" style="margin-bottom:90px;">*Το 98% των απαντήσεων δίνονται εντός τριών ωρών. Σε ιδιαίτερα απαιτητικές περιπτώσεις ίσως χρειαστεί να περιμένετε λίγο περισσότερο. Μέγιστος χρόνος επεξεργασίας ερωτήσεων 24 ώρες.<br><br>
								Εάν έχετε οποιεσδήποτε ερωτήσεις, παρατηρήσεις ή παράπονα σχετικά με το site παρακαλώ επικοινωνήστε μαζί μας στο nomikhsymvoulh@gmail.com.Το email αυτό είναι μόνο για ερωτήσεις σχετικά με την ιστοσελίδα. Νομικές ερωτήσεις δεν θα απαντηθούν.</p>
							</div>		
						</div>
						<div class="card-action">
							<p class="center-align" style="font-size:15px;">Copyright © 2015 www.nomikhsymvoulh.gr. All Rights Reserved. <a href="http://htmlcoder.me"> Crafted by iTech Hub </a></p>
						</div>
					</div>	
				</div>
			</div>	
		</div>
	</div>

	<!-- Modal Structure -->
	<div id="modal1" class="modal">
		<div class="modal-content" style="background-color:antiquewhite; ">
			<h4>Σύμβαση παροχής υπηρεσιών</h4>
			<p>Το www.nomikhsymvoulh.gr είναι η διαδικτυακή πύλη (εφεξής “ΔΠ”) του Δικηγορικού  Γραφείου Νικόδημου Σταυρίδη (εφεξής “Γραφείο”), που αποτελεί νόμιμα εγκατεστημένο γραφείο και εδρεύει στην οδό Θεσσαλονίκης 7, στις Σέρρες, στην Ελλάδα, Τ.Κ. 62125. Ιδιοκτήτης της ΔΠ και του Γραφείου είναι ο Δικηγόρος του Πρωτοδικείου Σερρών Νικόδημος Σταυρίδης του Ελευθερίου και της Μαρίας (εφεξής “πάροχος”), κάτοχος του  Αριθμού Μητρώου Δικηγορικού Συλλόγου Σερρών 583, ΑΔΤ ΑΕ 219525 και ΑΦΜ 120110127 / Δ.Ο.Υ Σερρών. Πριν εισέλθετε στην ιστοσελίδα μας, σας καλούμε να συμβουλευτείτε τους κάτωθι όρους και προϋποθέσεις, που εφαρμόζονται ειδικά για τη χρήση της παρούσας Δικτυακής Πύλης. Η χρήση της ΔΠ αποτελεί τεκμήριο ότι ο επισκέπτης/χρήστης έχει μελετήσει, κατανοήσει και αποδεχτεί όλους τους όρους χρήσης της ΔΠ. Σε περίπτωση που ο επισκέπτης/χρήστης δεν συμφωνεί με τους όρους χρήσης της παρούσας, οφείλει να μην κάνει χρήση των υπηρεσιών και του περιεχομένου της ΔΠ.</p>
			<p>Οι παρόντες όροι χρήσης μπορεί να αναθεωρούνται και να ενημερώνονται οποιαδήποτε στιγμή και χωρίς προειδοποίηση. Παρακαλείσθε να ελέγχετε ανά τακτά χρονικά διαστήματα τους όρους χρήσης της ΔΠ καθώς η συνεχής χρήση της συνεπάγεται ότι αποδέχεστε αυτές τις αλλαγές.</p>
			<p>Βεβαιωθείτε ότι συμφωνείτε με τους κάτωθι όρους και προϋποθέσεις διότι η τυχόν συναλλαγή σας μαζί μας μέσω της ΔΠ διέπεται από τους παρακάτω όρους και η συναλλαγή σας μαζί μας συνεπάγεται την ανεπιφύλακτη αποδοχή των όρων αυτών.</p>
			<h4>1. Όροι σύμβασης παροχής υπηρεσιών</h4>
			<p>Μέσω της ΔΠ και κατόπιν της αποδοχής του επισκέπτη/χρήστη συνάπτεται σύμβαση παροχής νομικής συμβουλής (εφεξής “Σύμβαση”) μεταξύ του παρόχου και του επισκέπτη/χρήστη, ο οποίος καθίσταται πλέον λαμβάνων την παροχή (εφεξής “πελάτης”). Η σύμβαση αποτελεί σύμβαση από απόσταση. Σύμβαση από απόσταση είναι κάθε σύμβαση που αφορά αγαθό ή υπηρεσία, η οποία συνάπτεται μεταξύ ενός προμηθευτή και ενός καταναλωτή, χωρίς την ταυτόχρονη φυσική παρουσία τους, στο πλαίσιο ενός συστήματος παροχής υπηρεσιών από απόσταση, που οργανώνεται από τον προμηθευτή, ο οποίος χρησιμοποιεί, αποκλειστικά, ένα ή περισσότερα μέσα τεχνικής επικοινωνίας από απόσταση μέχρι και τη σύναψη της σύμβασης. Μέσα τεχνικής επικοινωνίας από απόσταση, με την έννοια του άρθρου αυτού, είναι ιδίως τα έντυπα χωρίς παραλήπτη, τα έντυπα με παραλήπτη, οι τυποποιημένες επιστολές, τα διαφημιστικά έντυπα με στέλεχος παραγγελίας, οι κατάλογοι, το τηλέφωνο με ή χωρίς ανθρώπινη παρέμβαση, το ραδιόφωνο, το εικονοτηλέφωνο, το βιντεοτέξτ (μικροϋπολογιστής και τηλεοπτική οθόνη) με πληκτρολόγιο ή οθόνη αμφίδρομης επικοινωνίας, το ηλεκτρονικό ταχυδρομείο, η τηλεομοιοτυπία και η τηλεόραση.</p>
			<p>Τόπος κατάρτισης της συμβασης ορίζεται το Γραφείο.</p>
			<p>Χρόνος σύναψης της σύμβασης ορίζεται η χρονική στιγμή της αποδοχής εκ μέρους του πελάτη των παρόντων όρων. Χρόνος εκπλήρωσης της σύμβασης ορίζεται η χρονική στιγμή αποστολής του μηνύματος ηλεκτρονικού ταχυδρομείου εκ μέρους του παρόχου. Μέγιστος χρόνος μεταξύ σύναψης και εκπλήρωσης της σύμβασης συμφωνείται μεταξύ των συμβαλλομένων η μία (1) ημέρα. Σε περίπτωση παρέλευσης μεγαλύτερου χρονικού διαστήματος  μεταξύ σύναψης και εκπλήρωσης της σύμβασης τεκμαίρεται υπαναχώρηση εκ μέρους του παρόχου και, συνεπώς, συμφωνείται επιστροφή του τιμήματος στον πελάτη.</p>
			<p>Το τίμημα ορίζεται στα 20 ευρώ (ΦΠΑ συμπεριλαμβανομένου), θεωρείται εύλογο απο τους συμβαλλόμενους και καταβάλλεται κατά τη σύναψη της σύμβασης.</p>
			<p>Υπαναχώρηση εκ μέρους του πελάτη χωρεί μέχρι το χρόνο εκπλήρωσης. Κατόπιν της εκπλήρωσης της σύμβασης δε νοείται υπαναχώρηση, ούτε φυσικά οποιαδήποτε αξίωση επιστροφής του τιμήματος.</p>
			<p>Τέλος συμφωνείται ρητά εκ μέρους των συμβαλλομένων ότι ο πελάτης ενημερώθηκε πλήρως από τον πάροχο με τα μέσα της χρησιμοποιούμενης τεχνικής επικοινωνίας κατά τρόπο ευκρινή, σαφή και κατανοητό, τηρουμένων των αρχών της καλής πίστης κατά τις εμπορικές συναλλαγές και των διατάξεων που διέπουν το κύρος των δικαιοπραξιών, για τα ακόλουθα ιδίως στοιχεία, καθώς και για κάθε μεταβολή αυτών:</p>
			<p>α) τη ταυτότητα και τη διεύθυνση του παρόχου,</p>
			<p>β) τα ουσιώδη χαρακτηριστικά της υπηρεσίας,</p>
			<p>γ) την τιμή, την ποσότητα καθώς και το φόρο προστιθέμενης αξίας,</p>
			<p>δ) τον τρόπο πληρωμής και εκτέλεσης,</p>
			<p>ε) τη διάρκεια ισχύος της προσφοράς ή της τιμής,</p>
			<p>στ) το δικαίωμα υπαναχώρησης,</p>
			<p>ζ) το κόστος χρησιμοποίησης του μέσου επικοινωνίας από απόσταση.</p>
			<p><h4>2. Δικαιώματα Πνευματικής Ιδιοκτησίας (Copyright)</h4></p>
			<p>Όλο το περιεχόμενο της ΔΠ, εκτός των ρητά αναφερόμενων εξαιρέσεων και όσων σαφώς προκύπτουν ότι κάτοχοι τους είναι τρίτοι (πνευματικά δικαιώματα τρίτων), που – ενδεικτικά – περιλαμβάνει κείμενα, γραφικά, εικόνες, φωτογραφίες σχέδια, video, ήχους κλπ. (εφεξής περιεχόμενο) αποτελούν πνευματική ιδιοκτησία  του παρόχου και προστατεύεται από το ισχύον εθνικό, κοινοτικό και διεθνές δίκαιο.</p>
			<p>Ο πάροχος διατηρεί όλα τα πνευματικά δικαιώματα  αναφορικά με το περιεχόμενο και  τα αντίγραφα που δημιουργούνται βάσει αυτού.</p>
			<p>Το περιεχόμενο της ΔΠ διατίθεται στους επισκέπτες/ χρήστες της για προσωπική χρήση. Το περιεχόμενο υπόκειται σε αλλαγές χωρίς σχετική ειδοποίηση κατά την κρίση του παρόχου. Μετά την αποδοχή των όρων χρήσης, επιτρέπεται η μη εμπορική χρήση και η αναπαραγωγή του, ολική ή μερική, με την προϋπόθεση ότι το αναπαραγόμενο προϊόν είναι ελεύθερα διαθέσιμο στη συνέχεια μέσω του Διαδικτύου ή άλλου πρόσφορου μέσου και συνοδεύεται από ευκρινή και διακριτή αναφορά στην πηγή προέλευσής του. Οποιαδήποτε άλλη χρήση απαιτεί την γραπτή ρητή άδεια του ιδιοκτήτη ή του κατόχου των πνευματικών δικαιωμάτων.</p>
			<p>Οι παρεχόμενες νομικές συμβουλές αποτελούν προσωπικά πονήματα και περιουσιακά στοιχεία των δημιουργών τους, οι οποίοι παραχώρησαν στην ΔΠ περιορισμένο δικαίωμα. Οι παρεχόμενες νομικές συμβουλές απηχούν σε κάθε περίπτωση προσωπικές απόψεις και είναι σύμφωνα με τον νόμο «προϊόντα της διάνοιας» προστατευόμενα από τις νομοθετικές διατάξεις περί πνευματικής ιδιοκτησίας και ειδικότερα τον Ν. 2121/1993 και από τους σχετικούς κανόνες δεοντολογίας του διαδικτύου.</p>
			<p>Τα λοιπά προϊόντα ή υπηρεσίες που αναφέρονται στις ηλεκτρονικές σελίδες της παρούσας ΔΠ και φέρουν τα σήματα των αντίστοιχων οργανισμών, εταιρειών, συνεργατών φορέων, ενώσεων ή εκδόσεων, αποτελούν δική τους πνευματική και βιομηχανική ιδιοκτησία και συνεπώς οι φορείς αυτοί φέρουν τη σχετική ευθύνη.</p>
			<p>Για οποιαδήποτε ερώτηση σχετικά με τα δικαιώματα αναπαραγωγής οποιουδήποτε τμήματος του περιεχομένου της παρούσας ΔΠ, καθώς και για αιτήσεις έγκρισης αναπαραγωγής περιεχομένου, μπορείτε να επικοινωνήσετε με τον πάροχο από την σχετική ενότητα στην ιστοσελίδα.</p>
			<p><h4>3. Προστασία Προσωπικών Δεδομένων</h4></p>
			<p>Η διαχείριση και προστασία των προσωπικών δεδομένων του επισκέπτη/ χρήστη, του πελάτη και της ΔΠ υπόκειται στους όρους της παρούσας ανακοίνωσης καθώς επίσης και στα οριζόμενα στο εθνικό, κοινοτικό και διεθνές δίκαιο σχετικά με την προστασία του ατόμου από την επεξεργασία δεδομένων προσωπικού χαρακτήρα, όπως εκάστοτε ισχύει.</p>
			<p>Οποιαδήποτε ενδεχόμενη μελλοντική σχετική ρύθμιση θα αποτελέσει αντικείμενο της παρούσας ανακοίνωσης. Σε κάθε περίπτωση ο πάροχος διατηρεί το δικαίωμα αλλαγής των όρων προστασίας των προσωπικών δεδομένων, σύμφωνα με το εκάστοτε ισχύον σχετικό νομικό πλαίσιο.</p>
			<p>Συνεπώς, οι παρόντες όροι προστασίας προσωπικών δεδομένων μπορεί να αναθεωρούνται και να ενημερώνονται οποιαδήποτε στιγμή και χωρίς προειδοποίηση. Οι χρήστες της ΔΠ παρακαλούνται να ελέγχουν ανά τακτά χρονικά διαστήματα τους εν λόγω όρους για τυχόν αλλαγές, καθώς η συνεχής χρήση της ΔΠ συνεπάγεται ότι αποδέχονται όλες τις ενδεχόμενες τροποποιήσεις αυτών.</p>
			<p>Ο πάροχος συλλέγει προσωπικά στοιχεία των επισκεπτών/ χρηστών της ΔΠ, μόνο όταν αυτοί οι ίδιοι εκουσίως τα παρέχουν με σκοπό την παροχή των υπηρεσιών που είναι διαθέσιμες ηλεκτρονικά και την έκδοση παραστατικού για την παροχή υπηρεσιών. Προσωπικά στοιχεία είναι τα στοιχεία που μπορούν να χρησιμοποιηθούν για τον προσδιορισμό της ταυτότητας ή την επικοινωνία με κάποιο άτομο καθώς και άλλα στοιχεία που αφορούν το εν λόγω άτομο.  </p>
			<p>Ο πάροχος δε θα διαθέσει προς πώληση ή άλλως διαβιβάσει ή δημοσιοποιήσει προσωπικά στοιχεία των επισκεπτών/ χρηστών της ΔΠ σε τρίτους, που δε σχετίζονται με την ίδια, χωρίς τη συγκατάθεσή του επισκέπτη/ χρήστη, με εξαίρεση την εφαρμογή σχετικών νομικών υπαγορεύσεων και προς τις αρμόδιες και μόνο αρχές.</p>
			<p>Ο πάροχος είναι δυνατόν να επεξεργάζεται τμήμα ή το σύνολο των στοιχείων που έχουν αποστείλει οι επισκέπτες/ χρήστες για λόγους στατιστικούς και βελτίωσης των παρεχομένων υπηρεσιών – πληροφοριών του.</p>
			<p>Ο επισκέπτης/ χρήστης μπορεί να επικοινωνήσει με τον εκάστοτε διαχειριστή της ΔΠ προκειμένου να διασταυρώσει την ύπαρξη προσωπικού του αρχείου, την διόρθωση αυτού, την αλλαγή του ή την διαγραφή του.</p>
			<p>Ο πάροχος μπορεί – μελλοντικά – να συγκεντρώνει στοιχεία αναγνώρισης των χρηστών της ΔΠ χρησιμοποιώντας αντίστοιχες τεχνολογίες, όπως cookies ή/και την παρακολούθηση διευθύνσεων Πρωτοκόλλου Internet (IP). Τα cookies είναι μικρά αρχεία κειμένου που αποθηκεύονται στο σκληρό δίσκο κάθε επισκέπτη/ χρήστη και δεν λαμβάνουν γνώση οποιουδήποτε εγγράφου ή αρχείου από τον υπολογιστή του. Χρησιμοποιούνται για την διευκόλυνση πρόσβασης του επισκέπτη/ χρήστη όσον αφορά στη χρησιμοποίηση συγκεκριμένων υπηρεσιών ή/και σελίδων της ΔΠ, για στατιστικούς λόγους και προκειμένου να καθορίζονται οι περιοχές οι οποίες είναι χρήσιμες ή δημοφιλείς. Τα στοιχεία αυτά μπορεί να περιλαμβάνουν επίσης τον τύπο του φυλλομετρητή (browser) που χρησιμοποιεί ο επισκέπτης/ χρήστης, το είδος του υπολογιστή, το λειτουργικό του σύστημα, τους παροχείς διαδικτυακών υπηρεσιών και λοιπές πληροφορίες τέτοιου είδους. Επιπλέον, το πληροφοριακό σύστημα  της ΔΠ συλλέγει αυτόματα πληροφορίες σχετικά με τις τοποθεσίες που επισκέπτεται ο επισκέπτης/ χρήστης της και σχετικά με τους συνδέσμους σε ιστοχώρους τρίτων που ενδέχεται να επιλέξει μέσω της χρήσης της ΔΠ</p>
			<p>Ο επισκέπτης/ χρήστης της ΔΠ μπορεί να ρυθμίσει το πρόγραμμα του για πλοήγηση στο Διαδίκτυο (web browser) κατά τέτοιο τρόπο ώστε είτε να τον προειδοποιεί για τη χρήση των cookies σε συγκεκριμένες υπηρεσίες είτε να μην επιτρέπει την αποδοχή της χρήσης cookies σε καμία περίπτωση. Σε περίπτωση που ο επισκέπτης/ χρήστης των συγκεκριμένων υπηρεσιών και σελίδων δεν επιθυμεί την χρήση cookies για την αναγνώριση του δεν μπορεί να έχει περαιτέρω πρόσβαση στις υπηρεσίες αυτές.</p>
			<p>Η παρούσα ΔΠ δύναται στο μέλλον να περιλαμβάνει συνδέσμους (links) προς άλλους δικτυακούς τόπους οι οποίοι βρίσκονται υπό την ευθύνη τρίτων φορέων (φυσικά ή νομικά πρόσωπα). Σε καμία περίπτωση δεν ευθύνεται ο πάροχος για τους όρους προστασίας των προσωπικών δεδομένων τους οποίους αυτοί οι δικτυακοί τόποι ακολουθούν.</p>
			<p>Για την εξασφάλιση του απορρήτου της μεταφοράς των δεδομένων, χρησιμοποιείται το πρωτόκολλο κρυπτογράφησης SSL-128bit. Το σύστημα έχει πιστοποιηθεί από την εταιρία Verisign, η οποία ειδικεύεται σε θέματα ασφαλείας συναλλαγών.</p>
			<p><h4>Απόρρητο Συναλλαγών</h4></p>
			<p>Η τήρηση του νομικού απορρήτου είναι αυτονόητη.</p>
			<p>Όλες οι πληροφορίες που διαβιβάζονται από τον χρηστή στη ΔΠ είναι εμπιστευτικές και η ΔΠ έχει λάβει όλα τα απαραίτητα μέτρα ώστε να γίνεται χρήση τους μόνο στο μέτρο που αυτό κρίνεται αναγκαίο στο πλαίσιο των παρεχόμενων υπηρεσιών.</p>
			<p>Μόνο ο πάροχος και ο διαχειριστής της σελίδας έχει πρόσβαση στις πληροφορίες των συναλλαγών και μόνο όποτε αυτό είναι αναγκαίο, π.χ. για την έκδοση παραστατικού.</p>
			<p>Η ΔΠ δεν αποκαλύπτει τα στοιχεία των πελατών και των συναλλαγών τους, εκτός αν έχει έγγραφη εξουσιοδότηση από εσάς ή αυτό επιβάλλεται από δικαστική απόφαση ή απόφαση άλλης δημόσιας αρχής.</p>
			<p>Στην περίπτωση που η ΔΠ χρησιμοποιεί τρίτους για την υποστήριξη των συστημάτων της, φροντίζει για την εξασφάλιση του απορρήτου.</p>
			<p><h4>4. Περιορισμός ευθύνης – Δήλωση αποποίησης</h4></p>
			<p>Το περιεχόμενο της ΔΠ διατίθεται «ως έχει» και ο πάροχος δεν παρέχει καμία εγγύηση, ρητή ή μη, σχετικά με την αρτιότητα, ορθότητα, επικαιρότητα, εμπορικότητα, μη παραβίαση ή καταλληλότητα του περιεχομένου αυτού  για οποιαδήποτε χρήση, εφαρμογή ή σκοπό.</p>
			<p>Ο πάροχος, υπό οποιεσδήποτε συνθήκες, συμπεριλαμβανομένης και της περίπτωσης αμέλειας, δεν ευθύνεται για οποιασδήποτε μορφής ζημία υποστεί ο επισκέπτης/χρήστης των σελίδων, υπηρεσιών, επιλογών και περιεχομένων της ΔΠ στις οποίες προβαίνει με δική του πρωτοβουλία και με τη γνώση των παρόντων όρων. Οι παρεχόμενες νομικές συμβουλές αποτελούν πάντοτε προσωπικές απόψεις, συνεπώς ουδεμία ευθύνη, ποινική ή αστική, έχει ο πάροχος λόγω της εφαρμογής αυτών. Ρητά συμφωνείται ότι, κατόπιν της εκπλήρωσης της σύμβασης, ουδεμία αξίωση φέρει ο πελάτης κατά του παρόχου. Επίσης, ο πάροχος δεν εγγυάται ότι οι σελίδες, οι υπηρεσίες, οι επιλογές και τα περιεχόμενα θα παρέχονται χωρίς διακοπή, χωρίς σφάλματα, ότι τα λάθη θα διορθώνονται ή ότι θα δίνονται απαντήσεις σε όλα τα ερωτήματα που τίθενται. Ομοίως ο πάροχος δεν εγγυάται ότι η ΔΠ ή οποιοδήποτε άλλος συγγενικός δικτυακός τόπος ή οι εξυπηρετητές (“servers”) μέσω των οποίων το περιεχόμενο τίθεται στη διάθεση των επισκεπτών/ χρηστών παρέχονται χωρίς “ιούς” ή άλλα επιζήμια συστατικά. Το κόστος των ενδεχόμενων διορθώσεων ή εξυπηρετήσεων, το αναλαμβάνει ο επισκέπτης/ χρήστης και σε καμία περίπτωση ο πάροχος.</p>
			<p>Ουδεμία ευθύνη, επίσης, έχει ο πάροχος για πράξεις ή παραλείψεις τρίτων και ιδιαίτερα μη επιτρεπόμενες παρεμβάσεις τρίτων σε υπηρεσίες ή/και πληροφορίες που διατίθενται μέσω αυτού.</p>
			<p><h4>5. Εφαρμοστέο δίκαιο και λοιποί όροι</h4></p>
			<p>Οι ανωτέρω όροι και προϋποθέσεις χρήσης της ΔΠ, καθώς και οποιαδήποτε τροποποίηση ή αλλαγή τους διέπονται  από το εθνικό δίκαιο, το κοινοτικό δίκαιο και τις σχετικές διεθνείς συνθήκες. Οποιαδήποτε διάταξη των ανωτέρω όρων διαπιστωθεί ότι είναι αντίθετη με το ως άνω νομικό πλαίσιο ή καταστεί εκτός ισχύος, παύει αυτοδικαίως να ισχύει και αφαιρείται από το παρόν, χωρίς σε καμία περίπτωση να θίγεται η ισχύς των λοιπών όρων. Το παρόν αποτελεί τη συνολική συμφωνία μεταξύ του διαχειριστή της ΔΠ και του επισκέπτη/ χρήστη των σελίδων και υπηρεσιών της και δε δεσμεύει παρά μόνο αυτούς. Καμία τροποποίηση των όρων αυτών δε θα λαμβάνεται υπόψη και δε θα αποτελεί τμήμα της συμφωνίας αυτής, εάν δεν έχει διατυπωθεί εγγράφως και δεν έχει ενσωματωθεί σε αυτή.</p>
			<p>Με το παρόν συμφωνείται ρητά ότι οι διαφορές που τυχόν προκύπτουν από την εφαρμογή των παρόντων όρων και την εν γένει χρήση της ΔΠ από τον επισκέπτη ή χρήστη αυτής, εφόσον δεν επιλυθούν φιλικά, διέπονται από το ελληνικό δίκαιο και υπάγονται στη δικαιοδοσία των Δικαστηρίων των Σερρών.</p>
			<p>Για οποιαδήποτε επικοινωνία με το διαχειριστή της ΔΠ παρακαλούμε αποστείλατε ηλεκτρονική επιστολή. Επίσης αν έχετε διαπιστώσει οποιαδήποτε προβλήματα στο περιεχόμενο του κόμβου που άπτονται νομικών ή ηθικών θεμάτων, ειδικότερα όσον αφορά στην αναπαραγωγή του και τη χρήση των δικαιωμάτων πνευματικής ιδιοκτησίας, παρακαλείσθε να μας ειδοποιήσετε.</p>
			<p><h4>6. Υποχρεώσεις Χρήστη</h4></p>
			<p>Οι χρήστες της ΔΠ αποδέχονται ότι δεν θα χρησιμοποιούν καθ’οιονδήποτε τρόπο την ΔΠ για αποστολή, δημοσίευση, αποστολή με e-mail ή μετάδοση με άλλους τρόπους οποιουδήποτε Περιεχομένου είναι παράνομο, βλαβερό, απειλητικό, προσβλητικό, ενοχλητικό, συκοφαντικό, δυσφημιστικό, χυδαίο, άσεμνο, λιβελογραφικό, αποτελεί παραβίαση του απορρήτου κάποιου άλλου, δείχνει εμπάθεια, ή εκφράζει φυλετικές, εθνικές ή άλλες διακρίσεις, δύναται να προκαλέσει βλάβες σε ανήλικους με οποιονδήποτε τρόπο, δεν δικαιούται να μεταδοθεί σύμφωνα με την νομοθεσία ή τις συμβατικές ή διαχειριστικές σχέσεις (όπως εσωτερικές πληροφορίες, ιδιοκτησιακές και εμπιστευτικές πληροφορίες που αποκτήθηκαν ή αποκαλύφθηκαν ως μέρος εργασιακών σχέσεων ή που καλύπτονται σε συμφωνίες εμπιστευτικότητας), παραβιάζει οποιαδήποτε ευρεσιτεχνία, εμπορικό σήμα, εμπορικό μυστικό, πνευματικά δικαιώματα ή άλλα ιδιοκτησιακά δικαιώματα τρίτων, περιέχει ιούς λογισμικού ή οποιουσδήποτε άλλους κώδικες, αρχεία ή προγράμματα, που έχουν σχεδιαστεί με σκοπό την διακοπή, την πρόκληση βλάβης, την καταστροφή ή παρεμπόδιση της λειτουργίας οποιουδήποτε λογισμικού ή υλικού υπολογιστών, ηθελημένα ή αθέλητα παραβαίνει την ισχύουσα ελληνική και κοινοτική νομοθεσία και των διατάξεων αυτής, δύναται να παρενοχλήσει τρίτους με οποιοδήποτε τρόπο και οποιοδήποτε περιεχόμενο χρησιμοποιείται για συλλογή ή αποθήκευση προσωπικών δεδομένων των χρηστών.</p>
			<p><h4>7. Τρόποι Πληρωμής</h4></p>
			<p>Πληρωμή μέσω Πιστωτικής Κάρτας</p>
			<p>Ο πάροχος δέχεται όλες τις πιστωτικές κάρτες Visa, Mastercard, American Express και Citibank. Οι συναλλαγές σας στο ηλεκτρονικό μας κατάστημα προστατεύονται από ανώτατα συστήματα online ασφαλείας (SSL-128 bit και ψηφιακή πιστοποίηση από τη Verisign, Inc.) τα οποία εγγυώνται ένα ασφαλές περιβάλλον συναλλαγών στις περισσότερες από τις 500 μεγαλύτερες επιχειρήσεις του κόσμου. Για χρήση της πιστωτικής σας κάρτας ακολουθήστε τις οδηγίες που υπάρχουν στη ΔΠ. Θα σας ζητηθεί να συμπληρώστε τη φόρμα παραγγελίας και τον αριθμό και την ημερομηνία λήξης καθώς επίσης και τον 3ψήφιο αριθμό (CVV) που αναγράφεται στο πίσω μέρος της πιστωτικής σας κάρτας. Σε περίπτωση που η παραγγελία πραγματοποιείται στα στοιχεία και για λογαριασμό εταιρείας τότε η πιστωτική κάρτα που χρησιμοποιείτε να είναι εταιρική. Δηλαδή να έχει εκδοθεί στα στοιχεία της αντίστοιχης εταιρείας.</p>
			<p>Πληρωμή με υπηρεσίες ηλεκτρονικών πληρωμών (π.χ. PayPal, Viva Payments κ.λ.π.)</p>
			<p>Η χρήση κάποιας υπηρεσίας ηλεκτρονικών πληρωμών, όπως το PayPal, είναι ένας ασφαλής τρόπος για να κάνεις τις ηλεκτρονικές σου αγορές, καθώς τα στοιχεία της κάρτας σου δεν αποκαλύπτονται σε τρίτους.</p>
			<p>Απαραίτητη προϋπόθεση είναι να δημιουργήσεις έναν λογαριασμό στο PayPal ή στην αντίστοιχη υπηρεσία ηλεκτρονικών πληρωμών συνδέοντας την κάρτα σου (πιστωτική, χρεωστική ή προπληρωμένη), ώστε να γίνονται οι απαραίτητες χρεώσεις όταν αγοράζεις online.</p>
			<p>Κάνοντας κλικ στο εικονίδιο, ανακατευθύνεσαι στην ασφαλή ιστοσελίδα της υπηρεσίας πληρωμών, όπου θα ολοκληρώσεις την πληρωμή. Στη συνέχεια επιστρέφεις στη σελίδα του ηλεκτρονικού καταστήματος, όπου επιβεβαιώνεται η πληρωμή σου και ολοκληρώνεται η παραγγελία σου.</p>
			<p>•Σημείωση: η συναλλαγή μέσω PayPal συμπεριλαμβάνει μια μικρή προμήθεια επί της συναλλαγής, η οποία απορροφάται από τον πάροχο.</p>

		</div>
		<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Κλείσιμο</a>
		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html>
<?php
// remove all session variables
session_unset(); 

// destroy the session 
//session_destroy(); 
?>