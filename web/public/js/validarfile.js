function control(f){
	var ext=['gif','jpg','jpeg','png'];
	var v=f.value.split('.').pop().toLowerCase();
	for(var i=0,n;n=ext[i];i++){
		if(n.toLowerCase()==v)
			return
	}
	var t=f.cloneNode(true);
	t.value='';
	f.parentNode.replaceChild(t,f);
	alert('extensión no válida');
	
}
