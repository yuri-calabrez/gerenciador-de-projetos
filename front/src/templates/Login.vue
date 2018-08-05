<template>
    <v-app>
        <v-content>
            <v-container grid-list-xs>
                <v-layout wrap>
                    <v-flex lg4 offset-lg4 md4 offset-md-4 xs12>
                        <v-card>
                            <v-card-title primary-title>
                                <div class="headline">Login</div>
                            </v-card-title>
                            <v-card-text>
                                <v-form ref="form" v-model="valid" @submit.prevent>
                                    <v-text-field
                                        label="E-mail"
                                        v-model="data.email"
                                        :rules="validation.email"
                                        required
                                    ></v-text-field>
                                     <v-text-field
                                        label="Senha"
                                        type="password"
                                        v-model="data.password"
                                        :rules="validation.password"
                                        required
                                    ></v-text-field>
                                    <v-btn color="primary" :disabled="!valid" @click="submit()">Logar</v-btn>
                                </v-form>
                            </v-card-text>
                            <v-snackbar
                                v-model="snackbar"
                                color="red darken-1"
                            >
                                E-mail e/ou senha inválidos
                                <v-btn dark flat @click="snackbar = false">Fechar</v-btn>
                            </v-snackbar>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            data: {},
            valid: false,
            snackbar: false,
            validation: {
                email: [
                    v => !!v || 'E-mail é obrigatório'
                ],
                password: [
                    v => !!v || 'Senha é obrigatória'
                ]
            }
        }
    },
    methods: {
        submit() {
            this.$store.dispatch('auth/login', this.data)
                .catch(() => {
                    this.snackbar = true
                })
        }
    }
}
</script>

