<?php
    $key_filter =null;
    $val_filter =null;
    
    $key_filter = array_keys($params);
    $val_filter = $params[$key_filter[0]];
    $key_filter = $key_filter[0] .'=';
 $link = ROOT_URL.'admin/san-pham/loc-san-pham?'.$key_filter.$val_filter.'&page='; 
if (str_contains($_SERVER['REQUEST_URI'], '/loc-san-pham')) {?>
    <nav aria-label="Page navigation example ">
        <ul class="pagination d-flex justify-content-center mt-4">
            <li class="page-item  <?= $pageNum == 1 ? 'disabled' : '' ?>"><a class="page-link" href="<?= $link.'&page=1' ?>">Trang đầu</a></li>
            <?php
            $start = 1;
            if ($pageNum >= 6) {
                $start = $pageNum - 4;
            } else if ($pageNum - 1 <= 0) {
                $start = 1;
            }
            $end = $pageNum + 6;
            if ($end > $tongSoTrang) {
                $end = $tongSoTrang;
            }   
            for ($start; $start <= $end; $start++) { 
            ?>
                <li class="page-item <?= $pageNum == $start ? 'disabled' : '' ?>"><a class="page-link " href="<?= $link.$start ?>"><?= $start ?></a></li>
            <?php }?>
            <li class="page-item <?= $pageNum == $end ? 'disabled' : '' ?>"><a class="page-link" href="<?= $link.$tongSoTrang ?>">Trang cuối</a></li>
        </ul>
    </nav>
<?php } else {?>
<nav aria-label="Page navigation example ">
    <ul class="pagination d-flex justify-content-center mt-4">
        <li class="page-item  <?= $pageNum == 1 ? 'disabled' : '' ?>"><a class="page-link" href="<?= ROOT_URL . 'admin/danh-muc?page='?>1">Trang đầu</a></li>
        <?php
        $start = 1;
        if ($pageNum >= 6) {
            $start = $pageNum - 4;
        } else if ($pageNum - 1 <= 0) {
            $start = 1;
        }
        $end = $pageNum + 6;
        if ($end > $tongSoTrang) {
            $end = $tongSoTrang;
        }
        for ($start; $start <= $end; $start++) { ?>
            <li class="page-item <?= $pageNum == $start ? 'disabled' : '' ?>"><a class="page-link " href="<?= ROOT_URL . 'admin/danh-muc?page=' . $start ?>"><?= $start ?></a></li>
        <?php }
        ?>
        <li class="page-item <?= $pageNum == $end ? 'disabled' : '' ?>"><a class="page-link" href="<?= ROOT_URL . 'admin/danh-muc?page=' . $tongSoTrang ?>">Trang cuối</a></li>
    </ul>
</nav>

<?php }