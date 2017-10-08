import Vue from 'vue';
import VueRouter from 'vue-router';

import Lessons from './Lessons.vue';
import Lesson from './Lesson.vue';
import LessonAdd from './LessonAdd.vue';

Vue.use(VueRouter);

const routes = [
    { path: '/admin/lessons', component: Lessons, name: 'lessons' },
    { path: '/admin/lesson/:id', component: Lesson, name: 'lesson' },
    { path: '/admin/lessonadd', component: LessonAdd, name: 'lesson.add' },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;