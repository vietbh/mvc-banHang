<?php $url = mb_strtolower($_SERVER['REQUEST_URI']);?> 
 <div class="container-fluid ">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="<?= ROOT_URL ?>">
          <span class="<?=$url === strtolower(ROOT_URL)?'active':'' ?> label fw-bold fs-3 text-warning">
              V Corperation
          </span>  
        </a>
      </li>
    </ul>
    <div class="d-flex">
      <form form class="d-flex pe-4" action="timkiem" method="get">
        <input class="form-control w-100 me-2" type="search" name="search" x-webkid-speech placeholder="Tìm kiếm sản phẩm" aria-label="Search" />
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <!--  -->
      <?php
        if (isset($_SESSION['user']['role'])) {?>
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT_URL.'giohang' ?>">
            <button class="<?= strpos($url,'giohang') === false?'':'active' ?> btn btn position-relative text-light btn-outline-success">
              Giỏ hàng
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php
                 if (!isset($_SESSION['cart'])) {
                   echo '0';
                 }else echo count($_SESSION['cart']);
                ?>
                <!-- <span class="visually-hidden">unread messages</span> -->
              </span>
            </button>
          </a>
      </li>

          <li class="nav-item dropdown">
            <a class="nav-link ps-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <button class="<?=strpos($url,'chitietdonhang') ===false?'':'active';
              strpos($url,'chitietdonhang') ===false?'':'active';
              ?> btn btn text-light btn-outline-success dropdown-toggle m-0">
                Xin chào
                <?=$_SESSION['user']['name']?>
              </button>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Thông tin khách hàng</a></li>
              <li><a class="dropdown-item " <?=$_SESSION['user']['role']===1?'':'hidden'?> href="<?=ROOT_URL?>admin/san-pham">Trang quản lí</a></li>
              <li><a class="dropdown-item" href="<?=ROOT_URL?>doimatkhau#form_c_pass">Đổi mật khẩu</a></li>
              <li><a class="dropdown-item" href="<?= ROOT_URL.'chitietdonhang#don_hang'?>">Chi tiết đơn hàng</a></li>
              <li><a class="dropdown-item" href="<?=ROOT_URL?>dangxuat">Đăng xuất</a></li>
            </ul>
          </li>
        </ul>
      <?php }else{ ?>
        <a class="nav-link ps-3" href="<?= ROOT_URL.'dangnhap#form_dang_nhap' ?>">
          <button class="<?= strpos($url,'dangnhap') === false?'':'active' ?> btn btn text-light btn-outline-success">
            Đăng nhập
          </button>
        </a>
      <?php }?>
    </div>
  </div>