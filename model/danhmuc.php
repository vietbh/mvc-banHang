<?php

require_once 'database.php';

class DanhMuc extends Database{
    public function AllCategories($pageNum = 1, $pageSize = 4){
        $startRow = ($pageNum-1) * $pageSize;
        $sql = "SELECT 
                id_loai,ten_loai,thutu,anhien
                from loai
                limit :pageNum,:pageSize";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':pageNum',$startRow,PDO::PARAM_INT);
        $stmt->bindParam(':pageSize',$pageSize,PDO::PARAM_INT);
        $stmt->execute();
        $kq = $stmt->fetchAll();
        return $kq;
    }
    public function demDm(){
        $sql = "SELECT count(id_loai) as dem
                FROM loai";
        $stmt = $this->getOne($sql);
        $result = $stmt['dem'];
        return $result;
    }
    public function Category(?int $id_loai){
        $sql = "SELECT 
                id_loai,ten_loai,thutu,anhien
                from loai
                where id_loai=:id_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(); 
    }
    public function Category_nm($ten_loai){
        $sql = "SELECT 
                    ten_loai
                from loai
                where ten_loai = :ten_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ten_loai',$ten_loai,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->rowCount();
        if ($result == 1) return false;
        else return true;
        
    }
    public function delete(?int $id_loai){
        $sql = "SELECT * FROM sanpham
                where id_loai=:id_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
        $stmt->execute();
        $kq = $stmt ->fetch();
        if (file_exists('public/images/'.$kq['hinh'])) {
            unlink('public/images/'.$kq['hinh']);
        }
        $sql = "DELETE FROM sanpham
                where id_loai=:id_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
        $stmt->execute();
        $sql = "DELETE FROM loai
                where id_loai=:id_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
        $stmt->execute();
        return true; 
    }

}

class AdminDanhMuc extends DanhMuc{
    public function store(?string $ten_loai,?int $thutu,?int $anhien){
        $sql = "INSERT INTO
                    loai
                set 
                    ten_loai =:ten_loai,
                    thutu =:thutu,
                    anhien =:anhien
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ten_loai',$ten_loai,PDO::PARAM_STR);
        $stmt->bindParam(':thutu',$thutu,PDO::PARAM_INT);
        $stmt->bindParam(':anhien',$anhien,PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    public function update(?int $id_loai,?string $ten_loai,?int $thutu,?int $anhien){
        $sql = "UPDATE loai
                set 
                    ten_loai =:ten_loai,
                    thutu =:thutu,
                    anhien =:anhien
                where id_loai =:id_loai
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ten_loai',$ten_loai,PDO::PARAM_STR);
        $stmt->bindParam(':thutu',$thutu,PDO::PARAM_INT);
        $stmt->bindParam(':anhien',$anhien,PDO::PARAM_INT);
        $stmt->bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    public function update_param_dm($id_loai,$anHien){
            $sql = "UPDATE loai
                SET anhien = :anHien
                WHERE id_loai = :id_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
        $stmt->bindParam(':anHien',$anHien,PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
}