import axios from 'axios';
import store from '..';
export default {
    namespaced: true,
    state: {
        users: []
    },
    mutations: {
        setUsersData(state, users) {
            state.users = users;
        }
    },
    actions: {
        getUsers ({state, commit, rootState}) {
            axios
                .get('/stride/core/get-user')
                .then(response => {
                    console.log(response);
                    // store.commit()
                    commit('setUsersData', response);
                    // this.users response
                }).catch(errors => {
                    console.log(errors);
                    
                });        
        }
    },
    getters: {
        getUsers : (state, getters) => {
            return this.users;
        }
    }
}