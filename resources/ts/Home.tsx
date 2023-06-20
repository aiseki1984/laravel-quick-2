import { useState, useEffect, useMemo } from "react";
import { Link } from "react-router-dom";

interface BookType {
    id: number;
    isbn: string;
    title: string;
    price: number;
    published: string;
    publisher: string;
}

export const Home = () => {
    const [books, setBooks] = useState<BookType[]>([]);
    const [book, setBook] = useState({
        isbn: "",
        title: "",
        price: 0,
        published: "",
        publisher: "",
    });

    const [name, setName] = useState("");
    const [state, setState] = useState({
        name: "",
        selected: false,
        age: 20,
        city: "",
    });

    useEffect(() => {
        fetchBooks();
    }, []);

    const fetchBooks = () => {
        fetch("/api/books")
            .then((response) => response.json())
            .then((data) => setBooks(data));
    };

    const handleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
        const { name, value } = event.target;
        setBook((prevBook) => ({ ...prevBook, [name]: value }));
    };

    const handleSubmit = (event: React.FormEvent<HTMLFormElement>) => {
        event.preventDefault();

        fetch("/api/books", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN":
                    document
                        .querySelector('meta[name="csrf-token"]')
                        ?.getAttribute("content") || "",
            },
            body: JSON.stringify(book),
        }).then(() => {
            setBook({
                isbn: "9780409703979",
                title: "",
                price: 0,
                published: "2022-08-22",
                publisher: "",
            });
            fetchBooks();
        });
    };

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
            <form onSubmit={handleSubmit}>
                <input
                    type="isbn"
                    name="isbn"
                    placeholder="ISBN"
                    value="9780409703979"
                />
                <input
                    type="text"
                    name="title"
                    placeholder="Title"
                    value={book.title}
                    onChange={handleChange}
                />
                <input
                    type="number"
                    name="price"
                    placeholder="Price"
                    value={book.price}
                    onChange={handleChange}
                />
                <input
                    type="text"
                    name="published"
                    placeholder="Published"
                    value="2022-08-22"
                />
                <input
                    type="text"
                    name="publisher"
                    placeholder="Publisher"
                    value={book.publisher}
                    onChange={handleChange}
                />
                <button type="submit">Add Book</button>
            </form>
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
