<?php $url = mb_strtolower($_SERVER['REQUEST_URI']); 
?> 
 <div class="container-fluid d-flex justify-content-center">
    <ul class="navbar-nav float-center">
      <li class="nav-item ">
        <?php foreach ($this->listLoai as $value) {
          extract($value);
        ?>
          <li>
            <a class="nav-link " href="<?=ROOT_URL."loai?idloai=".$value['id_loai'].'&page=2'; ?>">
              <button class="<?= ROOT_URL."loai?idloai=".$value['id_loai'].'&page=2' == $url?'active':'' ?>  btn btn text-light btn-outline-success">
                <?=$value['ten_loai'] ?> 
              </button>  
            </a>
        </li>
        <?php } ?>
      </li>      
    </ul>
   

  </div>