<template>




        <div class="container" >

            <div v-if="payed === false">

                У вас нет оплаченных курсов

            </div>

            <div class="course-info" v-if="course" >
                <div class="course-thumb-block">
                    <div class="course-thumb-block__header course-thumb-block-header">
                        <div class="course-thumb-block-header__title">{{course.course.title}}</div>
                        <div class="course-thumb-block-header__info course-thumb-block-header-info">
                            <div class="course-thumb-block-header-info__item">
                                Даты проведения:
                                {{moment(course.date_start).format('LL')}}
                                -
                                {{moment(course.course.dateEnd.date).format('LL')}}
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

                                <div class="user-course-lessons__item" v-for="(lesson, key) in course.course.lessons">
                                    <div class="user-course-lessons-old">
                                        {{lessonDate( key )}}
                                    </div>
                                    {{key+1}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="course-theory" v-if="course">

                <div class="course-theory-header">
                    <div class="course-theory-header__left">Урок №2 - Теория</div>
                    <div class="course-theory-header__right">18 октября 2017 г. - 23 октября 2017 г.</div>
                </div>

                <div class="course-theory-header2">
                    <div class="course-theory-header2__left">
                        Знакомство с Adobe After Effect
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
                    Введение в After Effects. Знакомство с AE, его интерфейсом , базовыми инструментами и др. Введение в After Effects.
                    Знакомство с AE, его интерфейсом , базовыми инструментами и др. Введение в After Effects.
                    Знакомство с AE, его интерфейсом , базовыми инструментами и др. Знакомство с AE, его интерфейсом , базовыми инструментами и др.
                </div>

            </div>


            <div class="course-practice" v-if="course">

                <div class="course-practice-header">
                    <div class="course-practice-header__left">Урок №2 - Практика</div>
                    <div class="course-practice-header__right">Сдать домашнее задание нужно <b>до 13 октября 2017г.</b></div>
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


        components: {
            FileBtn
        },


        data(){
            return{
                showUpload: true,
                courses: [],
                payed: null,
            }
        },

        computed:{
            course(){
                return this.courses[0];
            }
        },

        methods: {

            moment: moment,

            lessonDate( key ){
                let lessonsSlice = _.clone( this.course.course.lessons );
                lessonsSlice = _.slice( lessonsSlice, 0, key+1 );
                let days = _.sumBy(lessonsSlice, 'duration');
                let date = this.moment( this.course.date_start ).add(days, 'days');
                return this.moment().isAfter( date );
            },

            fetchCourseInfo(){

                this.pending = true;
                api({
                    method: 'POST',
                    url: '/user/ajax/course-info',
                })
                    .then(( res )=>{
                        this.courses = res.data;
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
