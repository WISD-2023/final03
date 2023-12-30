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

## ◆賣家 商品列表

## ◆賣家 商品編輯/資訊

## ◆賣家 商品新增

## ◆賣家 進行中訂單

## ◆賣家 待出貨訂單

## ◆賣家 已取消訂單

## ◆賣家 訂單明細

# 系統的主要功能與負責的同學

## ERD


## 關聯式綱要圖


## 實際資料表欄位設計

## 初始專案與負責資料庫的同學 

## 額外使用的套件或樣板
★ 前台樣板 https://startbootstrap.com/template/shop-homepage

作為前台首頁使用，方便簡單的商品頁面

## 系統測試資料
使用 Seeder 自動產生資料
```
artisan db:seed
```

## 系統使用者測試帳號
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
