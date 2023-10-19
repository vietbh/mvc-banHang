<?php
foreach ($listSP as $value) {
    extract($value);
    $href_cart = "addtocart?id=".$value['id_sp'].'&soluong=1'; 

?>
   
    <div class="justify-content-center col-4 mb-3">
            <div class="card">
                <div class="card-body ">
                    <a class="text-decoration-none" href="<?= ROOT_URL . "sp?id=" . $value['id_sp'] ?>">
                    <div class="">
                        <img src="<?= !file_exists('public/images/'.$value['hinh']) ? $value['hinh'] : PUBLIC_URL.'/images/'.$value['hinh'] ?>" alt="" width="300px" height="240px">
                    </div>
                    <div class="mb-1 mt-1">
                        <h6 class="font-weight-bold d-inline-block text-truncate" style="max-width: 300px;"><?= $value['ten_sp'] ?></h6>
                    </div>
                    </a>
                    <span>Giá: <?= number_format($value['gia'], 0, '', '.') ?> VNĐ</span>
                </div>
                <div class="mb-3">
                    <a class="d-grid gap-2 col-6 mx-auto text-decoration-none font-weight-bold" href="<?= $href_cart ?>  
                    ">
                    <button type="btn" class="btn btn btn-outline-success">
                        Mua hàng
                    </button>
                    </a>
                </div>
            </div>
        </div>
<?php
}
?>
 
<nav aria-label="..." class="d-flex justify-content-center" >
    <h2 class="<?= count($listSP) === 0 ? ' ' :'d-none' ?>">Không tồn tại sản phẩm <strong class="text-danger"><?=$tenSP?></strong></h2>
    <ul class="pagination pagination-md <?= $pageNum > 0 ? ' ' :'d-none' ?>">
        <?php $pageNum >=2 ? $status = '' : $status='disabled';?>
        <?php empty(!$params['idloai']) ? $id = URL_CATE.$params['idloai'] : $id = 'timkiem?';?>
        <li class="page-item <?=$status?>" >
            <a class="page-link" href="<?=ROOT_URL.$id."&page=1"?>">Trang đầu</a>
        </li>
        
        <?php $pagePrev < 1 ? $statusPrev = 'disabled' : $statusPrev ='' ?>
        <li class="page-item <?=$statusPrev?>"><a class="page-link" href="<?=ROOT_URL.$id."&page=$pagePrev"?>"><</a></li>
        <?php $pageNext < $tongSoTrang ? $statusNext = '' : $statusNext ='disabled' ?>
        <li class="page-item <?=$statusNext?>"><a class="page-link" href="<?=ROOT_URL.$id."&page=$pageNext"?>">></a></li>
        <?php $pageNum < $tongSoTrang ? $statusEnd = '' : $statusEnd ='disabled' ?>
        <li class="page-item <?=$statusEnd?>">
            <a class="page-link" href="<?=ROOT_URL.$id."&page=$tongSoTrang"?>">Trang cuối</a>
        </li>
    </ul>
</nav>
