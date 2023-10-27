<?php
include 'Alert/message.php';
?>
<section class="col-lg-12 mt-3 bg-light" style="height: fit-content; max-height: fit-content;">
    <div class="container" id="sanpham">
        <nav aria-label="breadcrumb my-4">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item"><a href="<?=ROOT_URL?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laptop <?= $sp['ten_sp'] ?></li>
            </ol>
        </nav>
        <div class="row rounded-3 bg-white">
            <div class="col-4 border-end ">
                <img class="img-fluid" width="100%" height="100%" src="<?= !file_exists('public/images/' . $sp['hinh']) ? $sp['hinh'] : PUBLIC_URL . '/images/' . $sp['hinh'] ?>" alt="">
            </div>
            <div class="col-8">
                <div class="row container">
                    <div class="col-12 mt-3 mb-2">
                        <h2 class="fw-medium fs-2 "><?= $sp['ten_sp'] ?></h2>
                    </div>
                    <div class="col-12 mb-2">
                        <h2 class="fs-6  float-start">
                            <span class="text-warning fw-bold p-0 me-3">
                                0
                                <svg width="13px" height="13px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>start-favorite</title>
                                        <desc>Created with Sketch Beta.</desc>
                                        <defs> </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                            <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-154.000000, -881.000000)" fill="#ffa424">
                                                <path d="M186,893.244 L174.962,891.56 L170,881 L165.038,891.56 L154,893.244 L161.985,901.42 L160.095,913 L170,907.53 L179.905,913 L178.015,901.42 L186,893.244" id="start-favorite" sketch:type="MSShapeGroup"> </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span>
                                <a class="text-decoration-none" href="#">Xem đánh giá</a>
                            </span>
                        </h2>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="card">
                            <div class="card-title px-3 bg-danger py-1 mb-0">
                                <h2 class="fs-4">
                                    <span class="text-warning fw-bolder">
                                        <svg width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <defs>
                                                    <polygon id="thunder-a" points="2.977 8.161 8.269 9.241 .218 18.519 1.882 19.604 12.128 8.161 5.893 6.809 8.821 .998 7.387 .185"></polygon>
                                                    <path id="thunder-c" d="M10.2577032,5.88540233 L13.3683613,6.4682972 C14.894984,6.75436548 15.5271239,8.59550311 14.4981974,9.75899885 L5.15432684,20.3249168 C3.62851509,22.0502834 0.875362777,20.253925 1.83997631,18.1623916 L4.9166534,11.4913543 L2.63023839,11.061225 C1.27422934,10.8061273 0.577759703,9.28698125 1.26946216,8.09308716 L5.3804761,0.997384038 C5.7381351,0.380056504 6.3975623,0 7.11101395,0 L10.1949866,0 C11.7353835,0 12.697534,1.66821829 11.9261411,3.00155082 L10.2577032,5.88540233 Z M10.1949866,2 L7.11101395,2 L3,9.09570312 L7.80692226,10 L3.65612945,19 L13,8.43408203 L7.11101395,7.33056641 L10.1949866,2 Z"></path>
                                                </defs>
                                                <g fill="none" fill-rule="evenodd" transform="translate(4 2)">
                                                    <g transform="translate(2)">
                                                        <mask id="thunder-b" fill="#ffffff">
                                                            <use xlink:href="#thunder-a"></use>
                                                        </mask>
                                                        <use fill="#D8D8D8" xlink:href="#thunder-a"></use>
                                                        <g fill="#ffe53d" mask="url(#thunder-b)">
                                                            <rect width="24" height="24" transform="translate(-6 -2)"></rect>
                                                        </g>
                                                    </g>
                                                    <mask id="thunder-d" fill="#ffffff">
                                                        <use xlink:href="#thunder-c"></use>
                                                    </mask>
                                                    <use fill="#000000" fill-rule="nonzero" xlink:href="#thunder-c"></use>
                                                    <g fill="#ffa200" mask="url(#thunder-d)">
                                                        <rect width="24" height="24" transform="translate(-4 -2)"></rect>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        FLASH SALE
                                    </span>
                                    <span class="pt-1 float-end text-white fs-5">
                                        Kết thúc trong
                                        123
                                    </span>
                                </h2>
                            </div>
                            <div class="card-body bg-warning bg-opacity-50 py-2">
                                <h2 class="fs-2">
                                    <span class="text-danger">
                                        <?= $this->num_format($sp['gia_km']); ?>
                                    </span>
                                    <span class="text-decoration-line-through text-secondary pt-1 fs-5">
                                        <?= $this->num_format($sp['gia_km']); ?>
                                    </span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4 mb-2">
                        <div class="card">
                            <div class="card-title px-3 bg-danger bg-opacity-25 py-1 mb-0">
                                <h2 class="fs-5">
                                    <svg width="24px" height="24px" fill="#ff1414" viewBox="0 0 512 512" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#ff1414">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g id="gift_box-box_-heart-love-valentine">
                                                <path d="M408,160h-64c15.55-0.021,28.483-12.719,28.504-28.269c0.021-15.55-12.568-28.139-28.118-28.118 c0.023-17.486-15.9-31.228-34.048-27.504C297.124,78.82,288,91.085,288,104.575v5.667c-4.256-3.838-9.831-6.242-16-6.242h-32 c-6.169,0-11.744,2.404-16,6.242v-5.667c0-13.491-9.124-25.755-22.339-28.467c-18.148-3.724-34.071,10.018-34.048,27.504 c-15.549-0.021-28.138,12.568-28.118,28.118C139.517,147.281,152.45,159.979,168,160h-64c-17.673,0-32,14.327-32,32v8 c0,17.673,14.327,32,32,32h96v16H96v161.28c0,16.966,13.754,30.72,30.72,30.72H200c8.837,0,16-7.163,16-16V168h80v256 c0,8.837,7.163,16,16,16h73.28c16.966,0,30.72-13.754,30.72-30.72V248H312v-16h96c17.673,0,32-14.327,32-32v-8 C440,174.327,425.673,160,408,160z M232,152v-24c0-4.41,3.586-8,8-8h32c4.414,0,8,3.59,8,8v24H232z"></path>
                                            </g>
                                            <g id="Layer_1"></g>
                                        </g>
                                    </svg>
                                    <span class="text-danger mt-2 fw-bolder">
                                        Quà tặng khuyến mãi
                                    </span>
                                </h2>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group border-0 rounded-0">
                                    <li class="list-group-item align-items-center ">
                                        <span class="badge bg-danger rounded-pill">1</span>
                                        <a href="#" class="text-decoration-none text-secondary">Áo thi đấu GAM gaming</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3 mb-3">
                        <a class="text-decoration-none" href="<?= ROOT_URL . "addtocart?id=" . $sp['id_sp'] . '&soluong=1' ?>">
                            <button class="col-6 btn btn-danger rounded-2">
                                <p class="fw-medium mb-0 fs-5 text-uppercase">Mua ngay</p>
                                <p class="fs-6 mt-0 mb-2">Giao tận nơi hoặc nhận tại cửa hàng</p>
                            </button>
                        </a>
                    </div>
                    <div class="col-12 mt-1 mb-3">
                        <h2 class="fs-3">Thông tin chung:</h2>
                        <ul>
                            <li>
                                <h2 class="fs-5">Nhà sản xuất :
                                    <span class="fw-normal">Asus</span>
                                </h2>
                            </li>
                            <li>
                                <h2 class="fs-5">Bảo hành :
                                    <span class="fw-normal">36 tháng</span>
                                </h2>
                            </li>
                            <li>
                                <h2 class="fs-5">Hỗ trợ đổi mới trong 7 ngày
                                </h2>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container overflow-hidden mt-1">
        <div class="row mt-4 mb-3">
            <div class="col-8 p-0 m-0">
                <div class="container rounded-2 bg-white">
                    <h2>Mô tả về sản phẩm</h2>
                    <div class="desc-content">
                        <p></p>
                        <p class="youtube-embed-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0px;"><iframe width="640" height="360" src="https://www.youtube.com/embed/AMgR0nlP1HU" frameborder="0" style="aspect-ratio: 16 / 9; width: 100%; height: 100%; position: absolute;" class="iframe-youtube-embed"></iframe></p>
                        <h2 class="product-slogan"><strong><span style="font-size:22px">Thông số kĩ thuật:</span></strong></h2>
                        <div class="scroll-table">
                            <table id="tblGeneralAttribute" border="1" cellpadding="3" cellspacing="0" style="background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:1px solid
                                #eeeeee; box-sizing:border-box; color:#333333; font-family:Roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; margin-left:auto; margin-right:auto; max-width:100%; min-width:500px; width:100%" class="table table-bordered">
                                <tbody style="box-sizing: border-box;">
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Hãng sản xuất</span></strong></span></td>
                                        <td style="border-style:solid; border-width:1px; box-sizing:border-box; color:#eeeeee; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">Asus</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Model</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; padding:8px; vertical-align:top; width:559px"><span style="font-size:18px"><span style="color:#000000">ProArt PA248QV&nbsp;</span></span></td>
                                    </tr>
                                    <tr style="box-sizing:border-box" class="row-info">
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Kích thước màn hình</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; padding:8px; vertical-align:top; width:559px"><span style="font-size:18px"><span style="color:#000000">24.1 inch</span></span></td>
                                    </tr>
                                    <tr style="box-sizing:border-box" class="row-info">
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Độ phân giải</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; width:576px"><span style="font-size:18px"><span style="color:#000000">1920x1200</span></span></td>
                                    </tr>
                                    <tr style="box-sizing:border-box" class="row-info">
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; padding:8px; vertical-align:top; width:241px"><span style="font-size:18px"><strong><span style="color:#000000">Tỉ lệ</span></strong></span></td>
                                        <td style="border-style:solid; border-width:1px; box-sizing:border-box; color:#eeeeee; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">16:10</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Tấm nền màn hình</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; box-sizing:border-box; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">IPS</span></span></td>
                                    </tr>
                                    <tr style="box-sizing:border-box" class="row-info">
                                        <td style="background-color:#f7f7f7 !important; border-style:solid; border-width:1px; box-sizing:border-box; color:#eeeeee; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Độ sáng</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; box-sizing:border-box; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">300 cd/㎡</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Màu sắc hiển thị</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; box-sizing:border-box; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">16.7 triệu màu</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Độ tương phản</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; box-sizing:border-box; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">Mặc định:&nbsp;1000:1<br>ASUS Smart Contrast Ratio:&nbsp;100000000:1</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Tần số quét</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; box-sizing:border-box; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">75Hz</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><br><span style="font-size:18px"><strong><span style="color:#000000">Cổng kết nối</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; width:576px">
                                            <ul>
                                                <li><span style="font-size:18px">DisplayPort 1.2 x 1</span></li>
                                                <li><span style="font-size:18px">HDMI(v1.4) x 1</span></li>
                                                <li><span style="font-size:18px">VGA x 1</span></li>
                                                <li><span style="font-size:18px">USB Hub : 4x USB 3.2 Gen 1 Type-A</span></li>
                                                <li><span style="font-size:18px">Đầu cắm Tai nghe :Có</span></li>
                                                <li><span style="font-size:18px">Đầu vào âm thanh PC :Có</span></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Thời gian đáp ứng</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; width:576px"><span style="font-size:18px"><span style="color:#000000">5ms (Gray to Gray)</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; padding:8px; vertical-align:top; width:241px"><span style="font-size:18px"><strong><span style="color:#000000">Góc nhìn</span></strong></span></td>
                                        <td style="border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">178°(H)/178°(V)</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Tính năng âm thanh</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:576px"><span style="font-size:18px"><span style="color:#000000">2W x 2</span></span></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><br><br><br><br><br><br><span style="font-size:18px"><strong><span style="color:#000000">Tính năng video</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:576px">
                                            <ul>
                                                <li><span style="font-size:18px">Công nghệ không để lại dấu trace free :Có</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : Tiêu chuẩn</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : sRGB</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : Rec. 709</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : Cảnh vật</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : Đọc</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : Phòng tối</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : Dựng hình nhanh</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : Chế độ Người dùng 1</span></li>
                                                <li><span style="font-size:18px">ProArt Preset : Chế độ Người dùng 2</span></li>
                                                <li><span style="font-size:18px">Nhiệt độ màu. Lựa chọn :Có(4 chế độ)</span></li>
                                                <li><span style="font-size:18px">Điều chỉnh màu sắc :6 trục điều chỉnh(R,G,B,C,M,Y)</span></li>
                                                <li><span style="font-size:18px">Điều chỉnh thông số gamma :Có (Hỗ trợ Gamma 1.8/2.0/2.2/2.4/2.6 )</span></li>
                                                <li><span style="font-size:18px">Hiển thị màu chính xác :△E&lt; 2</span></li>
                                                <li><span style="font-size:18px">ProArt Palette : Có</span></li>
                                                <li><span style="font-size:18px">QuickFit : Có</span></li>
                                                <li><span style="font-size:18px">HDCP : Có</span></li>
                                                <li><span style="font-size:18px">Công nghệ VRR :Adaptive-Sync</span></li>
                                                <li><span style="font-size:18px">Đồng bộ hóa chuyển động :Có</span></li>
                                                <li><span style="font-size:18px">Tiện ích ProArt :Có</span></li>
                                                <li><span style="font-size:18px">Tần suất Ánh sáng Xanh Thấp :Có</span></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><br><span style="font-size:18px"><strong><span style="color:#000000">Kích thước</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:576px">
                                            <ul>
                                                <li><span style="font-size:18px">Với chân đế (WxHxD) : 533 x (375 - 505) x 211 mm</span></li>
                                                <li><span style="font-size:18px">Không chân đế(WxHxD) : 533 x 360 x 47 mm</span></li>
                                                <li><span style="font-size:18px">Kích thước hộp (WxHxD) : 649 x 474 x 192 mm</span></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><br><span style="font-size:18px"><strong><span style="color:#000000">Điện năng tiêu thụ&nbsp;</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:576px">
                                            <ul>
                                                <li><span style="font-size:18px">Điện năng tiêu thụ :&lt;15W*</span></li>
                                                <li><span style="font-size:18px">Chế độ tiết kiệm điện :&lt;0.5W</span></li>
                                                <li><span style="font-size:18px">Chế độ tắt nguồn :0W (tắt cứng)</span></li>
                                                <li><span style="font-size:18px">Điện áp :100-240V, 50/60Hz</span></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:258px"><span style="font-size:18px"><strong><span style="color:#000000">Khối lượng</span></strong></span></td>
                                        <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:576px">
                                            <ul>
                                                <li><span style="font-size:18px">Trọng lượng tịnh với chân đế :6.1 Kg</span></li>
                                                <li><span style="font-size:18px">Trọng lượng tịnh không có chân đế :3.9 Kg</span></li>
                                                <li><span style="font-size:18px">Trọng lượng thô :8.3 Kg</span></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h2><span style="font-size:22px"><strong>Đánh giá chi tiết&nbsp;màn hình&nbsp;ASUS ProArt PA248QV-P 24" IPS 75Hz 16:10 chuyên đồ họa</strong></span></h2>
                        <p><span style="font-size:18px">Màn hình&nbsp;<strong>ASUS ProArt PA248QV-P</strong> được trang bị với nhiều công nghệ màn hình tân tiến. Hãng đã đầu tư từ thiết kế đến khả năng trình diễn các hình ảnh, video đẹp mắt. Từ đó mang đến một sản phẩm chuyên đồ họa thu hút sự quan tâm của nhiều nhà thiết kế&nbsp;hay các chuyên gia sáng tạo.&nbsp;</span></p>
                        <p>&nbsp;</p>
                        <p></p>
                        <p></p>
                        <h3><span style="font-size:20px"><strong>Thiết kế màn hình&nbsp;ASUS ProArt PA248QV-P</strong></span></h3>
                        <p><span style="font-size:18px"><strong>ASUS ProArt PA248QV-P&nbsp;</strong>là chiếc <a target="_blank" href="https://gearvn.com/pages/man-hinh">màn hình máy tính</a>&nbsp;mới đến từ ASUS với thiết kế hiện đại đáp ứng nhu cầu của các chuyên gia sáng tạo, từ chỉnh sửa ảnh và video cho đến thiết kế đồ họa. Phần&nbsp;khớp xoay tiện lợi với khả năng điều chỉnh chiều cao, trục xoay, độ nghiêng giúp bạn làm việc một cách&nbsp;dễ dàng hơn.</span></p>
                        <p style="text-align: center"><img alt="GEARVN Màn hình ASUS ProArt PA248QV-P 24" src="//file.hstatic.net/1000026716/file/arvn-man-hinh-asus-proart-pa248qv-p-24-ips-75hz-16-10-chuyen-do-hoa-12_601d03823d674f969c25f1fe1e18f618.png"></p>
                        <p style="text-align: center"><strong><span style="font-size:18px">&gt;&gt;Xem thêm: <a target="_blank" href="https://gearvn.com/blogs/thu-thuat-giai-dap/tieu-chi-man-hinh-do-hoa">Tiêu chí màn hình chuyên đồ họa</a>.</span></strong></p>
                        <h3><span style="font-size:20px"><strong>Đa dạng về&nbsp;màu sắc, tái hiện sinh động</strong></span></h3>
                        <p><span style="font-size:18px">Màn hình ProArt cung cấp 100% sRGB tiêu chuẩn công nghiệp và 100% Rec.&nbsp;<a target="_blank" href="https://gearvn.com/collections/bo-doi-man-asus-do-hoa">Màn hình&nbsp;Asus đồ hoạ</a>&nbsp;với&nbsp;Gam màu 709 cho khả năng tái tạo phong phú, đảm bảo mọi chi tiết đều được tái hiện sắc nét, rực rỡ.</span></p>
                        <p style="text-align: center"><img alt="GEARVN Màn hình ASUS ProArt PA248QV-P 24" src="//file.hstatic.net/1000026716/file/arvn-man-hinh-asus-proart-pa248qv-p-24-ips-75hz-16-10-chuyen-do-hoa-14_802371ba460d49d6bd94c90b2a976800.png"></p>
                        <h3><span style="font-size:20px"><strong>Độ trung thực màu cao</strong></span></h3>
                        <p><span style="font-size:18px">Đạt được ∆E &lt; 2 vì vậy hình ảnh của bạn sẽ được tái hiện qua <a target="_blank" href="https://gearvn.com/collections/man-hinh-24-inch">màn hình 24 inch</a>&nbsp;<strong>ASUS ProArt PA248QV-P&nbsp;</strong>được&nbsp;chính xác cùng độ trung thực cao&nbsp;- cho phép bạn xem chính xác các thành quả sáng tạo&nbsp;của bạn sẽ như thế nào khi hoàn thành.</span></p>
                        <p style="text-align: center"><img alt="GEARVN Màn hình ASUS ProArt PA248QV-P 24" src="//file.hstatic.net/1000026716/file/arvn-man-hinh-asus-proart-pa248qv-p-24-ips-75hz-16-10-chuyen-do-hoa-15_6306c3fdfff44a84b3c0e3b99a5f2592.png"></p>
                        <h3><span style="font-size:20px"><strong>Độ chuẩn màu được cam kết</strong></span></h3>
                        <p><span style="font-size:18px">Đạt được&nbsp;chứng nhận Calman&nbsp;đảm bảo độ chính xác màu hàng đầu trên <a target="_blank" href="https://gearvn.com/collections/man-hinh-75hz">màn hình 75Hz</a> ASUS ProArt. Mỗi màn hình ProArt đều trải qua quá trình kiểm tra nghiêm ngặt, tỉ mỉ để đảm bảo sự chuyển màu mượt mà hơn.</span></p>
                        <p style="text-align: center"><img alt="GEARVN Màn hình ASUS ProArt PA248QV-P 24" src="//file.hstatic.net/1000026716/file/arvn-man-hinh-asus-proart-pa248qv-p-24-ips-75hz-16-10-chuyen-do-hoa-16_6af6403f63f84aeda5954887d31999f5.png"></p>
                        <h3><strong><span style="font-size:20px">Tính năng&nbsp;ProArt Preset độc quyền nhà ASUS</span></strong></h3>
                        <p><span style="font-size:18px">ASUS ProArt PA248QV-P<strong>&nbsp;</strong>cho phép bạn tùy chỉnh màn hình của mình thông qua một loạt các thông số, bao gồm màu sắc, nhiệt độ và gamma&nbsp;thông qua các menu trên màn hình trực quan.</span></p>
                        <p style="text-align: center"><img alt="GEARVN Màn hình ASUS ProArt PA248QV-P 24" src="//file.hstatic.net/1000026716/file/arvn-man-hinh-asus-proart-pa248qv-p-24-ips-75hz-16-10-chuyen-do-hoa-17_9b71381862464b2c9e7a63fdacf6dcc9.png"></p>
                        <h3><span style="font-size:20px"><strong>Kết nối phong phú</strong></span></h3>
                        <p><span style="font-size:18px">Màn hình ASUS ProArt trang bị các cổng kết nối đa dạng như DisplayPort 1.2, HDMI (v1.4), cổng D-Sub và bộ chia USB tích hợp dễ dàng kết nối với nhiều loại thiết bị và tận hưởng tốc độ truyền cực nhanh với bộ nhớ ngoài.</span></p>
                        <p style="text-align: center"><img alt="GEARVN Màn hình ASUS ProArt PA248QV-P 24" src="//file.hstatic.net/1000026716/file/arvn-man-hinh-asus-proart-pa248qv-p-24-ips-75hz-16-10-chuyen-do-hoa-18_0322bcf9324348fc8d40a4c3a8f72cb6.png"></p>
                        <h3><strong><span style="font-size:20px">Công nghệ ASUS Ultra-Low Blue Light</span></strong></h3>
                        <p><span style="font-size:18px">Màn hình ASUS ProArt mang đến công nghệ Ultra-Low Blue Light an toàn giúp đôi mắt của bạn làm việc tốt hơn. Hạn chế tối đa tác hại từ ánh sáng xanh trên các thiết bị điện tử đồng thời bảo vệ thị lực cho một ngày làm việc liên tục.&nbsp;</span></p>
                        <p style="text-align: center"><img alt="GEARVN Màn hình ASUS ProArt PA248QV-P 24" src="//file.hstatic.net/1000026716/file/arvn-man-hinh-asus-proart-pa248qv-p-24-ips-75hz-16-10-chuyen-do-hoa-19_212f2056971f4def84004382ec6232d0.png"></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0 m-0">
                <div class="container rounded-2 ms-3 bg-white">
                    <h2>Tin tức về sản phẩm</h2>
                    <ul class="list-group me-3">
                        <li class="list-group-item mb-4 mt-2">
                            <div >
                                <a class="text-decoration-none" href="/blogs/cong-nghe/tong-hop-meme-hai-huoc-cuoi-tuan-dat-rung-phuong-nam-mc-thoi-ken" aria-label="Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …">
                                    <img data-src="//file.hstatic.net/200000722513/article/jhgj_34c3a54df3914668932f0f64b1fdcf9a_grande.jpg" class="img-thumbnail ls-is-cached lazyloaded" alt="Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …" src="//file.hstatic.net/200000722513/article/jhgj_34c3a54df3914668932f0f64b1fdcf9a_grande.jpg">
                                </a>
                            </div>
                            <div >
                                <h3><a class="text-decoration-none text-secondary fs-5 " href="/blogs/cong-nghe/tong-hop-meme-hai-huoc-cuoi-tuan-dat-rung-phuong-nam-mc-thoi-ken">Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …</a></h3>
                            </div>
                        </li>
                        <li class="list-group-item mb-4 mt-2">
                            <div >
                                <a class="text-decoration-none" href="/blogs/cong-nghe/tong-hop-meme-hai-huoc-cuoi-tuan-dat-rung-phuong-nam-mc-thoi-ken" aria-label="Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …">
                                    <img data-src="//file.hstatic.net/200000722513/article/jhgj_34c3a54df3914668932f0f64b1fdcf9a_grande.jpg" class="img-thumbnail ls-is-cached lazyloaded" alt="Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …" src="//file.hstatic.net/200000722513/article/jhgj_34c3a54df3914668932f0f64b1fdcf9a_grande.jpg">
                                </a>
                            </div>
                            <div >
                                <h3><a class="text-decoration-none text-secondary fs-5 " href="/blogs/cong-nghe/tong-hop-meme-hai-huoc-cuoi-tuan-dat-rung-phuong-nam-mc-thoi-ken">Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …</a></h3>
                            </div>
                        </li>
                        <li class="list-group-item mb-4 mt-2">
                            <div >
                                <a class="text-decoration-none" href="/blogs/cong-nghe/tong-hop-meme-hai-huoc-cuoi-tuan-dat-rung-phuong-nam-mc-thoi-ken" aria-label="Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …">
                                    <img data-src="//file.hstatic.net/200000722513/article/jhgj_34c3a54df3914668932f0f64b1fdcf9a_grande.jpg" class="img-thumbnail ls-is-cached lazyloaded" alt="Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …" src="//file.hstatic.net/200000722513/article/jhgj_34c3a54df3914668932f0f64b1fdcf9a_grande.jpg">
                                </a>
                            </div>
                            <div >
                                <h3><a class="text-decoration-none text-secondary fs-5 " href="/blogs/cong-nghe/tong-hop-meme-hai-huoc-cuoi-tuan-dat-rung-phuong-nam-mc-thoi-ken">Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …</a></h3>
                            </div>
                        </li>
                        <li class="list-group-item mb-4 mt-2">
                            <div >
                                <a class="text-decoration-none" href="/blogs/cong-nghe/tong-hop-meme-hai-huoc-cuoi-tuan-dat-rung-phuong-nam-mc-thoi-ken" aria-label="Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …">
                                    <img data-src="//file.hstatic.net/200000722513/article/jhgj_34c3a54df3914668932f0f64b1fdcf9a_grande.jpg" class="img-thumbnail ls-is-cached lazyloaded" alt="Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …" src="//file.hstatic.net/200000722513/article/jhgj_34c3a54df3914668932f0f64b1fdcf9a_grande.jpg">
                                </a>
                            </div>
                            <div >
                                <h3><a class="text-decoration-none text-secondary fs-5 " href="/blogs/cong-nghe/tong-hop-meme-hai-huoc-cuoi-tuan-dat-rung-phuong-nam-mc-thoi-ken">Tổng hợp meme hài hước cuối tuần: Đất rừng phương Nam, MC thổi kèn&nbsp; …</a></h3>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- <div class="col-lg-12 mt-3 " style="height: 50rem; max-height: fit-content;">
    <div class="card mb-3 py-3 mt-3">
        <div class="card-body" style="height: 35rem;">
            <div class="row">
                <div class="col-6">
                    <img class="card-img-top" width="100%" height="100%" src="<?= !file_exists('public/images/' . $sp['hinh']) ? $sp['hinh'] : PUBLIC_URL . '/images/' . $sp['hinh'] ?>" alt="">
                </div>
                <div class="col-6">
                    <h1><?= $sp['ten_sp'] ?></h1>
                    <p class="fw-bolder">Giá gốc : <span class="text-decoration-line-through"><?= $this->num_format($sp['gia']) ?></span></p>
                    <p class="fw-bolder">Giá khuyến mãi : <?= $this->num_format($sp['gia_km']); ?></p>
                    <p>Ngày: <?= date('d/m/Y', strtotime($sp['ngay'])); ?></p>
                    <p>
                        <form action="" method="get">
                            <input class="btn btn-outline-success" type="number" name="soluong" value="1" min="1" max="999">
                        </form>
                    </p>
                    <div class="d-flex">
                        <button class="btn btn-outline-primary me-3" type="button" onclick="Back()">Quay lại</button>
                        <a class="text-decoration-none" href="<?= ROOT_URL . "addtocart?id=" . $sp['id_sp'] . '&soluong=1' ?>">
                            <button class="btn btn-outline-success" type="submit">Thêm vào giỏ</button>
                        </a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div> -->
<script>
    const Back = () => {
        document.addEventListener('click', history.back());
    }
</script>