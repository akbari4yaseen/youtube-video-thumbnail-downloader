<?php
  if (isset($_POST["download"])) {
    $imgurl = $_POST["img-url"];
    $ch = curl_init($imgurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $download = curl_exec($ch);
    curl_close($ch);
    header("Content-type: image/jpg");
    header("Content-Disposition: attachment; filename=thumbnail.jpg");
    echo $download;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Yaseen Akbari" />
    <title>YouTube's video thumbnail downloader</title>
    <link rel="stylesheet" href="css/style.css" />
    <script defer src="js/script.js"></script>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
  </head>
  <body>
    <main class="container">
      <form action="<? echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <header>Thumbnail Downloader</header>
        <div class="url-input">
          <span class="title">Paste your url here:</span>
          <div class="field">
            <input
              type="text"
              placeholder="https://www.youtube.com/watch?v=lsodfD2"
              required
            />
            <input class="hidden-input" type="hidden" name="img-url" />
            <div class="bottom-line"></div>
          </div>
        </div>
        <div class="preview-area">
          <img class="thumbnail" src="" alt="thumbnail" />
          <i class="icon fas fa-cloud-download-alt"></i>
          <span>Paste video url to preview</span>
        </div>
        <button class="download-btn" type="submit" name="download">
          <i class="fas fa-download"></i> Download Thumbnail
        </button>
      </form>
    </main>
  </body>
</html>
