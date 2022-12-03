
import { useContext, useEffect, useRef, useState } from "react";
import { useSelector } from "react-redux";
import AddNewTodo from "./components/ToDoList/AddNewTodo";
import DeleteToDoAll from "./components/ToDoList/DeleteAllToDo";
import ToDo from "./components/ToDoList/ToDo";
import NotificationContext from "./context/NotificationContext";
import { getAllItems } from "./store/todoSlice";

function ToDoList() {
    const todos = useSelector(getAllItems);

    return (
        <div className="container">
            <h1 className="text-center">To Do List</h1>
            <div className="justify-content-center">
                <AddNewTodo />
                <div >
                    <ul className="list-group">
                        {todos.map((todo, index) =>
                            <ToDo
                                id={index}
                                key={index}
                                value={todo.value}
                                isDone={todo.isDone}
                            />)
                        }
                    </ul>
                </div>
            </div>
            < DeleteToDoAll />
        </div>
    );
}
export default ToDoList;