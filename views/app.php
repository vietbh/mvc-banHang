
<!DOCTYPE html>
<html lang="en">
<head>
  <title>V Corperation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?=PUBLIC_URL?>images/rocket.png" rel="website icon" type="image/png">
  <link href="<?=PUBLIC_URL?>src/style.css" rel="stylesheet">
  <script src="<?=PUBLIC_URL?>src/main.js"></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body >
<div class="container-fluid p-0 m-0">
  <section >
    <nav class="fixed-top navbar navbar-expand-sm bg-dark navbar-dark" >
      <?php
        include 'header_top.php';
      ?>
    </nav>  
    <header class="position-relative" style="height: 40rem; max-height: fit-content" id='home'>
      <?php
          include 'header.php';
      ?>
    </header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
      <?php
        include 'nav.php';
      ?>
    </nav>  
    <div class="<?= $layout === 0 ? 'container': 'container-fluid'?>">
      <div class="row">
        <div class="<?= $layout >= 0  ? 'd-none': 'col-3 p-0'?> ">
          <?php  
            include 'aside.php';
          ?>
        </div>
        <div class="col">
          <?php
            include 'article.php';
          ?>
        </div>
        
      </div>
    </div>
    <footer class=" p-2 bg-dark text-white text-center">
      <?php
      include 'footer.php';
      ?>
    </footer>
  </section>
</div>
</body>
</html>
