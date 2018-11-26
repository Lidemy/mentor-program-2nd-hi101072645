## 請說明 SQL Injection 的攻擊原理以及防範方法
在提交內容的時候夾帶 SQL 語法，以入侵、竄改或破壞資料庫，防範方法如下：
1. 用正則表達式過濾字串
2. 用 PHP 內建的 Prepared Statement 方式 
3. 使用 addslashes() 


## 請說明 XSS 的攻擊原理以及防範方法
利用留言、搜尋等提交資訊的欄位漏洞傳入 javascript 程式碼，再讓使用者執行這段程式碼，主要分為 Stored XSS (儲存型) 和 Reflected XSS (反射型) 和 DOM-Based XSS，防範方法如下：
1. 將 client 端提交的內容全部僅以純文字呈現，PHP 的話可以使用內建的 htmlspecialchars()
2. 針對使用者會更動到 DOM 的部分，用 innerText 取代 innerHTML


## 請說明 CSRF 的攻擊原理以及防範方法
誘騙已登入的使用者點擊惡意連結，冒用使用者身份向伺服器發送請求，偷偷執行非使用者意願的動作。防範方式在於判斷「是不是真的是由使用者發出的需求」藉由以下方法防範：
1. 伺服器端
    1. 檢查 Referer 來源的 domain 是不是合法的來源
    2. 圖形、簡訊驗證
    3. 發送請求時驗證 CSRF token 
    4. Double Submit Cookie 判斷請求來源跟使用者發出的 domain 是否相同
2. 瀏覽器
    1.  chrome 可以使用內建的 samesite 機制


## 請舉出三種不同的雜湊函數
MD5、SHA1、SHA255


## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別
在使用者完成身分認證後，Session 就會產生可以辨識使用者的 id 訊息並儲存在 Cookie 的位置，在下次造訪相同網頁時告訴伺服器，就可以辨識是來自哪位使用者發出的請求。
Cookie 則是瀏覽器上可以存取 Session 資訊的位置，設置時要設定 key、value 和失效時間。


## `include`、`require`、`include_once`、`require_once` 的差別
include 和 require 都是用來引入檔案用，後方加上“ _once ” 代表會檢查是否已經引入過，若已經引入過就不再次引入，差別在於找不到指定的檔案時， include 會顯示警告但繼續運行程式其他部分，而 require 則會產生錯誤並終止執行。