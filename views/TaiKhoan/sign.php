<div class="container-fluid m-0">
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center" id="form_dang_ki">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="mb-4  text-center fw-medium fs-1">Đăng kí</h2>
        <!-- <p class="text-secondary mb-5 text-center">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque et neque id ligula mattis commodo.</p> -->
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-lg-center">
      <div class="col-12 col-lg-9">
        <div class="bg-white border rounded shadow-sm overflow-hidden">

          <form action="<?=ROOT_URL?>dangki" method="post">
            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
              <div class="col-12 col-md-6">
                <label for="fullname" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                  </span>
                  <input type="text" class="form-control" id="fullname" name="hoten" value="<?=$_SESSION['user']['name']?>" required>
                </div>
                <?php if (isset($_SESSION['errors']['name'])) {?>
                  <div class="alert alert-danger p-1 mt-1" role="alert">
                    <?=$_SESSION['errors']['name'];?>
                  </div>
                <?php }?>
              </div>
              <div class="col-12 col-md-6">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                  </span>
                  <input type="email" class="form-control" id="email" name="email" value="<?=$_SESSION['user']['email']?>" required>
                </div>
                
              </div>
              <div class="col-12 col-md-6">
                <label for="email" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 10V14M10.2676 11L13.7317 13M13.7314 11L10.2673 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M6.73241 10V14M4.99999 11L8.46409 13M8.46386 11L4.99976 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M17.2681 10V14M15.5356 11L18.9997 13M18.9995 11L15.5354 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C21.4816 5.82475 21.7706 6.69989 21.8985 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                  </span>
                  <input type="password" class="form-control" id="email" name="password" value="" minlength="6" maxlength="25" required>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <label for="email" class="form-label">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 10V14M10.2676 11L13.7317 13M13.7314 11L10.2673 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M6.73241 10V14M4.99999 11L8.46409 13M8.46386 11L4.99976 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M17.2681 10V14M15.5356 11L18.9997 13M18.9995 11L15.5354 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C21.4816 5.82475 21.7706 6.69989 21.8985 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                  </span>
                  <input type="password" class="form-control" name="password1" id="email" value="" minlength="6" maxlength="25" required>
                </div>
                <?php if (isset($_SESSION['errors']['pass'])) {?>
                  <div class="alert alert-danger p-1 mt-1" role="alert">
                    <?=$_SESSION['errors']['pass'];?>
                  </div>
                <?php }?>
              </div>
              <div class="col-12 col-md-6">
                <label for="phone" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                  </span>
                  <input type="text" minlength="10" maxlength="10" class="form-control" id="phone" name="phone" value="<?=$_SESSION['user']['phone']?>" required>
                </div>
                <?php if (isset($_SESSION['errors']['phone'])) {?>
                  <div class="alert alert-danger p-1 mt-1" role="alert">
                    <?=$_SESSION['errors']['phone'];?>
                  </div>
                <?php }?>
              </div>
              <div class="col-12 col-md-6">
                <label for="diachi" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                  </span>
                  <input type="text" class="form-control" id="diachi" name="diachi" value="<?=$_SESSION['user']['diachi']?>" required>
                </div>
                <?php if (isset($_SESSION['errors']['diachi'])) {?>
                  <div class="alert alert-danger p-1 mt-1" role="alert">
                    <?=$_SESSION['errors']['diachi'];?>
                  </div>
                <?php }?>
              </div>
              <div class="col-12">
                    <hr class="mt-5 mb-4 border-secondary-subtle">
                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                      <a href="<?=ROOT_URL ?>dangnhap#form_dang_nhap" class="link-secondary text-decoration-none">Đã có tài khoản</a>
                      <!-- <a href="#!" class="link-secondary text-decoration-none">Quên mật khẩu</a> -->
                    </div>
              </div>
              
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn btn-success btn-lg" type="submit">Tạo tài khoản</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
</div>