<template>

    <div>
        <div class="course-info">

            <div class="course-info__field course-info-field">
                <div class="course-info-field__title">Дата начала:</div>
                <div class="course-info-field__value">
                    {{moment(course.date_start).format('LL')}}
                </div>
            </div>
            <div class="course-info__field course-info-field">
                <div class="course-info-field__title">Дата конца:</div>
                <div class="course-info-field__value">
                    {{moment(course.date_end).format('LL')}}
                </div>
            </div>

            <div class="course-info__field course-info-field">
                <div class="course-info-field__title">Длительность:</div>
                <div class="course-info-field__value">
                    {{moment(course.date_end).diff(course.date_start, 'days')}} дней
                </div>
            </div>


            <div class="course-info__field course-info-field">
                <div class="course-info-field__title">Состояние курса:</div>
                <div class="course-info-field__value">
                    <div class="course-info-graph">
                        <div class="course-info-graph__complete" v-bind:style="{ width: datepercent + '%'}">
                            <div class="course-info-graph-complete__text">{{datepercent}}%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-info__field course-info-field">
                <div class="course-info-field__title">Завершено домашних заданий:</div>
                <div class="course-info-field__value">
                    <div class="course-info-graph">
                        <div class="course-info-graph__complete" style="width: 20%">
                            <div class="course-info-graph-complete__text course-info-graph-complete__text_right0">20 из 100</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lessons">
            <div class="lessons__item lesson" v-for="(lesson, key) in course.lessons" v-bind:class="{'lesson_disabled': !active( lesson )}">
                <div class="lesson__title-num">Урок №{{ key+1 }}</div>
                <div class="lesson__date">{{moment(lesson.pivot.date_start).format('LL')}} - {{moment(lesson.pivot.date_end).format('LL')}}</div>
                <div class="lesson__title">{{lesson.title}}</div>
                <div class="lesson__homework lesson-homework">

                        <FileBtn @uploaded="fileUploaded" v-bind:lesson="lesson"  v-bind:name="'file-'+lesson.id"></FileBtn>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import api from '../../api';
    import _ from 'lodash';

//    import moment from 'moment'
//    import ru from 'moment/src/locale/ru';

    import FileBtn from '../FileUploadBtn.vue'



    moment.locale('ru');

    export default {

        components: {
            FileBtn
        },

        data(){
            return{
                course: {}
            }
        },

        computed:{
            datepercent(){
                let now = moment().valueOf();
                let start = moment(this.course.date_start).valueOf();
                let end = moment(this.course.date_end).valueOf();
                return Math.round(((now - start) / (end - start)) * 100);
            }
        },

        methods: {

            moment: moment,

            active( lesson ){
                let start = lesson.pivot.date_start;
                let end = lesson.pivot.date_end;
                return moment().isBetween(start, end, 'days', '[]') ;
            },

            fileUploaded( id, lesson ){
                console.log( id, lesson );
            },

            fetchAll(){

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
            this.fetchAll()
        }
    }
</script>
