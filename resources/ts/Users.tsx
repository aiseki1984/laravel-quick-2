import { Link } from "react-router-dom";

export const Users = () => {
    return (
        <>
            <h1>ユーザー一覧ページ</h1>
            <div>
                <Link to={`/javascript`}>ホームに戻る</Link>
            </div>
        </>
    );
};
