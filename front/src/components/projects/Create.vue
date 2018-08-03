<template>
    <v-card color="blue-grey lighten-4">
        <v-card-title>
            <div class="headline">Adicionar projeto</div>
        </v-card-title>
        <v-container>
            <v-form ref="form" v-model="valid" xs12>
                <v-text-field 
                    id="project-title" 
                    v-model="data.title" 
                    :rules="validation.title" 
                    label="Título" 
                    required>
                    </v-text-field>
                    <div v-show="data.title">
                        <v-text-field
                            v-model="data.description"
                            id="project-description"
                            label="Descrição"
                            outline
                        ></v-text-field>

                        <v-menu 
                            ref="menuDate" 
                            v-model="menuDate"
                            :close-on-content-click="false"
                            :return-value.sync="due_date">
                            <v-text-field
                                slot="activator"
                                v-model="due_date"
                                label="Data de entrega"
                                readonly
                            ></v-text-field>

                            <v-date-picker
                                v-model="due_date"
                                no-title
                                scrollable
                            >
                                <v-btn color="secondary" flat @click="menuDate = false">Cancelar</v-btn>
                                <v-btn color="primary" flat @click="$refs.menuDate.save(due_date)">OK</v-btn>
                            </v-date-picker>
                        </v-menu>

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
                        
                        <v-btn flat @click.prevent="submit()">Salvar</v-btn>
                    </div>
            </v-form>
        </v-container>
    </v-card>
</template>

<script>
export default {
    data () {
        return {
            valid: false,
            due_date: null,
            due_date_time: '12:00',
            menuDate: false,
            menuTime: false,
            data: {},
            validation: {
                title: [
                    v => !!v || 'Título é obrigatório'
                ]
            }
        }
    },
    methods: {
        submit() {
            this.data.due_date = `${this.due_date} ${this.due_date_time}:00`
            this.$store.dispatch('projects/create', this.data)
        }
    }
}
</script>
