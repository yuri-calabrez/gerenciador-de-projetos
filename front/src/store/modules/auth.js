import axios from 'axios'
const qs = require('qs')

const state = {
    isLogged: false
}

const mutations = {
    updateLogged(state, data) {
        state.isLogged = data
    }
}

const actions = {
    login({commit}, data) {
        data = qs.stringify(data)
        return axios.post('/auth/token', data).then(res => {
            window.localStorage.setItem('token', res.data.token)
            window.axios.defaults.headers.common['Authorization'] = res.data.token
            commit('updateLogged', true)
            return res.data
        })
    },
    logout({commit}) {
        window.localStorage.removeItem('token')
        commit('updateLogged', false)
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}