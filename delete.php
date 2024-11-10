<?php
// เชื่อมต่อฐานข้อมูล
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "hospital1";

$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

// ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // เตรียมคำสั่ง SQL
    $sql = "DELETE FROM reservation WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);

        // Execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // ลบข้อมูลสำเร็จ ให้ redirect กลับไปยังหน้าหลัก
            header("location: Profile.php");
            exit();
        } else{
            echo "มีข้อผิดพลาด โปรดลองอีกครั้งในภายหลัง.";
        }
    }
    
    // ปิดการเชื่อมต่อ
    mysqli_close($conn);
} else{
    // หากไม่มี id ที่ถูกส่งมา ให้แสดงข้อความผิดพลาด
    echo "ข้อผิดพลาด: ไม่พบข้อมูลที่ต้องการลบ.";
}

?>