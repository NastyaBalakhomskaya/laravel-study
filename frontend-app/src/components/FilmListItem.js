import { Link } from "react-router-dom";

const FilmListItem = ({ id, title, year, text, genres, actors }) => {
    return (
        <article className="mb-3">
            <h3 className="mb-1">{title}</h3>
            <h4 className="mb-1">{year}</h4>
            <h4 className="mb-1">{text}</h4>
            <p className="mb-1">
                {genres.map(genre => <span key={genre.id}>{genre.title}</span>)}
            </p>
            <p className="mb-1">
                {actors.map(actor => <span key={actor.id}>{actor.last_name}</span>)}
            </p>
            <Link to={`/films/${id}`}>Link</Link>
        </article>
    );
}

export default FilmListItem;