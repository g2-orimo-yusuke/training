``` mermaid
sequenceDiagram
    participant deploy as デプロイサーバー
    participant s3 as S3
    participant db as 本番DB

    deploy->>db: デプロイバージョン更新
    deploy->>deploy: APCuキャッシュの更新(マスタ更新がある場合)
    deploy->>s3: リソース転送
