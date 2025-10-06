let score = 0;//Variable para almacenar la puntuacion
        function startGame() {
            fetch("https://restcountries.com/v3.1/all")
                .then(response => response.json())//convertir respuesta en json
                .then(data => {
                    const countries = getRandomCountries(data);//funcion para obtener paises al azar
                    const correctCountry = countries[0];//Pais correcto
                    const flagImage = correctCountry.flags['png'];
                    const countryNames = countries.map(country => country.name.common);
                    shuffleArray(countryNames);//Mezcla los nombres en orden aleatorio
                    
                    document.getElementById("flag").src = flagImage;
                    const buttons = document.getElementById("country-buttons");
                    buttons.innerHTML = ''; // Limpiar botones antes de agregar nuevos

                    countryNames.forEach(name => {//Se crean botones con los nombres de las respuestas de cada pais
                        const button = document.createElement("button");
                        button.innerText = name;
                        button.onclick = function () {//Si se pulsa un se llama a una funcion para ver si se acerto el pais
                            checkAnswer(name, correctCountry.name.common);
                        };
                        buttons.appendChild(button);//Se añade al div de botones
                    });
                })
                .catch(error => console.log("Error fetching countries:", error));//Si no devuelve ninguna respuesta nos mostrara un mensaje de que no hay paises
        }

        function getRandomCountries(data) {//Funcion para obtener paises al azar
            const shuffled = data.sort(() => 0.5 - Math.random());
            return shuffled.slice(0, 3);
        }

        function shuffleArray(array) {//Mezclar el arrya de paises
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        function checkAnswer(selectedCountry, correctCountry) {//Funcion para indicar si el pais que se selecciono es el correcto o no
            if (selectedCountry === correctCountry) {//Si se acierta se suma un punto y se sigue jugando
                score++;
                document.getElementById("score").innerText = "Puntuación: " + score;
                startGame();
            } else {//SI se falla el juego termina y nos da la puntuacion total y se vuelve a empezar el juego
                alert(`¡Incorrecto! El juego ha terminado. La respuesta correcta era: ${correctCountry}`);
                document.getElementById("score").innerText = "Puntuación final: " + score;
                window.location.reload();//Recargar la pagina
            }
        }

        window.onload = function () {//Cada vez que se recarga la pagina se inicia otra vez el juego
            startGame();
        };

        document.getElementById("cerrarSesion").addEventListener("click",()=>{
            localStorage.removeItem("userLogged");
            window.location.href = "login.html";
        })   