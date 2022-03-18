<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JPO 2022 - Atelier de typographie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="logo.png">
    <link rel="stylesheet" href="styles/main.css">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <script src="scripts/script.js" defer></script>
    <script type="text/javascript" src="scripts/draggable-resizable-dialog.js"></script>

<?php
// affiche les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

    <?php $fonts = scandir("fonts"); ?>

    <?php foreach ($fonts as $index => $font) : ?>
      <?php
        $fontname_split = explode('.', $font);
        $ext_font = end($fontname_split);

        if (!in_array($font, array(".", "..")) && $ext_font == "ttf") :
      ?>
          <link rel="preload" href="fonts/<?= $font ?>" as="font" crossorigin="anonymous" />
        <?php endif; ?>
    <?php endforeach; ?>

    <?php $visuel = array_diff(scandir("visuel"), array(".", "..")); ?>
    <?php $exts_images = ['jpg', 'png', 'webp']; ?>
    <?php $exts_videos = ['mp4', 'avi']; ?>

    <?php function create_popup($id, $titlebar, $mobile) { ?>
<div id="<?php echo $id; ?>" class="dialog <?php if ($mobile == "mobile") {echo $mobile;} ?>">
      <div class="flextest">
         <div class="titlebar">
          <?php echo $titlebar; ?>
         </div>
         <button class="close" name="close">
           <svg xmlns="http://www.w3.org/2000/svg" width="20.684" height="20.68" viewBox="0 0 20.684 20.68">
             <path id="Tracé_1" data-name="Tracé 1" d="M3.678.643a1.267,1.267,0,0,0,.588.335,1.311,1.311,0,0,0,.677,0A1.361,1.361,0,0,0,5.537.643l8.094-8.107L21.752.643a1.268,1.268,0,0,0,.916.376A1.242,1.242,0,0,0,23.6.643a1.274,1.274,0,0,0,.383-.937,1.252,1.252,0,0,0-.369-.923L15.49-9.324l8.121-8.094a1.26,1.26,0,0,0,.369-.93,1.237,1.237,0,0,0-.383-.93,1.29,1.29,0,0,0-.93-.369,1.244,1.244,0,0,0-.916.369L13.631-11.17,5.537-19.277a1.361,1.361,0,0,0-.595-.335,1.361,1.361,0,0,0-.677-.007,1.171,1.171,0,0,0-.588.342,1.3,1.3,0,0,0-.328.595,1.416,1.416,0,0,0,0,.677,1.217,1.217,0,0,0,.328.588l8.094,8.094L3.678-1.217a1.267,1.267,0,0,0-.335.588,1.389,1.389,0,0,0-.007.684A1.171,1.171,0,0,0,3.678.643Z" transform="translate(-3.297 19.659)"/>
           </svg>
         </button>
      </div>

      <?php if ($id == "typographiques") : ?>
        <div class="content">
          <iframe src="https://lacambretypo.be/fr/typefaces"></iframe>
        </div>

      <?php elseif ($id == "live") : ?>
        <div class="content landscape">
          <iframe
              id="twitchos"
              src="https://player.twitch.tv/?channel=lacambre_typo&parent=typopwa.netlify.app"
              parent="localhost"
              height="100%"
              width="100%"
              allowfullscreen="true">
          </iframe>
        </div>

      <?php elseif ($id == "programme") : ?>
        <div class="content">
          <iframe src="https://lacambretypo.be/fr/news/portes-ouvertes-irl-url-1921-mars-2021"></iframe>
        </div>

      <?php elseif ($id == "chat") : ?>
        <div class="content">
        </div>

      <?php else : ?>
        <div class="content carousel">
          <?php $visus = array_diff(scandir("visuel/".$id), array(".", "..")) ?>

          <?php foreach ($visus as $index => $visu ) : ?>
            <div class="carousel-items">
              <?php $extension = end(explode('.', $visu)) ?>

              <?php if (array_in($extension, $exts_images)) : ?>
                <img class="items" src="visuel/<?php echo $visu; ?>" alt="une image">

              <?php elseif (array_in($extension, $exts_videos)) : ?>
                <video class="items" autoplay="" muted="" playsinline="" loop="">
                  <source src="medias/<?php echo $visu; ?>4" type="video/mp4">
                  Sorry, your browser doesn't support embedded videos.
                </video>

              <?php endif; ?>

            </div>

          <?php endforeach; ?>
        </div>

      <?php endif; ?>

    </div>

    <?php } ?>

  </head>

  <body class="no-zoom">
    <main>

      <p>
        Bienvenue sur le site des journées portes ouvertes de <span class="popup">l'Atelier de typographie</span> de La Cambre.
        Nous vous y accueillerons afin de vous donner un aperçu de nos
        productions <span class="popup">éditoriales</span> et <span class="popup">typographiques</span>, nos travaux à
        <span class="popup">l'imprimerie</span>, nos <span class="popup">workshops</span>, nos <span class="popup">excursions</span>, et nos <span class="popup">jurys</span>.
        On vous propose aussi un <span class="popup">live</span> sans interruption et un <span class="popup">chat</span> pour que vous puissiez poser toutes vos questions.
        Sur place, stand de gâteaux, vente de divers objets éditoriaux, exposition des projets,
        rencontre avec les étudiant⸱e⸱s et enseignant⸱e⸱s, et tout un tas de
        surprises sont au <span class="popup">programme</span> de ces OPEN DAYS.
      </p>
    </main>

    <nav>
      <a id="switchfont" type="button" name="button">Basculer Fonte</a>

      <div class="links">
          <a href="https://lacambretypo.be">Website</a>
          <a href="https://www.instagram.com/atelier_de_typographie/">Instagram</a>
          <a href="https://lacambretypo.be/fr/informations">Contact</a>
      </div>
    </nav>

  <?php create_popup("atelier", "Atelier", "mobile"); ?>
  <?php create_popup("éditoriales", "Éditions", "classic"); ?>
  <?php create_popup("typographiques", "Fontes", "classic"); ?>
  <?php create_popup("imprimerie", "Imprimerie", "classic"); ?>
  <?php create_popup("workshops", "Workshops", "classic"); ?>
  <?php create_popup("excursions", "Excursions", "mobile"); ?>
  <?php create_popup("jurys", "Jurys", "classic"); ?>
  <?php create_popup("live", "LIVE ●", "classic"); ?>
  <?php create_popup("chat", "Chat", "classic"); ?>
  <?php create_popup("programme", "Programme", "classic"); ?>

  </body>
</html>
