  $(document).on("click", ".alert2", function(e) {        	
            bootbox.alert(" Historia. <br> El Dogo de Burdeos es una de las razas de perro francesas más antiguas y su origen está en los perros mastines orientales que llegaron a Europa. Antiguamente se utilizaban sobre todo para la lucha contra  toros, osos y perros, Poco a poco pasaron a ser los guardianes de los hogares y de los castillos.", function() {
                console.log("Alert Callback");
            });
        });