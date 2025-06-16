import { API } from "../_api";

export const getProduct = async () => {
 
        const { data } = await API.get("/products");
        return data.data;   
};

export const showProduct = async (id) => {
    try {
        const response = await API.get(`/products/${id}`);
        return response.data;
    } catch (error) {
        console.log(error);
        throw error;
    }
}

export const createProduct = async (product) => {
    try {
        const response = await API.post("/products", product);
        return response.data;
    } catch (error) {
        console.log(error);
        throw error;
    }
}