<?php
    class lienHeModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function lien_he(){
            $sql = "select * from lien_hes";
            return $this->conn->query($sql);
        }
        function xoa_lien_he($id){
            $sql = "DELETE FROM lien_hes WHERE id = :id";  // Sử dụng :id thay cho $id trực tiếp
            $stnt = $this->conn->prepare($sql); // Chuẩn bị câu lệnh SQL
            $stnt->bindParam(':id', $id, PDO::PARAM_INT); // Gắn giá trị cho tham số :id
            return $stnt->execute();  // Thực thi câu lệnh SQL
        }
        function tim_lien_he($id) {
            $sql = "SELECT * FROM lien_hes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            // Lấy một dòng kết quả (nếu có)
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
         // Phương thức cập nhật trạng thái
         public function cap_nhat_trang_thai($id, $trang_thai) {
            $sql = "UPDATE lien_hes SET Trang_thai = :trang_thai WHERE Id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        function trang_thai_lien_he(){
            $sql = "select count(*) from lien_hes where Trang_thai='New'";
            return $this->conn->query($sql);
        }

        function danh_sach_lien_he(){
            $sql="select *from lien_hes where trang_thai = 'New'";
            return $this->conn->query($sql);
        }
    
    }
?>