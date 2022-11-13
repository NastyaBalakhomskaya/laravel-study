
const ActorsListItem = ({ id, last_name, first_name, patronymic, birthday, height }) => {
    return (
        <article className="mb-3">
            <h5 className="mb-1">{id}</h5>
            <h5 className="mb-1">{last_name}</h5>
            <h5 className="mb-1">{first_name}</h5>
            <h5 className="mb-1">{patronymic}</h5>
            <h5 className="mb-1">{birthday}</h5>
            <h5 className="mb-1">{height}</h5>
        </article>
    );
}

export default ActorsListItem;