<template>
    <div v-bind:class="{ 'pending': pending}" class="block-with-pending">


        <div class="form-group-line form-group-line_small">
            <label for="youtube-link" class="label">Ссылка на youtube</label>
            <input type="text" id="youtube-link" v-model="youtubeLink">
        </div>

        <div class="form-group-line" style="text-align: right" v-if="isYoutubelink && youtubeLink && youtubeLinkFetched != youtubeLink">
            <div class="btn btn-small btn-type-2" @click="upload">Сохранить</div>
        </div>
        <!--<div v-if="!fetched">-->

            <!--<div v-if="!file">-->
                <!--<input type="file" style="display: none" id="homework-upload"  @change="change">-->
                <!--<label class="course-homework-file" for="homework-upload">-->
                    <!--<div class="course-homework-file__icon">-->
                        <!--<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"-->
                                 <!--viewBox="0 0 50 64" style="enable-background:new 0 0 50 64;" xml:space="preserve">-->
                            <!--<path id="Plus-file" d="M26,28c0-0.5-0.4-1-1-1c-0.5,0-1,0.4-1,1v9h-9c-0.5,0-1,0.4-1,1c0,0.5,0.4,1,1,1h9v9c0,0.5,0.4,1,1,1-->
                            <!--c0.5,0,1-0.4,1-1v-9h9c0.5,0,1-0.4,1-1c0-0.5-0.4-1-1-1h-9V28z M49.6,15.8L34.1,0.3C33.9,0.1,33.7,0,33.4,0L3.1,0C1.4,0,0,1.3,0,3-->
                            <!--v57.9c0,0.8,0.4,1.6,1,2.2C1.6,63.7,2.5,64,3.3,64h43.6c0.8,0,1.6-0.3,2.2-0.9c0.6-0.6,0.9-1.3,0.9-2.1V16.5-->
                            <!--C50,16.2,49.8,16,49.6,15.8z M33.1,2.1L47,16H33C33.1,7.7,33.1,3.9,33.1,2.1z M48,61c0,0.3-0.2,0.5-0.3,0.7-->
                            <!--c-0.2,0.2-0.5,0.3-0.7,0.3H3.3c-0.3,0-0.7-0.1-0.9-0.3C2.2,61.5,2,61.2,2,60.9V3c0-0.5,0.5-1,1.1-1l28,0c0,2.5,0,10.1,0,15-->
                            <!--c0,0.3,0.1,0.5,0.3,0.7c0.2,0.2,0.5,0.3,0.7,0.3h16V61z"/>-->
                        <!--</svg>-->
                    <!--</div>-->
                    <!--<div class="course-homework-file__text">-->
                        <!--Загрузить файл-->
                    <!--</div>-->
                <!--</label>-->
            <!--</div>-->
            <!--<div v-if="file">-->
                <!--<div class="homework-files">-->
                    <!--{{ file.name }}-->
                <!--</div>-->

                <!--<div style="margin-top: 10px; text-align: right">-->
                    <!--<div class="btn btn-small btn-type-2" style="margin-right: 5px" @click="upload">Сохранить</div>-->
                    <!--<div class="btn btn-small btn-type-2 error" @click="onDeleteAll">Отмена</div>-->
                <!--</div>-->
            <!--</div>-->
            <div class="pending-block pending-block_small" v-if="pending">
                <div class="cssload-speeding-wheel"></div>
            </div>

        <!--</div>-->

        <!--<div v-if="fetched">-->
            <!--<div class="homework-files">-->
                <!--<div class="homework-files-item">-->
                    <!--<div class="homework-files-item__name">-->
                        <!--<a :href="downloadLink">{{ fetchedFile.origin_name }}</a>-->
                    <!--</div>-->
                    <!--<div class="homework-files-item__action" @click="deleteHomework">-->
                        <!--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"-->
                             <!--viewBox="0 0 432.6 486.4" style="enable-background:new 0 0 432.6 486.4;" xml:space="preserve">-->
                        <!--<path d="M419.1,70H317.9V53.5c0-29.5-24-53.5-53.5-53.5h-96.2c-29.5,0-53.5,24-53.5,53.5V70H13.5C6,70,0,76,0,83.5S6,97,13.5,97-->
                            <!--h24.4v317.2c0,39.8,32.4,72.2,72.2,72.2h212.4c39.8,0,72.2-32.4,72.2-72.2V97h24.4c7.5,0,13.5-6,13.5-13.5S426.6,70,419.1,70z-->
                             <!--M141.7,53.5c0-14.6,11.9-26.5,26.5-26.5h96.2c14.6,0,26.5,11.9,26.5,26.5V70H141.7V53.5z M367.7,414.2c0,24.9-20.3,45.2-45.2,45.2-->
                            <!--H110.1c-24.9,0-45.2-20.3-45.2-45.2V97h302.9v317.2H367.7z M216.3,411c7.5,0,13.5-6,13.5-13.5V158.9c0-7.5-6-13.5-13.5-13.5-->
                            <!--s-13.5,6-13.5,13.5v238.5C202.8,404.9,208.8,411,216.3,411z M128.2,396.1c7.5,0,13.5-6,13.5-13.5V173.7c0-7.5-6-13.5-13.5-13.5-->
                            <!--c-7.5,0-13.5,6-13.5,13.5v208.9C114.7,390.1,120.8,396.1,128.2,396.1z M304.4,396.1c7.5,0,13.5-6,13.5-13.5V173.7-->
                            <!--c0-7.5-6-13.5-13.5-13.5s-13.5,6-13.5,13.5v208.9C290.9,390.1,296.9,396.1,304.4,396.1z"/>-->
                        <!--</svg>-->

                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        
        
    </div>
