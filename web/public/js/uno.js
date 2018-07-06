function d1(selectTag){
 if(selectTag.value == 'Mixto'){
document.getElementById('mascota_cual').disabled = false;
 }else{
document.getElementById('mascota_cual').disabled = true;
 }
 
 if(selectTag.value != 'Mixto'){
 	document.getElementById('mascota_cual').value="";
 }


}