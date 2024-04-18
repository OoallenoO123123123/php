<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;
   // 逐行從查詢結果中取出使用者的資料並進行驗證
   while ($row=mysqli_fetch_array($result)) {
     // 檢查用戶提交的帳號和密碼是否與資料庫中的任何記錄匹配
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       // 如果匹配成功，將登入狀態設置為 TRUE
       $login=TRUE;
     }
   } 
   
   // 根據登入狀態輸出不同的訊息
   if ($login==TRUE)
     echo "登入成功";
   else
     echo "帳號/密碼 錯誤";
?>
