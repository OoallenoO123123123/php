<?php

// 停用錯誤報告，這在開發和生產環境中通常是不推薦的，應考慮使用更安全的錯誤處理方式。
error_reporting(0);

// 開始會話，以便追蹤用戶的登入狀態。
session_start();

// 檢查用戶是否未登入，通過驗證會話變數 'id' 是否存在。
if (!$_SESSION["id"]) {
    // 如果用戶未登入，顯示提示信息並在 3 秒後重定向到登入頁面。
    echo "請登入帳號"; // 顯示訊息：請登入帳號。
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else{    
    // 如果用戶已登入，繼續進行資料庫操作。

    // 建立到 MySQL 資料庫的連結。
    // 參數依次為：伺服器名稱、使用者名稱、密碼和資料庫名稱。
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 構建插入新使用者的 SQL 查詢語句。
    // 使用來自 POST 請求的值（通常由表單提交）。
    // 注意：為了避免 SQL 注入攻擊，應使用參數化查詢或轉義用戶輸入。
    $sql = "INSERT INTO user (id, pwd) VALUES ('{$_POST['id']}', '{$_POST['pwd']}')";

    // 執行 SQL 查詢。
    // 如果查詢失敗，輸出錯誤信息。
    if (!mysqli_query($conn, $sql)) {
        echo "新增命令錯誤"; // 顯示錯誤訊息：新增命令錯誤。
    }
    else{
        // 如果查詢成功，確認新增使用者並在 3 秒後重定向到另一個頁面。
        echo "新增使用者成功，三秒鐘後回到網頁"; // 顯示訊息：新增使用者成功，三秒鐘後回到網頁。
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }

    // 關閉資料庫連結以釋放資源。
    mysqli_close($conn);
}
?>
