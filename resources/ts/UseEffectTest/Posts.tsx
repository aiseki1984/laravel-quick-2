import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

type PostType = {
    id: string;
    title: string;
};

const Posts = () => {
    const [posts, setPosts] = useState<PostType[]>([]);

    useEffect(() => {
        let isCancelled = false;
        fetch("https://jsonplaceholder.typicode.com/posts")
            .then((res) => res.json())
            .then((data) => {
                if (!isCancelled) {
                    alert("posts are ready, updating state!");
                    setPosts(data);
                    console.log(data);
                }
            });
        return () => {
            isCancelled = true;
        };
    }, []);

    return (
        <div>
            <h1>UseEffect Test Posts</h1>
            <p>
                <Link to={`/javascript/uetest/`}>uetestへのリンク</Link>
            </p>
            <div>
                {posts?.map((p) => (
                    <p key={p.id}>{p.title}</p>
                ))}
            </div>
        </div>
    );
};

export default Posts;
