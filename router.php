<?php

$router = [
    'get' => [
            '' => [new SanphamController, 'index'] , 
            'sp' => [new SanphamController, 'detail'] , 
            'loai'=>[new SanphamController, 'cat'] , 
            'timkiem' =>[new SanphamController, 'searchForm'] , 
            'addtocart' =>[new SanphamController, 'addCart'] , 
            'addorreduce' =>[new SanphamController, 'quatityCart'] , 
            'giohang' =>[new SanphamController, 'showCart'] , 
            'checkout' =>[new SanPhamController, 'checkout'] , 
            'chitietdonhang' =>[new SanPhamController, 'detailCheckout'] , 
            'dangnhap' =>[new UserController, 'dangnhap'] , 
            'dangki' =>[new UserController, 'dangki'] , 
            'dangxuat' =>[new UserController, 'dangxuat'] , 
            'doimatkhau' =>[new UserController, 'changePass'] , 
            'quenmatkhau' =>[new UserController, 'forgetPass'] , 
            'lienhe' =>[new UserController,'contact'] ,
            'admin/sanpham' =>[new AdminSanPhamController, 'index'] , 
            // filter
            'admin/sanpham/locsanpham' =>[new AdminSanPhamController, 'index'] , 
            // chức năng
            'admin/themsanpham' =>[new AdminSanPhamController, 'create'] , 
            'admin/chinhsuasanpham' =>[new AdminSanPhamController, 'edit'] , 
            'admin/xoasanpham' =>[new AdminSanPhamController, 'destroy'] , 
            'admin/danhmuc' =>[new AdminDanhMucController, 'index'] , 
            'admin/themdanhmuc' =>[new AdminDanhMucController, 'create'] , 
            'admin/chinhsuadanhmuc' =>[new AdminDanhMucController, 'edit'] , 
            'admin/xoadanhmuc' =>[new AdminDanhMucController, 'destroy'] , 
            
        ], 
        'post' => [
            'xoasanpham' =>[new SanphamController, 'destroy'] , 
            'timkiem' =>[new SanphamController, 'searchResult'] , 
            'thanhtoan' =>[new SanPhamController, 'bill'] , 
            'chitietdonhang' =>[new SanPhamController, 'donhang'] , 
            'dangnhap' =>[new UserController, 'login'] , 
            'dangki' =>[new UserController, 'sign'] , 
            'doimatkhau' =>[new UserController, 'cPass'] , 
            'quenmatkhau' =>[new UserController, 'fPass'] , 
            'lienhe' =>[new UserController,'f_contact'] ,
            'admin/sanpham/filter' =>[new AdminSanPhamController, 'show'] , 
            
            'admin/store' =>[new AdminSanPhamController, 'store'] , 
            'admin/update' =>[new AdminSanPhamController, 'update'] , 
            'admin/danhmuc/store' =>[new AdminDanhMucController, 'store'] , 
            'admin/danhmuc/update' =>[new AdminDanhMucController, 'update'] , 
            ]
];

$path = substr( strtolower($_SERVER['REQUEST_URI']),strlen($baseDir));
$pos_space = strpos($path,'%20');
$pos_slug = strpos($path,'-');
if($pos_space !== false) $rePath = str_replace('%20','',$path);
elseif($pos_slug !== false) $rePath = str_replace('-','',$path);
else $rePath = $path;

$arr = explode("?", $rePath);

$route = strtolower($arr[0]);
if (count($arr) >= 2) parse_str($arr[1], $params);
else $params = [];

$method = strtolower($_SERVER['REQUEST_METHOD']);
if(!array_key_exists($method, $router)){
    error_log("Method khong phu hop:" .$method);
    return include './views/Alert/404.php';
} 
if(!array_key_exists($route, $router[$method])){
    error_log("Route khong ton tai:" .$route .'va phuong thuc '.$method);
    return include './views/Alert/404.php';
    // die("Route khong ton tai:" .$route .'va phuong thuc '.$method);

} 
$action = $router[$method][$route];