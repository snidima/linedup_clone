<template>



    <div class="container-mini">

        <form novalidate >
            <md-input-container>
                <label>Название</label>
                <md-input v-model="lesson.title"></md-input>
            </md-input-container>
            <md-input-container>
                <label>Описание</label>
                <md-textarea v-model="lesson.description"></md-textarea>
            </md-input-container>
            <md-input-container>
                <label>Ссылка на youtube</label>
                <md-input v-model="lesson.online_player"></md-input>
            </md-input-container>
            <md-input-container>
                <label>Ссылка на скачивание</label>
                <md-input v-model="lesson.download_link"></md-input>
            </md-input-container>
            <md-switch v-model="lesson.active" id="active">Активность</md-switch>
            <md-input-container>
                <label>Продолжительость</label>
                <md-input type="number" v-model="lesson.duration"></md-input>
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
                    method: adminAPI.lessonInsert.type,
                    url: adminAPI.lessonInsert.link,
                    data: this.lesson
                })
                    .then(( res )=>{
                        this.$router.go(-1);
                    })
                    .catch((res) => {});
            }

        },
    }
</script>
