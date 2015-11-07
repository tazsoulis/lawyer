 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  
  });

function checkforblank(){
	
	if (document.getElementById('fname').value==""){
		Materialize.toast('Παρακαλώ συμπληρώστε το ονοματεπώνυμό σας.  ', 4000);
		return false;
	}

	if(document.getElementById('email').value==""){
		  Materialize.toast('Παρακαλώ συμπληρώστε σωστά το email.', 4000);
		return false;
	}
	if (document.getElementById('text').value==""){
		Materialize.toast('Παρακαλώ συμπληρώστε το κέιμενο.', 4000);
		return false;
	}
	if (document.getElementById('checked').checked==""){
		Materialize.toast('Παρακαλώ επίλεξτε οτι συμφωνείτε με τους όρους χρήσης.  ', 4000);
		return false;
	}
	
}     
