
const GenresListItem = ({ id, title }) => {
    return (
        <article className="mb-3">
            <h5 className="mb-1">{id}</h5>
            <h5 className="mb-1">{title}</h5>
        </article>
    );
}

export default GenresListItem;