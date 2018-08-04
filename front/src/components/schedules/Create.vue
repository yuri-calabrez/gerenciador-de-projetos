<template>
    <v-form ref="form" v-model="valid" @submit.prevent>
        <v-text-field
            label="Descrição da tarefa"
            v-model="data.description"
            :rules="validation.description"
            required
        ></v-text-field>

        <v-menu 
        ref="menuTime" 
        v-model="menuTime"
        :close-on-content-click="false"
        :return-value.sync="due_date_time">

            <v-text-field
                slot="activator"
                v-model="due_date_time"
                label="Hora da entrega"
                readonly
            ></v-text-field>
            <v-time-picker  v-model="due_date_time">
                <v-btn color="secondary" flat @click="menuTime = false">Cancelar</v-btn>
                <v-btn color="primary" flat @click="$refs.menuTime.save(due_date_time)">OK</v-btn>
            </v-time-picker>
        </v-menu>
        <v-btn color="primary" :disabled="!valid" @click="submit()">Salvar</v-btn>
    </v-form>
</template>

<script>
export default {
    props: ['date'],
    data () {
        return {
            data: {},
            valid: false,
            menuTime: false,
            due_date_time: null,
            validation: {
                description: [
                    v => !!v || 'Descrição é obrigatória'
                ]
            }
        }
    },
    methods: {
        submit() {
            this.data.due_date = `${this.date} ${this.due_date_time}:00`
            console.log(this.data)
        }
    }
}
</script>
