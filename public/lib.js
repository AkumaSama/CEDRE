function progressBar(id) {
if(document.getElementById("selectBase"+id).options[document.getElementById("selectBase"+id).selectedIndex].value !== "" && document.getElementById("select"+id).options[document.getElementById("select"+id).selectedIndex].value !== "")
{
  const selectBase = document.getElementById("selectBase"+id).options[document.getElementById("selectBase"+id).selectedIndex].value;
  const selectId = document.getElementById("select"+id).options[document.getElementById("select"+id).selectedIndex].value;
  const params = {'idBase': selectBase, 'typeFichier': selectId, 'idReq': id};
  console.log("lancement");
  const http = new XMLHttpRequest();
  http.uri = './TEMP/chunks.php'; //le fichier php de traitement d√©fini ci-dessus
  http.open ('POST', http.uri, true);
  http.setRequestHeader("Content-type", "application/json");
  let start=0;
  var pgbSqlIns = document.getElementById("progressBar"+id);
  var btn = document.getElementById("a"+id);
  var span = btn.firstElementChild;
  var btnExec = document.getElementById("btnFile"+id);
  btn.classList.add("disabled");
  span.classList.add("spinner-border");
  span.classList.add("spinner-border-sm");
  span.classList.remove("fa");
  span.classList.remove("fa-check");
  btnExec.setAttribute("disabled", true);

  http.onreadystatechange = function () {
	  console.log (this.status, this.readyState);
    if (this.status == 200 || this.status == 0) {
      switch (this.readyState) {
//(...)
        case 3:
          while ((start < this.responseText.length) && (this.responseText.substring(start).indexOf('|')!=-1)) {
          newResponse = this.responseText.substr (start,this.responseText.substring(start).indexOf ('|'));
          switch (0) {
            //(...)
            case newResponse.substring(newResponse.indexOf('insmax:')).indexOf('insmax:') :
                 pgbSqlIns.max = parseFloat (newResponse.substr(newResponse.indexOf ('insmax:')+7, newResponse.indexOf(';')));
                 pgbSqlIns.value= parseFloat(newResponse.substr (newResponse.indexOf(';sql:')+5))+1.0;
                 break;
            } //Fin du switch (0)
          start+=newResponse.length+1;
	  } //Fin du while
          break;

        case 4:
	  console.log("affichage du bouton");
          newResponse = this.responseText.substring (this.responseText.indexOf ('#')+1, this.responseText.lastIndexOf(';'));
	  const csvFile = newResponse.substring(newResponse.indexOf (':',0)+1, newResponse.indexOf(';',0));
          newResponse = newResponse.substring (this.responseText.indexOf (';'));
	  const jsonFile = newResponse.substring(newResponse.indexOf (':')+1);
          span.classList.remove("spinner-border");
  	  span.classList.remove("spinner-border-sm");
	  span.classList.add("fa");
	  span.classList.add("fa-check");
	  btn.setAttribute ('download', csvFile);
 	  btn.setAttribute ('href', "./TEMP/"+csvFile);
	  btn.classList.remove("disabled");
	  btnExec.removeAttribute("disabled");
	  break;
      } //Fin du switch (this.readyState)
    } //Fin du if (this.status)
  }; //Fin de fonction anonyme
  http.send(JSON.stringify(params));
} else {
	alert("Merci de remplir les champs de sÈlection");
}}