
<div class="container-fluid m-0 p-0 " >
    <section class="p-3 p-md-4 p-xl-5">
      <div class="container-fluid m-0 p-0">
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0">
            <div class="col-12 col-md-6 text-bg-success">
              <div class="d-flex align-items-center justify-content-center h-100">
                <div class="col-10 col-xl-8 py-3">
                  <!-- <img class="img-fluid rounded mb-4" loading="lazy" src="./assets/img/bsb-logo-light.svg" width="245" height="80" alt=""> -->
                  <!-- <hr class="border-primary-subtle mb-4"> -->
                  <h2 class="h1 mb-4 text-wrap" style="width: 11em;">Chào mừng bạn trở lại 
                    <span class="h1 text-warning fst-italic ">V</span>
                    <span class="fw-bold fs-4">Corporation</span>
                </h2>
                  <p class="lead m-0">Nếu bạn là khách hàng mới thì chào mừng và cảm ơn đã tin tưởng chúng tôi.</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6" id="form_c_pass">
              <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="row" >
                  <div class="col-12">
                    <div class="mb-5">
                      <h3>Đổi mật khẩu</h3>
                    </div>
                  </div>
                </div>
                <form action="<?=ROOT_URL?>doi-mat-khau" method="post">
                  <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                      <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" name="email" id="email" value="<?=$_SESSION['user']['email']?>" disabled>
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Mật khẩu cũ <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" name="password" minlength="6" maxlength="25" id="password" value="<?=isset($_SESSION['cPass']['old_pass'])?$_SESSION['user']['pass']:''?>" required>
                      <div class="alert alert-danger  fw-medium p-1 " role="alert" <?=isset($_SESSION['cPass']['message']['error'])?'':'hidden'?>>
                        <p class="text-danger m-0"><?= $_SESSION['cPass']['message']['error']?>!</p>
                      </div>
                    </div>
                    <?php if (isset($_SESSION['cPass']['showpass']) &&  $_SESSION['cPass']['showpass'] == 1) {?>
                        <div class="col-12">
                            <label for="password" class="form-label">Mật khẩu mới<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="pass" minlength="6" maxlength="25" id="password" value="" required>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Xác nhận mật khẩu<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="pass1" minlength="6" maxlength="25" id="password" value="" required>
                        </div>
                        <?php if (isset($_SESSION['cPass']['message']['error_cfm'])) {?>
                                <div class="col-12 mt-3">
                                    <div class="alert alert-danger  fw-medium p-1 " role="alert">
                                        <p class="text-danger m-0"><?=$_SESSION['cPass']['message']['error_cfm']?>!</p>
                                    </div>
                                </div>
                        <?php 
                            } 
                        }
                        ?>
                                 
                    <div class="col-12">
                      <div class="d-grid">
                        <button class="btn bsb-btn-xl btn-success" type="submit">Xác nhận</button>
                      </div>
                    </div>
                  </div>
                </form>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>