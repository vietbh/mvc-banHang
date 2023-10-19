<?php include 'views/Alert/message.php';?>
<?php $urlPage = mb_strtolower($_SERVER['REQUEST_URI']);?> 

<h2 class="fs-2 fw-bolder my-3 text-center">TRANG SẢN PHẨM</h2>
<?php $url = mb_strtolower($_SERVER['REQUEST_URI']); ?>
<div class="container-fluid">
    <nav class="navbar bg-body-tertiary">
        <ul class="navbar-nav">
            <li class="nav-item" <?= $url === strtolower(ROOT_URL . 'admin/them-san-pham') ? 'hidden' : '' ?>>
                <a class="nav-link" href="<?= ROOT_URL ?>admin/them-san-pham">
                    <button class="<?= $url === strtolower(ROOT_URL) ? 'active' : '' ?> btn btn btn-primary">
                        <p class="m-0">
                            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="Edit / Add_Plus_Square">
                                    <path id="Vector" d="M8 12H12M12 12H16M12 12V16M12 12V8M4 16.8002V7.2002C4 6.08009 4 5.51962 4.21799 5.0918C4.40973 4.71547 4.71547 4.40973 5.0918 4.21799C5.51962 4 6.08009 4 7.2002 4H16.8002C17.9203 4 18.4801 4 18.9079 4.21799C19.2842 4.40973 19.5905 4.71547 19.7822 5.0918C20.0002 5.51962 20.0002 6.07967 20.0002 7.19978V16.7998C20.0002 17.9199 20.0002 18.48 19.7822 18.9078C19.5905 19.2841 19.2842 19.5905 18.9079 19.7822C18.4805 20 17.9215 20 16.8036 20H7.19691C6.07899 20 5.5192 20 5.0918 19.7822C4.71547 19.5905 4.40973 19.2842 4.21799 18.9079C4 18.4801 4 17.9203 4 16.8002Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                            </svg>
                            Thêm sản phẩm
                        </p>
                    </button>
                </a>
            </li>
        </ul>
    </nav>
    <section class="d-block" style="height: fit-content; ">
    
        <?php if (!isset($content)) { ?>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active fs-4" aria-current="page">Danh sách sản phẩm</li>
                </ol>
            </nav>
         <?php include 'filter.php';?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">STT</th>
                        <th scope="col" colspan="2">Tên sản phẩm</th>
                        <th scope="col" colspan="2">Danh mục</th>
                        <th scope="col" colspan="2">Hình sản phẩm</th>
                        <th scope="col" colspan="2">Giá </th>
                        <th scope="col">Ngày đăng</th>
                        <th scope="col">Số lượt xem</th>
                        <th scope="col">Nổi bật</th>
                        <th scope="col" colspan="1">Ẩn / Hiện</th>
                        <th scope="col" colspan="2">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $index = 1;
                    foreach ($sanPhams as $sanPham) {
                        extract($sanPham);
                        $ten_loai = $this->model->layTenLoai($sanPham['id_loai']);
                    ?>
                        <tr class="text-center">
                            <th scope="row"><?= $index++ ?></th>
                            <td colspan="2"><?= $sanPham['ten_sp'] ?></td>
                            <td colspan="2"><?= mb_strtoupper($ten_loai)?></td>
                            <td colspan="2">
                                <img src="<?= !file_exists('public/images/'.$sanPham['hinh']) ? $sanPham['hinh'] : PUBLIC_URL.'/images/'.$sanPham['hinh'] ?>" width="100px" height="100px" alt="" srcset="">
                            </td>
                            <td colspan="2">
                                <span class="text-decoration-line-through text-sm fw-light bg-text-light-emphasis">
                                    <?= $this->num_format($sanPham['gia']) ?>
                                </span>
                                <br>
                                <p class="fw-bold">
                                    <?= $this->num_format($sanPham['gia_km'])==0?$this->num_format($sanPham['gia']):$this->num_format($sanPham['gia_km']) ?>                            
                                </p>
                            </td>
                            <td><?= $sanPham['ngay'] ?></td>
                            <td>
                                <span>
                                    <?= $sanPham['soluotxem'] ?>
                                    <svg fill="#000000" width="16px" height="16px" viewBox="-3.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                                    </svg>
                                </span>
                            </td>

                            <?php if($sanPham['hot'] === 0){?>  
                                <td class="fw-bold">
                                    <span class="text-decoration-underline">
                                        <?= $sanPham['hot'] === 0 ? 'Bình thường' : 'Nổi bật' ?> 
                                    </span>
                                    |
                                    <a href="<?=ROOT_URL.'admin/chinh-sua-san-pham?id='.$sanPham['id_sp'].'&hot=1'?>" class="text-decoration-none">Nổi bật</a> 
                                </td>
                            <?php }else{?>
                                <td class="fw-bold">
                                    <a href="<?=ROOT_URL.'admin/chinh-sua-san-pham?id='.$sanPham['id_sp'].'&hot=0'?>" class="text-decoration-none">Bình thường</a> |
                                    <span class="text-decoration-underline">
                                        <?= $sanPham['hot'] === 0 ? 'Bình thường' : 'Nổi bật' ?>              
                                    </span>
                                </td>
                                <?php }?>
                                
                            <?php if($sanPham['anhien'] === 0){?>  
                                <td class="fw-bold">
                                    <span class="text-decoration-underline">
                                        <?= $sanPham['anhien'] === 0 ? 'Ẩn' : 'Hiện' ?> 
                                    </span>
                                    |
                                    <a href="<?=ROOT_URL.'admin/chinh-sua-san-pham?id='.$sanPham['id_sp'].'&an-hien=1'?>" class="text-decoration-none">Hiện</a> 
                                </td>
                            <?php }else{?>
                                <td class="fw-bold">
                                    <a href="<?=ROOT_URL.'admin/chinh-sua-san-pham?id='.$sanPham['id_sp'].'&an-hien=0'?>" class="text-decoration-none">Ẩn</a> |
                                    <span class="text-decoration-underline">
                                        <?= $sanPham['anhien'] === 0 ? 'Ẩn' : 'Hiện' ?>
                                    </span>
                                </td>
                            <?php }?>
                                
                            <td>
                                <a href="<?= ROOT_URL . 'admin/chinh-sua-san-pham?id=' . $sanPham['id_sp'] . '&id_loai=' . $sanPham['id_loai'] ?>">
                                    <button type="button" class="btn btn-outline-primary p-1">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#000000" />
                                        </svg>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="<?= ROOT_URL . 'admin/destroy?id=' . $sanPham['id_sp'] ?>">
                                    <button type="button" class="btn btn-outline-danger p-1">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="17" class="bg-light ">
                            <?php include 'paginate.php'?>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } else include $content; ?>
    </section>
</div>