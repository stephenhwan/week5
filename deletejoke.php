<?php
if (isset($_POST['id'])) {
    try {
        include 'includes/DatabaseConnection.php';
        
        // Xóa file ảnh nếu có
        if (!empty($_POST['image'])) {
            $imagePath = 'uploads/' . $_POST['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        // Xóa joke khỏi database
        $sql = 'DELETE FROM joke WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        
        header('location: jokes.php');
        exit();
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    header('location: jokes.php');
    exit();
}

include 'templates/layout.html.php';
?>