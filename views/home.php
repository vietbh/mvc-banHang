<?php
include 'Alert/message.php';
?>

<section class="row bg-dark mt-2 mb-4 rounded-2 pb-4 px-4 bg-opacity-75 " style=" max-height: fit-content;">
  <h2 class="fs-5 fw-bolder text-light mt-3 pb-1 px-2 m-2">
    SẢN PHẨM XEM NHIỀU
    |
    <svg viewBox="0 0 24 24" width="26px" height="23px" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier">
        <path opacity="0.4" d="M11.9998 14H12.9998C14.0998 14 14.9998 13.1 14.9998 12V2H5.99976C4.49976 2 3.18977 2.82999 2.50977 4.04999" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 17C2 18.66 3.34 20 5 20H6C6 18.9 6.9 18 8 18C9.1 18 10 18.9 10 20H14C14 18.9 14.9 18 16 18C17.1 18 18 18.9 18 20H19C20.66 20 22 18.66 22 17V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L18.58 6.01001C18.22 5.39001 17.56 5 16.84 5H15V12C15 13.1 14.1 14 13 14H12" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M8 22C9.10457 22 10 21.1046 10 20C10 18.8954 9.10457 18 8 18C6.89543 18 6 18.8954 6 20C6 21.1046 6.89543 22 8 22Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M16 22C17.1046 22 18 21.1046 18 20C18 18.8954 17.1046 18 16 18C14.8954 18 14 18.8954 14 20C14 21.1046 14.8954 22 16 22Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M22 12V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L22 12Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 8H8" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 11H6" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 14H4" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
      </g>
    </svg>
    <span class="fw-light fs-5">
      Free ship</span>
      <a href="#" class="text-decoration-none text-light">
        <span class="float-end fw-normal px-3 fs-5">
          Xem tất cả
        </span>
      </a>
  </h2>
  <?php
    foreach ($spxn  as $value) {
      extract($value);
      $href_cart = "addtocart?id=" . $value['id_sp'] . '&soluong=1';
  ?>
    <div class="col-sm-1 col-md-6 col-lg-3 mb-0 mx-0 py-1 px-1">
      <div class="card px-4 pb-2">
        <a class="text-decoration-none" href="<?= ROOT_URL . "sp?id=" . $value['id_sp'] ?>">
          <img class="card-img-top py-2" src="<?= $value['hinh'] ?>" alt="" width="200px" height="190px">
        </a>
        <div class="card-body">
          <a class="text-decoration-none" href="<?= ROOT_URL . "sp?id=" . $value['id_sp'] ?>">
            <span class="card-title mb-0 fs-6 fw-medium d-inline-block text-truncate " style="width: 200px; max-width: fit-content;"><?= $value['ten_sp'] ?></span>
          </a>
          <p class="card-text my-0 fs-6 fw-bold text-decoration-line-through"><?= $this->num_format($value['gia']) ?></p>
          <p class="card-text mt-0 fs-4 fw-bold text-danger"><?= $this->num_format($value['gia_km'] == 0 ? $value['gia'] : $value['gia_km']) ?></p>
        </div>
      </div>
    </div>
  <?php } ?>
