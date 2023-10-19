<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb fs-4">
        <li class="breadcrumb-item "><a href="<?= ROOT_URL ?>admin/danh-muc">Toàn bộ danh mục</a></li>
        <li class="breadcrumb-item active " aria-current="page">Thêm Danh mục</li>
    </ol>
</nav>
<div class="container mt-4 p-3">
    <div class="card" style="height:23rem; max-height: fit-content;">
        <div class="card-header">
            <div class="card-title">
                <h2 class="fw-bold fs-3">Điền thông tin danh mục</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= ROOT_URL ?>admin/danh-muc/store" class="needs-validation" method="post" enctype="multipart/form-data" id="form" novalidate>
                <div class="row">
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3 has-validation">
                            <span class="input-group-text">Tên danh mục <span class="text-danger ">*</span></span>
                            <input type="text" name="ten_loai" value="<?=$_SESSION['cat']['ten_cat']?>" class="form-control" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Không được để trống
                            </div>
                        </div>
                        <div class="form-text text-danger" id="basic-addon4" <?=isset($_SESSION['error']['ten_loai'])?'':'hidden'?>>
                            <?= $_SESSION['error']['ten_loai']?>.
                        </div>
                    </div>
                   
                    <div class="col-6 mb-3 mt-3 w-50" >
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Ẩn hiện danh mục</label>
                            <select class="form-select" name="anhien" id="inputGroupSelect01" required>
                                <option selected value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <!-- <div class="form-text text-danger" id="basic-addon4">
                            Example help text goes outside the input group.
                        </div> -->
                    </div>

                    <div class="col-12 form-floating mb-3 mt-3">
                        <div class="input-group mb-3 has-validation">
                            <span class="input-group-text">Thứ tự<span class="text-danger ">*</span></span>
                            <input type="text" name="thutu" value="<?=$_SESSION['cat']['thutu']?>" class="form-control" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Không được để trống
                            </div>
                        </div>
                        <div class="form-text text-danger" id="basic-addon4" <?=isset($_SESSION['error']['thutu'])?'':'hidden'?>>
                            <?= $_SESSION['error']['thutu']?>.
                        </div>
                    </div>
                  
                    <div class="col-12 mb-3 mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-primary me-3">Thêm danh mục</button>
                        <button type="reset" onclick="Reset()" class="btn btn-outline-warning me-3">Reset</button>
                        <button type="button" onclick="Back()" class="btn btn-outline-danger ">Trở lại</button>
                    </div>
                    <script>
                        var Reset = () => {
                            document.addEventListener('click', ()=>{
                                <?php 
                                unset($_SESSION['cat']);
                                unset($_SESSION['error'])
                                
                                ?>;
                                history.go(0);
                            });
                        }
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