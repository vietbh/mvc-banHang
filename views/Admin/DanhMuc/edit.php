<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb fs-4">
        <li class="breadcrumb-item "><a href="<?= ROOT_URL ?>admin/danh-muc">Toàn bộ danh mục</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa danh mục</li>
    </ol>
</nav>
<div class="container-fluid mt-4 p-3">
    <div class="card" style="height:22rem;">
        <div class="card-header">
            <div class="card-title">
                <h2 class="fw-bold fs-3"><span class="fw-lighter">Danh mục </span><?=mb_strtoupper($sp['ten_sp'])?></h2>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= ROOT_URL ?>admin/danh-muc/update" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>

                <div class="row">
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3  has-validation">
                            <span class="input-group-text">Tên danh mục</span>
                            <input type="text" name="ten_loai" value="<?= $loai['ten_loai'] ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" required>
                            <input type="text" name="loai_id"  value="<?= $loai['id_loai'] ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" hidden>
                            <div class="invalid-feedback">
                                Không được để trống
                            </div>
                        </div>
                        <div class="form-text text-danger" id="basic-addon4" <?=isset($_SESSION['error']['ten_loai'])?'':'hidden'?>>
                            <?= $_SESSION['error']['ten_loai']?>.
                        </div>
                    </div>
                    <div class="col-6 mb-3 mt-3 w-50" >
                        <div class="input-group mb-3  has-validation">
                            <label class="input-group-text" for="inputGroupSelect01">Ẩn hiện danh mục</label>
                            <select class="form-select" name="anhien" id="inputGroupSelect01" required>
                                <option <?=$loai['anhien'] == 1 ?'selected':''?> value="1">Hiện</option>
                                <option <?=$loai['anhien'] != 1 ?'selected':''?> value="0">Ẩn</option>
                            </select>
                        </div>
                        <!-- <div class="form-text text-danger" id="basic-addon4">
                            Example help text goes outside the input group.
                        </div> -->
                    </div>
                    <div class="col-12 form-floating mb-3 mt-3">
                        <div class="input-group mb-3  has-validation">
                            <span class="input-group-text">Thứ tự</span>
                            <input type="text" name="thutu" value="<?= $loai['thutu'] ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" required>
                        </div>
                        <div class="form-text text-danger" id="basic-addon4" <?=isset($_SESSION['error']['thutu'])?'':'hidden'?>>
                            <?= $_SESSION['error']['thutu']?>.
                        </div>
                    </div>
                    <div class="col-12 mb-3 mt-3 d-block">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-primary me-3">Sửa sản phẩm</button>
                            <button type="reset" class="btn btn-outline-warning me-3">Reset</button>
                            <button type="button" onclick="Back()" class="btn btn-outline-danger ">Trở lại</button>
                        </div>
                    </div>
                    <script>
                        var Back = () => {
                            document.addEventListener('click', history.back());
                        }
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (() => {
                            'use strict'

                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            const forms = document.querySelectorAll('.needs-validation')

                            // Loop over them and prevent submission
                            Array.from(forms).forEach(form => {
                                form.addEventListener('submit', event => {
                                    if (!form.checkValidity()) {
                                        event.preventDefault()
                                        event.stopPropagation()
                                    }

                                    form.classList.add('was-validated')
                                }, false)
                            })
                        })();

                    </script>
                </div>
            </form>
        </div>
    </div>
</div>