</section>
<section class="row bg-success mt-4 mb-4 rounded-2 pb-4 px-4 bg-opacity-75 " style=" max-height: fit-content;">
  <h2 class="fs-5 fw-bolder text-light mt-3 pb-1 px-2 m-2">
    SẢN PHẨM NỔI BẬT
    |
    <svg viewBox="0 0 24 24" width="26px" height="23px" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier">
        <path opacity="0.4" d="M11.9998 14H12.9998C14.0998 14 14.9998 13.1 14.9998 12V2H5.99976C4.49976 2 3.18977 2.82999 2.50977 4.04999" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 17C2 18.66 3.34 20 5 20H6C6 18.9 6.9 18 8 18C9.1 18 10 18.9 10 20H14C14 18.9 14.9 18 16 18C17.1 18 18 18.9 18 20H19C20.66 20 22 18.66 22 17V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L18.58 6.01001C18.22 5.39001 17.56 5 16.84 5H15V12C15 13.1 14.1 14 13 14H12" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M8 22C9.10457 22 10 21.1046 10 20C10 18.8954 9.10457 18 8 18C6.89543 18 6 18.8954 6 20C6 21.1046 6.89543 22 8 22Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M16 22C17.1046 22 18 21.1046 18 20C18 18.8954 17.1046 18 16 18C14.8954 18 14 18.8954 14 20C14 21.1046 14.8954 22 16 22Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M22 12V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L22 12Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 8H8" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 11H6" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 14H4" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
      </g>
    </svg>
    <span class="fw-light fs-5">
      Free ship</span>
      <a href="#" class="text-decoration-none text-light">
        <span class="float-end fw-normal px-3 fs-5">
          Xem tất cả
        </span>
      </a>
  </h2>
  <?php
    foreach ($spnb as $value) {
      extract($value);
      $href_cart = "addtocart?id=" . $value['id_sp'] . '&soluong=1';
  ?>
    <div class="col-sm-1 col-md-6 col-lg-3 mb-0 mx-0 py-1 px-1">
      <div class="card px-4 pb-2">
        <a class="text-decoration-none" href="<?= ROOT_URL . "sp?id=" . $value['id_sp'] ?>">
          <img class="card-img-top py-2" src="<?= $value['hinh'] ?>" alt="" width="200px" height="190px">
        </a>
        <div class="card-body">
          <a class="text-decoration-none" href="<?= ROOT_URL . "sp?id=" . $value['id_sp'] ?>">
            <span class="card-title mb-0 fs-6 fw-medium d-inline-block text-truncate " style="width: 200px; max-width: fit-content;"><?= $value['ten_sp'] ?></span>
          </a>
          <p class="card-text my-0 fs-6 fw-bold text-decoration-line-through"><?= $this->num_format($value['gia']) ?></p>
          <p class="card-text mt-0 fs-4 fw-bold text-danger"><?= $this->num_format($value['gia_km'] == 0 ? $value['gia'] : $value['gia_km']) ?></p>
        </div>
      </div>
    </div>
  <?php } ?>
</section>

<section class="row bg-dark mt-2 mb-4 rounded-2 pb-4 px-4 bg-opacity-75 " style=" max-height: fit-content;">
  <h2 class="fs-5 fw-bolder text-light mt-3 pb-1 px-2 m-2">
    SẢN PHẨM RA MẮT GẦN ĐÂY
    |
    <svg viewBox="0 0 24 24" width="26px" height="23px" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier">
        <path opacity="0.4" d="M11.9998 14H12.9998C14.0998 14 14.9998 13.1 14.9998 12V2H5.99976C4.49976 2 3.18977 2.82999 2.50977 4.04999" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 17C2 18.66 3.34 20 5 20H6C6 18.9 6.9 18 8 18C9.1 18 10 18.9 10 20H14C14 18.9 14.9 18 16 18C17.1 18 18 18.9 18 20H19C20.66 20 22 18.66 22 17V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L18.58 6.01001C18.22 5.39001 17.56 5 16.84 5H15V12C15 13.1 14.1 14 13 14H12" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M8 22C9.10457 22 10 21.1046 10 20C10 18.8954 9.10457 18 8 18C6.89543 18 6 18.8954 6 20C6 21.1046 6.89543 22 8 22Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M16 22C17.1046 22 18 21.1046 18 20C18 18.8954 17.1046 18 16 18C14.8954 18 14 18.8954 14 20C14 21.1046 14.8954 22 16 22Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M22 12V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L22 12Z" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 8H8" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 11H6" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M2 14H4" stroke="#e60000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
      </g>
    </svg>
    <span class="fw-light fs-5">
      Free ship</span>
      <a href="#" class="text-decoration-none text-light">
        <span class="float-end fw-normal px-3 fs-5">
          Xem tất cả
        </span>
      </a>
  </h2>
  <?php
    foreach ($spgd  as $value) {
      extract($value);
      $href_cart = "addtocart?id=" . $value['id_sp'] . '&soluong=1';
  ?>
    <div class="col-sm-1 col-md-6 col-lg-3 mb-0 mx-0 py-1 px-1">
      <div class="card px-4 pb-2">
        <a class="text-decoration-none" href="<?= ROOT_URL . "sp?id=" . $value['id_sp'] ?>">
          <img class="card-img-top py-2" src="<?= $value['hinh'] ?>" alt="" width="200px" height="190px">
        </a>
        <div class="card-body">
          <a class="text-decoration-none" href="<?= ROOT_URL . "sp?id=" . $value['id_sp'] ?>">
            <span class="card-title mb-0 fs-6 fw-medium d-inline-block text-truncate " style="width: 200px; max-width: fit-content;"><?= $value['ten_sp'] ?></span>
          </a>
          <p class="card-text my-0 fs-6 fw-bold text-decoration-line-through"><?= $this->num_format($value['gia']) ?></p>
          <p class="card-text mt-0 fs-4 fw-bold text-danger"><?= $this->num_format($value['gia_km'] == 0 ? $value['gia'] : $value['gia_km']) ?></p>
        </div>
      </div>
    </div>
  <?php } ?>
</section>