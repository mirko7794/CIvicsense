
function scegliModifica(){
	
	var output;
	if(document.getElementById("tipo").value=='Gravità')
	{
		output="<optgroup label = 'Gravit&agrave'>" +
		"<option>Bassa</option>" +
		"<option>Intermedia</option>" +
		"<option>Alta</option>" +
		"</optgroup>"
	} else if(document.getElementById("tipo").value=='Stato'){
		output="<optgroup label = 'Stato'>" +
		"<option>Attiva</option>" +
		"<option>Conclusa</option>" +
		"</optgroup>"
	} else if(document.getElementById("tipo").value=='Categoria'){
		output="<optgroup label = 'Categoria'>" +
		"<option>Autostrade</option>" +
		"<option>Acquedotto</option>" +
		"<option>Elettricit&agrave;</option>" +
		"<option>Telefonia</option>" +
		"</optgroup>"
	} 
	
	document.getElementById("tipoMod").innerHTML=output;
}
		