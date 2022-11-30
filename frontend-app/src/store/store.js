import { configureStore } from "@reduxjs/toolkit";
import reducer from "./todoSlice";
import { default as tempSlice } from "./Temp/tempSlice";

const store = configureStore(
    {
        reducer: {
            todos: reducer,
            temps: tempSlice,
        },
    },
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);

export default store;