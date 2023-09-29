``` mermaid
sequenceDiagram
    participant git as gitリポジトリ
    participant admin as 管理画面サーバー
    participant s3 as S3
    participant db as 本番DB

    git->>admin: 対象ブランチの更新を確認<br/>(git pull)
    admin->>db: commitハッシュの差分確認
    admin->>s3: リソース転送
    admin->>db: 更新履歴更新(commitハッシュを更新)
