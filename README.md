# 系統畫面

## ◆訪客/會員 首頁
![https://cdn.discordapp.com/attachments/1190706814245929090/1190706817634947112/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190706817634947112/image.png)

## ◆訪客/會員 查看商品資訊
![https://cdn.discordapp.com/attachments/1190706814245929090/1190707319558914088/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190707319558914088/image.png)
![https://cdn.discordapp.com/attachments/1190706814245929090/1190707360252043324/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190707360252043324/image.png)

## ◆會員 會員主頁
![https://cdn.discordapp.com/attachments/1190706814245929090/1190707762309640193/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190707762309640193/image.png)

## ◆會員 購物車
![https://cdn.discordapp.com/attachments/1190706814245929090/1190719299422269530/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190719299422269530/image.png)

## ◆會員 進行中訂單
![https://cdn.discordapp.com/attachments/1190706814245929090/1190720793806643260/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190720793806643260/image.png)

## ◆會員 已完成訂單
![https://cdn.discordapp.com/attachments/1190706814245929090/1190721298930864219/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190721298930864219/image.png)

## ◆會員 已取消訂單
![https://cdn.discordapp.com/attachments/1190706814245929090/1190721489696215050/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190721489696215050/image.png)

## ◆會員 訂單明細
![https://cdn.discordapp.com/attachments/1190706814245929090/1190722792744828948/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190722792744828948/image.png)

## ◆會員 個人檔案
![https://cdn.discordapp.com/attachments/1190706814245929090/1190723458942902293/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1190723458942902293/image.png)

## ◆賣家 賣家主頁
![https://cdn.discordapp.com/attachments/1190706814245929090/1191087012023906314/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191087012023906314/image.png)

## ◆賣家 商品列表
![https://cdn.discordapp.com/attachments/1190706814245929090/1191087192991346738/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191087192991346738/image.png)

## ◆賣家 商品編輯/資訊
![https://cdn.discordapp.com/attachments/1190706814245929090/1191087332120608898/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191087332120608898/image.png)

## ◆賣家 商品新增
![https://cdn.discordapp.com/attachments/1190706814245929090/1191087456024526869/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191087456024526869/image.png)

## ◆賣家 商品評論
![https://cdn.discordapp.com/attachments/1190706814245929090/1191087568524165181/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191087568524165181/image.png)

## ◆賣家 藍新金流設定
![https://cdn.discordapp.com/attachments/1190706814245929090/1191087854282100836/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191087854282100836/image.png)

## ◆賣家 進行中訂單
![https://cdn.discordapp.com/attachments/1190706814245929090/1191087984481665084/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191087984481665084/image.png)

## ◆賣家 待出貨訂單
![https://cdn.discordapp.com/attachments/1190706814245929090/1191088074101362690/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191088074101362690/image.png)

## ◆賣家 已取消訂單
![https://cdn.discordapp.com/attachments/1190706814245929090/1191088191105667223/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191088191105667223/image.png)

## ◆賣家 訂單明細
![https://cdn.discordapp.com/attachments/1190706814245929090/1191088358303215637/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191088358303215637/image.png)

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
![https://media.discordapp.net/attachments/1190706814245929090/1191088885690794114/ERD.png](https://media.discordapp.net/attachments/1190706814245929090/1191088885690794114/ERD.png)

## 關聯式綱要圖
![https://cdn.discordapp.com/attachments/1190706814245929090/1191088886521274518/scama.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191088886521274518/scama.png)

## 實際資料表欄位設計
★ 會員 users <br/>
![https://cdn.discordapp.com/attachments/1190706814245929090/1191089106797740132/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191089106797740132/image.png)

★ 賣家 sellers <br/>
![https://cdn.discordapp.com/attachments/1190706814245929090/1191089346288287815/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191089346288287815/image.png)

★ 訂單 orders <br/>
![https://cdn.discordapp.com/attachments/1190706814245929090/1191089495794270259/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191089495794270259/image.png)

★ 訂單明細 order_details <br/>
![https://cdn.discordapp.com/attachments/1190706814245929090/1191089696047108267/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191089696047108267/image.png)

★ 商品 products <br/>
![https://cdn.discordapp.com/attachments/1190706814245929090/1191089820630532148/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191089820630532148/image.png)

★ 商品種類 categoies <br/>
![https://cdn.discordapp.com/attachments/1190706814245929090/1191089996665458819/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191089996665458819/image.png)

★ 評論 comments <br/>
![https://cdn.discordapp.com/attachments/1190706814245929090/1191090166090182746/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191090166090182746/image.png)

★ 購物車 cart_items <br/>
![https://cdn.discordapp.com/attachments/1190706814245929090/1191090289474031686/image.png](https://cdn.discordapp.com/attachments/1190706814245929090/1191090289474031686/image.png)

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
- 帳號: user@localhost
- 密碼: password

## 系統復原步驟
1. 複製 git@github.com:WISD-2023/final03.git (或是[https://github.com/WISD-2023/final03.git](https://github.com/WISD-2023/final03.git))

   打開 cmder，進入 www，輸入 `git clone git@github.com:WISD-2023/final03.git` 切換至專案所在資料夾 => `cd final03`
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
   
## 系統開發人員與工作分配

- [3B032117 吳宇翰](https://github.com/3B032117)
 - 購物網站首頁、顯示商品、搜尋商品功能
 - 會員顯示訂單、編輯訂單、訂單前往付款功能
 - 會員購物車功能
 - 期中報告製作
 - 前端編輯/設計/排版
 - 資料庫製作
 - 建置 Controller、Model、Migration
 - 身分驗證(middleware)
 - 表單驗證(policy、rules)

- [3B032110 劉軒宏](https://github.com/3B032110)
 - 會員結帳功能、會員評論功能、會員商品追蹤功能
 - 會員申請為賣家功能
 - 賣家訂單查詢
 - 賣家商品訂單查詢
 - 前端編輯/排版

- [3B032107 廖家禾](https://github.com/3B032107)
 - 賣家商品新增、刪除、修改功能
 - 賣家查看評論功能
 - 賣家更新HashKey及HashIV功能
