<?php
$pageTitle = "Samys Tagebuch";
$cssFile = "css/texte.css";
include "header.php";
include "nav.php";
?>
<div class="wrapper">
    <h1>Willkommen in Samy's Welt</h1>
    <h2>Hier findet ihr ein Tagebuch zu meinem lieben Samy.</h2>
    <div id="eintragsliste">Lade Einträge...</div>
</div>
<script>
    fetch("list_texte.php")
            .then(res => res.json())
            .then(eintraege => {
                const container = document.getElementById("eintragsliste");
                container.innerHTML = "";

                eintraege.sort().reverse().forEach(eintrag => {
                    const div = document.createElement("div");
                    div.className = "eintrag";

                    const datum = eintrag.name.replace("samy_", "").replace(".txt", "").split("_").join(".");
                    const title = `<h3>Eintrag vom ${datum}</h3>`;
                    const text = `<p>${eintrag.content.replace(/\n/g, "<br>")}</p>`;

                    div.innerHTML = title + text;
                    container.appendChild(div);
                });
            })
            .catch(err => {
                document.getElementById("eintragsliste").textContent = "Fehler beim Laden der Einträge.";
                console.error(err);
            });
</script>

<?php
include "footer.php";
?>
