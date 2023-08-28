import { createSlice, createAsyncThunk } from '@reduxjs/toolkit'

export const fetchProducts = createAsyncThunk('productsSlice/fetchProducts', async () => {
    const res = await fetch('https://kofito.000webhostapp.com/portfolio%20dashboard/api.php')
    const data = await res.json()
    return data;
})

const productsSlice = createSlice({
    initialState: [],
    name: 'productsSlice',
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(fetchProducts.fulfilled, (state, action) => {
            return action.payload
        })
    }
})

export const { } = productsSlice.actions;

export default productsSlice.reducer;