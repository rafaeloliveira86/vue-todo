export default {
    addTarefa(state, titulo) {
        if (titulo) {
            state.tarefas.push({
            id: new Date().getTime(),
            titulo,
            concluido: false
            });
        }
    },
    removeTarefa(state, id) {
        state.tarefas = state.tarefas.filter(tarefa => tarefa.id !== id);
    },
    editTarefa(state, novaTarefa) {
        let tarefa = state.tarefas.filter(tarefa => tarefa.id == novaTarefa.id)[0];
        tarefa.titulo = novaTarefa.titulo;
    },
    getUnitData(state, data) {
        let unit_slug = localStorage.getItem(data.key);
        
        switch (unit_slug) {
            case 'unisaojose':
                state.localStorage = {
                    bg: '#0D47A1',       //blue darken-4
                    objectbg: '#1565C0', //blue darken-3
                    base_url: data.base_url + '/' + unit_slug
                }
                break;
            case 'colegio-realengo':
                state.localStorage = {
                    bg: '#B71C1C',       //red darken-4
                    objectbg: '#C62828', //red darken-3
                    base_url: data.base_url + '/' + unit_slug
                }
                break;
            case 'colegio-aplicacao-taquara':
                state.localStorage = {
                    bg: '#00796B',       //teal darken-2
                    objectbg: '#00897B', //teal darken-1
                    base_url: data.base_url + '/' + unit_slug
                }
                break;
            case 'colegio-aplicacao-vilamilitar':
                state.localStorage = {
                    bg: '#00796B',       //teal darken-2
                    objectbg: '#00897B', //teal darken-1
                    base_url: data.base_url + '/' + unit_slug
                }
                break;
            default:
                state.localStorage = {
                    bg: '#d7d9dd',
                    objectbg: '#cccccc',
                    base_url: data.base_url
                }
        }

        return state.localStorage;
    },
    LOADING(state, loader) {
        state.loading = loader
    },
    ARTICLE_LOADING(state, loader) {
        state.article_loading = loader
    },
    //Unidades (actions.js)
    UNITS_ALL(state, units) {
        state.unitsAll = units
    },
    //Unidades Por Slug (actions.js)
    UNIT_SLUG(state, units) {
        state.unitSlug = units
    },
    //Categorias Por Slug (actions.js)
    CATEGORIE_SLUG(state, categories) {
        state.categoriesSlug = categories
    },
    //Subcategorias Por Slug (actions.js)
    SUBCATEGORIE_SLUG(state, subcategories) {
        state.subcategorieSlug = subcategories
    },
    //Artigo Por Subcategoria (actions.js)
    ARTICLE(state, article) {
        state.article = article
    }
}