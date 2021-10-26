import axios from "axios";

const api = axios.create({
    baseURL: "http://localhost/wiki/api/v1", //Localhost
    //baseURL: "https://wiki.escolasz.com.br/backend/wiki/api/v1", //Locaweb
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