import { API } from "../_api";

export const getCategory = async () => {
    try {
        
        const {data} = await API.get("/categories");
        return data.data;
    } catch (error) {
        console.log(error);
    throw error
    }
}

export const showCategory = async (id) => {
    try {
        const response = await API.get(`/categories/${id}`);
        return response.data;
        
    } catch (error) {
         console.log(error);
    throw error
    }
}


export const createCategory = async (category) => {
    try {
        const response = await API.post("/categories", category);
        return response.data;
        
    } catch (error) {
        console.log(error);
    throw error
    }
}       