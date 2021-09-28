<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <FormTodo v-on:add-todo="addComment"></FormTodo>
        </div>
        <div class="col s12 m6">
          <div class="row">
            <ul class="collection">
              <li class="collection-item" v-for="(comment, index) in allComments" v-bind:key="index">
                <span><b>Autor:</b> {{ comment.name }}</span>
                <p>{{ comment.message }}</p>
                <div>
                  <a href="#" v-on:click.prevent="removeComment(index)" class="waves-effect waves-light btn">Excluir</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FormTodo from "./FormTodo";

export default {
    name: "Comments",
    components: {
        FormTodo
    },
    data() {
        return {
            comments: [],
        };
    },
    methods: {
        addComment(comment) {
            this.comments.push(comment);
        },
        removeComment(index) {
            this.comments.splice(index, 1);
        }
    },
    computed: {
        allComments() {
            return this.comments.map((comment) => ({
                ...comment,
                name: comment.name.trim() === "" ? "Anônimo" : comment.name,
            }));
        }
    },
    watch: {
        comments(val) {
            console.log("val", val);
        }
    }
};
</script>

<style>
</style>