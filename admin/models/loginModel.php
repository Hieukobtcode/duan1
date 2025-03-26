<?php
class loginModel {
    public $conn;

    function __construct() {
        $this->conn = connDB();
    }

    function checkAcc($Email, $Mat_khau) {
        // Chuẩn bị truy vấn để lấy thông tin người dùng theo email
        $sql = "SELECT * FROM nguoi_dungs WHERE Email = :Email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            $maHoa= $user['Mat_khau']; 
            if ($user['Vai_tro'] == 'admin' && $user['Trang_thai'] == 'Active' && password_verify($Mat_khau, $maHoa)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false; 
        }
    }
}
?>
