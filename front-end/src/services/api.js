import axios from "axios";

//axios.defaults.baseURL = process.env.VUE_APP_BASE_URL;
const API_URL = 'http://localhost/wiki/api/v1';                     //Localhost
//const API_URL = 'https://wiki.escolasz.com.br/backend/wiki/api/v1'; //Locaweb

const api = axios.create({
    baseURL: API_URL,
    //withCredentials: true,
    headers: {
        'Content-Type': 'application/json'
    }
});

//Config para acesso de rotas autenticadas com Token
// api.interceptors.request.use(
//     (config) => {
//         config.headers.Authorization = `Bearer ${token}`;
//         return config;
//     },
//     (error) => {
//         return Promise.reject(error);
//     }
// );

export default api