<template>
    <v-layout id="sections-container" row>
        <v-flex lg3 md3 xs12 v-for="section in sections" :key="section.id">
            <v-card color="blue-grey lighten-5">
                <v-card-title primary-title class="blue-grey white--text">
                    <div class="headline">{{ section.title }}</div>
                </v-card-title>
                <v-card-text>
                    {{ section.description }}
                </v-card-text>

                <v-card-text>
                    <Task :section="section.id"/>
                </v-card-text>

                <v-card-text>
                    <TaskCreate :section="section.id"/>
                </v-card-text>
            </v-card>
        </v-flex>

        <v-flex lg3 md3 xs12>
            <CreateSection/>
        </v-flex>
    </v-layout>
</template>

<script>
import CreateSection from '@/components/sections/Create'
import Task from '@/components/tasks/List'
import TaskCreate from '@/components/tasks/Create'

export default {
    components: {
        CreateSection,
        Task,
        TaskCreate
    },
    computed: {
        sections() {
            return this.$store.state.sections.all
        }
    },
    mounted() {
        this.$store.dispatch('sections/getAll', this.$route.params.id)
    }
}
</script>

