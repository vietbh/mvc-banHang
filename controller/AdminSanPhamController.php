<?php
require_once 'model/sanpham.php';

class AdminSanPhamController extends Auth{
    private $model = null;
    public function __construct() {
        $this->model = new AdminSanPham();
    }
    
    function num_format(?int $gia){
        $tien = number_format($gia,0,'','.').' VNĐ';
        return $tien;
    }

    function tenLoai(?int $id_loai){
        $ten = $this->model->layTenLoai($id_loai);
        return $ten;
    }

    protected function post($value){
        return trim(strip_tags($_POST[$value]));
    }
    public function index(){
        $this->role();
        global $params;
        $pageNum = isset($params['page'])? $params['page']:1;
        $pagePrev = $pageNum-1;
        $pageNext = $pageNum+1;
        $pageSize = 7;
        $demSoSP = $this->model->demSP();
        $tongSoTrang = ceil($demSoSP/$pageSize);
        $danhmucs = $this->model->layListLoai();
        // Loc san pham
        if(isset($params['danhmuc'])){
            $tenLoai =$this->tenLoai($params['danhmuc']);
        }
        $filter = array_keys($params)[0];
        $value = $params[$filter];        
        $sanPhams = $this->model->AllSP($pageNum,$pageSize,$filter,$value); 
        // view
        $layout = 1;
        $viewnoidung = './views/Admin/SanPham/index.php';
        return include './views/Admin/app.php';
    }
    public function show(){
        $this->role();
        // unset($_SESSION['filter']);
        $ten_sp = trim(strip_tags($_POST['ten_sp']));
        $id_loai = trim($_POST['id_loai']);
        $gia_sp = trim($_POST['gia_sp']);
        $gia_min = trim(strip_tags($_POST['gia_min']));
        $gia_max = trim(strip_tags($_POST['gia_max']));
        $anHien_sp = trim($_POST['anhien']);
        $hot_sp = trim($_POST['hot']);
        // 
        $_SESSION['filter']['ten_sp']= trim(strip_tags($_POST['ten_sp']));
        $_SESSION['filter']['id_loai']= trim($_POST['id_loai']);
        $_SESSION['filter']['gia_sp']=trim($_POST['gia_sp']);
        $_SESSION['filter']['gia_min']=trim(strip_tags($_POST['gia_min']));      
        $_SESSION['filter']['gia_max']=trim(strip_tags($_POST['gia_max']));      
        $_SESSION['filter']['anhien']=trim($_POST['anhien']);      
        $_SESSION['filter']['hot']=trim($_POST['hot']);      
        //Validate 
        if(!empty($gia_min) && $gia_min >= $gia_max){
            $_SESSION['message']['error']='Bộ lọc có vấn đề';
            $_SESSION['filter']['error']='Giá cao nhất phải lớn hơn!';
            header('Location:'.ROOT_URL.'admin/san-pham#offcanvas');    
            exit;
        }
        unset($_SESSION['filter']['error']);
        // Phân trang
        $pageNum = isset($_POST['page_n'])?$_POST['page_n'] : 1;

        if (!empty($id_loai)) {
            $ten_loai = $this->model->layTenLoai($id_loai);
        }
        $pagePrev = $pageNum-1;
        $pageNext = $pageNum+1;
        $pageSize = 7;
        $sanPhams = $this->model->filter($ten_sp,$id_loai,$gia_sp,$gia_min,$gia_max,$anHien_sp,$hot_sp,$pageNum,$pageSize);
        $demSoSP = $this->model->dem_filter($ten_sp,$id_loai,$gia_sp,$gia_min,$gia_max,$anHien_sp,$hot_sp);
        $tongSoTrang = ceil($demSoSP/$pageSize);
        $danhmucs = $this->model->layListLoai();
        // 
        if (isset($_SESSION['message']['success'])) {
            unset($_SESSION['message']['success']);
        }
        $_SESSION['message']['success'] = $demSoSP.' Sản phẩm được tìm thấy !';
        $layout = 1;
        $viewnoidung = './views/Admin/SanPham/show.php';
        return include './views/Admin/app.php';     
    }

