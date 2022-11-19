import { useEffect, useRef, useState } from "react";
import FilmListItem from "../components/FilmListItem";

const Home = () => {
    const dataLoaded = useRef(false);
    const [films, setFilms] = useState([]);

    useEffect(() => {
        if (dataLoaded.current) {
            return;
        }
        dataLoaded.current = true;

        console.log(process.env.REACT_APP_API_URL);

        const url = `${process.env.REACT_APP_API_URL}/api/films`;
        fetch(url)
            .then(response => response.json())
            .then(json => setFilms(json.data));
    }, []);

    return (
        <div className="row mt-4">
            <div className="col-md-8">
                {films.map(film =>
                    <FilmListItem
                        id={film.id}
                        key={film.id}
                        title={film.title}
                        year={film.year}
                        text={film.text}
                        actors={film.actors}
                        genres={film.genres} />)}
            </div>
        </div>
    );
};

export default Home;