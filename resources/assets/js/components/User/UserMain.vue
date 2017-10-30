<template>


        <div class="container">
            <div class="-info">

                <div class="course-thumb-block">
                    <div class="course-thumb-block__header course-thumb-block-header">
                        <div class="course-thumb-block-header__title">Полный видеокурс Adobe After Effect</div>
                        <div class="course-thumb-block-header__info course-thumb-block-header-info">
                            <div class="course-thumb-block-header-info__item">
                                Даты проведения:
                                1
                                -
                                2
                            </div>
                            <div class="course-thumb-block-header-info__item">Продолжительность (дней): 2 </div>
                            <div class="course-thumb-block-header-info__item">Уроков: 2</div>
                        </div>
                    </div>
                    <div class="course-thumb-block__content course-thumb-block-content course-thumb-block-content_padding0">
                        <div class="course-thumb-block-content__title">
                            Уроки курса
                        </div>
                        <div class="course-thumb-block-content__text course-thumb-block-content__text_padding ">
                            <div class="user-course-lessons">



                                <div class="user-course-lessons__item">
                                    <div class="user-course-lessons-old">
                                        Прошел
                                    </div>
                                    1
                                </div>
                                <div class="user-course-lessons__item active">
                                    <div class="user-course-lessons-old">
                                        Прошел
                                    </div>
                                    2
                                </div>
                                <div class="user-course-lessons__item ">
                                    <div class="user-course-lessons-old">
                                        Прошел
                                    </div>
                                    3
                                </div>
                                <div class="user-course-lessons__item">
                                    <div class="user-course-lessons-old">
                                        Прошел
                                    </div>
                                    4
                                </div>
                                <div class="user-course-lessons__item ">
                                    <div class="user-course-lessons-current">
                                        Сейчас идет
                                    </div>
                                    5
                                </div>
                                <div class="user-course-lessons__item ">
                                    6
                                </div>
                                <div class="user-course-lessons__item ">
                                    7
                                </div>
                                <div class="user-course-lessons__item ">
                                    8
                                </div>
                                <div class="user-course-lessons__item ">
                                    9
                                </div>
                                <div class="user-course-lessons__item ">
                                    10
                                </div>

                            </div>
                        </div>
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







    export default {



        data(){
            return{

            }
        },

        computed:{

        },

        methods: {

            fetchCourseInfo(){

                this.pending = true;
                api({
                    method: 'POST',
                    url: '/user/ajax/course-info',
                })
                    .then(( res )=>{
                        this.course = res.data;
                    })
                    .catch((res) => {

                    });

            }

        },

        mounted(){
            this.fetchCourseInfo()
        }
    }
</script>
