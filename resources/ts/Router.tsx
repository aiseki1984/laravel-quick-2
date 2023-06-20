import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Home } from "./Home";
import { Users } from "./Users";
import UseEffecTest from "./UseEffecTest";
import Toggle from "./UseEffectTest/Toggle";
import Posts from "./UseEffectTest/Posts";
import User from "./UseEffectTest/User";

export const Router = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route path={`/javascript`} element={<Home />} />
                <Route path={`/javascript/users/`} element={<Users />} />
                <Route
                    path={`/javascript/uetest/`}
                    element={<UseEffecTest />}
                />
                <Route
                    path={`/javascript/uetest/toggle`}
                    element={<Toggle />}
                />
                <Route path={`/javascript/uetest/posts`} element={<Posts />} />
                <Route
                    path={`/javascript/uetest/users/:id`}
                    element={<User />}
                />
            </Routes>
        </BrowserRouter>
    );
};
