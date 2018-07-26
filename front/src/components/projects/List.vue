<template>
    <v-layout row wrap>
        <v-flex lg3 md4 xs12>
            <v-card color="blue-grey darken-2" dark>
                <v-card-title primary-title>
                    <div class="headline">App Mobile</div>
                </v-card-title>
                <v-card-text>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua
                </v-card-text>
                <v-card-actions>
                    <v-btn flat :to="{name: 'projects.show', params: {id: 5}}">Ver +</v-btn>
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
    }
}
</script>
