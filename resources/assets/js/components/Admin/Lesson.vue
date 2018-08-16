<template>



    <div class="container-mini">

        <form novalidate >
            <md-input-container>
                <label>Название</label>
                <md-input v-model="lesson.title"></md-input>
            </md-input-container>


            <label>Описание</label>
            <froala :tag="'textarea'"  v-model="lesson.description"></froala>
    <br><br>
            <label>Краткое описание</label>
            <froala :tag="'textarea'"  v-model="lesson.short_description"></froala>

            <md-input-container>
                <label>Ссылка на youtube</label>
                <md-input v-model="lesson.online_player"></md-input>
            </md-input-container>
            <md-input-container>
                <label>Ссылка на скачивание</label>
                <md-input v-model="lesson.download_link"></md-input>
            </md-input-container>
            <md-switch v-model="lesson.active" >Активность</md-switch>
            <md-input-container>
                <label>Продолжительость</label>
                <md-input type="number" v-model="lesson.duration"></md-input>
            </md-input-container>
            <md-input-container>
                <label>Сложность</label>
                <md-input type="number" v-model="lesson.complexity"></md-input>
            </md-input-container>

            <md-input-container>
                <label>Ссылка на домашнее задание</label>
                <md-input v-model="lesson.homework_link"></md-input>
            </md-input-container>

            <md-button @click="$router.go(-1)">Назад</md-button>
            <md-button @click="submit" class="md-raised md-primary">Сохранить</md-button>

        </form>
    </div>
</template>

<script>
    import api from '../../api';
    import _ from 'lodash';
    import adminAPI from '../../admin-api';

    export default {

        data(){
            return {
                lesson: {}
            }
        },

        computed:{
        },

        methods: {
            submit(){
                api({
                    method: adminAPI.lessonUpdate.type,
                    url: adminAPI.lessonUpdate.link + this.$route.params.id,
                    data: this.lesson
                })
                    .then(( res )=>{
                        this.$router.go(-1)
                    })
                    .catch((res) => {});
            }

        },
        created(){
            api({
                method: adminAPI.lessonShow.type,
                url: adminAPI.lessonShow.link + this.$route.params.id
            })
                .then(( res )=>{
                    res.data.active = !!res.data.active
                    this.lesson = res.data;
                })
                .catch((res) => {});
        },

    }
</script>
