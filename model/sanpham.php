<?php
require_once 'database.php';
class SanPham extends Database{
    function detail(?int $id){
        $sql = "SELECT id_sp,id_loai,ten_sp,gia,gia_km,hinh,ngay,soluotxem,hot,anhien,mota 
                from sanpham
                where id_sp = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    function sanPhamTrongLoai($id_loai=0, $pageNum=1, $pageSize=9){
        $startRow = ($pageNum-1)*$pageSize;
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh
            from sanpham where id_loai = $id_loai order by ngay desc limit $startRow, $pageSize";
            return $this->getAll($sql);
    }
    function layTenLoai($id_loai){
        $sql = "SELECT ten_loai from loai where id_loai = $id_loai";
        $row = $this->getOne($sql);
        return $row['ten_loai'];
    }
    function demSanPhamTrongLoai($id_loai){
        $sql = "SELECT count(id_sp) as dem from sanpham where id_loai = $id_loai";
        $row = $this-> getOne($sql);
        return $row['dem'];
    }
    function layListLoai(){
        $sql = "SELECT id_loai, ten_loai, thutu, anhien
        from loai where anhien=1 order by thutu";
        return $this->getAll($sql);
    }
    function sanPhamXemNhieu($sosp=9){
        $sql = "SELECT id_sp, ten_sp, gia, hinh
        from sanpham order by soluotxem desc limit 0, $sosp";
        return $this->getAll($sql);
    }
    function sanPhamNoiBat($sosp=9){
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh
        from sanpham 
        where hot = 1
        order by ngay desc 
        limit 0,$sosp
        ";
        return $this->getAll($sql);
    }
    function timKiemSanPham($tenSP,$pageNum=1,$pageSize=9){
        if (empty($tenSP)) {
            $startRow = ($pageNum-1)*$pageSize;
            $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh
            FROM sanpham
            limit $startRow, $pageSize";
        } else {
            $startRow = ($pageNum-1)*$pageSize;
            $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh
            FROM sanpham 
            WHERE ten_sp LIKE '%$tenSP%'
            limit $startRow, $pageSize";
        }
        return $this->getAll($sql);
    }
    function demSanPham($tenSP){
        if (empty($tenSP)) {
            $sql = "SELECT count(id_sp) as dem from sanpham";
            $row = $this-> getOne($sql);
        }
        else{
            $sql = "SELECT count(id_sp) as dem from sanpham WHERE ten_sp LIKE '%$tenSP%'";
            $row = $this-> getOne($sql);
        }
        return $row['dem'];
    }
    function xuatDonHang($hoten, $phone, $email, $diachi){
        $sql = "INSERT INTO donhang set 
        hoten =:ht, 
        dienthoai =:dt, 
        email=:em, 
        diachi=:dc";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ht",$hoten,PDO::PARAM_STR);
        $stmt->bindParam(":dt",$phone,PDO::PARAM_INT);
        $stmt->bindParam(":em",$email,PDO::PARAM_STR);
        $stmt->bindParam(":dc",$diachi,PDO::PARAM_STR);
        $stmt->execute();
        $id_dh = $this->conn->lastInsertId();
        return $id_dh;
    }

    function luuSPGioHang($id_dh){
        foreach ($_SESSION['cart'] as $id_sp => $soluong) {
            $sp = $this->detail($id_sp);
            $sql = "INSERT INTO donhangchitiet 
            set id_dh =:id_dh, 
                id_sp=:id_sp,
                ten_sp=:ten_sp,
                soluong=:sl,
                gia=:gia";
            $stmt = $this->conn->prepare($sql);
            $stmt ->bindParam(":id_dh", $id_dh, PDO::PARAM_INT);
            $stmt ->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
            $stmt ->bindParam(":ten_sp", $sp['ten_sp'], PDO::PARAM_STR);
            $stmt ->bindParam(":sl", $soluong, PDO::PARAM_INT);
            $stmt ->bindParam(":gia", $sp['gia'], PDO::PARAM_INT);
            $stmt ->execute();
        }
    }
    function showDonHangs(){
        $sql="SELECT * FROM donhang order by id_dh desc";
        $stmt = $this->getAll($sql);
        return $result = $stmt;
    }
    function showDonHang(?int $id_dh){
        $sql="SELECT * FROM donhang where id_dh = $id_dh";
        $stmt = $this->getOne($sql);
        return $result = $stmt;
    }
    function showChiTietDonHang(?int $id_dh){
        $sql = "SELECT id_sp,ten_sp,soluong,gia FROM donhangchitiet where id_dh = $id_dh";
        $stmt = $this->getAll($sql);
        return $result = $stmt;
    }
}

