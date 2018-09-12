function d0(selectTag){
 if(selectTag.value == 'Mixto'){
document.getElementById('cual').disabled = false;
 }else{
document.getElementById('cual').disabled = true;
 }
 
 if(selectTag.value != 'Mixto'){
 	document.getElementById('cual').value="";
 }


}