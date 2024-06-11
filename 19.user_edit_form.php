<!DOCTYPE html>
<html>
<head>
    <title>修改使用者</title> <!-- 頁面標題 -->
</head>
<body>
<?php
    // 停用錯誤報告，這在開發和生產環境中通常是不推薦的，應考慮使用更安全的錯誤處理方式。
    error_reporting(0);

    // 開始會話，以便追蹤用戶的登入狀態。
    session_start();

    // 檢查用戶是否未登入，通過驗證會話變數 'id' 是否存在。
    if (!$_SESSION["id"]) {
        // 如果用戶未登入，顯示提示信息並在 3 秒後重定向到登入頁面。
        echo "請登入帳號"; // 顯示訊息：請登入帳號。
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳轉到登入頁面
    }
    else {   
        // 如果用戶已登入，繼續進行資料庫操作。

        // 建立到 MySQL 資料庫的連結。
        // 參數依次為：伺服器名稱、使用者名稱、密碼和資料庫名稱。
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 查詢資料庫，根據 GET 請求中的 'id' 值獲取指定的使用者資料。
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id='{$_GET['id']}'");

        // 將查詢結果轉換為數組，獲取使用者資料。
        $row = mysqli_fetch_array($result);

        // 顯示用於修改使用者資料的表單。
        // 表單的 method 設置為 POST，action 設置為處理修改操作的 PHP 腳本 '20.user_edit.php'。
        // 隱藏輸入欄位包含使用者的 ID。
        echo "
        <form method='post' action='20.user_edit.php'>
            <input type='hidden' name='id' value='{$row['id']}'>
            帳號：{$row['id']}<br> <!-- 顯示使用者帳號，這是不可修改的 -->
            密碼：<input type='text' name='pwd' value='{$row['pwd']}'><p></p> <!-- 輸入欄位用於修改密碼 -->
            <input type='submit' value='修改'> <!-- 提交按鈕 -->
        </form>
        ";
    }
?>
</body>
</html>
