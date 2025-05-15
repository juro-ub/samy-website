<?php
// erlaubte Seiten
$seiten = ['texte', 'bilder', 'videos'];

// aktuelle Seite aus URL
$page = isset($_GET['page']) && in_array($_GET['page'], $seiten) ? $_GET['page'] : 'texte';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Samys Welt</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      background: #f9f9f9;
    }

    nav {
      background: #333;
      color: white;
      padding: 10px;
      display: flex;
      gap: 20px;
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 6px 12px;
      border-radius: 4px;
    }

    nav a.active {
      background-color: #fff;
      color: #333;
      font-weight: bold;
    }

    nav a:hover {
      background-color: #555;
    }

    main {
      max-width: 1000px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

  <nav>
    <a href="?page=texte" class="<?= $page == 'texte' ? 'active' : '' ?>">Texte</a>
    <a href="?page=bilder" class="<?= $page == 'bilder' ? 'active' : '' ?>">Bilder</a>
    <a href="?page=videos" class="<?= $page == 'videos' ? 'active' : '' ?>">Videos</a>
  </nav>

  <main>
    <?php
    $file = __DIR__ . "/{$page}.html";
    if (file_exists($file)) {
      include($file);
    } else {
      echo "<p>Die Seite konnte nicht geladen werden.</p>";
    }
    ?>
  </main>

</body>
</html>