class AdminSanPham extends SanPham{

    public function AllSP(?int $pageNum=1, ?int $pageSize=6, ?string $filter='',?string $value=''){
        $startRow = ($pageNum-1)*$pageSize;
            $sql = "SELECT id_sp,id_loai,ten_sp,gia,gia_km,hinh,ngay,soluotxem,hot,anhien,mota 
            FROM sanpham ";
        switch($filter){
            case 'danhmuc':
                $sql .="
                    where id_loai = :id_loai
                    limit :startRow, :pageSize
                    ";
                break;    
            case 'giatangdan':
                $sql .="
                    ORDER BY gia_km ASC
                    limit :startRow,:pageSize
                    ";
                break;
            case 'giagiamdan':
                    $sql .="
                        ORDER BY gia_km DESC
                        limit :startRow, :pageSize
                    ";
                break;
            case 'luotxemcao':
                $sql .="
                    ORDER BY soluotxem DESC
                    limit :startRow, :pageSize
                ";
                break;
            case 'luotxemthap':
                    $sql .="
                        ORDER BY soluotxem ASC
                        limit :startRow, :pageSize
                    ";
                break;
            default:
                $sql .=" limit :startRow, :pageSize";
                break;
        }
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(':startRow', $startRow,PDO::PARAM_INT);
        $stmt -> bindParam(':pageSize', $pageSize,PDO::PARAM_INT);
        if($filter == 'danhmuc'){
            $stmt -> bindParam(':id_loai', $value,PDO::PARAM_INT);
        }
        $stmt->execute();
        $kq =  $stmt->fetchAll();
        return $kq; 
    }
    public function dem_filter($ten_sp,$id_loai,$gia_sp,$gia_min,$gia_max,$anHien_sp,$hot_sp){
        $sql = "SELECT count(id_sp) as dem
        FROM sanpham ";
        $where ='';

        if(!empty($ten_sp)){
            $where .= " where ten_sp like :ten";
            if(!empty($id_loai)){
                $where .= " and id_loai=:id_loai ";
            }
            else if(!empty($gia_min) && !empty($gia_max)){
                $where .= " and gia_km between :gia_min and :gia_max";
            }
            else if(!empty($anHien_sp)){
                $where .= " and anhien =:anHien";
            }
            else if(!empty($hot_sp) ){
                $where .= " and hot =:hot";
            }
            else if(!empty($gia_sp)){
                $where .=" order by gia_km $gia_sp";
            }        
        }
        else if(!empty($id_loai)){
            $where .= " where id_loai = :id_loai";
            if(!empty($anHien_sp)){
                $where .=" and anhien = :anHien";
            }else if(!empty($gia_sp) && $gia_sp !== ''){
                $where .=" order by gia_km $gia_sp";
            }
        }
        else if(!empty($gia_sp) && $gia_sp !== '' ){
            $where =" order by gia_km $gia_sp";
        }
        else if(!empty($gia_min)&&!empty($gia_max)){
            $where = " where gia_km between :gia_min and :gia_max";
        }
        if(!empty($anHien_sp)){
             $where .=" where anhien = :anHien";
        }
        else if(!empty($hot_sp)){
            $where .=" where hot = :hot";
        }
        $sql .= $where;

        $stmt = $this->conn->prepare($sql);
        if (!empty($ten_sp)) {
            $ten = '%'.$ten_sp.'%';
            $stmt ->bindParam(':ten',$ten,PDO::PARAM_STR);
        }
        if (!empty($id_loai)) {
            $stmt -> bindParam(':id_loai', $id_loai,PDO::PARAM_INT);
        }
        if (!empty($anHien_sp)) {
            $stmt -> bindParam(':anHien', $anHien_sp,PDO::PARAM_INT);
        }
        if (!empty($hot_sp)) {
            $stmt -> bindParam(':hot', $hot_sp,PDO::PARAM_INT);
        }
        if (!empty($gia_min)) {
            $stmt -> bindParam(':gia_min', $gia_min,PDO::PARAM_INT);
        }
        if (!empty($gia_max)) {
            $stmt -> bindParam(':gia_max', $gia_max,PDO::PARAM_INT);
        }
        $stmt->execute();
        $kq = $stmt->fetchAll();
        return $kq[0]['dem']; 
    }
    public function filter($ten_sp,$id_loai,$gia_sp,$gia_min,$gia_max,$anHien_sp,$hot_sp, $pageNum ,$pageSize){
        $startRow = ($pageNum-1) * $pageSize;
        $sql = "SELECT id_sp,id_loai,ten_sp,gia,gia_km,hinh,ngay,soluotxem,hot,anhien,mota 
        FROM sanpham ";
        $where ='';

        if(!empty($ten_sp)){
            $where .= " where ten_sp like :ten";
            if(!empty($id_loai)){
                $where .= " and id_loai=:id_loai ";
            }
            else if(!empty($gia_min) && !empty($gia_max)){
                $where .= " and gia_km between :gia_min and :gia_max";
            }
            else if(!empty($anHien_sp)){
                $where .= " and anhien =:anHien";
            }
            else if(!empty($hot_sp) ){
                $where .= " and hot =:hot";
            }
            else if(!empty($gia_sp)){
                $where .=" order by gia_km $gia_sp ";
            }        
        }
        else if(!empty($id_loai)){
            $where .= " where id_loai = :id_loai ";
            if(!empty($anHien_sp)){
                $where .=" and anhien = :anHien ";
            }else if(!empty($gia_sp) && $gia_sp !== ''){
                $where .=" order by gia_km $gia_sp ";
            }
        }
        else if(!empty($gia_sp) ){
            $where .=" order by gia_km $gia_sp ";
        }
        else if(!empty($gia_min)&&!empty($gia_max)){
            $where = " where gia_km between :gia_min and :gia_max";
        }
        if(!empty($anHien_sp)){
             $where .=" where anhien = :anHien ";
        }
        else if(!empty($hot_sp)){
            $where .=" where hot = :hot ";
        }
        $sql .= $where;
        $sql .=" limit :startRow,:pageSize";
        
        $stmt = $this->conn->prepare($sql);
        if (!empty($ten_sp)) {
            $ten = '%'.$ten_sp.'%';
            $stmt ->bindParam(':ten',$ten,PDO::PARAM_STR);
        }
        if (!empty($id_loai)) {
            $stmt -> bindParam(':id_loai', $id_loai,PDO::PARAM_INT);
        }
        if (!empty($anHien_sp)) {
            $stmt -> bindParam(':anHien', $anHien_sp,PDO::PARAM_INT);
        }
        if (!empty($hot_sp)) {
            $stmt -> bindParam(':hot', $hot_sp,PDO::PARAM_INT);
        }
        if (!empty($gia_min)) {
            $stmt -> bindParam(':gia_min', $gia_min,PDO::PARAM_INT);
        }
        if (!empty($gia_max)) {
            $stmt -> bindParam(':gia_max', $gia_max,PDO::PARAM_INT);
        }
        $stmt -> bindParam(':startRow', $startRow,PDO::PARAM_INT);
        $stmt -> bindParam(':pageSize', $pageSize,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function demSP(){
        $sql = "SELECT count(id_sp) as dem 
                from sanpham";
        $row = $this->getOne($sql);
        return $row['dem'];
    }
    public function store(?int $id_loai,?string $ten_sp,?int $gia,?int $gia_km,?string $ten_file_date,?int $ngay,?int $anhien_sp,?string $mota_sp){
        $sql = "INSERT INTO sanpham 
                set id_loai = :id_loai,
                    ten_sp = :ten_sp,
                    gia = :gia,
                    gia_km = :gia_km,
                    hinh = :hinh,
                    ngay = :ngay,
                    anhien = :anhien,
                    mota = :mota
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
        $stmt -> bindParam(':ten_sp',$ten_sp,PDO::PARAM_STR);
        $stmt -> bindParam(':gia',$gia,PDO::PARAM_INT);
        $stmt -> bindParam(':gia_km',$gia_km,PDO::PARAM_INT);
        $stmt -> bindParam(':hinh',$ten_file_date,PDO::PARAM_STR);
        $stmt -> bindParam(':ngay',$ngay,PDO::PARAM_INT);
        $stmt -> bindParam(':anhien',$anhien_sp,PDO::PARAM_INT);
        $stmt -> bindParam(':mota',$mota_sp,PDO::PARAM_STR);
        $stmt -> execute();
        return true;
    }
    public function update($id_sp,$id_loai,$ten_sp,$gia,$gia_km,$ten_file_date,$ngay,$anhien_sp,$mota_sp){
        if (!empty($ten_file_date)) {   
            $sql = "UPDATE sanpham 
            set id_loai = :id_loai,
                ten_sp = :ten_sp,
                gia = :gia,
                gia_km = :gia_km,
                hinh = :hinh,
                ngay = :ngay,
                anhien = :anhien,
                mota = :mota
            where id_sp = :id_sp
            ";
        } else {  
            $sql = "UPDATE sanpham 
            set id_loai = :id_loai,
                ten_sp = :ten_sp,
                gia = :gia,
                gia_km = :gia_km,
                ngay = :ngay,
                anhien = :anhien,
                mota = :mota
            where id_sp = :id_sp
            ";
        }
      
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(':id_sp',$id_sp,PDO::PARAM_INT);
        $stmt -> bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
        $stmt -> bindParam(':ten_sp',$ten_sp,PDO::PARAM_STR);
        $stmt -> bindParam(':gia',$gia,PDO::PARAM_INT);
        $stmt -> bindParam(':gia_km',$gia_km,PDO::PARAM_INT);
        if (!empty($ten_file_date)){
            $stmt -> bindParam(':hinh',$ten_file_date,PDO::PARAM_STR);
        }
        $stmt -> bindParam(':ngay',$ngay,PDO::PARAM_INT);
        $stmt -> bindParam(':anhien',$anhien_sp,PDO::PARAM_INT);
        $stmt -> bindParam(':mota',$mota_sp,PDO::PARAM_STR);
        $stmt -> execute();
        return true;
    }
    public function update_param($id_sp,$anHien,$hot){
        if (!is_null($anHien)) {
            $sql = "UPDATE sanpham
                SET anhien = :anHien
                WHERE id_sp = :id_sp";
        }
        if (!is_null($hot)) {
            $sql = "UPDATE sanpham
                SET hot = :hot
                WHERE id_sp = :id_sp";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_sp',$id_sp,PDO::PARAM_INT);
        if (!is_null($anHien)) {
            $stmt->bindParam(':anHien',$anHien,PDO::PARAM_INT);
        }
        if (!is_null($hot)) {
            $stmt->bindParam(':hot',$hot,PDO::PARAM_INT);
        }
        $stmt->execute();
        return true;
    }
    public function delete(?int $id_sp){
        $sql = "DELETE FROM sanpham
                WHERE id_sp = :id_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_sp',$id_sp,PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
}