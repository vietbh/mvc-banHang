<section class="my-4">
  <?php if (isset($_SESSION['message']['donhang'])) { ?>    
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Chúc mừng bạn</strong> đã đặt sản phẩm với mã đơn là <?= $_SESSION['message']['donhang'] ?> thành công.
    <button type="button" onclick="clearSes()" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <script>
      var clearSes = () =>{
        <?php unset($_SESSION['message']['donhang'])?>
      }
    </script>
  </div>
  <?php } ?>
  <div class="container-fluid my-4" id="don_hang" >
      <div class="row">
      <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid" >
          <a class="navbar-brand" href="#">
            <span class="p-2 mb-2 border border-3 border-success border-top-0 border-end-0 border-start-0">
              Tất cả đơn hàng
            </span>  
          </a>
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item dropdown">
                <button class="btn btn-outline-success dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Lọc đơn hàng
                </button>
                <ul class="dropdown-menu">
                  <li>
                    </li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <button class="btn btn-outline-success dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Trạng thái
                </button>
                <ul class="dropdown-menu">
                  <li>
                    </li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Thời điểm mua</th>
        <th scope="col">Khách hàng</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
        <th scope="col">Địa chỉ </th>
        <th scope="col">Trạng thái</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <?php
      $index = 0;
        foreach ($donHangs as $donHang) {
        extract($donHang);
      ?>
        <tr>
          <th scope="row"><?=++$index?></th>
          <td>
            <form action="<?=ROOT_URL?>chitietdonhang" method="post">
              <input type="text" hidden name="id_dh" value="<?=$donHang['id_dh']?>">
              <button type="submit" class="btn border border-primary border-2 border-top-0 border-end-0 border-start-0 py-0 px-4 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                ĐH<?=$donHang['id_dh']?>
              </button>  
            </form>
          </td>
          <td><?=$donHang['thoidiemmua']?></td>
          <td><?=$donHang['hoten']?></td>
          <td><?=$donHang['dienthoai']?></td>
          <td><?=$donHang['email']?></td>
          <td><?=$donHang['diachi']?></td>
          <td><?=$donHang['trang thai'] !== 0? 'Chưa thanh toán':'Đã thanh toán'?></td>
        </tr>
        <?php 
          }
          // if(isset($modal))include $modal;
        ?>
        <?php
          if($index == 0){
        ?> 
            <tr>
              <td colspan="8" class="text-center">
                <p class="my-2 fs-2 fw-medium">
                  Bạn chưa có đơn hàng nào !
                </p>
              </td>
            </tr>
        <?php
          }
        ?>
      
    </tbody>
  </table>
      </div>
  </div>
</section>
