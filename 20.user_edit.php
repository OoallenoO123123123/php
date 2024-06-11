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

        // 執行 SQL 語句來更新使用者的密碼。
        // 使用 POST 請求中的 'id' 和 'pwd' 值來更新資料庫中對應的使用者密碼。
        if (!mysqli_query($conn, "UPDATE user SET pwd='{$_POST['pwd']}' WHERE id='{$_POST['id']}'")) {
            // 如果更新操作失敗，顯示錯誤訊息並在 3 秒後重定向到使用者管理頁面。
            echo "修改錯誤"; // 顯示錯誤訊息：修改錯誤。
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>"; // 3 秒後跳轉到使用者管理頁面
        } else {
            // 如果更新操作成功，顯示成功訊息並在 3 秒後重定向到使用者管理頁面。
            echo "修改成功，三秒鐘後回到網頁"; // 顯示訊息：修改成功，三秒鐘後回到網頁。
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>"; // 3 秒後跳轉到使用者管理頁面
        }
    }

?>