    public function create(){
        $this->role();
        $layout = 1;
        $content = 'store.php';
        $loais = $this->model->layListLoai();
        $viewnoidung = './views/Admin/SanPham/index.php';
        return include './views/Admin/app.php';
    }
    public function store(){
        $this->role();
        $ten_sp = trim(strip_tags($_POST['ten_sp']));
        $loai_sp = trim(strip_tags($_POST['id_loai']));
        $gia_sp = trim(strip_tags($_POST['gia_sp']));
        $gia_km = trim(strip_tags($_POST['gia_km']));
        $anhien_sp = trim(strip_tags($_POST['anhien']));
        $hinh_sp = $_FILES['hinh'];
        $mota_sp = trim(strip_tags($_POST['mota']));
        $ngay = date('Ymd');
        $path = $hinh_sp['full_path'];
        // Validate
        $_SESSION['sp']['ten_sp'] = $ten_sp; 
        $_SESSION['sp']['gia'] = $gia_sp; 
        $_SESSION['sp']['gia_km'] = $gia_km; 
        $_SESSION['sp']['hinh'] = $hinh_sp; 
        $_SESSION['sp']['mota'] = $mota_sp; 
        $option =['image/jpeg','image/png'];

        // Validate
        if(empty($ten_sp)){
            $_SESSION['error']['ten_sp'] = 'Không được để trống tên sản phẩm'; 
            exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
        }
        unset($_SESSION['error']['ten_sp']);
        if ($gia_sp < $gia_km) {
            $_SESSION['error']['gia'] = 'Giá khuyến mãi phải nhỏ hơn giá gốc'; 
            exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
        }
        unset($_SESSION['error']['gia']);

        $tmp_name = $hinh_sp['tmp_name'];
        if (file_exists($tmp_name)) {
            $ten_file = trim(strip_tags($hinh_sp['name']));
            $type = $hinh_sp['type'];
            $error = $hinh_sp['error'];
            $size = $hinh_sp['size'];
            $ten_file_date = date("Ymd").'_'. str_replace(' ','',$ten_file);
            if ($error != 0) {
                $_SESSION['error']['file'] = 'Hình tải lên bị vấn đề'; 
                exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
            }

            if (!in_array($type,$option)) {
                unset($_SESSION['mess']['success']);
                $mess = 'Chỉ nhận file hình đuôi là .png hoặc .jpeg';
                $_SESSION['error']['file'] = $mess; 
                exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
            }

            if ($size > 3048576) {
                unset($_SESSION['error']);
                $mess = 'Hình không được lớn hơn 3MB';
                $_SESSION['error']['file'] = $mess; 
                exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
            }
            $dir = str_replace('\\controller','\\public\\images\\',__DIR__);
            move_uploaded_file($tmp_name,$dir.$ten_file_date);
        }
        $kq = $this->model->store($loai_sp,$ten_sp,$gia_sp,$gia_km,$ten_file_date,$ngay,$anhien_sp,$mota_sp);
        if (!$kq) {
            $_SESSION['message']['error']='Thêm sản phẩm không thành công';
            exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
        }
        unset($_SESSION['sp']);
        unset($_SESSION['error']);
        $_SESSION['message']['success']='Thêm sản phẩm thành công';
        return header('Location:'.ROOT_URL.'admin/san-pham');
    }

    public function edit(){
        $this->role();
        global $params;
        $id_sp = $params['id'];
        if(isset($params['anhien']) || isset($params['hot'])){
            $anHien = $params['anhien'];
            $hot_sp = $params['hot'];
            // var_dump($hot_sp);
            $kq = $this->model->update_param($id_sp,$anHien,$hot_sp);
            if (!$kq) {
                $_SESSION['message']['error']='Sửa sản phẩm không thành công';
                exit(header('Location:'.ROOT_URL.'admin/san-pham'));
            }
            unset($_SESSION['sp']);
            unset($_SESSION['error']);
            $_SESSION['message']['success']='Sửa sản phẩm thành công';
            return header('Location:'.ROOT_URL.'admin/san-pham');
        }
        $id_loai = $params['id_loai'];
        $sp = $this->model->detail($id_sp);
        $loais = $this->model->layListLoai();
        $layout = 1;
        $content = 'edit.php';
        $viewnoidung = './views/Admin/SanPham/index.php';
        return include './views/Admin/app.php';
    }
   
