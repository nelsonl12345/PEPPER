  $(document).on("click", ".alert16", function(e) {        	
            bootbox.alert( " Historia.<br> El perro de Presa Canario es originario de las islas de Tenerife y Gran Canaria, en el archipiélago canario. Fueron introducidos por los conquistadores y colonos españoles en siglo XVI. Estos perros de brega se dedicaban especialmente al manejo del ganado cabrío y eran  excelentes guardianes. Fue esencialmente el resultado de cruces del Bardino o Majorero, perro oriundo de la isla de Fuerteventura y perros molosoides llevados a las islas.", function() {
                console.log("Alert Callback ");
            });
        });