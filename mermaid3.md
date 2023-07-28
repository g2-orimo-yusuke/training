``` mermaid
sequenceDiagram
    participant autoscale as オートスケーリング
    participant github as GitHub
    participant deploy as デプロイサーバー
    participant db as 本番DB
    participant api as 本番APIサーバー

    autoscale->>autoscale: オートスケール停止
    github->>deploy: 圧縮モードでダウンロード
    deploy->>db: DBマイグレーション
    deploy->>api: 圧縮ファイルを転送する
    api->>api: ファイルを展開する
    api->>api: シンボリックリンクを貼り直す
    api->>autoscale: テンプレート作り直す
    autoscale->>autoscale: オートスケール再開
