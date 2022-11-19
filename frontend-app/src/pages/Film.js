import { useEffect, useRef, useState } from "react";
import { useParams } from "react-router-dom";

const Film = () => {
    const { id } = useParams();
    const dataLoaded = useRef(false);
    const [film, setFilm] = useState(null);

    useEffect(() => {
        if (dataLoaded.current) {
            return;
        }
        dataLoaded.current = true;

        console.log(process.env.REACT_APP_API_URL);

        const url = `${process.env.REACT_APP_API_URL}/api/films/${id}`;
        fetch(url)
            .then(response => response.json())
            .then(json => setFilm(json.data));
    }, []);

    if (film === null) {
        return <h1>Loading info</h1>;
    }

    return (
        <>
            <h3>{film.title}</h3>
            <h4>{film.year}</h4>
            <p>{film.text}</p>
        </>
    );
}

export default Film;