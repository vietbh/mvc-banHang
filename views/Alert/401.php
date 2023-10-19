<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>401-Unauthorized</title>
  <link href="<?= PUBLIC_URL ?>src/style.css" rel="stylesheet">
  <script src="<?= PUBLIC_URL ?>src/main.js"></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</head>

<body>
  <div class="container-fluid position-relative bg-warning m-0 pt-2 " style="height: 46.8rem; min-height: min-content;">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="auto" data-name="Layer 1" viewBox="0 0 650 512" id="security-error">
      <!-- <circle cx="483.07" cy="169.264" r="119.472" fill="#dbe8ec"></circle> -->
      <path fill="#dbe8ec" d="M603.15451,271.34684V253.15568a13.07945,13.07945,0,0,0-13.07946-13.07945H553.909a13.07945,13.07945,0,0,1-13.07945-13.07945V208.80561c0-7.22358,15.85587-13.07945,23.07945-13.07945h1.45764a13.07945,13.07945,0,0,0,13.07945-13.07945V164.45555a13.07945,13.07945,0,0,0-13.07945-13.07945H123.45954a13.07945,13.07945,0,0,0-13.07946,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07946,13.07945h0A13.07945,13.07945,0,0,1,136.539,208.80561v18.19117a13.07945,13.07945,0,0,1-13.07945,13.07945H72.88015A13.07945,13.07945,0,0,0,59.8007,253.15568v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945H92.72674a13.07945,13.07945,0,0,1,13.07945,13.07946V315.697a13.07945,13.07945,0,0,1-13.07945,13.07945h-.048A13.07945,13.07945,0,0,0,79.59932,341.8559V360.047a13.07945,13.07945,0,0,0,13.07945,13.07945h2.87139a13.07946,13.07946,0,0,1,13.07945,13.07946v18.19124a13.07945,13.07945,0,0,1-13.07945,13.07946H78.42565A13.07945,13.07945,0,0,0,65.3462,430.556v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h483.963a13.07945,13.07945,0,0,0,13.07945-13.07945V430.556a13.07945,13.07945,0,0,0-13.07945-13.07945H551.04814a13.07945,13.07945,0,0,1-13.07945-13.07946V386.20588a13.07946,13.07946,0,0,1,13.07945-13.07946H577.788A13.07945,13.07945,0,0,0,590.86745,360.047V341.8559A13.07945,13.07945,0,0,0,577.788,328.77644h-8.11162A13.07945,13.07945,0,0,1,556.59692,315.697V297.50575a13.07946,13.07946,0,0,1,13.07946-13.07946h20.39867A13.07945,13.07945,0,0,0,603.15451,271.34684Z"></path>
      <path fill="#409cb5" d="M470.53946,168.33927c-50.95615-.86207-101.75477-15.40145-147.83335-42.54624-46.03622,27.14479-96.83485,41.68417-147.80159,42.54624C164.51765,279.21909,198.07519,412.63915,322.70611,462.208c124.67327-49.56889,158.10441-182.98895,147.83335-293.86877Z"></path>
      <path fill="#dbe8ec" d="M435.82451,197.84781c-38.99031-.65963-77.8601-11.78478-113.11822-32.55526-35.22571,20.77048-74.09549,31.89563-113.09391,32.55526-7.94777,84.84235,17.72959,186.9319,113.09391,224.86071C418.103,384.77971,443.68366,282.69016,435.82451,197.84781Z"></path>
      <circle cx="486.016" cy="165.293" r="73.147" fill="#ee781d"></circle>
      <path fill="#f9ae2b" d="M488.13213,193.94072h-38.463A4.22983,4.22983,0,0,1,446.006,187.596L465.23749,154.286l19.2315-33.30992a4.22983,4.22983,0,0,1,7.32628,0l19.2315,33.30992L530.25826,187.596a4.22983,4.22983,0,0,1-3.66314,6.34475Z"></path>
      <rect width="4.232" height="35.776" x="486.016" y="136.742" fill="#409cb5" rx="2.116"></rect>
      <circle cx="488.132" cy="182.632" r="5.062" fill="#409cb5" transform="rotate(-84.345 488.132 182.632)"></circle>
      <path fill="#ee781d" d="M303.83175,276.796V251.10132a19.50421,19.50421,0,0,1,19.68634-19.50145h2.14263a19.49685,19.49685,0,0,1,19.68643,19.50145v8.65581a2.2188,2.2188,0,0,0,2.18957,2.20139l10.36714.047a2.2047,2.2047,0,0,0,2.21312-2.2014v-7.27053A33.928,33.928,0,0,0,326.1421,218.5969h-3.10539a33.93307,33.93307,0,0,0-33.96315,33.93672v24.94914Zm0,0"></path>
      <path fill="#f9ae2b" d="M365.02166,350.68063a9.816,9.816,0,0,0,9.7918-9.79188V285.19946a9.81606,9.81606,0,0,0-9.7918-9.79189H284.16889a9.81606,9.81606,0,0,0-9.7918,9.79189v55.68929a9.816,9.816,0,0,0,9.7918,9.79188Zm0,0"></path>
      <path fill="#ee781d" d="M324.59532,294.50979a10.52653,10.52653,0,0,0-10.49048,10.49335,10.32378,10.32378,0,0,0,4.26493,8.04831V325.3646a6.22555,6.22555,0,0,0,12.4511,0V313.05145a10.35986,10.35986,0,0,0,4.26475-8.04831,10.52638,10.52638,0,0,0-10.4903-10.49335Zm0,0"></path>
      <line x1="125.247" x2="155.568" y1="264.724" y2="264.724" fill="none" stroke="#b9d4db" stroke-miterlimit="10" stroke-width="3"></line>
      <line x1="125.247" x2="155.568" y1="273.463" y2="273.463" fill="none" stroke="#b9d4db" stroke-miterlimit="10" stroke-width="3"></line>
      <line x1="125.247" x2="155.568" y1="282.202" y2="282.202" fill="none" stroke="#b9d4db" stroke-miterlimit="10" stroke-width="3"></line>
      <line x1="493.195" x2="523.515" y1="297.862" y2="297.862" fill="none" stroke="#b9d4db" stroke-miterlimit="10" stroke-width="3"></line>
      <line x1="493.195" x2="523.515" y1="306.601" y2="306.601" fill="none" stroke="#b9d4db" stroke-miterlimit="10" stroke-width="3"></line>
      <line x1="493.195" x2="523.515" y1="315.341" y2="315.341" fill="none" stroke="#b9d4db" stroke-miterlimit="10" stroke-width="3"></line>
      <circle cx="450.101" cy="428.543" r="15.42" fill="#b9d4db"></circle>
      <circle cx="428.538" cy="405.655" r="8.032" fill="#b9d4db"></circle>
      <circle cx="447.236" cy="384.436" r="4.633" fill="#b9d4db"></circle>
      <circle cx="468.785" cy="398.725" r="11.107" fill="#b9d4db"></circle>
      <circle cx="153.965" cy="404.274" r="15.42" fill="#b9d4db"></circle>
      <circle cx="132.402" cy="381.386" r="8.032" fill="#b9d4db"></circle>
      <circle cx="151.1" cy="360.166" r="4.633" fill="#b9d4db"></circle>
      <circle cx="172.649" cy="374.455" r="11.107" fill="#b9d4db"></circle>
    </svg>
    <div class="position-absolute top-0 start-50 translate-middle-x ">
      <h2 class="fs-4 fw-bold text-center text-dark ">
        <span class="fw-bolder mb-3 p-0" style="font-size: 11rem;">401</span> 
      </h2>
    </div>
    <div class="position-absolute bottom-0 start-50 translate-middle-x">
      <h2 class="fs-3 fw-bold text-center text-dark">
        <p class="p-0">
          <a href="<?=ROOT_URL?>" class="p-0 m-0">
              <span class="p-0 m-0 fs-6">Trở về trang chủ</span> 
          </a>
          <br>
          Không đủ quyền truy cập</p> 
      </h2>
    </div>
  </div>
</body>

</html>