</template>

<script>
    import api from '../api';
    import alertify from 'alertify.js';

    export default {
        props:['courseid', 'lessonid'],
        data(){
            return{
                uploadProgress: false,
                file: null,
                pending: false,
                progress: 0,
                fetched: false,
                fetchedFile: false,
                youtubeLink: '',
                youtubeLinkFetched: '',

            }
        },

        computed:{
            downloadLink(){
                return `/user/homework-download/course-${this.courseid}/lesson-${this.lessonid}`;
            },
            isYoutubelink(){
                let regex1 = /^https:\/\/(?:www\.)?youtube.com\/watch\?v=\w+(&\S*)?$/;
                return this.youtubeLink.match( regex1 );
//                return true;
            }
        },

        methods: {

            onDeleteAll(){
                this.file = null;
            },

            change( e ){
                this.file = e.target.files[0];
            },


            upload(){

                this.pending = true;

                api.post('/user/ajax/homeworks-upload', {
                    youtubeLink: this.youtubeLink,
                    courseID: this.courseid,
                    lessonID: this.lessonid,
                })
                    .then( res => {
                        this.pending = false;
                        this.youtubeLinkFetched = res.data.youtube_link;
                        this.fetched = true;
                        alertify.alert('Домашнее задание успешно сохранено!', function () {
                            alertify.success('Домашнее задание успешно сохранено..')
                        })


                    });

//                let data = new FormData();
//
//                //отправляем  масситв файлов
//                data.append(`homeworkFile`, this.file);
//                data.append(`courseID`, this.courseid);
//                data.append(`lessonID`, this.lessonid);
//
//                let config = {
//                    onUploadProgress: function(progressEvent) {
//                        self.progress =  Math.round( (progressEvent.loaded * 100) / progressEvent.total )
//                    }
//                };
//
//                api.post('/user/ajax/homeworks-upload', data, config)
//                    .then( res => {
//                        this.pending = false;
//                        this.fetchedFile = res.data.file;
//                        this.fetched = true;
//
//                        alertify.alert('Домашнее задание успешно загружено', function () {
//                            alertify.success('Домашнее задание успешно загружено')
//                        })
//
//
//                    });

            },


            fetchHomeWork(){
                api.post('/user/ajax/homeworks-download', {
                    courseID: this.courseid,
                    lessonID: this.lessonid,
                })
                    .then( res => {
                        this.fetched = true;
                        this.youtubeLinkFetched = res.data.youtube_link;
                        this.youtubeLink = res.data.youtube_link;

                    })
                    .catch (()=>{
                        this.fetched = false;
                        this.fetchedFile = false;
                    })
            },

            deleteHomework(){
                let self = this;
                alertify.confirm("Удалить домашнее задание?",
                    function(){
                        api.post('/user/ajax/homeworks-delete', {
                            id: self.fetchedFile.id
                        })
                            .then( res => {
                                self.fetched = false;
                                self.fetchedFile = false;
                                self.file = false;
                                alertify.error('Домашнее задание удалено')
                            })
                            .catch (()=>{
                            })

                    },
                    function(){
                    })



            }

        },

        mounted(){
            this.fetchHomeWork()
        }


    }
</script>
