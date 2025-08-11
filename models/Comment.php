<?php
class Comment extends BaseModel {
    public function add($product_id, $user_id, $content) {
        $sql = "INSERT INTO comments (product_id, user_id, content) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$product_id, $user_id, $content]);
    }

    public function getByProduct($product_id) {
        $sql = "SELECT c.*, u.username 
                FROM comments c
                JOIN users u ON c.user_id = u.id
                WHERE c.product_id = ?
                ORDER BY c.created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll();
    }
}
?>
