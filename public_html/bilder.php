<?php
$pageTitle = "Samys Bilder";
$cssFile = "css/bilder.css";
include "header.php";
include "nav.php";
?>
<div class="gallery" id="galerie">Lade Bilder…</div>

<script>
    fetch("list_bilder.php")
        .then(res => res.json())
        .then(bilder => {
                const galerie = document.getElementById("galerie");
                galerie.innerHTML = "";

                bilder.forEach(eintrag => {
                    const div = document.createElement("div");
                    div.className = "bild";

                    div.innerHTML = `
                    <h3>Bild vom ${eintrag.datum}
                    <small>(${eintrag.stichwoerter})</small></h3>
                    <img src="${eintrag.bild}" alt="samy">
                    <p>${eintrag.text.replace(/\n/g, "<br>")}</p>
                `;

                    galerie.appendChild(div);
                });
            })
            .catch(err => {
                document.getElementById("galerie").textContent = "Fehler beim Laden der Bilder.";
                console.error(err);
            });
</script>
<?php
include "footer.php";
?>