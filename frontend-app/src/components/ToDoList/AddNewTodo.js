import { useContext, useRef } from "react";
import { useDispatch } from "react-redux";
import NotificationContext from "../../context/NotificationContext";
import { add } from "../../store/todoSlice";

const AddNewTodo = () => {
    const input = useRef('');
    const ctx = useContext(NotificationContext);
    const dispatch = useDispatch();


    const addToDo = (e) => {
        e.preventDefault();

        if (input.current.value === '') {
            ctx.error('Input is empty');
            return;
        }
        dispatch(add(input.current.value));

        /*      const newToDo = [...todos, { value: input.current.value, isDone: false }];
            setToDo(newToDo);  */

        input.current.value = '';
        input.current.blur();
        ctx.success('ToDo was added!');
    }
    return (
        <form className="input-group" onSubmit={addToDo} >
            <input ref={input} type="text" className="form-control" />
            <div className="input-group-append">
                <button className="input-group-text">Add</button>
            </div>
        </form>
    );
};
export default AddNewTodo;