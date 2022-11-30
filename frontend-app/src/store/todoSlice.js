import { createSlice } from "@reduxjs/toolkit";

const todoSlice = createSlice({
    name: 'todo',
    initialState: [],
    reducers: {
        add: (state, action) => {
            state.push({ value: action.payload, isDone: false });
        },
        toggle: (state, action) => state.map((value, todo) => {
            if (todo === action.payload) {
                return { ...value, isDone: !value.isDone };
            }
            return value;
        }),
        remove: (state, action) =>
            state.filter((_, todo) => todo !== action.payload),

        removeAll: (state) =>
            state = []
    },

});

const { actions, reducer } = todoSlice;

export default reducer;

export const { add, toggle, remove, removeAll } = actions;
export const getAllItems = state => state.todos;