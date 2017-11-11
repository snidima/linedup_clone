<template>




        <div class="container" >

            <div v-if="payed === false">

                У вас нет оплаченных курсов

            </div>

            <div class="course-info" v-if="course" style="display: none;">

                <div class="course-thumb-block" >
                    <div class="course-thumb-block__header course-thumb-block-header">
                        <div class="course-thumb-block-header__title">{{course.course.title}}</div>
                        <div class="course-thumb-block-header__info course-thumb-block-header-info">
                            <div class="course-thumb-block-header-info__item">
                                Даты проведения:
                                {{moment(course.date_start).format('LL')}}
                                -
                                {{moment(course.date_end.date).format('LL')}}
                            </div>
                            <div class="course-thumb-block-header-info__item">Продолжительность (дней): {{course.course.duration}} </div>
                            <div class="course-thumb-block-header-info__item">Уроков: {{course.course.lessons.length}}</div>
                        </div>
                    </div>

                    <div class="course-thumb-block__content course-thumb-block-content course-thumb-block-content_padding0">
                        <div class="course-thumb-block-content__title">
                            Уроки курса
                        </div>
                        <div class="course-thumb-block-content__text course-thumb-block-content__text_padding ">
                            <div class="user-course-lessons">

                                <div  @click="changeLesson(key)" class="user-course-lessons__item" v-for="(lesson, key) in course.course.lessons" v-bind:class="{'active': key === active}">
                                    <div v-if="lesson.was" class="user-course-lessons-old">
                                        Прошел
                                    </div>
                                    <div v-if="lesson.now" class="user-course-lessons-current">
                                        Сейчас идет
                                    </div>
                                    <div>{{key+1}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="course-theory-practice" v-if="course">

                <div class="course-theory" style="display: none;">

                    <div class="course-theory-header">
                        <div class="course-theory-header__left">Урок №{{active+1}} - Теория</div>
                        <div class="course-theory-header__right">{{moment(activeCourse.date_start.date).format('LL')}} - {{moment(activeCourse.date_end.date).format('LL')}}</div>
                    </div>

                    <div class="course-theory-header2">
                        <div class="course-theory-header2__left">
                            {{activeCourse.title}}
                        </div>
                        <div class="course-theory-header2__right course-theory-header2-right">
                            <div class="course-theory-header2-right__btn">
                                <div class="btn btn-normal btn-type-2">Скачать видео урок (mp4)</div>
                            </div>
                            <div class="course-theory-header2-right__btn">
                                <div class="btn btn-normal btn-type-2">Скачать урок (pdf)</div>
                            </div>
                            <div class="course-theory-header2-right__btn">
                                <div class="btn btn-normal btn-type-2">Скачать задание</div>
                            </div>
                        </div>

                    </div>

                    <div class="course-theory-description">
                        {{activeCourse.description}}
                    </div>

                </div>


                <div class="course-practice" v-if="!activeCourse.was">

                    <div class="course-practice-header">
                        <div class="course-practice-header__left">Урок №2 - Практика</div>
                        <div class="course-practice-header__right">Сдать домашнее задание нужно <b>{{moment(activeCourse.date_end.date).format('LL')}}</b></div>
                    </div>

                    <div class="chat-wrapper">
                        <chat :userid="userid"></chat>
                    </div>


                </div>
            </div>

        </div>


</template>

<script>
    import api from '../../api';
    import _ from 'lodash';

    import moment from 'moment'
    import ru from 'moment/src/locale/ru';

    import FileBtn from '../FileUploadBtn.vue'




    export default {

        props: [
            'userid'
        ],

        components: {
            FileBtn,

        },

        data(){
            return{
                showUpload: true,
                courses: [],
                payed: null,
                active: false
            }
        },

        computed:{
            course(){
                return this.courses[0];
            },
            activeCourse(){
                return this.course.course.lessons[this.active];
            }
        },

        methods: {

            moment: moment,

            changeLesson(key){
                this.active = key;
            },

            fetchCourseInfo(){
                let self = this;
                this.pending = true;
                api({
                    method: 'POST',
                    url: '/user/ajax/course-info',
                })
                    .then(( res )=>{
                        this.courses = res.data;
                        this.active = 0;
                        _.each(res.data[0].course.lessons, function(e, key){
                            if( e.now )  self.active = key;
                        });
                    })
                    .catch((res) => {
                        this.payed = false;
                    });

            },


            fileUploaded(s){
                this.showUpload = false;
                console.log( s );
            }

        },

        mounted(){
            this.fetchCourseInfo()
        }
    }
</script>
