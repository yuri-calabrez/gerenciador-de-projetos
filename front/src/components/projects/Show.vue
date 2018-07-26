<template>
    <v-layout row wrap>
        <v-flex xs12>
            <h2 class="mb-2">Nome do projeto</h2>

            <p>texto qualquer</p>
        </v-flex>

        <Sections/>

        <v-flex xs12>
            <v-btn :to="{name: 'projects.index'}">Voltar</v-btn>
        </v-flex>
    </v-layout>
</template>

<script>
import Sections from '@/components/sections/List'

export default {
    components: {
        Sections
    }
}
</script>

