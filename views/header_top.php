<?php $url = mb_strtolower($_SERVER['REQUEST_URI']); ?>
<div class="container-fluid ">
  <ul class="navbar-nav">
    <li class="nav-item ">
      <a class="nav-link" href="<?= ROOT_URL ?>">
        <span class="<?= $url === strtolower(ROOT_URL) ? 'active' : '' ?> label fw-bold fs-3 text-warning">
          V Corperation
        </span>
      </a>
    </li>

  </ul>

  <form class="w-50 d-flex justify-content-center" action="timkiem" method="get">
    <div class="input-group">
      <span class="input-group-text p-0 m-0 ">
        <button class="btn m-0" type="submit">
          <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fcfcfc">
            <g id="SVGRepo_bgCarrier" stroke-width="0" />
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
            <g id="SVGRepo_iconCarrier">
              <path d="M14.9536 14.9458L21 21M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </g>
          </svg>
        </button>
      </span>
      <input class="form-control" type="search" name="search" x-webkid-speech placeholder="Tìm kiếm sản phẩm" aria-label="Search" />
    </div>
  </form>

  <div class="d-flex">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " href="<?= ROOT_URL . 'giohang' ?>">
          <button class="<?= strpos($url, 'giohang') === false ? '' : 'active' ?> btn btn position-relative btn-outline-success px-3">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
              <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php
              if (!isset($_SESSION['cart'])) {
                echo '0';
              } else echo count($_SESSION['cart']);
              ?>
            </span>
          </button>
        </a>
      </li>
    </ul>
    <!--  -->
    <?php
    if (isset($_SESSION['user']['role'])) { ?>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link ps-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <button class="<?= strpos($url, 'chitietdonhang') === false ? '' : 'active';
                            strpos($url, 'chitietdonhang') === false ? '' : 'active';
                            ?> btn btn text-light btn-outline-success dropdown-toggle m-0">
              Xin chào
              <?= $_SESSION['user']['name'] ?>
            </button>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Thông tin khách hàng</a></li>
            <li><a class="dropdown-item " <?= $_SESSION['user']['role'] === 1 ? '' : 'hidden' ?> href="<?= ROOT_URL ?>admin/san-pham">Trang quản lí</a></li>
            <li><a class="dropdown-item" href="<?= ROOT_URL ?>doimatkhau#form_c_pass">Đổi mật khẩu</a></li>
            <li><a class="dropdown-item" href="<?= ROOT_URL . 'chitietdonhang#don_hang' ?>">Chi tiết đơn hàng</a></li>
            <li><a class="dropdown-item" href="<?= ROOT_URL ?>dangxuat">Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    <?php } else { ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link ps-3" href="<?= ROOT_URL . 'dangnhap#form_dang_nhap' ?>">
            <button class="<?= strpos($url, 'dangnhap') === false ? '' : 'active' ?> btn btn text-light btn-outline-success">
              Đăng nhập
            </button>
          </a>
        </li>
      </ul>
    <?php } ?>
  </div>
  
</div>