<?php
$uploadDir = __DIR__ . '/uploads/';

// 如果資料夾不存在就建立
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$message = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['files']['name'][0])) {
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'txt'];
        $maxSize = 5 * 1024 * 1024; // 5MB

        foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
            $fileName = $_FILES['files']['name'][$key];
            $fileSize = $_FILES['files']['size'][$key];
            $fileError = $_FILES['files']['error'][$key];

            if ($fileError !== UPLOAD_ERR_OK) {
                $message[] = "檔案 {$fileName} 上傳失敗，錯誤碼: {$fileError}";
                continue;
            }

            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedTypes, true)) {
                $message[] = "檔案 {$fileName} 格式不允許";
                continue;
            }

            if ($fileSize > $maxSize) {
                $message[] = "檔案 {$fileName} 超過大小限制";
                continue;
            }

            // 避免檔名重複
            $newFileName = uniqid('file_', true) . '.' . $ext;
            $targetFile = $uploadDir . $newFileName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $message[] = "檔案 {$fileName} 上傳成功";
            } else {
                $message[] = "檔案 {$fileName} 儲存失敗";
            }
        }
    } else {
        $message[] = '請先選擇檔案';
    }
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>多檔上傳</title>
</head>
<body>
    <h2>PHP 多檔案上傳</h2>

    <?php if (!empty($message)): ?>
        <ul>
            <?php foreach ($message as $msg): ?>
                <li><?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple>
        <button type="submit">上傳</button>
    </form>
</body>
</html>