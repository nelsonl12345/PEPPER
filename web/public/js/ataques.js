function d1(selectTag){
 if(selectTag.value == 'Si'){
document.getElementById('ataque_fechahospit').disabled = false;
 }else{
document.getElementById('ataque_fechahospit').disabled = true;
 }
 
 if(selectTag.value != 'Si'){
 	document.getElementById('ataque_fechahospit').value="";
 }
}



function d2(selectTag){
 if(selectTag.value == 'Muerto'){
document.getElementById('ataque_fechadefuncion').disabled = false;
 }else{
document.getElementById('ataque_fechadefuncion').disabled = true;
 }
 
 if(selectTag.value != 'Muerto'){
 	document.getElementById('ataque_fechadefuncion').value="";
 }

 if(selectTag.value == 'Muerto'){
document.getElementById('ataque_numdefuncion').disabled = false;
 }else{
document.getElementById('ataque_numdefuncion').disabled = true;
 }
 
 if(selectTag.value != 'Muerto'){
 	document.getElementById('ataque_numdefuncion').value="";
 }


if(selectTag.value == 'Muerto'){
document.getElementById('ataque_causasmuerte').disabled = false;
 }else{
document.getElementById('ataque_causasmuerte').disabled = true;
 }
 
 if(selectTag.value != 'Muerto'){
 	document.getElementById('ataque_causasmuerte').value="";
 }
}




function d3(selectTag){
 if(selectTag.value == 'Si'){
document.getElementById('ataque_fechavacunacion').disabled = false;
 }else{
document.getElementById('ataque_fechavacunacion').disabled = true;
 }
 
 if(selectTag.value != 'Si'){
 	document.getElementById('ataque_fechavacunacion').value="";
 }
}



function d4(selectTag){
 if(selectTag.value == 'Si'){
document.getElementById('ataque_fechasuero').disabled = false;
 }else{
document.getElementById('ataque_fechasuero').disabled = true;
 }
 
 if(selectTag.value != 'Si'){
 	document.getElementById('ataque_fechasuero').value="";
 }
}




function d5(selectTag){
 if(selectTag.value == 'Si'){
document.getElementById('ataque_ndosis').disabled = false;
 }else{
document.getElementById('ataque_ndosis').disabled = true;
 }
 
 if(selectTag.value != 'Si'){
 	document.getElementById('ataque_ndosis').value="";
 }


  if(selectTag.value == 'Si'){
document.getElementById('ataque_fechaultdosis').disabled = false;
 }else{
document.getElementById('ataque_fechaultdosis').disabled = true;
 }
 
 if(selectTag.value != 'Si'){
 	document.getElementById('ataque_fechaultdosis').value="";
 }
}



function d6(selectTag){
 if(selectTag.value == '0. Otra'){
document.getElementById('ataque_cual').disabled = false;
 }else{
document.getElementById('ataque_cual').disabled = true;
 }
 
 if(selectTag.value != '0. Otra'){
 	document.getElementById('ataque_cual').value="";
 }
}



function d7(selectTag){
 if(selectTag.value == 'Positivo'){
document.getElementById('ataque_fecharesultado').disabled = false;
 }else{
document.getElementById('ataque_fecharesultado').disabled = true;
 }
 
 if(selectTag.value != 'Positivo'){
 	document.getElementById('ataque_fecharesultado').value="";
 }
}


function d8(selectTag){
 if(selectTag.value == 'Perro'){
document.getElementById('ataque_registrada').disabled = false;

document.getElementById('ataque_propietarioymascota').disabled = false;
document.getElementById('ataque_nombremascota').disabled = false;
document.getElementById('ataque_nombreprop').disabled = false;
document.getElementById('ataque_direccionprop').disabled = false;
document.getElementById('ataque_telefonoprop').disabled = false;


 }else{
document.getElementById('ataque_registrada').disabled = true;

document.getElementById('ataque_propietarioymascota').disabled = true;
document.getElementById('ataque_nombremascota').disabled = true;
document.getElementById('ataque_nombreprop').disabled = true;
document.getElementById('ataque_direccionprop').disabled = true;
document.getElementById('ataque_telefonoprop').disabled = true;


 }
 
 if(selectTag.value != 'Perro'){
 	document.getElementById('ataque_registrada').value="";

	document.getElementById('ataque_propietarioymascota').value="";
	document.getElementById('ataque_nombremascota').value="";
	document.getElementById('ataque_nombreprop').value="";
	document.getElementById('ataque_direccionprop').value="";
	document.getElementById('ataque_telefonoprop').value="";

 }
}


function d9(selectTag){
 if(selectTag.value == 'Si'){

document.getElementById('ataque_propietarioymascota').disabled = false;
document.getElementById('ataque_nombremascota').disabled = true;
document.getElementById('ataque_nombreprop').disabled = true;
document.getElementById('ataque_direccionprop').disabled = true;
document.getElementById('ataque_telefonoprop').disabled = true;


 }else{
document.getElementById('ataque_propietarioymascota').disabled = true;
document.getElementById('ataque_nombremascota').disabled = false;
document.getElementById('ataque_nombreprop').disabled = false;
document.getElementById('ataque_direccionprop').disabled = false;
document.getElementById('ataque_telefonoprop').disabled = false;

 }
 
 if(selectTag.value != 'Si'){
 	document.getElementById('ataque_propietarioymascota').value="";
	document.getElementById('ataque_nombremascota').value="";
	document.getElementById('ataque_nombreprop').value="";
	document.getElementById('ataque_direccionprop').value="";
	document.getElementById('ataque_telefonoprop').value="";

 }
}