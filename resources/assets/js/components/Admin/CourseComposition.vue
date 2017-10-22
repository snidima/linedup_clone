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
                            {{courseDuration(course.lessons)}} дней
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
                                    <span>{{lesson.duration}} дней</span>
                                </div>
                                <div class="course-composition-course-list-el__desc">
                                    {{lesson.description}}
                                </div>
                                <div class="course-composition-course-list-el__date">
                                    <div @click="remove(course, lessonKey)" class="course-composition-course-list-el__remove">Удалить</div>
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

    import ru from 'moment/src/locale/ru';
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

            courseDuration( lessons ){
                return _.sumBy( lessons, l => l.duration  );
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

                        this.lessons = res.data.lessons || [];
                        this.courses = res.data.courses || [];
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
