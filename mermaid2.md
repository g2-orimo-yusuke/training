``` mermaid
sequenceDiagram
    participant github as GitHub
    participant deploy as デプロイサーバー
    participant s3 as S3
    participant db as 本番DB

    github->>deploy: リソースリポジトリpull
    deploy->>deploy: 更新差分確認
    deploy->>db: マスタデータインポート
    deploy->>deploy: APCuキャッシュの更新(マスタ更新がある場合)
    deploy->>s3: リソース転送
