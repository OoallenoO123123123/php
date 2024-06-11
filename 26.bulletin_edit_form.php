<?php
    // 停用錯誤報告，這在開發和生產環境中通常是不推薦的，應考慮使用更安全的錯誤處理方式。
    error_reporting(0);

    // 開始會話，以便追蹤用戶的登入狀態。
    session_start();

    // 檢查用戶是否未登入，通過驗證會話變數 'id' 是否存在。
    if (!$_SESSION["id"]) {
        // 如果用戶未登入，顯示提示信息並在 3 秒後重定向到登入頁面。
        echo "please login first"; // 顯示訊息：請先登入。
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; // 3 秒後跳轉到登入頁面
    }
    else{
        // 如果用戶已登入，則顯示修改佈告的表單。

        // 建立到 MySQL 資料庫的連結。
        // 參數依次為：伺服器名稱、使用者名稱、密碼和資料庫名稱。
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 查詢指定佈告編號的佈告資料。
        $result = mysqli_query($conn, "SELECT * FROM bulletin WHERE bid={$_GET["bid"]}");
        
        // 從查詢結果中獲取佈告資料。
        $row = mysqli_fetch_array($result);
        
        // 根據佈告類型設置對應的選中狀態。
        $checked1 = "";
        $checked2 = "";
        $checked3 = "";
        if ($row['type'] == 1)
            $checked1 = "checked"; // 如果佈告類型為 1，設置選中狀態。
        if ($row['type'] == 2)
            $checked2 = "checked"; // 如果佈告類型為 2，設置選中狀態。
        if ($row['type'] == 3)
            $checked3 = "checked"; // 如果佈告類型為 3，設置選中狀態。

        // 顯示修改佈告的表單，並將佈告資料填充到表單中。
        echo "
        <html>
            <head><title>修改佈告</title></head> <!-- 頁面標題 -->
            <body>
                <form method=post action=27.bulletin_edit.php> <!-- 表單提交到處理修改佈告的 PHP 腳本 '27.bulletin_edit.php' -->
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br> <!-- 顯示佈告編號並設置隱藏輸入欄位 -->
                    標    題：<input type=text name=title value={$row['title']}><br> <!-- 標題輸入框，並設置初始值 -->
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br> <!-- 內容多行文本輸入框，並設置初始值 -->
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 <!-- 佈告類型選擇：系上公告，設置選中狀態 -->
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊 <!-- 佈告類型選擇：獲獎資訊，設置選中狀態 -->
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br> <!-- 佈告類型選擇：徵才資訊，設置選中狀態 -->
                    發布時間：<input type=date name=time value={$row['time']}><p></p> <!-- 發布時間選擇，並設置初始值 -->
                    <input type=submit value=修改佈告> <!-- 提交按鈕 -->
                    <input type=reset value=清除> <!-- 清除按鈕 -->
                </form>
           
