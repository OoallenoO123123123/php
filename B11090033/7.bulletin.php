<?php
    // 關閉錯誤報告，防止顯示敏感信息
    error_reporting(0);

    // 連接到 MySQL 數據庫
    $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 從 bulletin 表中選擇所有欄位
    $result=mysqli_query($conn, "select * from bulletin");

    // 顯示一個 HTML 表格來顯示佈告欄的內容
    echo "<table border=2><tr><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";

    // 遍歷結果集，將每一行佈告顯示在表格中
    while ($row=mysqli_fetch_array($result)){
        echo "<tr><td>";
        // 顯示佈告編號
        echo $row["bid"];
        echo "</td><td>";
        // 顯示佈告類別
        echo $row["type"];
        echo "</td><td>"; 
        // 顯示標題
        echo $row["title"];
        echo "</td><td>";
        // 顯示佈告內容
        echo $row["content"]; 
        echo "</td><td>";
        // 顯示發佈時間
        echo $row["time"];
        echo "</td></tr>";
    }

    // 表格結束標籤
    echo "</table>"
?>

