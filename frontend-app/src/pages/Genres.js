import { useEffect, useRef, useState } from "react";
import GenresListItem from "../components/GenresListItem";

const Genres = () => {
    const dataLoaded = useRef(false);
    const [genres, setGenres] = useState([]);

    useEffect(() => {
        if (dataLoaded.current) {
            return;
        }
        dataLoaded.current = true;

        console.log(process.env.REACT_APP_API_URL);

        const url = `${process.env.REACT_APP_API_URL}/api/genres`;
        fetch(url)
            .then(response => response.json())
            .then(json => setGenres(json.data));
    }, []);

    return (
        <div className="row mt-4">
            <div className="col-md-8">
                {genres.map(genre =>
                    <GenresListItem
                        title={genre.title}
                    />)}
            </div>
        </div>
    );
};

export default Genres;