<template>
    <v-layout row wrap>
        <v-flex lg3 md4 xs12 v-for="project in projects" :key="project.id">
            <v-card color="blue-grey darken-2" dark>
                <v-card-title primary-title>
                    <div class="headline">{{ project.title }}</div>
                </v-card-title>
                <v-card-text>
                    {{ project.description }}
                </v-card-text>
                <v-card-actions>
                    <v-btn flat :to="{name: 'projects.show', params: {id: project.id}}">Ver +</v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>

        <v-flex lg3 md4 xs12>
            <ProjectCreate/>
        </v-flex>
    </v-layout>
</template>

<script>
import ProjectCreate from './Create'

export default {
    components: {
        ProjectCreate
    },
    computed: {
        projects() {
            return this.$store.state.projects.all
        }
    },
    mounted() {
        this.$store.dispatch('projects/getAll')
    }
}
</script>
