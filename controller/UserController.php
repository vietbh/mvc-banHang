<?php
session_start();
session_regenerate_id(true);
require_once 'model/user.php';
class UserController{
    private $model = null;
    public function __construct() {
        $this->model = new User();
    }
    function dangnhap() {
        $layout =1;
        $viewnoidung = './views/TaiKhoan/login.php';
        return include './views/app.php';
    }
    
    function login(){
        $email = trim(strip_tags($_POST['email']));
        $pass = trim(strip_tags($_POST['password']));
        $kq = $this->model->dangnhap($email,$pass);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            error_log('Email chưa đúng định dạng!',__LINE__);
            exit();
        }
        if(is_array($kq)){
            unset($_SESSION['user']['email']);
            $_SESSION['user']['id_user'] = $kq['id_user'];
            $_SESSION['user']['name'] = $kq['hoten'];
            $_SESSION['user']['email'] = $kq['email'];
            $_SESSION['user']['role'] = $kq['vaitro'];
            $_SESSION['user']['pass']=$pass;
            $_SESSION['message']['success'] = 'Đăng nhập thành công';
            return header('location:'.ROOT_URL);
        }else{
            $_SESSION['user']['email'] = $email;
            $_SESSION['messages']['error'] = 'Có thể bạn sai mật khẩu hoặc tài khoản chưa được đăng ký';
            return header('location:'.ROOT_URL.'dangnhap#form_dang_nhap');
        }
    }
    function dangki() {
        // $titlePage = 'Đăng nhập';
        $layout = 1;
        $viewnoidung = './views/TaiKhoan/sign.php';
        return include './views/app.php';
    }
    function sign(){
        $hoten = trim(strip_tags($_POST['hoten']));
        $email = trim(strip_tags($_POST['email']));
        $pass = trim(strip_tags($_POST['password']));
        $passCheck = trim(strip_tags($_POST['password1']));
        $phone = trim(strip_tags($_POST['phone']));
        $diachi = trim(strip_tags($_POST['diachi']));
        $_SESSION['user']['email']=$email; 
        if(isset($_SESSION['user']['email'])){
            if(strlen($hoten) < 5){
                $error ='Bạn nhập tên quá ngắn';
                $_SESSION['errors']['name']=$error;
            }else{
                unset($_SESSION['errors']['name']);
                $_SESSION['user']['name']=$hoten;
            }
            if($phone == 10){
                $error ='Bạn nhập số điện thoại chưa đúng.';
                $_SESSION['errors']['phone']=$error;
            }else{
                unset($_SESSION['errors']['phone']);
                $_SESSION['user']['phone']=$phone;
            }
            if( strlen($diachi) < 5 ){
                $error ='Bạn nhập địa chỉ ngắn thế,hãy nhập chi tiết địa chỉ nhất có thể';
                $_SESSION['errors']['diachi']=$error;
            }else{
                unset($_SESSION['errors']['diachi']);
                $_SESSION['user']['diachi']=$diachi;
            }
            if ($pass !== $passCheck) {
                $error ='Bạn nhập mật khẩu chưa trùng khớp với nhau!!';
                $_SESSION['errors']['pass']=$error;
                
            }else{
                unset($_SESSION['errors']['pass']);
                $pass = password_hash($pass ,PASSWORD_BCRYPT);
            }
          
        }
        if(!isset($_SESSION['errors']['pass']) && !isset($_SESSION['errors']['name']) ){         
            $this->model->dangki($hoten,$pass,$email,$phone,$diachi);
            $_SESSION['user']['pass']=$pass;
            $_SESSION['message']['success']='Đăng kí thành công';
            return header('location:'.ROOT_URL);
        }else{
           
            return header('location:'.ROOT_URL.'dangki#form_dang_dang_ki');
        }

    }

    function dangxuat(){
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            unset($_SESSION['errors']);
            unset($_SESSION['showpass']);
            unset($_SESSION['cPass']);
            $_SESSION['message']['logout']='Đăng xuất thành công';
        }
        return header('location:'.ROOT_URL);
    }
    
    function forgetPass(){
        global $params;
        $layout =1;
        $viewnoidung = './views/TaiKhoan/f_pass.php';
        if(isset($_SESSION['email1'])){
            unset($_SESSION['email']);
            unset($_SESSION['showpass']);
        } 
        if($params['verify'] == $_SESSION['verify']){
            $_SESSION['message']['email'] ='Xác thực thành công';
            $_SESSION['showpass'] = 1;
        }else{
            unset($_SESSION['showpass']);
        }
        return include './views/app.php';
    }
    function fPass(){
        global $params;
        $email= trim(strip_tags($_POST['email']));
        $kq = $this->model->checkEmail($email);
        if(!$kq){
            $_SESSION['email1'] = $email;
            $_SESSION['message']['email'] ='Có vẻ email này không tồn tại';    
            return header('location:'.ROOT_URL.'quen-mat-khau#form_quen_pass');
        }else if(is_array($kq)){
            unset($_SESSION['email1']);
            $_SESSION['email'] = $email;
            if(!isset($_SESSION['showpass']) ){    
                $tieude = 'Mail quên mật khẩu'; 
                $passVerify = substr(md5(rand(0,99999)),0,8);
                $_SESSION['verify'] = $passVerify;
                $noidungthu = 'Xác thực để khôi phục mật khẩu
                    <br>
                    <a href="http://mvc-banhang.test'.ROOT_URL.'quen-mat-khau?verify='.$passVerify.'">Click để xác nhận</a>
                '; 
                include_once './Mail/MailController.php';
                
                $_SESSION['message']['email'] ='Chúng tôi đã gửi gmail để xác thực';
                header('location:'.ROOT_URL.'quen-mat-khau#form_quen_pass');
            }
            
            if(isset($_SESSION['email'])){
                $matkhau= trim(strip_tags($_POST['pass']));
                $matkhau1=trim(strip_tags($_POST['pass1']));
                if($matkhau === $matkhau1 && $matkhau !==''){
                    unset($_SESSION['message']);
                    unset($_SESSION['email']);
                    $mk_mahoa = password_hash($matkhau, PASSWORD_BCRYPT);
                    $check = $this->model->newPass($email,$mk_mahoa);
                    if ($check) {
                        $_SESSION['message']['fPass'] ='Đổi mật khẩu thành công';
                        $_SESSION['user']['email'] = $email;
                        return header('location:'.ROOT_URL.'dang-nhap#form_dang_nhap');
                    }
                }else if($matkhau === '' ){
                    return header('location:'.ROOT_URL.'quen-mat-khau#form_quen_pass');
                }
                else{
                    $_SESSION['message']['error'] = 'Xác nhận mật khẩu chưa trùng khớp nhau';
                    return header('location:'.ROOT_URL.'quen-mat-khau#form_quen_pass');
                }
            }
        }
    }

    function changePass(){
        $layout = 1;
        $viewnoidung = './views/TaiKhoan/c_pass.php';
        return include './views/app.php';
    }

    function cPass(){
        $email = $_SESSION['user']['email'];
        $oldPass = trim(strip_tags($_POST['password']));
        
        $kq = $this->model->checkUserCPass($email,$oldPass);
        if(!$kq){
            $_SESSION['cPass']['message']['error'] = 'Mật khẩu cũ không chính xác';
            exit(header('location:'.ROOT_URL.'doi-mat-khau#form_c_pass'));
        }else{
            unset($_SESSION['cPass']['message']['error']);  
            $_SESSION['cPass']['showpass']=1;
            $newPass = trim(strip_tags($_POST['pass']));
            $cofPass = trim(strip_tags($_POST['pass1']));
            if($newPass === ''){
                exit(header('location:'.ROOT_URL.'doi-mat-khau#form_c_pass'));
            }
            if ($newPass === $oldPass) {
                $_SESSION['cPass']['message']['error_cfm'] = 'Mật khẩu mới phải khác mật khẩu cũ ';
                exit(header('location:'.ROOT_URL.'doi-mat-khau#form_c_pass'));
            }
            if ($newPass !== $cofPass) {
                $_SESSION['cPass']['message']['error_cfm'] = 'Mật khẩu không trùng khớp';  
                exit(header('location:'.ROOT_URL.'doi-mat-khau#form_c_pass'));
            }
            unset($_SESSION['cPass']['message']['error_cfm']);
            
            $pass_hash = password_hash($cofPass,PASSWORD_BCRYPT);
            $changePass = $this->model->newPass($email,$pass_hash);
        }
        
        if ($changePass) {
            $_SESSION['message']['success']='Đổi mật khẩu thành công';
            return header('location:'.ROOT_URL);
        }
    }
    public function contact(){
        $layout =1;
        $viewnoidung = './Mail/contact.php';
        return include './views/app.php';
    }
    public function f_contact(){
        
        $tieude = 'Mail quên mật khẩu'; 
        $email = trim(strip_tags($_POST['email']));
        $passVerify = substr(md5(rand(0,99999)),0,8);
        $_SESSION['verify'] = $passVerify;
        $noidungthu = 'Nội dung thư
            <br>
            <a href="http://mvc-banhang.test'.ROOT_URL.'quen-mat-khau?verify='.$passVerify.'">Click để xác nhận</a>
        '; 
        include './Mail/MailController.php';
        // $layout =1;
        // $viewnoidung = './Mail/contact.php';
        // return include './views/app.php';
    }
}