<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveringssysteem</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header>
            <h1>RESERVEER EEN LOKAAL</h1>
        </header>
        <aside>
            <h2>INFORMATIE</h2>
            <ul>
                <li>alleen maandag t/m vrijdag</li>
                <li>max 3 weken van tevoren</li>
                <li>max 1 uur</li>
            </ul>
            <a href='overzicht.php'>OVERZICHT</a>
        </aside>
        <form action="verwerk.php" method="POST" id="form">

            <label for="studentnummer">Studentnummer</label>
            <input type="number" name="studentnummer" id="studentnummer"></input>
            <p class="error" id="studentnummerError"></p>

            <label for="datum">Datum</label>
            <input type="date" name="datum" id="datum" onchange="handleDatum()"></input>
            <p class="error" id="datumError"></p>

            <label for="lokaal">Lokaal</label>
            <select name="lokaal" id="lokaal" onchange="handleLokaal()">
                <option value="B5.400A">B5.400A</option>
                <option value="B5.420">B5.420</option>
                <option value="B5.430">B5.430</option>
                <option value="B5.440">B5.440</option>
                <option value="B5.450">B5.450</option>
            </select>
            <p class="error" id="lokaalError"></p>

            <label for="uren">Aantal Uren</label>
            <select name="uren" id="aantal-uren">
                <option value="1">1</option>
            </select>
            <p class="error" id="aantal-uren-error"></p>

            <label for="lesuur">Lesuur</label>
            <select name="lesuur" id="lesuren">
            </select>
            <p class="error" id="lesurenError"></p>

        </form>
        <button id="submit">RESERVEER</button>
        <?php
        ?>
    </div>
    <script>
        function handleDatum() {
            let getDatumValue = document.getElementById("datum").value;
            let getLokaalValue = document.getElementById("lokaal").value;
            let xhttp = new XMLHttpRequest();
            let lesuur = document.getElementById("lesuren");
            lesuur.innerHTML = "";
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState === 4) {
                    if (xhttp.status === 200) {
                        console.log(xhttp.response);
                        let response = xhttp.response;
                        let responseLesuur = response.split("/");
                        console.log(responseLesuur);
                        for (x = 1; x <= 10; x++) {
                            if (!responseLesuur.includes("" + x)) {
                                let newOption = document.createElement("option");
                                newOption.setAttribute("value", x);
                                newOption.innerHTML = x;
                                lesuur.appendChild(newOption);
                            }
                        }

                    } else {
                        alert('Error Code: ' + xhttp.status);
                        alert('Error Message: ' + xhttp.statusText);
                    }
                }
            }

            xhttp.open('GET', 'https://85748.ict-lab.nl/Minor%20Algemeen/digitalsignage_opdracht2/getDatum.php?datum=' + getDatumValue + '&lokaal=' + getLokaalValue, true);
            xhttp.send();
        }

        function handleLokaal() {
            let getDatumValue = document.getElementById("datum").value;
            let getLokaalValue = document.getElementById("lokaal").value;
            let xhttp = new XMLHttpRequest();
            let lesuur = document.getElementById("lesuren");
            lesuur.innerHTML = "";
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState === 4) {
                    if (xhttp.status === 200) {
                        console.log(xhttp.response);
                        let response = xhttp.response;
                        let responseLesuur = response.split("/");
                        console.log(responseLesuur);
                        for (x = 1; x <= 10; x++) {
                            if (!responseLesuur.includes("" + x)) {
                                let newOption = document.createElement("option");
                                newOption.setAttribute("value", x);
                                newOption.innerHTML = x;
                                lesuur.appendChild(newOption);
                            }
                        }

                    } else {
                        alert('Error Code: ' + xhttp.status);
                        alert('Error Message: ' + xhttp.statusText);
                    }
                }
            }

            xhttp.open('GET', 'https://85748.ict-lab.nl/Minor%20Algemeen/digitalsignage_opdracht2/getDatum.php?datum=' + getDatumValue + '&lokaal=' + getLokaalValue, true);
            xhttp.send();
        }
        let form = document.getElementById("form");
        let button = document.getElementById("submit");

        // vandaag
        let vandaag = new Date();

        button.addEventListener("click", () => {

            let allowSubmit = true;

            // input studentnummer
            let studentnummer = document.getElementById("studentnummer").value;

            // input lokaal 
            let lokaal = document.getElementById("lokaal").value;
            let lokalen = ["B5.400A", "B5.420", "B5.430", "B5.440", "B5.450"];

            // input aantal uren
            let aantalUren = document.getElementById("aantal-uren").value;

            // input lesuren
            let lesuren = document.getElementById("lesuren").value;

            // input datum
            let datum = new Date(document.getElementById("datum").value);

            // input datum dag nummer
            let dagNummer = datum.getDay();

            // datum na 3 weken
            let numWeeks = 3;
            let toekomst = new Date();
            toekomst.setDate(toekomst.getDate() + numWeeks * 7);

            // foutmeldingen
            let studentnummerError = document.getElementById("studentnummerError");
            let datumError = document.getElementById("datumError");
            let lokaalError = document.getElementById("lokaalError");
            let aantalUrenError = document.getElementById("aantal-uren-error");
            let lesurenError = document.getElementById("lesurenError");

            if (studentnummer == "") {
                allowSubmit = false;
                studentnummerError.innerHTML = "Vul een studentnummer in";
            } else if (studentnummer.length != 5) {
                allowSubmit = false;
                studentnummerError.innerHTML = "Een studentnummer is 5 getallen";
            }

            if (datum < vandaag) {
                allowSubmit = false;
                datumError.innerHTML = "Je kan geen datum reserveren die al is geweest";
            } else if (datum > toekomst) {
                allowSubmit = false;
                datumError.innerHTML = "Je kan max 3 weken van tevoren reserveren";
            } else if (dagNummer == 6 || dagNummer == 0) {
                allowSubmit = false;
                datumError.innerHTML = "Je kan niet in het weekend reserveren";
            } else if (!Date.parse(datum)) {
                allowSubmit = false;
                datumError.innerHTML = "Vul een geldige datum in";
            }

            if(!lokalen.includes(lokaal)){
                allowSubmit = false;
                lokaalError.innerHTML = "Dit lokaal kan je niet reserveren"
            }

            if(aantalUren != 1){
                allowSubmit = false;
                aantalUrenError.innerHTML = "Je mag maar 1 lesuur reserveren";
            }

            if(lesuren < 1 || lesuren > 10){
                allowSubmit = false;
                lesurenError.innerHTML = "School uren gaan van 1 tot 10";
            }


            if (allowSubmit) {
                form.submit();
            } else {

            }

        })
    </script>
</body>

</html>