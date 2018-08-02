const qs = require('qs')
import axios from 'axios'
import _ from 'underscore'

export default function (endpoint) {
    const state = {
        all: []
    }
    
    const mutations = {
        updateAll(state, data) {
            state.all = data
        },
    
        merge(state, data) {
            state.all.push(data)
        }
    }
    
    const actions = {
        getAll({commit}, id) {
            let url = endpoint
            if (id) {
                url += `?id=${id}`
            }
            return axios.get(url)
                .then(response => {
                    commit('updateAll', response.data)
                })
        },
    
        create({commit}, data) {
            data = qs.stringify(data)
            return axios.post(endpoint, data)
                .then(res => {
                    commit('merge', res.data)
                })
        }
    }
    
    const getters = {
        byId: state => (id) => {
            const data = _.find(state.all, (project) => {
                return project.id == id
            })
    
            return data || {}
        }
    }
    
   return {
        namespaced: true,
        state,
        mutations,
        actions,
        getters
    }
}