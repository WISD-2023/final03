# 系統畫面

## ◆訪客/會員 首頁
- 購物網站首頁、商品列表及登入按鈕
![image](https://github.com/WISD-2023/final03/assets/144866586/b6291775-1fdc-47f6-82f9-2ccac02b5635)


## ◆訪客/會員 查看商品資訊
- 商品詳細資訊，包含賣家、分類、庫存、價格及評論，可留言的買家會再出現留言區
![image](https://github.com/WISD-2023/final03/assets/144866586/1c039960-5f21-4e28-877c-fd40ef7f73be)
![image](https://github.com/WISD-2023/final03/assets/144866586/847cf986-3a65-41eb-aa53-b72f85b02157)


## ◆會員 會員主頁
- 會員首頁，用於切換到會員功能的各路由
![image](https://github.com/WISD-2023/final03/assets/144866586/055efa88-9640-41c2-8378-e3bffa9c94e4)


## ◆會員 購物車
- 會員商品購物車，可修改商品數量或刪除購物車商品，按下「結帳」會將購物車商品依賣家產生訂單
![image](https://github.com/WISD-2023/final03/assets/144866586/6a6b6cda-cfee-4845-a6e2-3689089449d9)


## ◆會員 進行中訂單
- 會員所有尚未付款的訂單，按下「前往付款」按鈕可以前往藍新金流付款頁面
![image](https://github.com/WISD-2023/final03/assets/144866586/f97b11a7-0820-4b2d-a621-8b0618c68c7f)


## ◆會員 已完成訂單
- 會員所有已付款的訂單
![image](https://github.com/WISD-2023/final03/assets/144866586/c5ff58b0-a128-48f0-a04d-8a950a59393f)


## ◆會員 已取消訂單
- 會員所有已取消的訂單
![image](https://github.com/WISD-2023/final03/assets/144866586/52cb3bfb-9d9d-4610-8f28-0360d1ee15ce)


## ◆會員 訂單明細
- 會員訂單明細，可察看商品數量、總金額及小計 (與會員相關的訂單)
![image](https://github.com/WISD-2023/final03/assets/144866586/149ebc17-6e49-4e42-af20-a1ad7d4d63f2)

## ◆會員 個人檔案
- 會員個人檔案，可修改個人基本資料(密碼、電子郵件等)、申請成為賣家等功能
![image](https://github.com/WISD-2023/final03/assets/144866586/7704ef1f-5a81-4e5c-807a-04809fe3c06a)

## ◆賣家 賣家主頁
- 賣家首頁，用於切換到賣家功能的各路由
![image](https://github.com/WISD-2023/final03/assets/144866586/25eb8d21-414f-49d7-a3b7-6d7ff6bb35a2)

## ◆賣家 商品列表
- 賣家所新增的商品列表，可進行新增、修改、刪除、查看評論，而「查看訂單」按鈕為以該商品為主體之相關訂單列表
![image](https://github.com/WISD-2023/final03/assets/144866586/e73728b4-351c-4411-88e2-193463d8eaca)


## ◆賣家 商品編輯/資訊
- 賣家可編輯或查看商品的詳細資訊(名稱、說明、規格、庫存、分類、圖片等等)
![image](https://github.com/WISD-2023/final03/assets/144866586/3aef4a24-da79-41d3-8d72-ac2c083fa92f)


## ◆賣家 商品新增
- 賣家可新增商品的詳細資訊(名稱、說明、規格、庫存、分類、圖片等等)
![image](https://github.com/WISD-2023/final03/assets/144866586/a0a61f78-5902-475a-bb4c-c7070449ea4e)

## ◆賣家 商品評論
- 賣家可查看該商品的所有評論(買家、內容、評價)
![image](https://github.com/WISD-2023/final03/assets/144866586/7a96ba61-7bff-41b5-855b-b6cc6de80079)

## ◆賣家 藍新金流設定
- 賣家可設定藍新金流相關設定(商店ID、密鑰、IV等資訊)
![image](https://github.com/WISD-2023/final03/assets/144866586/b066c649-5a3a-4013-ba3c-ee113f9b03b9)

## ◆賣家 進行中訂單
- 賣家可查看所有進行中的訂單
![image](https://github.com/WISD-2023/final03/assets/144866586/366cfb2c-e3b3-4c62-8591-0b1f291539f7)

## ◆賣家 待出貨訂單
- 賣家可查看所有待出貨的訂單
![image](https://github.com/WISD-2023/final03/assets/144866586/63ba7824-3e68-4ed5-94cb-97116f70d702)

## ◆賣家 已取消訂單
- 賣家可查看所有已取消的訂單
![image](https://github.com/WISD-2023/final03/assets/144866586/9154f027-747b-484a-a5aa-649ec8d97361)

## ◆賣家 訂單明細
- 賣家訂單明細，可察看商品數量、總金額及小計 (與賣家相關的訂單)
![image](https://github.com/WISD-2023/final03/assets/144866586/d07ddbf6-634a-4ea5-983c-a91009ab7ad9)

# 系統的主要功能與負責的同學
★ 商品
- Route::get('/', [ProductController::class, 'index'])->name('products.index'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::get('/products/search', [ProductController::class, 'search'])->name('products.search'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::post('/products/{product}/comment', [CommentController::class, 'store'])->name('products.comment.store')->middleware('auth'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('products/{product}/approx', [ProductController::class, 'approx'])->name('products.approx')->middleware('auth'); [3B032110 劉軒宏](https://github.com/3B032110)

★ 付款通知
- Route::post('/payments/complete', [OrderController::class, 'payment_complete'])->name('payments.complete'); [3B032117 吳宇翰](https://github.com/3B032117)

★ 會員 (Middleware: auth)
- Route::get('/users/profile', [ProfileController::class, 'edit'])->name('users.profile.edit'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::patch('/users/profile', [ProfileController::class, 'update'])->name('users.profile.update'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::delete('/users/profile', [ProfileController::class, 'destroy'])->name('users.profile.destroy'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::patch('/users/{user}/seller', [UserController::class, 'seller_update'])->name('users.seller'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/users/orders/cancel', [OrderController::class, 'cancel_index'])->name('users.orders.cancel.index'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/users/orders/done', [OrderController::class, 'done_index'])->name('users.orders.done.index'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::post('/users/orders/{order}/checkout', [OrderController::class, 'checkout'])->name('users.orders.checkout'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::get('/users/orders', [OrderController::class, 'index'])->name('users.orders.index'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::post('/users/orders', [OrderController::class, 'store'])->name('users.orders.store'); [3B032117 吳宇翰](https://github.com/3B032117) [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/users/orders/{order}', [OrderController::class, 'show'])->name('users.orders.show'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::patch('/users/orders/{order}', [OrderController::class, 'update'])->name('users.orders.update'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::get('/users/cart_items', [CartItemController::class, 'index'])->name('users.cart_items.index'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::post('/users/cart_items', [CartItemController::class, 'store'])->name('users.cart_items.store'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::patch('/users/cart_items/{cart_item}', [CartItemController::class, 'update'])->name('users.cart_items.update'); [3B032117 吳宇翰](https://github.com/3B032117)
- Route::delete('/users/cart_items/{cart_item}', [CartItemController::class, 'destroy'])->name('users.cart_items.destroy'); [3B032117 吳宇翰](https://github.com/3B032117)

★ 賣家 (Middleware: auth, seller.auth)
- Route::get('/sellers/products/{product}/orders', [ProductController::class, 'seller_progress_index'])->name('sellers.products.orders.index'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/sellers/products/{product}/orders/cancel', [ProductController::class, 'seller_cancel_index'])->name('sellers.products.orders.cancel'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/sellers/products/{product}/orders/done', [ProductController::class, 'seller_done_index'])->name('sellers.products.orders.done'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/sellers/products', [ProductController::class, 'seller_index'])->name('sellers.products.index'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/sellers/products/create', [ProductController::class, 'create'])->name('sellers.products.create'); [3B032107 廖家禾](https://github.com/3B032107)
- Route::post('/sellers/products', [ProductController::class, 'store'])->name('sellers.products.store'); [3B032107 廖家禾](https://github.com/3B032107)
- Route::get('/sellers/products/{product}/edit', [ProductController::class, 'edit'])->name('sellers.products.edit'); [3B032107 廖家禾](https://github.com/3B032107)
- Route::patch('/sellers/products/{product}', [ProductController::class, 'update'])->name('sellers.products.update'); [3B032107 廖家禾](https://github.com/3B032107)
- Route::delete('/sellers/products/{product}', [ProductController::class, 'destroy'])->name('sellers.products.destroy'); [3B032107 廖家禾](https://github.com/3B032107)
- Route::get('/sellers/products/{product}/comments', [CommentController::class, 'index'])->name('sellers.comments.index'); [3B032107 廖家禾](https://github.com/3B032107)
- Route::get('/sellers/hash_keys', [HashKeyController::class, 'index'])->name('sellers.hash_keys.index'); [3B032107 廖家禾](https://github.com/3B032107)
- Route::post('/sellers/hash_keys', [HashKeyController::class, 'store'])->name('sellers.hash_keys.store'); [3B032107 廖家禾](https://github.com/3B032107)
- Route::get('/sellers/orders/', [OrderController::class, 'seller_index'])->name('sellers.orders.index'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/sellers/orders/cancel', [OrderController::class, 'seller_cancel_index'])->name('sellers.orders.cancel'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/sellers/orders/done', [OrderController::class, 'seller_done_index'])->name('sellers.orders.done'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::get('/sellers/orders/{order}', [OrderController::class, 'seller_show'])->name('sellers.orders.show'); [3B032110 劉軒宏](https://github.com/3B032110)
- Route::patch('/sellers/orders/{order}', [OrderController::class, 'seller_update'])->name('sellers.orders.update'); [3B032110 劉軒宏](https://github.com/3B032110)

★ 各項功能完善 [3B032117 吳宇翰](https://github.com/3B032117)

★ 身分驗證 [3B032117 吳宇翰](https://github.com/3B032117)

★ Model 關聯 [3B032117 吳宇翰](https://github.com/3B032117)

## ERD
![image](https://github.com/WISD-2023/final03/assets/144866586/d4f152cd-723e-4437-8bf2-48d5001081be)

## 關聯式綱要圖
![image](https://github.com/WISD-2023/final03/assets/144866586/66383dac-2383-4f93-8539-6124792ac33a)

## 實際資料表欄位設計
★ 會員 users <br/>
![image](https://github.com/WISD-2023/final03/assets/144866586/aa2a4062-fffa-4c28-8672-52734d8db486)

★ 賣家 sellers <br/>
![image](https://github.com/WISD-2023/final03/assets/144866586/f743570a-76e3-4c94-ae66-3d5a3090b41d)

★ 訂單 orders <br/>
![image](https://github.com/WISD-2023/final03/assets/144866586/52553391-41ea-4e92-b26d-47d171b9c984)

★ 訂單明細 order_details <br/>
![image](https://github.com/WISD-2023/final03/assets/144866586/9fc7e4a2-ee03-4dd1-aeca-ee7494b0c424)

★ 商品 products <br/>
![image](https://github.com/WISD-2023/final03/assets/144866586/5aa2f49a-8aa1-44a4-905c-72106e2c0621)

★ 商品種類 categoies <br/>
![image](https://github.com/WISD-2023/final03/assets/144866586/892f393c-9b2f-4d75-b5a6-2e554d89ff92)

★ 評論 comments <br/>
![image](https://github.com/WISD-2023/final03/assets/144866586/a10be789-498b-4abc-975c-a3fbd13b96eb)

★ 購物車 cart_items <br/>
![image](https://github.com/WISD-2023/final03/assets/144866586/0246e5c7-bd69-462d-acad-b23b23c0a43a)

## 初始專案與負責資料庫的同學 
- 初始專案 [3B032117 吳宇翰](https://github.com/3B032117)
- 資料庫 [3B032117 吳宇翰](https://github.com/3B032117)

## 額外使用的套件或樣板
★ 前台樣板 https://startbootstrap.com/template/shop-homepage

作為前台首頁使用，方便簡單的商品頁面

## 系統測試資料
使用 Seeder 自動產生資料
```
artisan db:seed
```

## 使用者測試帳號
- 買家
     - 帳號: `user@localhost`
     - 密碼: `password`
- 賣家
     - 帳號: `seller@localhost`
     - 密碼: `password`

## 系統復原步驟
1. 複製 ``git@github.com:WISD-2023/final03.git`` (或是[https://github.com/WISD-2023/final03.git](https://github.com/WISD-2023/final03.git))

   打開 cmder，進入 www，輸入 `git clone git@github.com:WISD-2023/final03.git` 切換至專案所在資料夾 => `cd final03` 或是 系統環境已經安裝 composer, nodejs, npm, php 並且 sql port 為 33060 可以直接執行 ``build.bat`` 自動化腳本(for Windows)
2. cmder 輸入以下命令，復原專案
   - `composer install`
   - `cp .env.example .env`
   - `artisan key:generate`
   - `npm install`
   - `npm run build`
3. 修改 .env 檔案
   - `DB_CONNECTION=mysql`
   - `DB_HOST=127.0.0.1`
   - `DB_PORT=33060`
   - `DB_DATABASE=final03`
   - `DB_USERNAME=root`
   - `DB_PASSWORD=root`
4. 復原DB/建立資料庫
   - `artisan migrate`
5. 建立模擬資料
   - `artisan db:seed`

> [!IMPORTANT]
> 由於本專案有使用藍新金流API串接付款頁面，因此商店ID、祕鑰、祕鑰IV都屬於藍新金流所提供，且為了要使付款成功回傳更新訂單狀態功能正常，請務必將專案架設於公開網路上，否則該功能將會不完整。

> [!IMPORTANT]
> 如果你有使用 proxy 來代理laravel專案，需要在 ``app\Http\Middleware\TrustProxies.php`` 中加入你的上游 proxy IP，否則會出現 Mixed Content 錯誤。
## 系統展示站台
- [主站台](https://laravel.snkms.com)(Apache):[3B032117 吳宇翰](https://github.com/3B032117)
- [副站台](https://laravel.yomisana.xyz)(Nginx-Proxy-Nginx):[3B032110 劉軒宏](https://github.com/3B032110)

## 系統開發人員與工作分配

- [3B032117 吳宇翰](https://github.com/3B032117)
    - 購物網站首頁、首頁顯示商品、首頁搜尋商品功能
    - 會員顯示訂單、編輯訂單、訂單前往付款功能
    - 會員購物車新增、刪除、修改功能
    - 期中報告製作/修訂
    - 前端編輯/設計/排版
    - 資料庫製作
    - 建置 Controller、Model、Migration
    - 身分驗證(middleware)
    - 表單驗證(policy、rules)

- [3B032110 劉軒宏](https://github.com/3B032110)
    - 會員結帳功能、會員評論功能、會員商品追蹤功能
    - 會員申請為賣家功能
    - 賣家檢視商品列表功能
    - 賣家訂單查詢
    - 賣家商品訂單查詢
    - 前端編輯/排版
    - 期中報告修訂

- [3B032107 廖家禾](https://github.com/3B032107)
    - 賣家商品新增、刪除、修改功能
    - 賣家查看評論功能
    - 賣家更新HashKey及HashIV功能
