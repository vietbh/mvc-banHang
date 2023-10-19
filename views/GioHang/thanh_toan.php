<div class="card">
      <div class="card-header">
        <p class="fs-2 fw-semibold">Đơn hàng của bạn</p>
      </div>
      <div class="card-body">
        <div class=" d-flex justify-content-between">
            <p class="m-0 fw-bolder">Sản phẩm</p>
            <p class="m-0 fw-medium">Tạm tính</p>
        </div>  
        <hr class="mt-0">
        <?php
            $tongTien = $tongSoLuong = 0;
            foreach ($_SESSION['cart'] as $id_sp => $soluong) {
                $sp = $this->model -> detail($id_sp);
                $tongGia = $sp['gia'] * $soluong;
                $tongTien += $tongGia; 
                $tongSoLuong +=$soluong;
        ?>    
            <div class="pb-0 d-flex justify-content-between">
                <p class="fw-semibold d-inline-block text-truncate" style="max-width: 150px;">
                <?=$sp['ten_sp']?> 
                </p>
                <span class="fw-medium" ">x<?=$soluong?></span>
                <p class="fw-medium"><?=$this->num_format($tongGia)?></p>
                
            </div>  
        <?php }?>
        <hr>
        <div class="px-0 d-flex justify-content-between">
        <p class="fw-bolder">Tổng số lượng: </p>
            <p class="fw-normal"><?= $tongSoLuong?> </p>
        </div>
        <hr>
        <div class="px-0 d-flex justify-content-between">
            <p class="fw-bolder">Tạm tính:</p>
            <p class="fw-normal"><?=$this->num_format($tongTien)?></p>
        </div>
        <hr>
        <div class="pb-0 d-flex justify-content-between">
            <p class="fw-bolder">Tổng: </p>
            <p class="fw-normal"><?=$this->num_format($tongTien)?></p>
        </div>
        
        <hr>
        <div>
            <p class="fw-bold">Trả tiền mặt khi nhận hàng</p>
            <p class="fst-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, delectus tenetur dolore minima necessitatibus explicabo accusamus odit voluptatum repellendus voluptates, ipsum nam iusto. In error dolorum tenetur ipsum sapiente dolore!</p>
            <a href="<?= ROOT_URL.'checkout'?>">
                <button class="btn btn-outline-warning">Tiến hành thanh toán</button>
            </a>
        </div>
      </div>
</div>