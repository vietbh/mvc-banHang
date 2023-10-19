
<div class="row p-0 m-0" >
  <div class="col-9 p-0" style="height: 50em; max-height:fit-content">
    <table class=" table table-striped align-middle table-bordered" >
      <thead>
        <tr class=" text-center table-success">
          <th scope="col">Stt</th>
          <th scope="col" colspan="2">Tên sản phẩm</th>
          <th scope="col" colspan="2">Hình</th>
          <th scope="col">Giá</th>
          <th scope="col">Số lượng</th>
          <th scope="col" colspan="1">Tổng giá</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
              foreach ($_SESSION['cart'] as $id_sp => $soLuong) {
                $sp = $this -> model -> detail($id_sp);
                $tien = $sp['gia'] * $soLuong;
                
        ?>
        <tr class="text-center fw-bolder">
          <th scope="row"><?= ++$index ?></th>
          <td colspan="2">
            <a class="text-dark " href="<?= ROOT_URL . "sp?id=" . $id_sp ?>">
              <span class="text-decoration-underline d-inline-block text-truncate" style="width: 12em;">
                <?= $sp['ten_sp'] ?>
              </span>  
            </a>  
          </td>
          <td colspan="2">
            <img src="<?= $sp['hinh'] ?>" width="100px" height="100px" alt="" srcset="">
          </td>
          <td><?= $this->num_format($sp['gia'])?></td>
          <td >
            <div class="d-flex justify-content-around">
              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="<?=ROOT_URL.'addorreduce?id='.$sp['id_sp'].'&soluong=tang' ?>"><button type="button" class="btn btn-success">+</button></a>
                <input class="btn btn-outline-light text-success" type="number" name="soluong" value="<?=$soLuong?>">
                <a href="<?=ROOT_URL.'addorreduce?id='.$sp['id_sp'].'&soluong=giam' ?>"><button type="button" class="btn btn-danger">-</button></a>  
              </div>
            </div>
          </td>
          <td><?=$this->num_format($tien)?></td>
          <td>
            <form action="xoasanpham" method="post">
              <input type="hidden" name="id_sp" value="<?=$sp['id_sp']?>">
              <button class="p-2 btn btn-outline-danger" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/></svg>
              </button>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="col-3 p-0 m-0">
    <?php
      include 'thanh_toan.php';
    ?>
  </div>
</div>
