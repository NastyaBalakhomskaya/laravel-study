import { createSlice } from "@reduxjs/toolkit";

const tempSlice = createSlice({
    name: 'temps',
    initialState: {
        count: 15,
    },

    reducers: {
        up: (state, action) => {
            state.count += action.payload;
        },
        down: (state, action) => {
            state.count -= action.payload;
        },
    },
});

export default tempSlice.reducer;
export const { up, down } = tempSlice.actions;
export const getAllItems = state => state.temps.count;