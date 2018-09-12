			function validar(f)	{
				enviar = /\.(jpg|pdf)$/i.test(f.archivos.value);
				if (!enviar)	alert("seleccione imagen");
				return enviar;
			}

			function limpiar(element)	{
				f = element;
				nuevoFile = document.createElement("input");
				nuevoFile.id = f.id;
				nuevoFile.type = "file";
				nuevoFile.name = "usuario[foto]";
				nuevoFile.name = "usuario[imgcedula]";
				nuevoFile.name = "radicado[archivo1]";
				nuevoFile.name = "radicado[archivo2]";
				nuevoFile.name = "radicado[archivo3]";
				nuevoFile.value = "";
				nuevoFile.accept = '.jpg, .png, .bmp';
				nuevoFile.setAttribute('onchange','checkear(this);')
				console.log(nuevoFile);
				nodoPadre = f.parentNode;
				nodoSiguiente = f.nextSibling;
				nodoPadre.removeChild(f);
				(nodoSiguiente == null) ? nodoPadre.appendChild(nuevoFile):
					nodoPadre.insertBefore(nuevoFile, nodoSiguiente);
			}
			
			function checkear(obj)	{
				(/\.(jpg|pdf)$/i.test(obj.value)) ? console.log(obj.value) : no_prever(obj);
			}
			
			function no_prever(element) {
				alert('El formato del archivo no es valido. Adjunte archivos con extension .(JPG,PDF)');
				limpiar(element);
			}
