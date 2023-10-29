<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <title>V Corperation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= PUBLIC_URL ?>images/rocket.png" rel="website icon" type="image/png">
  <link href="<?= PUBLIC_URL ?>src/style.css" rel="stylesheet">
  <script src="<?= PUBLIC_URL ?>src/main.js"></script>
  <script src="<?= PUBLIC_URL ?>src/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/jumbotron/">
</head>

<body>
  <div class="fixed-bottom d-flex justify-content-end me-3 mb-4 p-1">
    <button onclick="topFunction()" class="btn btn-success btn-lg rounded rounded-1 " id="myBtn" title="Go to top">
      <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <path d="M8 8L12 4M12 4L16 8M12 4V16M4 20H20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
      </svg>
    </button>
    <script>
      // Get the button
      let mybutton = document.getElementById("myBtn");

      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = () => {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 220 || document.documentElement.scrollTop > 220) {
          mybutton.style.display = "";
        } else {
          mybutton.style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
  </div>
  <div class="container-fluid p-0 m-0">
    <section>
      <header class="fixed-top navbar navbar-expand-sm bg-dark navbar-dark">
        <?php
        include 'header_top.php';
        ?>
      </header>
      <nav class="position-relative <?= $layout > 0  ? 'd-none' : '' ?>" style="height: 40rem; max-height: fit-content" id='home'>
        <?php
        include 'header.php';
        ?>
      </nav>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <?php
        include 'nav.php';
        ?>
      </nav>

      <div class="<?= $layout === 0 ? 'container' : 'container-fluid' ?>">

        <div class="row">
          <div class="<?= $layout >= 0  ? 'd-none' : 'col-3 p-0' ?> ">
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