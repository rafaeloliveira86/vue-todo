<template>
    <div>
        <v-dialog
        v-model="dialog"
        persistent
        max-width="290"
        >
            <!-- <template v-slot:activator="{ on, attrs }">
                <v-btn
                color="primary"
                dark
                v-bind="attrs"
                v-on="on"
                >
                Open Dialog
                </v-btn>
            </template> -->
            <v-card>
                <v-card-title class="text-h5">Editar Tarefa</v-card-title>
                <v-divider></v-divider>
                <v-card-text class="mt-2">Informe um novo título.</v-card-text>
                <v-text-field
                    class="px-6"
                    label="Título"
                    outlined
                    v-model="titulo"
                ></v-text-field>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="red darken-1"
                        text
                        @click="$emit('fechaModal')"
                    >
                        Cancelar
                    </v-btn>
                    <v-btn
                        color="primary"
                        text
                        @click="handleEditar"
                    >
                        Editar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    export default {
        name: "ModalEditar",
        props: ['tarefa'],
        data () {
            return {
                dialog: true,
                titulo: null
            }
        },
        created() {
            this.titulo = this.tarefa.titulo
        },
        methods: {
            handleEditar() {
                let novaTarefa = {
                    titulo: this.titulo,
                    id: this.tarefa.id
                }
                this.$store.commit('editTarefa', novaTarefa);
                this.$emit('fechaModal');
            }
        }
    }
</script>

<style>

</style>