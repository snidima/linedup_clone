import Vue from 'vue';
import VueRouter from 'vue-router';

import Lessons from './Lessons.vue';
import Lesson from './Lesson.vue';
import LessonAdd from './LessonAdd.vue';

import Courses from './Courses.vue'
import Course from './Course.vue'
import CourseAdd from './CourseAdd.vue'

import CourseComposition from './CourseComposition.vue'

Vue.use(VueRouter);

const routes = [
    { path: '/lessons', component: Lessons, name: 'lessons' },
    { path: '/lesson/:id', component: Lesson, name: 'lesson' },
    { path: '/lesson-add', component: LessonAdd, name: 'lesson.add' },

    { path: '/courses', component: Courses, name: 'courses' },
    { path: '/course/:id', component: Course, name: 'course' },
    { path: '/courses-add', component: CourseAdd, name: 'course.add' },
    { path: '/courses-composition', component: CourseComposition, name: 'courses.composition' },
];

const router = new VueRouter({
    // mode: 'history',
    routes
});

export default router;