<?php
    // 停用錯誤報告，這在開發和生產環境中通常是不推薦的，應考慮使用更安全的錯誤處理方式。
    error_reporting(0);

    // 開始會話，以便追蹤用戶的登入狀態。
    session_start();

    // 檢查用戶是否未登入，通過驗證會話變數 'id' 是否存在。
    if (!$_SESSION["id"]) {
        // 如果用戶未登入，顯示提示信息並在 3 秒後重定向到登入頁面。
        echo "請登入帳號"; // 顯示訊息：請登入帳號。
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳轉到登入頁面。
    }
    else{   
        // 如果用戶已登入，則處理刪除佈告的操作。

        // 建立到 MySQL 資料庫的連結。
        // 參數依次為：伺服器名稱、使用者名稱、密碼和資料庫名稱。
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 構建刪除佈告的 SQL 語句。
        $sql = "DELETE FROM bulletin WHERE bid='{$_GET["bid"]}'";

        // 執行 SQL 語句。
        if (!mysqli_query($conn, $sql)){
            // 如果刪除操作失敗，顯示錯誤訊息。
            echo "佈告刪除錯誤"; // 顯示錯誤訊息：佈告刪除錯誤。
        }else{
            // 如果刪除操作成功，顯示成功訊息。
            echo "佈告刪除成功"; // 顯示成功訊息：佈告刪除成功。
        }

        // 3 秒後重定向到佈告欄列表頁面。
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
