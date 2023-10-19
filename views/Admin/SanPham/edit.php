<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb fs-4">
        <li class="breadcrumb-item "><a href="<?= ROOT_URL ?>admin/san-pham">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa sản phẩm</li>
    </ol>
</nav>
<div class="container-fluid mt-4 p-3">
    <div class="card" style="height:40rem;">
        <div class="card-header">
            <div class="card-title">
                <h2 class="fw-bold fs-3"><span class="fw-lighter">Sản phẩm </span><?= mb_strtoupper($sp['ten_sp']) ?></h2>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= ROOT_URL ?>admin/update" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Tên sản phẩm</span>
                            <input type="text" name="ten_sp" value="<?= $sp['ten_sp'] ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                            <input type="text" name="id_sp" hidden value="<?= $sp['id_sp'] ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                    </div>
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Danh mục loại sản phẩm</label>
                            <select class="form-select " name="id_loai" id="inputGroupSelect01">
                                <?php foreach ($loais as $loai) { ?>
                                    <option value="<?= $loai['id_loai'] ?>" <?= $loai['id_loai'] == $params['id_loai'] ? 'selected' : '' ?>>
                                        <?= mb_strtoupper($loai['ten_loai']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">Giá gốc</span>
                            <input type="text" class="form-control" name="gia_sp" value="<?= $sp['gia'] ?>" aria-label="Dollar amount (with dot and two decimal places)">
                            <span class="input-group-text">VNĐ</span>
                        </div>
                    </div>
                    <div class="col-6 form-floating mb-3 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">Khuyến mãi</span>
                            <input type="text" class="form-control" name="gia_km" value="<?= $sp['gia_km'] ?>" aria-label="Dollar amount (with dot and two decimal places)">
                            <span class="input-group-text">VNĐ</span>
                        </div>
                        <!-- <div class="form-text text-danger" id="basic-addon4">Example help text goes outside the input group.</div> -->
                    </div>

                    <div class="col-6 mb-3 mt-4 w-50">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">Link Hình ảnh</span>
                            <input type="text" value="<?= $sp['hinh'] ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" disabled>
                            <input type="text" name="hinh_old_sp" hidden value="<?= $sp['hinh'] ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                        <!-- <div class="form-text text-danger" id="basic-addon4">Example help text goes outside the input group.</div> -->
                    </div>
                    <div class="col-6 mb-3 mt-4 w-50">
                        <div class="col-6 input-group ">
                            <input type="file" name="hinh" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload Hình</label>
                        </div>
                        <!-- <div class="form-text text-danger" id="basic-addon4">Example help text goes outside the input group.</div> -->
                    </div>
                    <div class="col-12 mb-3 mt-3">
                        <div class="form-floating">
                            <div id="toolbar"></div>
                            <div contenteditable="true" >
                                <div class="editor">
                                    <textarea id="content" class="form-control" name="mota" id="floatingTextarea2" style="height: 100px">
                                        <p> <?= empty($sp['mota']) ? 'Sản phẩm chưa có mô tả' : $sp['mota'] ?>.</p>
                                    </textarea>
                                </div>
                            </div>

                            <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/multi-root/ckeditor.js"></script>
                            <script>
                                MultiRootEditor
                                    .create({
                                        // Define roots / editable areas:

                                        content: document.getElementById('content'),

                                    })
                                    .then(editor => {
                                        window.editor = editor;

                                        // Append toolbar to a proper container.
                                        const toolbarContainer = document.getElementById('toolbar');
                                        toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                                        // Make toolbar sticky when the editor is focused.
                                        editor.ui.focusTracker.on('change:isFocused', () => {
                                            if (editor.ui.focusTracker.isFocused) {
                                                toolbarContainer.classList.add('sticky');
                                            } else {
                                                toolbarContainer.classList.remove('sticky');
                                            }
                                        });
                                    })
                                    .catch(error => {
                                        console.error('There was a problem initializing the editor.', error);
                                    });
                            </script>
                            <!-- <label for="floatingTextarea2">Mô tả sản phẩm</label> -->
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
                    </script>
                </div>
            </form>
        </div>
    </div>
</div>