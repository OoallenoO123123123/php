<?php
    #mysqli_connect() 建立資料庫連結
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    #mysqli_query() 從資料庫查詢資料
    $result=mysqli_query($conn, "select * from user");
    #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
    $row=mysqli_fetch_array($result);
    // 輸出第一行使用者的帳號和密碼
    echo $row["id"] . " " . $row["pwd"] . "<br>";    
    // 從查詢結果中再次取出一行資料
    $row = mysqli_fetch_array($result);    
    // 輸出第二行使用者的帳號和密碼
    echo $row["id"] . " " . $row["pwd"];
?>
