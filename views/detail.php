<div class="col-lg-12 mt-3 " style="height: 50rem; max-height: fit-content;">
    <div class="card mb-3 py-3 mt-3">
        <div class="card-body" style="height: 35rem;">
            <div class="row">
                <div class="col-6">
                    <img class="card-img-top" width="100%" height="100%" src="<?= !file_exists('public/images/'.$sp['hinh']) ? $sp['hinh'] : PUBLIC_URL.'/images/'.$sp['hinh'] ?>" alt="">
                </div>
                <div class="col-6">
                    <h1><?= $sp['ten_sp'] ?></h1>
                    <p class="fw-bolder">Giá gốc : <span class="text-decoration-line-through"><?= $this->num_format( $sp['gia']) ?></span></p>
                    <p class="fw-bolder">Giá khuyến mãi : <?= $this-> num_format( $sp['gia_km']); ?></p>
                    <p>Ngày: <?= date('d/m/Y', strtotime($sp['ngay'])); ?></p>
                    <p>
                        <form action="" method="get">
                            <input class="btn btn-outline-success" type="number" name="soluong" value="1" min="1" max="999">
                        </form>
                    </p>
                    <div class="d-flex">
                        <button class="btn btn-outline-primary me-3" type="button" onclick="Back()">Quay lại</button>
                        <a class="text-decoration-none" href="<?=ROOT_URL."addtocart?id=".$sp['id_sp'].'&soluong=1'?>">
                            <button class="btn btn-outline-success" type="submit">Thêm vào giỏ</button>
                        </a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
<script>
    // var back = document.querySelectorAll('back');
    function Back(){
        document.addEventListener('click',history.back());   
    }
</script>