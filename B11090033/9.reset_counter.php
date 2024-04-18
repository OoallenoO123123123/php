<?php
    // 啟動會話
    session_start();

    // 刪除會話中的 "counter" 變數，即重置計數器
    unset($_SESSION["counter"]);

    // 輸出重置成功的訊息
    echo "counter重置成功....";

    // 重新導向到另一個頁面，延遲 2 秒後重新導向
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";
?>

