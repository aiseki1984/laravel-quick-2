import { useState, useEffect, useMemo } from "react";
import { Link } from "react-router-dom";

interface Book {
    id: number;
    title: string;
    price: number;
    publisher: string;
}

export const Home = () => {
    const [books, setBooks] = useState<Book[]>([]);

    const [name, setName] = useState("");
    const [state, setState] = useState({
        name: "",
        selected: false,
        age: 20,
        city: "",
    });

    useEffect(() => {
        console.log("useEffect runs!");

        fetch("/api/books")
            .then((response) => response.json())
            .then((data) => setBooks(data));
    }, []);

    const user = useMemo(
        () => ({
            name: state.name,
            selected: state.selected,
        }),
        [state.name, state.selected]
    );

    useEffect(() => {
        console.log("The state has changed, useEffect runs!");
    }, [user]);

    const handleAdd = () => {
        setState((prev) => ({ ...prev, name }));
    };
    const handleSelect = () => {
        setState((prev) => ({ ...prev, selected: true }));
    };

    console.log("component rendered!");

    return (
        <>
            <h1 className="text-red">Laravel React+Typescript環境構築</h1>
            <div>
                ユーザー一覧はこちら
                <Link to={`/javascript/users/`}>こちら</Link>
            </div>
            <div>
                <h2>React Test</h2>
                <input type="text" onChange={(e) => setName(e.target.value)} />
                <p>
                    <button onClick={handleAdd}>Add Name</button>
                </p>
                <p>
                    <button onClick={handleSelect}>Select</button>
                </p>
                {`{
                    name: ${state.name}, 
                    selected: ${state.selected.toString()}
                }`}
            </div>
            <h2>books</h2>
            <div className="books">
                <ul>
                    {books.map((book) => (
                        <li key={book.id}>
                            {book.title} by {book.publisher}
                        </li>
                    ))}
                </ul>
            </div>
        </>
    );
};
