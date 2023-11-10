<?php
class Auth {
    protected function role()
    {
        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] < 1) {
            include './views/Alert/401.php';
            exit();
        }
    }
    protected function user(){
        if (!isset($_SESSION['user']['role'])){
            $_SESSION['message']['error'] = 'Vui lòng đăng nhập trước !';
            header('location:'.ROOT_URL.'dang-nhap#form_dang_nhap');
            exit();
        }
    }
    
}
