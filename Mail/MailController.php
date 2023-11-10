<?php 
    require "PHPMailer/src/PHPMailer.php"; 
    require "PHPMailer/src/SMTP.php"; 
    require 'PHPMailer/src/Exception.php'; 
function GuiMail( $email,  $tieude, $noidungthu ) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = EMAIL; // SMTP username
        $mail->Password = PASS_EMAIL;   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom(EMAIL,'Cửa hàng Laptop V-Corperation' ); 
        $mail->addAddress($email, $email); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = $tieude;
        
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        return false;
    }
}
?>
 