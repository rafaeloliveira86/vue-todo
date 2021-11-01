import api from '../services/api.js';

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
        .finally(
            //() => data.loading = false
            () => commit('LOADING', data.loading = false)
        )
    },
    //Subcategorias Por Slug
    async getSubcategoriesByCategorieAndUnitSlug({ commit }, data) {
        await api.get('/subcategoria/categoria/' + data.categorie_slug + '/unidade/' + data.unit_slug)
        .then(res => {
            commit('SUBCATEGORIE_SLUG', [...res.data.data]);
        })
        .catch(err => {
            data.error = true;

            if (err.response) { //Solicitação feita e resposta do servidor                        
                console.log(err.response.data);
                console.log(err.response.status);
                console.log(err.response.headers);

                data.status_error = err.response.data.error;
                data.message_error = err.response.data.messages.error;

                //commit('SUBCATEGORIE_SLUG_ERROR', { error: data.status_error + ' - ' + data.message_error });
            } else if (err.request) { //A solicitação foi feita, mas nenhuma resposta foi recebida                        
                console.log(err.request);
            } else { //Algo aconteceu na configuração da solicitação que acionou um erro                        
                console.log('Error', err.message);
            }
        })
        .finally(
            //() => this.loading = false
            () => commit('LOADING', data.loading = false)
        )
    },
    //Artigos Por Subcategoria
    // async getArticleBySubategorieID({ commit }, data) {
    //     await api.get('/artigo/subcategoria/' + data.id_subcategorie)
    //     .then(res => {
    //         commit('ARTICLE', [...res.data.data]);
    //         data.article_error = false;
    //     })
    //     .catch(err => {
    //         data.article_error = true;

    //         if (err.response) { //Solicitação feita e resposta do servidor                        
    //             console.log(err.response.data);
    //             console.log(err.response.status);
    //             console.log(err.response.headers);

    //             data.article_status_error = err.response.data.error;
    //             data.article_message_error = err.response.data.messages.error;

    //             commit('ARTICLE', err.response.data.messages.error );
    //             //throw err.response.data.messages.error

    //         } else if (err.request) { //A solicitação foi feita, mas nenhuma resposta foi recebida                        
    //             console.log(err.request);
    //         } else { //Algo aconteceu na configuração da solicitação que acionou um erro                        
    //             console.log('Error', err.message);
    //         }
    //     })
    //     .finally(
    //         //() => this.article_loading = false
    //         () => commit('ARTICLE_LOADING', data.article_loading = false)
    //     )
    // }
    getArticleBySubategorieID({ commit }, data) {
        return new Promise((resolve, reject) => {
            api.get('/artigo/subcategoria/' + data.id_subcategorie)
            .then(res => {
                data.article_error = false;
                commit('ARTICLE', [...res.data.data]);                
                resolve(res)
            })
            .catch(err => {
                data.article_error = true;
                reject(err.response.status + ' - ' + err.response.data.messages.error)
            })
            .finally(
                //() => this.article_loading = false
                () => commit('ARTICLE_LOADING', data.article_loading = false)
            )
        })
    }
}