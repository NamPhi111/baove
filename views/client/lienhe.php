<?php
// Xử lý form khi được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST["phone"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);
    
    $errors = [];
    
    // Kiểm tra dữ liệu
    if (empty($name)) {
        $errors[] = "Vui lòng nhập họ tên.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Vui lòng nhập email hợp lệ.";
    }
    if (empty($phone)) {
        $errors[] = "Vui lòng nhập số điện thoại.";
    }
    if (empty($message)) {
        $errors[] = "Vui lòng nhập nội dung tin nhắn.";
    }
    
    // Nếu không có lỗi, gửi email
    if (empty($errors)) {
        $to = "your-email@example.com"; // Thay bằng email của bạn
        $subject = "Tin nhắn mới từ $name";
        $body = "Họ tên: $name\nEmail: $email\nSố điện thoại: $phone\nNội dung:\n$message";
        $headers = "From: $email\r\nReply-To: $email\r\n";
        
        if (mail($to, $subject, $body, $headers)) {
            $success = "Tin nhắn của bạn đã được gửi thành công!";
        } else {
            $errors[] = "Có lỗi xảy ra khi gửi tin nhắn. Vui lòng thử lại.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .contact-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .contact-info {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container contact-container">
        <h2 class="text-center mb-4">Liên hệ với chúng tôi</h2>
        
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Nội dung <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="5" required><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Gửi tin nhắn</button>
        </form>
        
        <div class="contact-info">
            <h4 class="mt-4">Thông tin liên hệ</h4>
            <p><strong>Địa chỉ:</strong>Giao Châu - Giao Thủy - Nam Định</p>
            <p><strong>Email:</strong>tymphinam@gmail.com</p>
            <p><strong>Số điện thoại:</strong> 0928538410</p>
            <p><strong>Thời gian làm việc:</strong> Giờ hành chính</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>