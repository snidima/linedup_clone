<template>

    <div class="container">

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
                        <draggable :list="courses[courseKey].lessons" v-model="courses[courseKey].lessons" class="dragArea" :move="checkMove2" :options="{
                            sort: true,
                            group: {
                                name: 'courses',
                                put: 'srcLessons',
                                pull: 'true'
                            },
                        }">
                            <div @add="add" class="course-composition-course-list__el course-composition-course-list-el"  v-for="(lesson , lessonKey) in course.lessons">
                                <div class="course-composition-course-list-el__title">
                                    {{lessonKey+1}}. {{lesson.title}}
                                </div>
                                <div class="course-composition-course-list-el__desc">
                                    {{lesson.description}}
                                </div>
                                <div class="course-composition-course-list-el__date">
                                    <datepicker placeholder="Период" ></datepicker>
                                </div>
                                <div class="course-composition-course-list-el__remove"></div>
                            </div>
                        </draggable>
                    </div>

                </div>



            </div>
            <div class="course-composition__right">
                <div class="course-composition-course-list">
                    <draggable v-model="lessons" class="dragArea" :move="checkMove" :options="{
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

            checkMove: function(evt){
                let current = evt.relatedContext.list;
                let id = evt.draggedContext.element.id;

//                console.log( current );
//                console.log( newv );


                let res = true;
                current.forEach(function( item, key ){
                    if( id === item.id ) res = false;
                });

//
                return res;
            },

            checkMove2(){
                console.log('!');
            },


            add( evt, e ){
                if( !evt.added ) return;

                console.log( evt.added );
                console.log( e );
//                _.uniqWith(objects, _.isEqual);
                return null;
            },

            submit(){

            }

        },
        mounted(){

            api({
                method: adminAPI.courseComposition.type,
                url: adminAPI.courseComposition.link,
                data: this.lesson
            })
                .then(( res )=>{
                    console.log(res.data);
                    this.lessons = res.data.lessons || [];
                    this.courses = res.data.courses;

                    this.courses.lessons = [];
                })
                .catch((res) => {});

        }
    }
</script>
