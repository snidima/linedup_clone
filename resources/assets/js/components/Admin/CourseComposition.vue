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
                        <draggable v-model="courses[courseKey].lessons" class="dragArea" :options="{group:'people',pull:'clone', put: clone}">
                            <div class="course-composition-course-list__el course-composition-course-list-el"  v-for="lesson in courses[courseKey].lessons">
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
            <div class="course-composition__right">
                <div class="course-composition-course-list">
                    <draggable v-model="lessons" class="dragArea" :options="{group:'people'}" >
                        <div class="course-composition-course-list__el course-composition-course-list-el"  v-for="lesson in lessons" :key="lesson.id">
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
                courses: []
            }
        },

        computed:{

        },

        methods: {

            add: function() {
                this.list.push({
                    name: 'Juan'
                });
            },
            replace: function() {
                this.list = [{
                    name: 'Edgard'
                }]
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
                    this.lessons = res.data.lessons;
                    this.courses = res.data.courses;
                })
                .catch((res) => {});

        }
    }
</script>
