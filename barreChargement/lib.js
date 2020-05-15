function plop () {
  const http = new XMLHttpRequest();
  http.uri = 'chunks.php'; //le fichier php de traitement défini ci-dessus
  http.open ('POST', http.uri, true);
  http.setRequestHeader("Content-type", "application/json");
  http.setRequestHeader("User-Agent", "request");
  const divPgb=document.createElement ('div');
  let start=0;
  divPgb.innerHTML = `<span width="30%">Barre de progression insert pgsql</span><progress id="pgbSqlIns" style="width:30%;float:right;" value="0" max="1"></progress><br>`;
  document.body.appendChild (divPgb);
  http.onreadystatechange = function () {
    if (this.status == 200) {
      switch (this.readyState) {
//(...)
        case 3:
        case 4:
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
      } // Fin du switch (this.readyState)
    } //Fin du if (this.status)
  }; // Fin de fonction anonyme
  http.send();
}
