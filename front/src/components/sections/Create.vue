<template>
    <v-card color="blue-grey lighten-5">
        <v-card-title primary-title>
            <div class="headline">Nova Sessão</div>
        </v-card-title>

        <v-card-text>
            <v-form v-model="valid" ref="form">
                <v-text-field 
                    v-model="data.title" 
                    label="Titulo" 
                    required
                    :rules="validation.title">
                    </v-text-field>

                <v-text-field 
                    v-model="data.description" 
                    label="Descrição"
                    outline>
                    </v-text-field>

                <v-btn :disabled="!valid" @click="submit()">Salvar</v-btn>
            </v-form>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    data () {
        return {
            data: {},
            valid: false,
            validation: {
                title: [
                    v => !!v || 'Título obrigatório'
                ]
            }
        }
    },
    methods: {
        submit() {
            this.data.project_id = this.$route.params.id
            this.$store.dispatch('sections/create', this.data)
                .then(res => {
                    this.$refs.form.reset()
                })
        }
    }
}
</script>

