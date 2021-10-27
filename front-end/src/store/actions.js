import api from '../api';

export default {
    //Unidades
    async getUnitsAll({ commit }) {
        await api.get('/unidades')
        .then(res => {
            commit('UNITS_ALL', [...res.data.data]);
        })
        .catch(err => {
            console.log(err);
        })
    },
    //Unidades Por Slug
    async getUnitBySlug ({ commit }, data) {
        await api.get('/unidade/' + data.unit_slug)
        .then(res => {
            commit('UNIT_SLUG', [...res.data.data]);
        })
        .catch(err => {
            console.log(err);
        })
    },
    //Categorias Por Slug
    async getCategoriesByUnitSlug({ commit }, data) {
        await api.get('/categoria/unidade/' + data.unit_slug)
        .then(res => {
            commit('CATEGORIE_SLUG', [...res.data.data]);
        })
        .catch(err => {
            data.error = true;

            if (err.response) { //Solicitação feita e resposta do servidor                        
                console.log(err.response.data);
                console.log(err.response.status);
                console.log(err.response.headers);

                data.status_error = err.response.data.error;
                data.message_error = err.response.data.messages.error;
            } else if (err.request) { //A solicitação foi feita, mas nenhuma resposta foi recebida                        
                console.log(err.request);
            } else { //Algo aconteceu na configuração da solicitação que acionou um erro                        
                console.log('Error', err.message);
            }
        })
        .finally(() => data.loading = false)
    }
}