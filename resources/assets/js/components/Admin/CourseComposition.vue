<template>

    <div class="container">
        <md-button class="md-raised md-primary" @click="submit">Сохранить</md-button>
        <div class="course-composition" v-bind:class="{ 'pending': pending }">
            <div class="course-composition__left">

                <div class="course-composition-course" v-for="(course, courseKey) in courses">
                    <div class="course-composition-course-el">
                        <div class="course-composition-course-el__title">
                            {{course.title}}
                        </div>
                        <div class="course-composition-course-el__desc">
                            {{course.description}}
                        </div>
                        <div class="course-composition-course-el__date">
                            {{course.date_start}} - {{course.date_end}}
                        </div>
                    </div>

                    <div class="course-composition-course-list">
                        <draggable :list="course.lessons"   class="dragArea"  :options="{
                            course,
                            sort: true,
                            group: {
                                name: 'courses',
                                put: 'srcLessons',
                                pull: false
                            },

                        }">
                            <div class="course-composition-course-list__el course-composition-course-list-el"  v-for="(lesson , lessonKey) in course.lessons">
                                <div class="course-composition-course-list-el__title">
                                    {{lessonKey+1}}. {{lesson.title}}
                                    <span v-if="diffdays( lesson.pivot.date_start, lesson.pivot.date_end )">, {{ diffdays( lesson.pivot.date_start, lesson.pivot.date_end ) }} дней</span>
                                </div>
                                <div class="course-composition-course-list-el__desc">
                                    {{lesson.description}}
                                </div>
                                <div class="course-composition-course-list-el__date">
                                    <input type="date" v-model="lesson.pivot.date_start">
                                    <input type="date" v-model="lesson.pivot.date_end">
                                    <div @click="remove(course, lessonKey)" class="course-composition-course-list-el__remove">Удалить</div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </draggable>
                    </div>

                </div>

            </div>
            <div class="course-composition__right">
                <div class="course-composition-course-list">
                    <draggable :clone="clone" v-model="lessons" class="dragArea" :move="checkMove" :options="{
                        sort: false,
                        group: {
                            name: 'srcLessons',
                            pull: 'clone',
                            put: false,
                        }
                    }" >
                        <div class="course-composition-course-list__el course-composition-course-list-el"  v-for="lesson in lessons">
                            <div class="course-composition-course-list-el__title">
                                {{lesson.title}}
                            </div>
                            <div class="course-composition-course-list-el__desc">
                                {{lesson.description}}
                            </div>
                        </div>
                    </draggable>
                </div>
            </div>
        </div>



    </div>

</template>

<script>
    import api from '../../api';
    import _ from 'lodash';
    import adminAPI from '../../admin-api';

    import moment from 'moment'
    moment.locale('ru');


    export default {

        data(){
            return {
                lessons: [],
                courses: [],
                pending: false
            }
        },

        computed:{

        },

        methods: {

            diffdays(b,a){
               let aa = moment(a);
               let bb = moment(b);
               return aa.diff(bb, 'days');
            },

            moment: moment,

            remove(course, lessonKey){
                course.lessons.splice(lessonKey, 1);
            },

            checkMove(evt){
                let current = evt.relatedContext.list;
                let id = evt.draggedContext.element.id;

                let res = true;
                current.forEach(function( item, key ){
                    if( id === item.id ) res = false;

                });
                return res;
            },



            clone(lesson, method){
                return _.clone( lesson );
            },

            submit(){
                this.pending = true;
                api({
                    method: adminAPI.courseCompositionSave.type,
                    url: adminAPI.courseCompositionSave.link,
                    data: {
                        courses: this.courses
                    }
                })
                    .then(( res )=>{

                        this.fetchAll();

                    })
                    .catch((res) => {
                        this.pending = false;
                        alert('ERROR');
                    });
            },

            fetchAll(){
                this.pending = true;
                api({
                    method: adminAPI.courseComposition.type,
                    url: adminAPI.courseComposition.link,
                    data: this.lesson
                })
                    .then(( res )=>{

                        this.lessons = res.data.lessons.map(lesson => {
                            return Object.assign( lesson, {
                                pivot: {
                                    date_start: moment(new Date()).format('YYYY-MM-DD'),
                                    date_end:   moment(new Date()).format('YYYY-MM-DD'),
                                }
                            });
                        }) || [];



                        this.courses = res.data.courses || [];

                        this.courses.map(course => {
                            return course.lessons.map(lesson => {
                                lesson.pivot.date_start = moment(lesson.pivot.date_start).format('YYYY-MM-DD');
                                lesson.pivot.date_end = moment(lesson.pivot.date_end).format('YYYY-MM-DD');
                                return lesson;
                            });
                        });

                        this.pending = false;

                    })
                    .catch((res) => {
                        this.pending = false;
                    });
            }

        },
        mounted(){
            this.fetchAll();
        }
    }
</script>
