<?php $link_filter = ROOT_URL . 'admin/san-pham/loc-san-pham'; ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span class="p-2 mb-2 border border-3 border-primary border-top-0 border-end-0 border-start-0">
                Lọc nhanh sản phẩm
            </span>
        </a>
    </div>
</nav>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item dropdown me-4">
                    <button class="btn btn-outline-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-spy="scroll" aria-expanded="false">
                        Danh mục hãng
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?= count($danhmucs) ?>
                        </span>
                    </button>
                    <ul class="dropdown-menu overflow-y-scroll" style="height: 11rem;">
                        <li><a class="dropdown-item" href="<?= ROOT_URL . 'admin/san-pham' ?>">All</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php foreach ($danhmucs as $danhmuc) {
                            extract($danhmuc);
                        ?>
                            <li><a class="dropdown-item" href="<?= $link_filter . '?danh-muc=' . $danhmuc['id_loai'] ?>"><?= $danhmuc['ten_loai'] ?></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item dropdown me-4">
                    <button class="btn btn-outline-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Theo giá sản phẩm
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                        </li>
                        <li><a class="dropdown-item" href="<?= $link_filter . '?gia-tang-dan' ?>">
                                <span>
                                    Tăng dần
                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 20L12 4M12 4L18 10M12 4L6 10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= $link_filter . '?gia-giam-dan' ?>">
                                <span>
                                    Giảm dần
                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.25C12.4142 3.25 12.75 3.58579 12.75 4L12.75 18.1893L17.4697 13.4697C17.7626 13.1768 18.2374 13.1768 18.5303 13.4697C18.8232 13.7626 18.8232 14.2374 18.5303 14.5303L12.5303 20.5303C12.3897 20.671 12.1989 20.75 12 20.75C11.8011 20.75 11.6103 20.671 11.4697 20.5303L5.46967 14.5303C5.17678 14.2374 5.17678 13.7626 5.46967 13.4697C5.76256 13.1768 6.23744 13.1768 6.53033 13.4697L11.25 18.1893L11.25 4C11.25 3.58579 11.5858 3.25 12 3.25Z" fill="#1C274C" />
                                    </svg>
                                </span>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-4">
                    <button class="btn btn-outline-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="">
                            Lượt xem
                        </span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                        </li>
                        <li><a class="dropdown-item" href="<?= $link_filter . '?luot-xem-cao' ?>">
                                <span>
                                    Xem nhiều
                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 20L12 4M12 4L18 10M12 4L6 10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= $link_filter . '?luot-xem-thap' ?>">
                                <span>
                                    Xem ít
                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.25C12.4142 3.25 12.75 3.58579 12.75 4L12.75 18.1893L17.4697 13.4697C17.7626 13.1768 18.2374 13.1768 18.5303 13.4697C18.8232 13.7626 18.8232 14.2374 18.5303 14.5303L12.5303 20.5303C12.3897 20.671 12.1989 20.75 12 20.75C11.8011 20.75 11.6103 20.671 11.4697 20.5303L5.46967 14.5303C5.17678 14.2374 5.17678 13.7626 5.46967 13.4697C5.76256 13.1768 6.23744 13.1768 6.53033 13.4697L11.25 18.1893L11.25 4C11.25 3.58579 11.5858 3.25 12 3.25Z" fill="#1C274C" />
                                    </svg>
                                </span>
                            </a></li>
                    </ul>

                </li>
            </ul>
            <button class="btn btn-outline-primary me-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                Bộ lọc nâng cao
            </button>

            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>

<nav aria-label="breadcrumb ">
    <ol class="breadcrumb ms-3">
        <li class="breadcrumb-item active" aria-current="page">
            <span>Lọc theo</span>
        </li>
        <li class="breadcrumb-item active" aria-current="page" <?= !isset($tenLoai) ? 'hidden' : '' ?>>
            Danh mục <?= $tenLoai ?>
        </li>
        <li class="breadcrumb-item active" aria-current="page" <?= !isset($params['giatangdan']) && !isset($params['giagiamdan']) ? 'hidden' : '' ?>>
            <?= !isset($params['giagiamdan']) ? 'Giá tăng dần' : 'Giá giảm dần' ?>

        </li>
        <li class="breadcrumb-item active" aria-current="page" <?= !isset($params['luotxemcao']) && !isset($params['luotxemthap']) ? 'hidden' : '' ?>>
            <?= !isset($params['luotxemcao']) ? 'Lượt xem thấp' : 'Lượt xem cao' ?>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <?= $demSoSP ?> sản phẩm tồn tại
        </li>
    </ol>
</nav>
<hr>

<!--  -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Bộ lọc</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="<?=ROOT_URL?>admin/sanpham/filter" class="row g-2" method="post">
            <div class="col-12 mb-3">
                <input type="text" class="form-control" id="inputAddress" name="ten_sp" value="<?=isset($_SESSION['filter']['ten_sp'])? $_SESSION['filter']['ten_sp']:''?>" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="col-12 mb-3">
                <label for="inputAddress2" class="form-label">Danh mục</label>
                <select class="form-select overflow-y-auto" name="id_loai" aria-label="Default select example"  >
                    <option value=" "<?=isset($_SESSION['filter']['id_loai']) || $_SESSION['filter']['id_loai'] == 0 ? 'selected':''?>>All</option>
                    <?php foreach ($danhmucs as $danhmuc) {?>
                    <option value="<?=$danhmuc['id_loai']?>" <?= $danhmuc['id_loai'] == $_SESSION['filter']['id_loai']  &&   $_SESSION['filter']['id_loai'] !== 0 ? 'selected':''?> ><?=$danhmuc['ten_loai']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-12 mb-3">
                <label for="inputAddress2" class="form-label">Mức giá</label>
                <select class="form-select" name="gia_sp" aria-label="Default select example">
                    <option <?=!isset($_SESSION['filter']['gia_sp'])?'selected':''?> value="" >All</option>
                    <option <?=isset($_SESSION['filter']['gia_sp']) && $_SESSION['filter']['gia_sp'] == 'asc'?'selected':''?> value="asc" >Từ thấp đến cao</option>
                    <option <?=isset($_SESSION['filter']['gia_sp']) && $_SESSION['filter']['gia_sp'] == 'desc'?'selected':''?> value="desc" >Từ cao đến thấp</option>
                </select>
            </div>
       
            <div class="col-6 mb-3">
                <label for="inputAddress" class="form-label">Giá thấp nhất</label>
                <input type="text" class="form-control" min="0" name="gia_min" id="inputAddress" value="<?=isset( $_SESSION['filter']['gia_min'])? $_SESSION['filter']['gia_min']:''?>" placeholder="Nhập giá khoảng ">
            </div>
            <div class="col-6 mb-3">
                <label for="inputAddress" class="form-label">Giá cao nhất</label>
                <input type="text" class="form-control" name="gia_max" id="inputAddress" value="<?=isset( $_SESSION['filter']['gia_max'])? $_SESSION['filter']['gia_max']:''?>" placeholder="Đến giá khoảng">
                <div class="form-text text-danger" id="basic-addon4" <?= isset($_SESSION['filter']['error'])?'':'hidden' ?> >
                   <?=  $_SESSION['filter']['error']?>.
                </div>
            </div>
            <div class="col-12">
                <p class="p-0 m-0" >Ẩn hiện sản phẩm</p>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-start">
                <div class="form-check me-2">
                    <input class="form-check-input" type="radio" name="anhien" id="flexRadioDefault" value="">
                    <label class="form-check-label" for="flexRadioDefault">
                        None
                    </label>
                </div>         
                <div class="form-check me-2">
                    <input class="form-check-input" type="radio" name="anhien" id="flexRadioDefault1" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Hiện
                    </label>
                </div>         
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="anhien" id="flexRadioDefault2" value="0">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Ẩn
                    </label>
                </div>         
            </div>
            <div class="col-12">
                <p class="p-0 m-0" >Sản phẩm hot</p>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-start">
                <div class="form-check me-2">
                    <input class="form-check-input" type="radio" name="hot" id="RadioDefault0" value="">
                    <label class="form-check-label" for="RadioDefault0">
                        None
                    </label>
                </div>         
                <div class="form-check me-2">
                    <input class="form-check-input" type="radio" name="hot" id="RadioDefault1" value="1">
                    <label class="form-check-label" for="RadioDefault1">
                        Nổi bật
                    </label>
                </div>         
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hot" id="RadioDefault2" value="0">
                    <label class="form-check-label" for="RadioDefault2">
                        Bình thường
                    </label>
                </div>         
            </div>
            <div class="col-12">
                <hr>
            </div>
            <div class="col-12 d-flex justify-content-end ">
                <button type="button" onclick="Reset()" class="btn btn-outline-danger float-center me-3">Reset Bộ lọc</button>
                <button type="submit" class="btn btn-outline-primary float-center ">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>
<script>
    const offcanvasElementList = document.querySelectorAll('.offcanvas');
    const offcanvasList = [...offcanvasElementList].map(offcanvasEl => new bootstrap.Offcanvas(offcanvasEl));
    const Reset =()=>{
        document.addEventListener('click', function(){
            <?php unset($_SESSION['filter']) ?>
            window.location.assign("http://localhost/mvc-banHang/admin/san-pham")
            history('location:');
        });
    } 
</script>
<!--  -->