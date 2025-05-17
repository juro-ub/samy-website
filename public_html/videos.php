<?php
$pageTitle = "Samys Videos";
$cssFile = "css/videos.css";
include "header.php";
include "nav.php";
?>
<div class="videos" id="videoliste">Lade Videos…</div>

<script>
    fetch("list_videos.php")
            .then(res => res.json())
            .then(videos => {
                const container = document.getElementById("videoliste");
                container.innerHTML = "";

                videos.forEach(eintrag => {
                    const div = document.createElement("div");
                    div.className = "clip";

                    div.innerHTML = `
                    <h3>Video vom ${eintrag.datum} <small>(${eintrag.stichwoerter})</small></h3>
                    <video controls>
                        <source src="${eintrag.video}" type="video/quicktime">
                        Dein Browser unterstützt kein Video.
                    </video>
                    <p>${eintrag.text.replace(/\n/g, "<br>")}</p>
                `;

                    container.appendChild(div);
                });
            })
            .catch(err => {
                document.getElementById("videoliste").textContent = "Fehler beim Laden der Videos.";
                console.error(err);
            });
</script>

<?php
include "footer.php";
?>