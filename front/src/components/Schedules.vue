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
                                <v-list-tile-title>{{ event.description }}</v-list-tile-title>
                                <v-list-tile-sub-title>{{ event.due_date.substr(11, event.due_date.length) }}</v-list-tile-sub-title>
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
import { Bus } from '@/eventBus'

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
            return this.schedules.map((item) => {
                const date = item.due_date
                return date.substr(0, 10)
            })
        },
        schedules() {
            return this.$store.state.schedules.all
        }
    },
    watch: {
        date: function(to, from) {
           this.filterToDate(to)
        }
    },
    methods: {
        goToday() {
           this.date = null
            setTimeout(() => {
                const date = new Date()
                this.date = date.toISOString().substr(0, 10)
            }, 100)
        },
        filterToDate(to) {
            const events = _.filter(this.schedules, (item) => {
                let date = item.due_date
                date = date.substr(0, 10)
                return date == to
            })
            this.today = events
        }
    },
    mounted() {
        this.$store.dispatch('schedules/getAll')
        Bus.$on('schedules_created', () => {
            this.filterToDate(this.date)
        })
    }
}
</script>

