<template>
    <div v-bind:class="{ 'pending': pending}" class="block-with-pending">



        <div v-if="!fetched">

            <div v-if="!file">
                <input type="file" style="display: none" id="homework-upload"  @change="change">
                <label class="course-homework-file" for="homework-upload">
                    <div class="course-homework-file__icon">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 50 64" style="enable-background:new 0 0 50 64;" xml:space="preserve">
                            <path id="Plus-file" d="M26,28c0-0.5-0.4-1-1-1c-0.5,0-1,0.4-1,1v9h-9c-0.5,0-1,0.4-1,1c0,0.5,0.4,1,1,1h9v9c0,0.5,0.4,1,1,1
                            c0.5,0,1-0.4,1-1v-9h9c0.5,0,1-0.4,1-1c0-0.5-0.4-1-1-1h-9V28z M49.6,15.8L34.1,0.3C33.9,0.1,33.7,0,33.4,0L3.1,0C1.4,0,0,1.3,0,3
                            v57.9c0,0.8,0.4,1.6,1,2.2C1.6,63.7,2.5,64,3.3,64h43.6c0.8,0,1.6-0.3,2.2-0.9c0.6-0.6,0.9-1.3,0.9-2.1V16.5
                            C50,16.2,49.8,16,49.6,15.8z M33.1,2.1L47,16H33C33.1,7.7,33.1,3.9,33.1,2.1z M48,61c0,0.3-0.2,0.5-0.3,0.7
                            c-0.2,0.2-0.5,0.3-0.7,0.3H3.3c-0.3,0-0.7-0.1-0.9-0.3C2.2,61.5,2,61.2,2,60.9V3c0-0.5,0.5-1,1.1-1l28,0c0,2.5,0,10.1,0,15
                            c0,0.3,0.1,0.5,0.3,0.7c0.2,0.2,0.5,0.3,0.7,0.3h16V61z"/>
                        </svg>
                    </div>
                    <div class="course-homework-file__text">
                        Загрузить файл
                    </div>
                </label>
            </div>
            <div v-if="file">
                <div class="homework-files">
                    {{ file.name }}
                </div>

                <div style="margin-top: 10px; text-align: right">
                    <div class="btn btn-small btn-type-2" style="margin-right: 5px" @click="upload">Сохранить</div>
                    <div class="btn btn-small btn-type-2" @click="onDeleteAll">Отмена</div>
                </div>
            </div>
            <div class="pending-block pending-block_small" v-if="pending">
                <div class="cssload-speeding-wheel"></div>
            </div>

        </div>

        <div v-if="fetched">
            <div class="homework-files">
                <div class="homework-files-item">
                    <div class="homework-files-item__name">{{ fetchedFile.origin_name }}</div>
                    <div class="homework-files-item__action" @click="deleteHomework">X</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import api from '../api';

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
            }
        },

        computed:{

        },

        methods: {

            onDeleteAll(){
                this.file = null;
            },

            change( e ){
                this.file = e.target.files[0];
            },


            upload(){

                let self = this;
                this.pending = true;

                let data = new FormData();

                //отправляем  масситв файлов
                data.append(`homeworkFile`, this.file);
                data.append(`courseID`, this.courseid);
                data.append(`lessonID`, this.lessonid);

                let config = {
                    onUploadProgress: function(progressEvent) {
                        self.progress =  Math.round( (progressEvent.loaded * 100) / progressEvent.total )
                    }
                };

                api.post('/user/ajax/homeworks-upload', data, config)
                    .then( res => {
                        this.pending = false;
                        this.fetchedFile = res.data.file;
                        this.fetched = true;
                    });

            },


            fetchHomeWork(){
                api.post('/user/ajax/homeworks-download', {
                    courseID: this.courseid,
                    lessonID: this.lessonid,
                })
                    .then( res => {
                        this.fetched = true;
                        this.fetchedFile = res.data;

                    })
                    .catch (()=>{
                        this.fetched = false;
                        this.fetchedFile = false;
                    })
            },

            deleteHomework(){
                api.post('/user/ajax/homeworks-delete', {
                    id: this.fetchedFile.id
                })
                    .then( res => {
                        this.fetched = false;
                        this.fetchedFile = false;
                        this.file = false;
                    })
                    .catch (()=>{
                    })
            }

        },

        mounted(){
            this.fetchHomeWork()
        }


    }
</script>
