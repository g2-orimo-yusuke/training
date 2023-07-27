``` mermaid
sequenceDiagram
    participant github as GitHub
    participant deploy as デプロイサーバー
    participant s3 as S3

    github->>deploy: リソースリポジトリpull
    deploy->>deploy: 更新差分確認
    deploy->>s3: リソース転送
    deploy->>deploy: PHPキャッシュの更新(マスタ更新がある場合)
    deploy->>deploy: サーバーコードのデプロイ処理へ(マスタ更新がある場合)