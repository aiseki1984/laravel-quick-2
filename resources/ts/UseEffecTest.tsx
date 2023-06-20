import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

const UseEffecTest = () => {
    const [number, setNumber] = useState(0);
    const [name, setName] = useState("");

    useEffect(() => {
        console.log("effect");
        const interval = setInterval(() => {
            console.log("effect 2");
            setNumber((prev) => prev + 1);
        }, 1000);

        return () => {
            clearInterval(interval);
        };
    }, []);

    return (
        <div>
            <h1>UseEffectTest</h1>
            <p>{number}</p>
            <p>
                <input type="text" onChange={(e) => setName(e.target.value)} />
            </p>
            <p>
                <Link to={`/javascript/uetest/toggle`}>toggleへのリンク</Link>
            </p>
            <p>
                <Link to={`/javascript/uetest/posts`}>postsへのリンク</Link>
            </p>
        </div>
    );
};

export default UseEffecTest;
