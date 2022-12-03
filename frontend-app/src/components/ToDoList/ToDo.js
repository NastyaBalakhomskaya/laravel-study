import { useDispatch } from "react-redux";
import { remove, toggle } from "../../store/todoSlice";


function ToDo({ id, value, isDone }) {
    const dispatch = useDispatch();

    const deleteToDo = () => {
        dispatch(remove(id));
    };

    return (
        <ul className={isDone ? "backgroudToDo" : "list-group-item"}>
            <input onChange={() => dispatch(toggle(id))} className="form-check-input" type="checkbox" />
            <div checked className={isDone ? "todo_done" : ""}>
                {value}
            </div>
            <button onClick={deleteToDo} className="input-group-text">Delete ToDo</button>
        </ul>
    );
}

export default ToDo;