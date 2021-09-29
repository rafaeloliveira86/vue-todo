<template>
    <div>
        <div class="row">
            <div class="input-field col s12 m12">
                <input type="text" id="author" name="author" v-model="name" />
                <label for="author">Input text</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12">
                <textarea id="message" name="message" class="materialize-textarea" v-model="message"></textarea>
                <label for="message">Textarea</label>
            </div>
        </div>
        <button type="submit" v-on:click="addComment" value="Enviar" class="waves-effect waves-light btn">Comentar</button>
    </div>
</template>

<script>
export default {
    name: "FormTodo",
    data() {
        return {
            name: '',
            message: ''
        }
    },
    methods: {
        addComment() {
            if (this.message.trim() === '') {
                return;
            }

            this.$emit('add-todo', {
                name: this.name,
                message: this.message
            });

            this.name = '';
            this.message = '';
        }
    }
}
</script>

<style>

</style>