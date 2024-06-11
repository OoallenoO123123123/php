<!DOCTYPE html>
<html>
<head>
    <title>使用者管理</title> <!-- 頁面標題 -->
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
        // 如果用戶已登入，顯示使用者管理的內容。

        // 顯示頁面標題和導航連結。
        echo "<h1>使用者管理</h1>
            [<a href='14.user_add_form.php'>新增使用者</a>] 
            [<a href='11.bulletin.php'>回佈告欄列表</a>]<br>";

        // 開始顯示使用者資料的表格。
        echo "<table border=1>
            <tr><td></td><td>帳號</td><td>密碼</td></tr>"; // 表格標題行

        // 建立到 MySQL 資料庫的連結。
        // 參數依次為：伺服器名稱、使用者名稱、密碼和資料庫名稱。
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 從資料庫中查詢所有使用者的資料。
        $result = mysqli_query($conn, "SELECT * FROM user");

        // 循環遍歷查詢結果，並在表格中顯示每個使用者的資料。
        while ($row = mysqli_fetch_array($result)) {
            // 顯示每一行的使用者資料和操作連結（修改和刪除）。
            echo "<tr>
                    <td>
                        <a href='19.user_edit_form.php?id={$row['id']}'>修改</a> ||
                        <a href='17.user_delete.php?id={$row['id']}'>刪除</a>
                    </td>
                    <td>{$row['id']}</td>
                    <td>{$row['pwd']}</td>
                </tr>";
        }

        // 結束表格標籤。
        echo "</table>";

        // 關閉資料庫連接以釋放資源。
        mysqli_close($conn);
    }
?> 
</body>
</html>
