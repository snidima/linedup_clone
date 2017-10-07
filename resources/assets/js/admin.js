import $ from 'jquery';

import Vue from 'vue'
import VueRouter from 'vue-router';

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css';



import Main from './components/Admin/Main.vue';
import Lessons from './components/Admin/Lessons.vue';
import Lesson from './components/Admin/Lesson.vue';

Vue.use(VueRouter);
Vue.use(VueMaterial);




const routes = [
    { path: '/test', component: Main },
    { path: '/lessons', component: Lessons, name: 'lessons' },
    { path: '/lesson/:id', component: Lesson, name: 'lesson' }
];

const router = new VueRouter({
    routes
});



const app = new Vue({
    el: '#app',
    router
}).$mount('#admin-app');
