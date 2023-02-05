window.shorter = {

	short_url: () => {

		// Recuperar el valor del input
		let long_url = document.getElementById('long_url').value;

		// Validar que sea una URL válida
		if(shorter.validate_url(long_url)){

			// Realizar una solicitud al sistema para acortar la URL => url.store
			axios.post('/url', {

				long_url: long_url

			})
			.then(function (response) {
				
				document.getElementById('long_url').value = '';

				document.getElementById('short_url_container').style.display = "block";

				document.getElementById('short_url').value = response.data.short_url;

			})
			.catch(function (error) {
				
				console.log(error);

			});

		}


	},

	copy_url: () => {

		// Recuperar el valor del input
		let short_url = document.getElementById('short_url');

		// Seleccionar el texto
		short_url.select();

		// Esto es para dispositivos móviles
		short_url.setSelectionRange(0, 99999); 

		// Copiar el contenido al portapapeles
		document.execCommand("copy");

	},

	/*Requiere la instalación de valid-url"*/
	validate_url: (url) => {

		let status = true;

		// Verificar que la URL no venga vacía
		if(url.trim() == ""){

			alert('Debe colocar una URL');

			status = false;

		}

		/*Requiere la instalación de valid-url"*/
		if(!validUrl.isWebUri(url)){

			// Mostrar alerta
			alert('URL no válida');

			status = false;

		}

		return status;

	}

}