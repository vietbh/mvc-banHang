<?php
require_once 'database.php';

class User extends Database{
    function dangki($hoten,$password,$email,$phone,$diachi){
        $sql = "INSERT INTO users set 
        hoten =:ht,
        matkhau =:mk, 
        email=:em, 
        dienthoai =:dt, 
        diachi=:dc";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ht",$hoten,PDO::PARAM_STR);
        $stmt->bindParam(":mk",$password,PDO::PARAM_STR);
        $stmt->bindParam(":em",$email,PDO::PARAM_STR);
        $stmt->bindParam(":dt",$phone,PDO::PARAM_INT);
        $stmt->bindParam(":dc",$diachi,PDO::PARAM_STR);
        $stmt->execute();
    }
    function dangnhap($email,$matkhau){
        $sql = "SELECT * from users where email = :em";
        $stmt = $this ->conn->prepare($sql);
        $stmt->bindParam(":em",$email,PDO::PARAM_STR);
        $stmt->execute();
        $recordnum = $stmt->rowCount();
        if ($recordnum !== 1 ) return false;
        $user = $stmt->fetch();
        $mk_mahoa = $user['matkhau'];
        if (!password_verify($matkhau,$mk_mahoa)) {
            return false;
        } else {
            return $user;
        }
    }
    function checkUserCPass($email,$matkhau){
        $sql = "SELECT * from users where email = :em";
        $stmt = $this ->conn->prepare($sql);
        $stmt->bindParam(":em",$email,PDO::PARAM_STR);
        $stmt->execute();
        $recordnum = $stmt->rowCount();
        if ($recordnum !== 1 ) return false;
        $user = $stmt->fetch();
        $mk_mahoa = $user['matkhau'];
        if (!password_verify($matkhau,$mk_mahoa)) {
            return false;
        } else {
            return true;
        }
    }
    function checkEmail($email){
        $sql = "SELECT * from users where email = :em";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":em",$email,PDO::PARAM_STR);
        $stmt->execute();
        $recordnum = $stmt->rowCount();
        if ($recordnum !== 1 ) return  false;
        else{
            $user = $stmt->fetch();
            return $user;
        }
    }

    function newPass($email,$matkhau){
        $sql = "UPDATE users SET matkhau=:mk where email = :em";
        $stmt = $this -> conn->prepare($sql);
        $stmt->bindParam(":em",$email,PDO::PARAM_STR);
        $stmt->bindParam(":mk",$matkhau,PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }
}