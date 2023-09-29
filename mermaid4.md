``` mermaid
sequenceDiagram
    participant admin as 管理画面サーバー
    participant s3 as S3
    participant db as 本番DB

    admin->>db: デプロイバージョン更新
    admin->>admin: Apcu更新(apacheリロード)
    admin->>s3: リソース転送
