<template>
    <v-list three-line subheader>
        <v-subheader>Tarefas</v-subheader>
        <v-divider></v-divider>

        <div v-for="task in tasks" :key="task.id">
            <v-list-tile @click="open(task)">
                <v-list-tile-content>
                    <v-list-tile-title>{{ task.title }}</v-list-tile-title>
                    <v-list-tile-sub-title>{{ task.description }}</v-list-tile-sub-title>
                </v-list-tile-content>
            </v-list-tile>

            <v-divider></v-divider>
        </div>
    </v-list>
</template>

<script>
    import {Bus} from '@/eventBus'
    import _ from 'underscore'

    export default {
        props: ['section'],
        methods: {
            open(n) {
                Bus.$emit('open-task', n)
            }
        },
        computed: {
            tasks() {
                const tasks = _.filter(this.$store.state.tasks.all, (data) => {
                    return data.section_id == this.section
                })
                return tasks
            }
        },
        mounted() {
            this.$store.dispatch('tasks/getAll', this.$route.params.id)
        }
    }
</script>