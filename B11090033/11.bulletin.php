<?php
    // 關閉錯誤報告
    error_reporting(0);

    // 啟動會話
    session_start();

    // 檢查用戶是否已登入
    if (!$_SESSION["id"]) {
        // 如果未登入，顯示提示消息並重新導向到登入頁面
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 如果已登入，顯示歡迎消息及相關操作鏈接
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";

        // 連接到資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 從 bulletin 表中選擇所有欄位
        $result=mysqli_query($conn, "select * from bulletin");

        // 顯示佈告欄內容
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        
        // 遍歷結果集，將每一行佈告顯示在表格中
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        // 表格結束標籤
        echo "</table>";
    }
?>
