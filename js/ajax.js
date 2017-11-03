function xmlhttpPost(strURL) {

    var xmlHttpReq = false; // Objet qui envoie des informations au serveur
	// on le met à false pour vérifier qu'il n'existe en mémoire aucune instance d'objet portant le même nom
    var self = this;
    // Mozilla/Safari
    alert ("toto");
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.open('POST', strURL, true);
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function() {
        if (self.xmlHttpReq.readyState == 4) {
            updatepage(self.xmlHttpReq.responseText);
        }
    }
    self.xmlHttpReq.send(getquerystring());
}

function getquerystring() {
    var log_email = document.getElementById('log_email').value;
    var log_password = document.getElementById('log_password').value;
	/*
	Avant de passer des variables,
	il est important de les protéger
	pour conserver les caractères spéciaux et les espaces
	*/
    qstr = 'log_email=' + encodeURIComponent(log_email) + '&log_password=' + encodeURIComponent(log_password);
    // Remarque: pas de '?' avant la chaîne de requête
	 //alert (qstr);
    return qstr;
}

function updatepage(str){
  if (str.indexOf("connecté") !== -1) {
    document.getElementById("resultat2").style.display="block";
    document.getElementById("resultat2").innerHTML = str;
    document.getElementById("resultat").style.display="none";
  } else {
    document.getElementById("resultat").style.display="block";
    document.getElementById("resultat").innerHTML = str;
    document.getElementById("resultat2").style.display="none";
  }

}
