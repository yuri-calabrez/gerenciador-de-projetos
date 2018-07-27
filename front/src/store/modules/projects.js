const qs = require('qs')
import axios from 'axios'

const state = {
    all: []
}

const mutations = {
    updateAll(state, data) {
        state.all = data
    }
}

const actions = {
    getAll({commit}) {
        return axios.get('/api/projects')
            .then(response => {
                commit('updateAll', response.data)
            })
    },

    create({commit}, data) {
        data = qs.stringify(data)
        return axios.post('/api/projects', data)
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}