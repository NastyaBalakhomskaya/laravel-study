
import { useContext, useEffect, useRef, useState } from "react";
import { useSelector } from "react-redux";
import AddNewTodo from "./components/ToDoList/AddNewTodo";
import DeleteToDoAll from "./components/ToDoList/DeleteAllToDo";
import ToDo from "./components/ToDoList/ToDo";
import NotificationContext from "./context/NotificationContext";
import { getAllItems } from "./store/todoSlice";

function ToDoList() {
    /* const { save, load } = props;
    const input = useRef('');
    const [todos, setToDo] = useState(JSON.parse(load()) ?? []);
    const ctx = useContext(NotificationContext);

    useEffect(() => {
        save(JSON.stringify(todos));
    }, [todos]);

    const addToDo = (e) => {
        e.preventDefault();
        
        if (input.current.value === '') {
            ctx.error('Input is empty');
            return;
        }

        const newToDo = [...todos, { value: input.current.value, isDone: false }];
        setToDo(newToDo);
        
        input.current.value = '';
        input.current.blur();
        ctx.success('ToDo was added!');
    }

    const deleteToDo = index => {
        const newToDos = [...todos];
        newToDos.splice(index, 1);
        setToDo(newToDos);
        ctx.success('Selected todo deleted');

    };

    const deleteToDoAll = () => {
        setToDo([]);
        ctx.success('All ToDo deleted!');
    }


    const toggleComplete = (index) => {
        const newToDo = [...todos];
        newToDo[index].isDone = !newToDo[index].isDone;
        setToDo(newToDo);
        ctx.success('ToDo selected');
    } */

    const todos = useSelector(getAllItems);

    return (
        <div className="container">
            <h1 className="text-center">To Do List</h1>
            <div className="justify-content-center">
               {/*  <form className="input-group" onSubmit={addToDo} >
                    <input ref={input} type="text" className="form-control" />
                    <div className="input-group-append">
                        <button className="input-group-text">Add</button>
                    </div>
                </form> */}
                <AddNewTodo />
                <div >
                    <ul className="list-group">

                        {todos.map((todo, index) =>
                            <ToDo
                                id={index}
                                key={index}
                               // toggle={() => toggleComplete(index)}
                                value={todo.value}
                                isDone={todo.isDone}
                              //  del={() => deleteToDo(index)}
                            />)
                        }
                    </ul>
                </div>
            </div>
            < DeleteToDoAll />
           {/*  <button className="input-group-text" onClick={deleteToDoAll}>Delete all</button> */}
        </div>
    );
}
/* 
function ToDo({ value, isDone, toggle, del }) {

    return (

        <ul className={isDone ? "backgroudToDo" : "list-group-item"}>
            <input onChange={toggle} className="form-check-input" type="checkbox" />
            <div checked className={isDone ? "todo_done" : ""}>
                {value}
            </div>
            <button onClick={del} className="input-group-text">Delete ToDo</button>
        </ul>
    );
}
 */

export default ToDoList;