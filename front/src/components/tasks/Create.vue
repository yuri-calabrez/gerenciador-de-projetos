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
                console.log(this.data)
            }
        }
    }
</script>