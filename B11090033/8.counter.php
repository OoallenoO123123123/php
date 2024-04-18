<?php
    // 啟動會話
    session_start();

    // 檢查是否已設置了 "counter" 會話變數
    if (!isset($_SESSION["counter"]))
        // 如果未設置，將計數器設置為 1
        $_SESSION["counter"]=1;
    else
        // 如果已設置，將計數器加 1
        $_SESSION["counter"]++;

    // 輸出計數器的值
    echo "counter=".$_SESSION["counter"];
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>
