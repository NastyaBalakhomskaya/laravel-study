import { useState } from "react";

function ToDoList() {
    const [input, setInput] = useState('');
    const [todos, setToDo] = useState([]);

    const onInputChange = (e) => {
        setInput(e.target.value);
    }

    const addToDo = (e) => {
        e.preventDefault();
        if (input === '') {
            return;
        }

        const newToDo = [...todos, { value: input, isDone: false }];
        setToDo(newToDo);
        setInput('');
    }

    const deleteToDo = index => {
        const newToDos = [...todos];
        newToDos.splice(index, 1);
        setToDo(newToDos);
    };

    const deleteToDoAll = () => {
        setToDo([]);
    }


    const toggleComplete = (index) => {
        const newToDo = [...todos];
        newToDo[index].isDone = !newToDo[index].isDone;
        setToDo(newToDo);
    }

    return (
        <div className="container">
            <h1 className="text-center">To Do List</h1>
            <div className="justify-content-center">
                <form className="input-group" onSubmit={addToDo} >
                    <input onChange={onInputChange} value={input} type="text" className="form-control" />
                    <div className="input-group-append">
                        <button className="input-group-text">Add</button>
                    </div>
                </form>
                <div >
                    <ul className="list-group">

                        {todos.map((todo, index) =>
                            <ToDo
                                key={index}
                                todo={todo}
                                toggle={() => toggleComplete(index)}
                                value={todo.value}
                                isDone={todo.isDone}
                                del={() => deleteToDo(index)}
                            />)
                        }
                    </ul>
                </div>
            </div>
            <button className="input-group-text" onClick={deleteToDoAll}>Delete all</button>
        </div>
    );
}

function ToDo({ value, isDone, toggle, del, index }) {

    return (

        <ul className={isDone ? "backgroudToDo" : "list-group-item"}>
            <input onChange={toggle} className="form-check-input" type="checkbox" />
            <div checked className={isDone ? "todo_done" : ""}>
                {value}
            </div>
            <button onClick={() => del(index)} className="input-group-text">Delete ToDo</button>
        </ul>
    );
}


export default ToDoList;