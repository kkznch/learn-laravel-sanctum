# Laravel SanctumとNext.jsの勉強

## Requirement
- PHP > 8.1
- Node > 18.6

## Installation
```sh
$ git clone git@github.com:kkznch/learn-laravel-sanctum.git
$ cd lean-laravel-sanctum
```

Laravel
```sh
$ cd backend
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ cd ..
```

Next.js
```sh
$ cd frontend 
$ yarn install
$ cp .env.example .env
$ cd ..
```

## Usage
Laravelを起動する。
```sh
$ (cd backend && php artisan serve)
```

Next.jsを起動する。
```sh
$ (cd frontend && yarn run dev)
```

## 設計
### ユースケース図
```plantuml
@startuml
skin rose
left to right direction

:ユーザ: as user

rectangle "でじぴよ掲示板" {
	(ログインする) as login
  (ログアウトする) as logout
	(スレッドを作成する) as makeThread
	(スレッドを編集する) as editThread
  (スレッドを削除する) as deleteThread
  (レスを書き込む) as makeRes
  (レスを編集する) as editRes
  (レスを削除する) as deleteRes
  (スレッドを一覧する) as showThreadList
  (スレッドを閲覧する) as showThread
  (レスを一覧する) as showResList
}

user --> login
user --> logout
user --> makeThread
user --> editThread
user --> deleteThread
user --> makeRes
user --> editRes
user --> deleteRes
user --> showThreadList
user --> showThread
user --> showResList
@enduml
```

### ER図
```plantuml
@startuml

hide circle
skinparam linetype ortho

entity "users" as users {
  *id : number <<generated>>
  --
  *email : text
  *password: text
  *nickname : text
}

entity "thread" as threads {
  *id : number <<generated>>
  --
  *user_id : number <<FK>>
  *title : text
}

entity "responses" as responses {
  *id : number <<generated>>
  --
  *thread_id : number <<FK>>
  *user_id : number <<FK>>
  *body : text
}

users |o--o{ threads
threads ||--o{ responses
users ||--o{ responses
@enduml
```
