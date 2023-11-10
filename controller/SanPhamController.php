<?php
session_start();

require_once './model/sanpham.php';

class SanPhamController extends Auth{
    private $model = null;
    protected $listLoai = null;
    public $sosp = 8;
    function __construct() {
        $this-> model = new SanPham();
        $this->listLoai = $this->model->layListLoai();
    }

    function num_format(?int $gia){
        $tien = number_format($gia,0,'','.').'<span class="fw-bold text-decoration-underline">đ</span>';
        return $tien;
    }
    
    function index()
    {
        $spnb = $this->model->sanPhamNoiBat($this->sosp);
        $spxn = $this->model->sanPhamXemNhieu($this->sosp);
        $spgd = $this->model->sanPhamGanDay($this->sosp);
        $layout = 0;
        $viewnoidung = "home.php";
        return include 'views/app.php';
    }

    function detail()
    {
        global $params;
        $id = $params['id'];
        $sp = $this->model->detail($id);
        $spxn = $this->model->sanPhamXemNhieu($this->sosp);
        $layout=1;
        $viewnoidung = "detail.php";
        include 'views/app.php';
    }
    function cat()
    {   
        global $params;
        $id_loai = $params['idloai'];
        $pageNum = isset($params['page']) === true ? $params['page'] : 1;
        $pagePrev = $pageNum-1; 
        $pageNext = $pageNum+1;
        $pageSize = 12;
        $countSP = $this->model->demSanPhamTrongLoai($id_loai);
        $tongSoTrang = ceil( $countSP/$pageSize );
        $listSP = $this->model->sanPhamTrongLoai($id_loai,$pageNum,$pageSize);
        $ten_loai = $this->model->layTenLoai($id_loai);
        $titlePage = "Danh mục sản phẩm ". $ten_loai;
        $viewnoidung = 'sameProduct.php';
        include 'views/app.php';
    }
    function searchForm()
    {
        global $params;
        $tenSP = $params['search'] !== ''? $params['search'] :'';
        $pageNum = isset($params['page']) === true ? $params['page'] : 1;
        $pagePrev = $pageNum-1; 
        $pageNext = $pageNum+1;
        $pageSize = 12;
        $countSP = $this->model->demSanPham($tenSP);
        $tongSoTrang = ceil( $countSP/$pageSize );
        $listSP = $this->model->timKiemSanPham($tenSP,$pageNum,$pageSize);
        $viewnoidung = 'sameProduct.php';
        include 'views/app.php';
    }
    function searchResult()
    {
        echo "Ket qua tim kiem ";
    }
    function addCart()
    {
        global $params;
        $id_sp = $params['id'];
        $so_luong = $params['soluong'];
        if (isset($_SESSION['cart'][$id_sp]) === true) {
            $so_luong = $_SESSION['cart'][$id_sp] + $so_luong;

        }
        $_SESSION['cart'][$id_sp] = $so_luong;
        $_SESSION['message']['addsp'] = 'Đã thêm sản phẩm vào giỏ số lượng '.$_SESSION['cart'][$id_sp];
        
        header('location:'. ROOT_URL.'sp?id='.$id_sp.'#sanpham');
    }
    function quatityCart()
    {
        global $params;
        $id_sp = $params['id'];
        $so_luong = $params['soluong'];
        $id_sp_post = $_POST['id'];
        $so_luong_post = $_POST['soluong'];

        if (isset($_SESSION['cart'][$id_sp]) === true) {
            if($so_luong === 'tang'){
                $so_luong = $_SESSION['cart'][$id_sp] + 1;
                $_SESSION['cart'][$id_sp] = $so_luong;
            }
            if($so_luong === 'giam'){
                if ($_SESSION['cart'][$id_sp] > 1) {
                    $so_luong = $_SESSION['cart'][$id_sp] - 1;
                    $_SESSION['cart'][$id_sp] = $so_luong;
                } else {
                    unset($_SESSION['cart'][$id_sp]);
                }
            }
        }
        header('location:'. ROOT_URL . 'giohang');
    }
    function showCart(){
        $layout = 1;
         (isset($_SESSION['cart']) == false || count($_SESSION['cart']) == 0 )?$viewnoidung = 'views/GioHang/showcart_empty.php' : $viewnoidung = 'views/GioHang/show_cart.php';
         $titlePage = " Giỏ hàng của bạn";
         return include 'views/app.php'; 
    }

    function destroy(){
        $id_sp = $_POST['id_sp'];
        $soluong = $_SESSION['cart'][$id_sp];

        if (isset($_SESSION['cart'][$id_sp]) && $soluong <= 1 ){
            unset($_SESSION['cart'][$id_sp]);
        }
        if(isset($_SESSION['cart'][$id_sp]) && $soluong > 1 ){
            $so_luong = $_SESSION['cart'][$id_sp] - 1;
            $_SESSION['cart'][$id_sp] = $so_luong;
        }
        return header('location:'.ROOT_URL.'giohang');
    }
    function checkout(){
        $this->user();
        if(!isset($_SESSION['cart']) ||count($_SESSION['cart']) == 0){
            header('Location:'.ROOT_URL);
            exit();
        }
        $layout = 1;
        $titlePage = 'Tiến hành đặt hàng';
        $viewnoidung = 'views/ThanhToan/checkout.php';
        return include 'views/app.php';
    }

    function bill(){
        $id_user = ($_POST['id_user']);
        $hoten = trim(strip_tags($_POST['hoten']));
        $phone = trim(strip_tags($_POST['phone']));
        $email = trim(strip_tags($_POST['email']));
        $diachi = trim(strip_tags($_POST['diachi']));
        $id_dh = $this->model->xuatDonHang($id_user,$hoten, $phone, $email, $diachi);
        $this->model->luuSPGioHang($id_dh);
        unset($_SESSION['cart']); 
        $thongbao = $id_dh;
        $_SESSION['message']['donhang'] = $thongbao;
        return header('location:'.ROOT_URL.'chitietdonhang');
    }
    function detailCheckout(){
        $this->user();
        $layout = 1;
        $titlePage = 'Đơn hàng';
        $donHangs = $this->model->showDonHangs($_SESSION['user']['id_user']);
        $viewnoidung = 'views/ThanhToan/donHang.php';
        return include 'views/app.php';
    }
    function donHang(){
        $layout = 1;
        $id_dh = $_POST['id_dh'];
        $listSP = $this->model->showChiTietDonHang($id_dh);
        $donHang = $this->model->showDonHang($id_dh);
        $viewnoidung = 'views/ThanhToan/chiTietDonHang.php';
        return include 'views/app.php';
    }
}
