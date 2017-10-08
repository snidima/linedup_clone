import Vue from 'vue'
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        lessons: 0
    },
    mutations: {
        increment (state) {
            state.lessons++
        }
    }
});

export default store;