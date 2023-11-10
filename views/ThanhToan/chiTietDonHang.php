
<!-- Button trigger modal -->


<!-- Modal -->
<section class="mt-2 mb-4 p-3" >
<div class="container" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="text-center">
        <h1 class="modal-title fs-2 mb-2" id="exampleModalLabel">Chi tiết đơn hàng</h1>
        <hr>
      </div>
      <div class="modal-body" >
        <div class="row" style="height: 30em;">
          <div class="col-8 m-0 ">
            <div class="card mb-2">
              <div class="card-header ">
                <div class="card-title">
                  <p class="py-1">    
                    <p class="fw-bold py-0 m-0">Đơn hàng: <span class="text-primary"><?=$id_dh?></span></p>
                    <p class="py-0 m-0"><?=$donHang['thoidiemmua']?></p> 
                 </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="card mb-2" >
                  <div class="card-header">
                    <div class="card-title">
                      <h1 class="fw-normal text-secondary fs-6">KHÁCH HÀNG</h1>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <p class="p-0 m-0 fw-medium"><?=$donHang['hoten']?></p>
                    <p class="p-0 m-0 pb-4 text-muted">0<?=$donHang['dienthoai']?></p>
                  </div>
                </div>
              </div>
              <div class="col-8">
                <div class="card mb-2">
                  <div class="card-header">
                    <div class="card-title">
                    <h1 class="fw-normal text-secondary fs-6">Người nhận</h1>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <p class="p-0 m-0 fw-medium"><?=$donHang['hoten']?></p>
                    <p class="p-0 m-0 text-muted">0<?=$donHang['dienthoai']?></p>
                    <p class="p-0 m-0 text-muted"><?=$donHang['diachi']?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <div class="row fw-bolder">
                      <div class="col-6">Tên sản phẩm</div>
                      <div class="col-2 text-center"">Số lượng</div>
                      <div class="col-4 text-center">Tổng tiền</div>
                    </div>
                  </div>
                  <div class="card-body d-block">
                    <?php
                    $tongTien=$tongSoLuong= 0; 
                      foreach ($listSP as $sp) {
                        extract($sp);
                        $tongTien +=$sp['gia'];
                        $tongSoLuong += $sp['soluong'];
                        
                    ?>
                    <div class="row text-secondary">
                      <div class="col-6"><?=$sp['ten_sp']?></div>
                      <div class="col-2 text-center"><?=$sp['soluong']?></div>
                      <div class="col-4 text-center""><?=$this->num_format($sp['gia'])?></div>
                    </div>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-4">
          <div class="row mb-2">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  Phương thức thanh toán
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                  <p class="p-0 m-0 text-muted">
                    Tiền mặt
                  </p>  
                  <p class="p-0 m-0 text-muted">
                    Chuyển khoản
                  </p>  
                  </div>
                  <div class="col text-end">
                  <p class="p-0 m-0 fw-medium">
                    12.000.000 VND
                  </p>
                  <p class="p-0 m-0 fw-medium">
                    12.000.000 VND
                  </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="card">
              <div class="card-body">
                <div class="row mb-4">
                  <div class="col">
                    <p class="p-0 m-0 text-muted">Tạm tính</p>
                    <p class="p-0 m-0 text-muted">Khuyến mãi</p>
                    <p class="p-0 m-0 text-muted">Phí vận chuyển</p>
                    <p class="p-0 m-0 text-muted">Mã giảm giá <span class="btn btn-outline-danger btn-sm p-1">FKEHGJB1</span></p>
                    <p class="p-0 m-0 text-muted">Số lượng</p>
                    <p class="p-0 m-0 text-muted">Thành tiền</p>
                    
                  </div>
                  <div class="col text-end">
                    <p class="p-0 m-0 fw-medium">12.000.000</p>
                    <p class="p-0 m-0 fw-medium text-danger">-30.000</p>
                    <p class="p-0 m-0 fw-medium text-success">Miễn phí</p>
                    <p class="p-0 m-0 fw-medium text-danger">-12.000</p>
                    <p class="p-0 m-0 fw-medium text-primary"><?=$tongSoLuong?></p>
                    <p class="p-0 m-0 fw-medium"><?=$this->num_format($tongTien)?></p>
                  </div>
                </div>
                <div class="row">
                  <hr>
                  <div class="col">
                    <p class="pb-0 m-0 fw-bold">Cần thanh toán</p>
                  </div>
                  <div class="col">
                    <p class="py-0 m-0 fw-bold fs-4 text-danger"><?=$this->num_format($tongTien)?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <p class="pb-0 m-0 text-muted">(<?=count($listSP)?> sản phẩm)</p>
                  </div>
                  <div class="col">
                    <p class="pb-0 m-0 text-muted">(Đã bao gồm VAT)</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col d-grid g-3">
                  <button type="button" onclick="Back()" class="btn btn-outline-danger px-4" >Đóng</button>
                  <script>
                    function Back(){
                      document.addEventListener('click',history.back());
                    }
                  </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>
</section>