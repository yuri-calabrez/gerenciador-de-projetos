<template>
    <v-form v-model="valid" ref="form">
        <v-text-field
                v-model="data.title"
                label="Nova tarefa"
                :rules="validation.title"
                required
                @keyup.native.enter.prevent="submit()"
        ></v-text-field>
    </v-form>
</template>

<script>
    export default {
        props: ['section'],
        data () {
            return {
                data: {},
                valid: false,
                validation: {
                    title: [
                        v => !!v || 'Nome da tarefa é obirgatório'
                    ]
                }
            }
        },
        methods: {
            submit() {
                this.data.section_id = this.section
                this.$store.dispatch('tasks/create', this.data)
                    .then(res => {
                        this.$refs.form.reset()
                    })
            }
        }
    }
</script>