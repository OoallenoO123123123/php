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
        // 如果用戶已登入，顯示新增佈告的表單。

        echo "
        <html>
            <head><title>新增佈告</title></head> <!-- 頁面標題 -->
            <body>
                <form method=post action=23.bulletin_add.php> <!-- 表單提交到處理新增佈告的 PHP 腳本 '23.bulletin_add.php' -->
                    標    題：<input type=text name=title><br> <!-- 標題輸入框 -->
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br> <!-- 內容多行文本輸入框 -->
                    佈告類型：<input type=radio name=type value=1>系上公告 <!-- 佈告類型選擇：系上公告 -->
                            <input type=radio name=type value=2>獲獎資訊 <!-- 佈告類型選擇：獲獎資訊 -->
                            <input type=radio name=type value=3>徵才資訊<br> <!-- 佈告類型選擇：徵才資訊 -->
                    發布時間：<input type=date name=time><p></p> <!-- 發布時間選擇 -->
                    <input type=submit value=新增佈告> <!-- 提交按鈕 -->
                    <input type=reset value=清除> <!-- 清除按鈕 -->
                </form>
            </body>
        </html>
        ";
    }
?>
