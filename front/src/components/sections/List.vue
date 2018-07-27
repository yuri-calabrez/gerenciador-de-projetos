<template>
    <v-layout id="sections-container" row>
        <v-flex lg3 md3 xs12 v-for="n in 3" :key="n">
            <v-card color="blue-grey lighten-5">
                <v-card-title primary-title class="blue-grey white--text">
                    <div class="headline">Sessão {{ n }}</div>
                </v-card-title>
                <v-card-text>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium odio cupiditate placeat cumque rerum doloremque excepturi tenetur fugit quaerat eligendi exercitationem praesentium, error delectus quis corrupti saepe distinctio fuga vel!
                </v-card-text>

                <v-card-text>
                    <Task/>
                </v-card-text>

                <v-card-text>
                    <TaskCreate/>
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
    }
}
</script>

