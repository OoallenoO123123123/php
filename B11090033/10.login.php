<?php
   // mysqli_connect() 函數用於建立與資料庫的連線
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   
   // mysqli_query() 函數用於執行資料庫查詢
   $result=mysqli_query($conn, "select * from user");
   
   // mysqli_fetch_array() 函數用於逐行檢索查詢結果
   $login=FALSE;
   while ($row=mysqli_fetch_array($result)) {
     // 檢查用戶提交的帳號和密碼是否與資料庫中的記錄匹配
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;
     }
   } 
   // 如果登入成功，啟動會話並將用戶名存儲在會話中
   if ($login==TRUE) {
    session_start();
    $_SESSION["id"]=$_POST["id"];
    echo "登入成功";
    // 自動重新導向到佈告欄頁面
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }
   // 如果登入失敗，顯示錯誤消息並重新導向到登入頁面
   else{
    echo "帳號/密碼 錯誤";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
