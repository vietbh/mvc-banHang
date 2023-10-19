<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb fs-4">
        <li class="breadcrumb-item "><a href="<?= ROOT_URL ?>admin/san-pham">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item active " aria-current="page">Thêm sản phẩm</li>
    </ol>
</nav>
<div class="container-fluid mt-4 p-3">
    <div class="card" style="height:40rem; max-height: fit-content;">
        <div class="card-header">
            <div class="card-title">
                <h2 class="fw-bold fs-3">Điền thông tin sản phẩm</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= ROOT_URL ?>admin/store" class="needs-validation" method="post" enctype="multipart/form-data" id="form_them_san_pham" novalidate>
                <div class="row">
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3 has-validation">
                            <span class="input-group-text">Tên sản phẩm <span class="text-danger ">*</span></span>
                            <input type="text" name="ten_sp" value="<?=$_SESSION['sp']['ten_sp']?>" class="form-control" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Không được để trống
                            </div>
                        </div>
                    </div>
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3 ">
                            <label class="input-group-text" for="inputGroupSelect01">Danh mục sản phẩm</label>
                            <select class="form-select" name="id_loai"  id="inputGroupSelect01" required>
                                <option selected value="">Chọn danh mục</option>
                                <?php foreach ($loais as $loai) {
                                    extract($loai);
                                ?>
                                    <option value="<?= $loai['id_loai'] ?>"><?= mb_strtoupper($loai['ten_loai']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- <div class="form-text text-danger" id="basic-addon4">
                            Example help text goes outside the input group.
                        </div> -->
                    </div>
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group has-validation mb-3">
                            <span class="input-group-text">Giá gốc</span>
                            <input type="text" class="form-control" name="gia_sp" value="<?=$_SESSION['sp']['gia']?>" required>
                            <span class="input-group-text">VNĐ</span>
                        </div>
                        <!-- <div class="form-text text-danger" id="basic-addon4">
                            Example help text goes outside the input group.
                        </div> -->
                    </div>
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Khuyến mãi</span>
                            <input type="text" class="form-control" name="gia_km" value="<?=$_SESSION['sp']['gia_km']?>" required>
                            <span class="input-group-text">VNĐ</span>
                        </div>
                        <div class="form-text text-danger" id="basic-addon4" <?=isset($_SESSION['error']['gia'])?'':'hidden'?>>
                            <?=$_SESSION['error']['gia']?>
                        </div>

                    </div>

                    <div class="col-6 mb-3 mt-3 w-50" >
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Ẩn hiện sản phẩm</label>
                            <select class="form-select" name="anhien" id="inputGroupSelect01" required>
                                <option selected value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <!-- <div class="form-text text-danger" id="basic-addon4">
                            Example help text goes outside the input group.
                        </div> -->
                    </div>

                    <div class="col-12 input-group mb-3 w-50 py-3">
                        <div class="input-group has-validation">
                            <input type="file" class="form-control" name="hinh" id="inputGroupFile02" required>
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <div class="form-text text-danger" id="basic-addon4" <?=isset($_SESSION['error']['file'])?$_SESSION['error']['file']:'hidden'?> >
                            <?=$_SESSION['error']['file']?> .
                        </div>

                    </div>
                    <div class="col-12 mb-3 mt-3">
                        <div class="form-floating ">
                            <textarea class="form-control" name="mota" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
                                <?=$_SESSION['sp']['gia_km']?>
                            </textarea>
                            <label for="floatingTextarea2">Mô tả sản phẩm</label>
                        </div>
                        
                    </div>
                    <div class="col-12 mb-3 mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-primary me-3">Thêm sản phẩm</button>
                        <button type="reset" class="btn btn-outline-warning me-3">Reset</button>
                        <button type="button" onclick="Back()" class="btn btn-outline-danger ">Trở lại</button>
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