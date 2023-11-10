<section id="form_checkout" class="mb-2">
  <h2 class="text-center fs-1 fw-bold">Tiến hành đặt hàng</h2>
  <div class="container mb-4 mt-4" >
    <hr>
    <div class="row g-5" >
          <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Giỏ hàng</span>
              <span class="badge bg-primary rounded-pill"><?= count($_SESSION['cart'])?></span>
            </h4>
            <ul class="list-group mb-3">
            <?php
              $tongTien =$index= $tongSoLuong = 0;
              foreach ($_SESSION['cart'] as $id_sp => $soluong) {
                  $sp = $this->model -> detail($id_sp);
                  $tongGia = $sp['gia'] * $soluong;
                  $tongTien += $tongGia; 
                  $tongSoLuong +=$soluong;
            ?>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Sản phẩm thứ <?= ++$index ?></h6>
                  <small class="text-muted"><?=$sp['ten_sp']?></small>
                </div>
                <span class="text-muted"><?=$this->num_format($tongGia)?></span>
              </li>
            <?php } ?>
              <li class="d-none list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                  <h6 class="my-0">Voucher</h6>
                  <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">-$5</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Tổng cộng (VNĐ)</span>
                <strong><?=$this->num_format($tongTien)?></strong>
              </li>
            </ul>
    
            <form class="card p-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Mã giảm giá">
                <button type="submit" class="btn btn-secondary">Kích hoạt</button>
              </div>
            </form>
          </div>
          <div class="col-md-7 col-lg-8" >
            <h2 class="mb-3 fs-4">Thông tin khách hàng</h2>
            <form action="<?= ROOT_URL.'thanhtoan'?>" method="post" class="needs-validation" >
              <div class="row g-3">
                <div class="col-sm">
                  <label for="firstName" class="form-label">Họ tên khách hàng</label>
                  <input type="text" class="form-control" id="firstName" value="<?=$_SESSION['user']['name']?>" name="hoten" placeholder="" required="">
                  <input type="text" class="form-control" hidden value="<?=$_SESSION['user']['id_user']?>" name="id_user" >
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
    
                <!-- <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div> -->
    
                <!-- <div class="col-12">
                  <label for="username" class="form-label">Địa chỉ email</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="username" placeholder="Username" required="">
                  <div class="invalid-feedback">
                      Your username is required.
                    </div>
                  </div>
                </div> -->
  
                
                <div class="col-12">
                  <label for="username" class="form-label">Số điện thoại</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">+84</span>
                    <input type="text" class="form-control" value="<?=$_SESSION['user']['phone']?>" id="username" name="phone" placeholder="Phone numbers" required="">
                  <div class="invalid-feedback">
                      Your username is required.
                    </div>
                  </div>
                </div>
    
                <div class="col-12">
                  <label for="email" class="form-label">Địa chỉ Email <span class="text-muted"></span></label>
                  <input type="email" class="form-control" id="email" value="<?=$_SESSION['user']['email']?>" name="email" placeholder="you@example.com">
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>
    
                <div class="col-12">
                  <label for="address" class="form-label">Địa chỉ nhà <span class="text-muted">(1)</span></label>
                  <input type="text" class="form-control" id="address" value="<?=$_SESSION['user']['diachi']?>" name="diachi" placeholder="1234 Main St" required="">
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>
    
                <div class="col-12">
                  <label for="address2" class="form-label">Địa chỉ 2 <span class="text-muted">(Tùy chọn)</span></label>
                  <input type="text" class="form-control" id="address2" name="diachi2" placeholder="Apartment or suite">
                </div>
    
                <!-- <div class="col-md-5">
                  <label for="country" class="form-label">Country</label>
                  <select class="form-select" id="country" required="">
                    <option value="">Choose...</option>
                    <option>United States</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div> -->
    
                <!-- <div class="col-md-4">
                  <label for="state" class="form-label">State</label>
                  <select class="form-select" id="state" required="">
                    <option value="">Choose...</option>
                    <option>California</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div> -->
    
                <!-- <div class="col-md-3">
                  <label for="zip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required="">
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div> -->
              </div>
    
              <!-- <hr class="my-4"> -->
    
              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="same-address">
                <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>
     -->
              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info">
                <label class="form-check-label" for="save-info">Save this information for next time</label>
              </div> -->
    
              <hr class="my-4">
    
              <h4 class="mb-3">Hình thức thanh toán</h4>
    
              <div class="my-3">
                <div class="form-check">
                  <input id="debit" name="paymentMethod" type="radio" class="form-check-input" checked="true" required="">
                  <label class="form-check-label" for="debit">Thanh toán khi nhận hàng</label>
                </div>

                <div class="form-check">
                  <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                  <label class="form-check-label" for="paypal">Chuyển khoản (Ngân hàng) </label>
                </div>
              </div>
    
              <!-- <div class="row gy-3">
                <div class="col-md-6">
                  <label for="cc-name" class="form-label">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
    
                <div class="col-md-6">
                  <label for="cc-number" class="form-label">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
    
                <div class="col-md-3">
                  <label for="cc-expiration" class="form-label">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>
    
                <div class="col-md-3">
                  <label for="cc-cvv" class="form-label">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div> -->
    
              <hr class="my-4">
              <div class="d-flex">
                <button class="me-3 w-50 btn btn-outline-primary" type="button" onclick="Back()">Quay lại</button>
                <button class="ms-3 w-50 btn btn-outline-success" type="submit">Thanh toán</button>
              </div>
            </form>
          </div>
    </div>
  </div>
</section>
<script>
  function Back(){
    document.addEventListener('click',history.back());
  }
</script>