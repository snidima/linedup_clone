<template>

    <div class="container">

        <md-button class="md-raised md-primary" @click="submit">Сохранить</md-button>
        <div class="course-composition">
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
                        <draggable :list="courses[courseKey].lessons" @add="add(course, $event)" v-model="courses[courseKey].lessons" class="dragArea"  :options="{
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
                                </div>
                                <div class="course-composition-course-list-el__desc">
                                    {{lesson.description}}
                                </div>
                                <div class="course-composition-course-list-el__date">
                                    <datepicker placeholder="Период" :options="lesson.calendarOption" v-if="lesson.pivot"></datepicker>
                                </div>
                                <div class="course-composition-course-list-el__remove"></div>
                            </div>
                        </draggable>
                    </div>

                </div>



            </div>
            <div class="course-composition__right">
                <div class="course-composition-course-list">
                    <draggable  :clone="clone" v-model="lessons" class="dragArea" :move="checkMove" :options="{
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
    import { ru } from 'flatpickr/dist/l10n/ru';


    export default {

        data(){
            return {
                lessons: [],
                courses: [],
            }
        },

        computed:{

        },

        methods: {

            onChangeDate(lesson, newdate){
                lesson.pivot.date_start = newdate[0].toDateString();
                lesson.pivot.date_end = newdate[1].toDateString();
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

            clone(course, method){
                return _.clone( course );
            },

            add(course, method){

                let id = method.newIndex;
                let lesson = course.lessons[id];

                lesson.pivot = {value: true};
                lesson.calendarOption = {
                    locale: ru,
                    altInput: true,
                    altFormat: 'F j, Y',
                    mode: "range",
                    onClose: this.onChangeDate.bind( null, lesson ),

                };
            },



            submit(){
                console.log( this.courses );
            }

        },
        mounted(){

            api({
                method: adminAPI.courseComposition.type,
                url: adminAPI.courseComposition.link,
                data: this.lesson
            })
                .then(( res )=>{

                    this.lessons = res.data.lessons.map(e => {
                        e.pivot = {};
                        return e;
                    }) || [];

                    this.courses = res.data.courses || [];



                    this.courses.map((course, courseId) => {
                        course.lessons =  course.lessons.map( (lesson, lessonId) => {
                            lesson.calendarOption = {
                                locale: ru,
                                altInput: true,
                                altFormat: 'F j, Y',
                                mode: "range",
                                onClose: this.onChangeDate.bind( null, lesson ),
                                defaultDate: [
                                    lesson.pivot.date_start,
                                    lesson.pivot.date_end,
                                ]
                            };
                            return lesson;
                        } );

                        return course;
                    });

                })
                .catch((res) => {});

        }
    }
</script>
