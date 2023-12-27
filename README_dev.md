# 開發人員手冊
- 一個學期下來不到四個月，可能會忘記或是不熟的地方為了降低錯誤率以下為本專案如果需要引用或是參考的手冊

## 恢復或初始專案
1. 安裝 composer.json 依賴
```
>$ composer install
```
2. 複製環境檔
    - 注意請根據你的環境去下複製指令
    - 注意是否有在 repo 跟目錄底下做操作
    ```
    - cmder, macos, wsl(Windows Subsystem for Linux), git bash
    >$ cp .env.example .env

    - windows cmd
    >$ copy .env.example .env
    ```
3. 產生環境檔 - APP_KEY
```
>$ php artisan key:generate
```
4. 安裝 package.json 依賴
```
>$ npm i or npm install
```
5. 執行前端靜態檔案 vite 建置
```
>$ npm run build
```
<!-- 
- Tips: 如果常常修改前端可以使用
npm run dev
 -->

6. project 建立 SQL Database (需要修改者修改 .env 即可，除非你不會修改...)
```
// 資料庫需要先建置的相關資訊
- 資料表名稱: final03
- 資料表格是: utf8mb4_unicode_ci
- 資料庫port: 33060
// 需要有此使用者
- 資料庫帳號: root
- 資料庫密碼: root
// 如果都確定資料庫建設無誤再打此指令，建立專案所需要的資料表
>$ php artisan migrate
```

7. (可選)放入模擬資料
```
>$ php artisan db:seed
```


## 提取(git pull)專案新的提交
1. 提取最新的提交程式碼
```
>$ git pull
```

2. (檢查)更新資料表是否新增修改刪除
```
>$ php artisan migrate:refresh
```

3. (可選)放入模擬資料
```
>$ php artisan db:seed
```

4. 執行前端靜態檔案 vite 建置
```
>$ npm run build
```

<!-- 
- Tips: 如果常常修改前端可以使用
npm run dev
 -->

# 常見問題
1. 在 ``8317bfef`` 之前都有 init.bat 與  git_pull.bat 為甚麼後面都沒有了?
A: 由於批次檔執行的時候會遺漏操作，因沒有時間排查所以用 README.md 來說明專案如何使用