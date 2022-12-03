import { useDispatch } from "react-redux";
import { removeAll } from "../../store/todoSlice";


function DeleteToDoAll() {
    const dispatch = useDispatch();

    const Del = () => {
        dispatch(removeAll());
    };

    return (
        <button className="input-group-text" onClick={Del}>Delete all</button>
    );
}

export default DeleteToDoAll;

