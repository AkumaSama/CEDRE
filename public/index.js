//Fonction en JavaScript pour déroulé les requêtes dans le catalogue
function deployRequest(id) {
	var spanButtonDeploy = document.getElementById("spanButtonDeploy"+id).classList;
	var lblRequete = document.getElementById("lblRequete"+id).classList;
	var lblDesc = document.getElementById("lblDesc"+id).classList;
	var btnExec = document.getElementById("btnExec"+id).classList;
	var pInfo = document.getElementById("pInfo"+id).classList;
	var lblApp = document.getElementById("lblApp"+id).classList;
	var spanButtonReq = document.getElementById("spanButtonReq"+id).classList;

	var inputApp = document.getElementById("inputApp"+id);
	var selectFile = document.getElementById("select"+id);
	var selectBase = document.getElementById("selectBase"+id);
	var textareaReq = document.getElementById("textareaReq"+id);
	var textareaDesc = document.getElementById("textareaDesc"+id);

	if(spanButtonDeploy.contains("fa-chevron-down")) {
		spanButtonDeploy.remove("fa-chevron-down");
		spanButtonDeploy.add("fa-chevron-up");
		lblRequete.remove("d-none");
		lblDesc.remove("d-none");
		textareaReq.classList.remove("d-none");
		textareaDesc.classList.remove("d-none");
		btnExec.remove("d-none");
		lblApp.remove("d-none");
		inputApp.classList.remove("d-none");

		inputApp.removeAttribute("disabled");
		textareaReq.removeAttribute("disabled");
		textareaDesc.removeAttribute("disabled");
	} else {
		spanButtonDeploy.add("fa-chevron-down");
		spanButtonDeploy.remove("fa-chevron-up");
		lblRequete.add("d-none");
		lblDesc.add("d-none");
		textareaReq.classList.add("d-none");
		textareaDesc.classList.add("d-none");
		btnExec.add("d-none");
		pInfo.add("d-none");
		lblApp.add("d-none");
		inputApp.classList.add("d-none");
		spanButtonReq.add("fa-chevron-down");
		spanButtonReq.remove("fa-chevron-up");
		

		inputApp.setAttribute("disabled", "");
		selectFile.setAttribute("disabled", "");
		selectBase.setAttribute("disabled", "");
		textareaReq.setAttribute("disabled", "");
		textareaDesc.setAttribute("disabled", "");
	}
	
	try {
		var btnModif = document.getElementById("btnModif"+id).classList;
		var btnSuppr = document.getElementById("btnSuppr"+id).classList;
		if(spanButtonDeploy.contains("fa-chevron-down")) {
			btnModif.add("d-none");
			btnSuppr.add("d-none");
		} else {
			btnModif.remove("d-none");
			btnSuppr.remove("d-none");
		}
	} catch(error) {

	}
}

//fonction pour déroulé la section exécution dans le catalogue une fois la fonction ci dessus effectuer
function deployExec(id) {
	var pInfo = document.getElementById("pInfo"+id).classList;
	var spanButtonReq = document.getElementById("spanButtonReq"+id).classList;

	var selectFile = document.getElementById("select"+id);
	var selectBase = document.getElementById("selectBase"+id);

	if(pInfo.contains("d-none")) {
		pInfo.remove("d-none");
		spanButtonReq.remove("fa-chevron-down");
		spanButtonReq.add("fa-chevron-up");

		selectFile.removeAttribute("disabled");
		selectBase.removeAttribute("disabled");
	} else {
		pInfo.add("d-none");
		spanButtonReq.add("fa-chevron-down");
		spanButtonReq.remove("fa-chevron-up");

		selectFile.setAttribute("disabled", "");
		selectBase.setAttribute("disabled", "");
	}

	try{
		var btnModif = document.getElementById("btnModif"+id).classList;
		var btnSuppr = document.getElementById("btnSuppr"+id).classList;
		if(pInfo.contains("d-none")) {
			btnModif.remove("d-none");
			btnSuppr.remove("d-none");
		} else {
			btnModif.add("d-none");
			btnSuppr.add("d-none");
		}
	} catch(error){

	}
	
}

//fonction pour changer le type de l'input pour l'enregistrement du mot de passe dans l'ajout d'une base
function showPassword()
{
	var cb = document.getElementById("checkboxPSW");
	var eye = document.getElementById("eye").classList;
	if (cb.type === "password") {
    	cb.type = "text";
    	eye.remove("fa-eye");
    	eye.add("fa-eye-slash");
	} else {
	  	cb.type = "password";
	  	eye.add("fa-eye");
    	eye.remove("fa-eye-slash");
	}
}

//fonction qui permet de gerer la création de droit si l'exécution est coché la deuxieme checkbox devien cochable et inversement
function checkBox()
{
	var check1 = document.getElementById("check1");
	var check2 = document.getElementById("check2");

	if(check1.checked)
	{
		check2.disabled = false;
	} else {
		check2.disabled = true;
		check2.checked = false;
	}
}