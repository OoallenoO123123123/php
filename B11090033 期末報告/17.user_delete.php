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
    else {   
        // 如果用戶已登入，繼續進行資料庫操作。

        // 建立到 MySQL 資料庫的連結。
        // 參數依次為：伺服器名稱、使用者名稱、密碼和資料庫名稱。
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 構建刪除指定使用者的 SQL 查詢語句。
        // 使用從 GET 請求中獲取的 'id' 值。
        // 請注意，直接將用戶輸入嵌入到 SQL 語句中有 SQL 注入風險，應考慮使用參數化查詢來防範這類攻擊。
        $sql = "DELETE FROM user WHERE id='{$_GET["id"]}'";

        // 執行 SQL 查詢。
        // 如果查詢失敗，輸出錯誤信息。
        if (!mysqli_query($conn, $sql)) {
            echo "使用者刪除錯誤"; // 顯示錯誤訊息：使用者刪除錯誤。
        } else {
            // 如果查詢成功，確認刪除操作。
            echo "使用者刪除成功"; // 顯示訊息：使用者刪除成功。
        }

        // 不論成功與否，頁面都會在 3 秒後重定向到 18.user.php。
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";

        // 關閉資料庫連接以釋放資源。
        mysqli_close($conn);
    }
?>

