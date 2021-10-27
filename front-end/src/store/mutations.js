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
    }
}