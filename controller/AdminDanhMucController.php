<?php
require_once 'model/danhmuc.php';
session_start();


class AdminDanhMucController{
    private $model = null;
    protected function role(){
        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] < 1) {
            include './views/Alert/401.php';
            exit();
        }
    }
    public function __construct() {
        $this->model = new AdminDanhMuc();
    }
  
    public function index(){
        $this->role();
        global $params;
        $pageNum = isset($params['page'])? $params['page']:1;
        $pagePrev = $pageNum-1;
        $pageNext = $pageNum+1;
        $pageSize = 4;
        $demSoDm = $this->model->demDm();
        $tongSoTrang = ceil($demSoDm/$pageSize);
        $layout = 1;
        $loais =  $this->model->AllCategories($pageNum,$pageSize);    
        $viewnoidung = './views/Admin/DanhMuc/index.php';
        return include './views/Admin/app.php';
    }
    public function create(){
        $this->role();
        $layout = 1;
        $content = 'store.php';
        $viewnoidung = './views/Admin/DanhMuc/index.php';
        return include './views/Admin/app.php';
    }
    public function store(){
        // $id_loai = $_POST['id_loai'];
        $ten_cat = trim(strip_tags($_POST['ten_loai']));
        $thutu_cat = trim(strip_tags($_POST['thutu'])) ;
        $anhien_cat = trim(strip_tags($_POST['anhien']));
        $_SESSION['cat']['ten_cat'] = $ten_cat;
        $_SESSION['cat']['thutu'] = $thutu_cat;
        $pattern = '/[^0-9]/';
        $num = true;
        if(preg_match($pattern,$thutu_cat) == 1){
            $num = false;
        }
        if (!$num) {
            $_SESSION['error']['thutu'] = 'Thứ tự nên là số';
            header('Location:'.ROOT_URL.'admin/them-danh-muc#form');
            exit();
        }
        unset($_SESSION['error']['thutu']);
        $kq = $this->model->Category_nm($ten_cat); 
        if(!$kq){
            $_SESSION['error']['ten_loai'] = 'Tên loại này đã tồn tại';
            header('Location:'.ROOT_URL.'admin/them-danh-muc#form');
            exit();
        }
        $result = $this->model->store($ten_cat,$thutu_cat,$anhien_cat);
        if (!$result) {
            $_SESSION['message']['error']='Thêm danh mục không thành công';
            header('Location:'.ROOT_URL.'admin/danh-muc');
            exit();
        }
        unset($_SESSION['error']);
        unset($_SESSION['cat']);
        $_SESSION['message']['success']='Thêm danh mục thành công';
        return header('Location:'.ROOT_URL.'admin/danh-muc');
    }
    public function edit(){
        $this->role();
        global $params;
        $id_loai = $params['id'];
        if(isset($params['anhien'])){
            $anHien = $params['anhien'];
            $kq = $this->model->update_param_dm($id_loai,$anHien);
            if (!$kq) {
                $_SESSION['message']['error']='Sửa danh mục không thành công';
                exit(header('Location:'.ROOT_URL.'admin/danh-muc'));
            }
            $_SESSION['message']['success']='Sửa danh mục thành công';
            return header('Location:'.ROOT_URL.'admin/danh-muc');
        }
        $loai = $this->model->Category($id_loai);
        $_SESSION['cat']['ten_loai'] = $loai['ten_loai'];
        $_SESSION['cat']['thutu'] = $loai['thutu'];
        $_SESSION['cat']['id_loai'] = $loai['id_loai'];
        $layout = 1;
        $content = 'edit.php';
        $viewnoidung = './views/Admin/DanhMuc/index.php';
        return include './views/Admin/app.php';
    }
    public function update(){
        $this->role();
        $id_loai = $_POST['loai_id'];
        $ten_cat = trim(strip_tags($_POST['ten_loai']));
        $thutu_cat = trim(strip_tags($_POST['thutu'])) ;
        $anhien_cat = trim(strip_tags($_POST['anhien']));
        $pattern = '/[^0-9]/';
        $num = true;
        if(preg_match($pattern,$thutu_cat) == 1){
            $num = false;
        }
        if (!$num) {
            $_SESSION['error']['thutu'] = 'Thứ tự nên là số';
            header('Location:'.ROOT_URL.'admin/chinh-sua-danh-muc#form');
            exit();
        }
        unset($_SESSION['error']['thutu']);
        if($ten_cat !== $_SESSION['cat']['ten_loai']){
            $kq = $this->model->Category_nm($ten_cat); 
            if(!$kq){
                $_SESSION['error']['ten_loai'] = 'Tên loại này đã tồn tại';
                header('Location:'.ROOT_URL.'admin/chinh-sua-danh-muc#form');
                exit();
            }
        }
        if($thutu_cat == $_SESSION['cat']['thutu'] || empty($thutu_cat)){
            $thutu_cat = $_SESSION['cat']['thutu'];
        }
        if (empty($id_loai)) {
            $id_loai = $_SESSION['cat']['id_loai'];
        }
        
        $result = $this->model->update($id_loai,$ten_cat,$thutu_cat,$anhien_cat);
        if (!$result) {
            $_SESSION['message']['error']='Thêm danh mục không thành công';
            header('Location:'.ROOT_URL.'admin/danh-muc');
            exit();
        }
        unset($_SESSION['error']);
        unset($_SESSION['cat']);
        $_SESSION['message']['success']='Sửa danh mục thành công';
        return header('Location:'.ROOT_URL.'admin/danh-muc');
    }
    public function destroy(){
        $this->role();
        global $params;
        $id_loai = $params['id'];
        $kq = $this->model->delete($id_loai);
        if (!$kq) {
            $_SESSION['message']['error'] = 'Chưa xóa được danh mục';
            exit(header('Location:'.ROOT_URL.'admin/san-pham'));
        }
        $_SESSION['message']['success'] = 'Xóa danh mục thành công';
        return header('Location:'.ROOT_URL.'admin/danh-muc');
    }
}