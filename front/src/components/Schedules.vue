<template>
    <v-layout row wrap>
        <v-flex xs12>
            <h2 class="display-1 bm-2">Agenda</h2>
        </v-flex>

        <v-flex lg6 md6 xs12>
            <v-date-picker
                v-model="date"
                locale="pt-br"
                full-width
                landscape
                :events="events"
                event-color="green lighten-1"
                color="green lighten-1"
            >
                <v-btn flat @click="goToday()" class="primary">Hoje</v-btn>
            </v-date-picker>
            
            
            <v-card class="mt-4" v-if="date">
                <v-card-title>
                    <div class="headline">Novo evento</div>
                    <v-card-text>
                        <Create :date="date"/>
                    </v-card-text>
                </v-card-title>
            </v-card>
        </v-flex>
        
        <v-flex lg6 md6 xs12>
            <v-card color="green lighten-5" v-if="date">
                <v-card-title primary-title class="green white--text">
                    <div class="headline">{{ date }}</div>
                </v-card-title>
                <v-card-text>
                    <p>Total de enventos: {{ today.length }}</p>
                    <v-list>
                        <v-list-tile v-for="(event, index) in today" :key="index">
                            <v-list-tile-content>
                                <v-list-tile-title>{{ event }}</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-card-text>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
import _ from 'underscore'
import Create from '@/components/schedules/Create'

export default {
    components: {
        Create
    },
    data () {
        return {
            date: null,
            today: []
        }
    },
    computed: {
        events() {
            return [...Array(15)].map(() => {
                const day = Math.floor(Math.random() * 30)
                const date = new Date()
                date.setDate(day)
                return date.toISOString().substr(0, 10)
            })
        }
    },
    watch: {
        date: function(to, from) {
            const events = _.filter(this.events, (item) => {
                return item == to
            })
            this.today = events
        }
    },
    methods: {
        goToday() {
           this.date = null
            setTimeout(() => {
                const date = new Date()
                this.date = date.toISOString().substr(0, 10)
            }, 100)
        }
    }
}
</script>

