import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

const Toggle = () => {
    const [toggle, setToggle] = useState(false);

    useEffect(() => {
        console.log("effect runs!");
        // toggle

        // return a clean up function
        return () => {
            console.log(
                "wait! before running the effect, I should clean here!"
            );
            // clear somthing from the previous effect
            console.log("okey done! you can run!");
        };
    }, [toggle]);

    return (
        <div>
            <h1>UseEffect Toggle</h1>
            <button onClick={() => setToggle(!toggle)}>Toggle</button>
            <p>
                <Link to={`/javascript/uetest/`}>uetestへのリンク</Link>
            </p>
        </div>
    );
};

export default Toggle;
