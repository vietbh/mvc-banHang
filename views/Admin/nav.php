<?php $url = mb_strtolower($_SERVER['REQUEST_URI']);?> 
 <div class="container-fluid ">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="<?= ROOT_URL ?>admin/san-pham">
          <button class="<?=$url === strtolower(ROOT_URL.'admin/san-pham')?'active':'' ?> btn btn text-light btn-outline-primary">
              Danh sách sản phẩm
          </button>  
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= ROOT_URL ?>admin/danh-muc">
          <button class="<?=$url === strtolower(ROOT_URL.'admin/danh-muc')?'active':'' ?> btn btn text-light btn-outline-primary">
              Danh mục sản phẩm
          </button>  
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= ROOT_URL ?>">
          <button class="<?=$url === strtolower(ROOT_URL)?'active':'' ?> btn btn text-light btn-outline-primary">
              Danh sách khách hàng
          </button>  
        </a>
      </li>
    
    </ul>
        <?php
        if (isset($_SESSION['user']['role'])) {?>
        <ul class="navbar-nav">
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
              <!-- <li><a class="dropdown-item" href="#">Thông tin khách hàng</a></li> -->
              <!-- <li><a class="dropdown-item" href="<?=ROOT_URL?>doimatkhau#form_c_pass">Đổi mật khẩu</a></li> -->
              <li><a class="dropdown-item" href="<?=ROOT_URL?>">Trở lại trang chính</a></li>
              <li><a class="dropdown-item" href="<?=ROOT_URL?>dangxuat">Đăng xuất</a></li>
            </ul>
          </li>
        </ul>
      <?php } ?>
  </div>