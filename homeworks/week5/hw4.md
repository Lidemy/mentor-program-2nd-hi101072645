## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
原本 VARCHAR 和 TEXT 上限差距很大，但後來更新 VARCHAR 的上限 65535byte 後，通常使用上在儲存上限的的差異就沒那麼多。
在 MySQL 的設置中， VARCHAR 可以設定預設值而 TEXT 則否，所以如果需要設定預設值的，就必須使用 VARCHAR 。


## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
Cookie 是從伺服器傳來存在瀏覽器上的資料，很多網站會在使用者的瀏覽器存放 Cookie 來判斷使用者資訊，在下一次又造訪相同網頁時，就可以更快的利用 Cookie 判斷例如登入與否等訊息，藉此來提供客製化的資料。
在伺服器收到 request 的時候，可以在 Response header 中用 set-cookie 設定訊息，在下次造訪網頁或者瀏覽器向伺服器發送 request 的時候，再以 Request header 傳送去伺服器。 



## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
- 沒有設定帳號密碼的格式，除了可以輸入中文之外，也可以發送程式碼到資料庫去。


