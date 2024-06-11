<?php
    // 開啟或恢復會話，這是 PHP 處理會話的標準方式
    session_start();
    
    // 移除會話中的 "id" 資料，這通常用來識別使用者
    unset($_SESSION["id"]);
    
    // 顯示訊息 "登出成功...."
    echo "登出成功....";
    
    // 使用 meta 標籤自動刷新網頁，在 3 秒後將使用者重新導向到 2.login.html 頁面
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
