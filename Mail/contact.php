<?php 
function GuiMail(){   
    require "PHPMailer/src/PHPMailer.php"; 
    require "PHPMailer/src/SMTP.php"; 
    require 'PHPMailer/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 2; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'emailCủaBạnỞGmail'; // SMTP username
        $mail->Password = 'MậtKhẩuEmailCuaBan';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('emailCủaBạnỞGmail', 'Tên người gửi' ); 
        $mail->addAddress('emailNguoiNhan', 'TênNgườiNhận'); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Tiêu đề thư';
        $noidungthu = 'Nội dung thư'; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo 'Đã gửi mail xong';
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }
 }//function GuiMail
 ?>
 <form method="post"> 
  <div class="mb-3">
  <label class="form-label">Email</label>
  <input type="email" class="form-control bg-light" name="email" placeholder="Nhập email của bạn">
  </div>
  <div class="mb-3">
  <label class="form-label">Nội dung liên hệ</label>
  <textarea class="form-control bg-light" name="noidunglienhe" rows="5"></textarea>
  </div>  
  <div class="mb-3">
     <button name="btn" type="submit" class="btn btn-primary">GỬI LIÊN HỆ</button>
  </div>
 </form>