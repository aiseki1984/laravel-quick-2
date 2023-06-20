import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { useLocation } from "react-router-dom";

type UserType = {
    name: string;
    username: string;
    email: string;
};
const User = () => {
    const [user, setUser] = useState<UserType>({
        name: "",
        username: "",
        email: "",
    });
    const id = useLocation().pathname.split("/")[4];

    useEffect(() => {
        const controller = new AbortController();
        const { signal } = controller;
        fetch(`https://jsonplaceholder.typicode.com/users/${id}`, { signal })
            .then((res) => res.json())
            .then((data) => {
                setUser(data);
                console.log(data);
            })
            .catch((err) => {
                if (err.name === "AbortError") {
                    console.log("cancelled!");
                } else {
                    // todo: handle error
                }
            });
        return () => {
            controller.abort();
        };
    }, [id]);

    return (
        <div>
            <h1>UseEffectTest User</h1>
            <p>Name: {user.name}</p>
            <p>Username: {user.username}</p>
            <p>Email: {user.email}</p>
            <p>
                <Link to="/javascript/uetest/users/1">Fetch User 1</Link>
            </p>
            <p>
                <Link to="/javascript/uetest/users/2">Fetch User 2</Link>
            </p>
            <p>
                <Link to="/javascript/uetest/users/3">Fetch User 3</Link>
            </p>
        </div>
    );
};

export default User;