    public function update(){
        $this->role();    
        $id_sp = trim(strip_tags($_POST['id_sp']));
        $ten_sp = trim(strip_tags($_POST['ten_sp']));
        $loai_sp = trim(strip_tags($_POST['id_loai']));
        $gia_sp = trim(strip_tags($_POST['gia_sp']));
        $gia_km = trim(strip_tags($_POST['gia_km']));
        $anhien_sp = trim(strip_tags($_POST['anhien']));
        $ten_old_file = $_POST['hinh_old_sp'];
        $hinh_sp = $_FILES['hinh'];
        $mota_sp = trim(strip_tags($_POST['mota']));
        $ngay = date('Ymd');
        $path = $hinh_sp['full_path'];
        
        // Validate
        if(empty($ten_sp)){
            $_SESSION['error']['ten_sp'] = 'Không được để trống tên sản phẩm'; 
            exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
        }
        unset($_SESSION['error']['ten_sp']);
        if ($gia_sp < $gia_km) {
            $_SESSION['error']['gia'] = 'Giá khuyến mãi phải nhỏ hơn giá gốc'; 
            exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
        }
        unset($_SESSION['error']['gia']);

        $tmp_name = $hinh_sp['tmp_name'];
        if (!empty($tmp_name) && file_exists('public/images/'.$ten_old_file)) {
            unlink('public/images/'.$ten_old_file);
        }
        if (file_exists($tmp_name)) {
            $ten_file = trim(strip_tags($hinh_sp['name']));
            $type = $hinh_sp['type'];
            $error = $hinh_sp['error'];
            $size = $hinh_sp['size'];
            $ten_file_date = date("Ymd").'_'. str_replace(' ','',$ten_file);
            $options = ['images/jpeg','image/png'];
            if ($error != 0) {
                $_SESSION['error']['file'] = 'Hình tải lên bị vấn đề'; 
                exit(header('Location:'.ROOT_URL.'admin/sua-san-pham#form_sua_san_pham'));
            }
            if (!in_array($type,$options)) {
                unset($_SESSION['mess']['success']);
                $mess = 'Chỉ nhận file hình đuôi là .png hoặc .jpeg';
                $_SESSION['error']['file'] = $mess; 
                exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
            }

            if ($size > 3048576) {
                unset($_SESSION['error']);
                $mess = 'Hình không được lớn hơn 3MB';
                $_SESSION['error']['file'] = $mess; 
                exit(header('Location:'.ROOT_URL.'admin/them-san-pham#form_them_san_pham'));
            }
            $dir = str_replace('\\controller','\\public\\images\\',__DIR__);
            move_uploaded_file($tmp_name,$dir.$ten_file_date);
        }
        
        $kq = $this->model->update($id_sp,$loai_sp,$ten_sp,$gia_sp,$gia_km,$ten_file_date,$ngay,$anhien_sp,$mota_sp);
        if (!$kq) {
            $_SESSION['message']['error']='Sửa sản phẩm không thành công';
            exit(header('Location:'.ROOT_URL.'admin/sua-san-pham#form_sua_san_pham'));
        }
        unset($_SESSION['sp']);
        unset($_SESSION['error']);
        $_SESSION['message']['success']='Sửa sản phẩm thành công';
        return header('Location:'.ROOT_URL.'admin/san-pham');
    }
    public function destroy(){
        $this->role();
        global $params;
        $id_sp = $params['id'];
        $result = $this->model->detail($id_sp);
        $ten_file = $result['hinh'];
        if (file_exists('public/images/'.$ten_file)) {
            unlink('public/images/'.$ten_file);
        }
        $kq = $this->model->delete($id_sp);
        if (!$kq) {
            $_SESSION['message']['error'] = 'Chưa xóa được sản phẩm';
            exit(header('Location:'.ROOT_URL.'admin/san-pham'));
        }
        $_SESSION['message']['success'] = 'Xóa sản phẩm thành công';
        return header('Location:'.ROOT_URL.'admin/san-pham');
    }
}