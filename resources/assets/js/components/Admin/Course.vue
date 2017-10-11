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

            <div>
                <input type="date" v-model="lesson.date_start">
                <input type="date" v-model="lesson.date_end">
            </div>

            <md-switch v-model="lesson.active" id="active">Активность</md-switch>


            <md-button @click="$router.go(-1)">Назад</md-button>
            <md-button @click="submit" class="md-raised md-primary">Сохранить</md-button>

        </form>
    </div>
</template>

<script>
    import api from '../../api';
    import _ from 'lodash';
    import adminAPI from '../../admin-api';
    import moment from 'moment'


    export default {

        data(){
            return {
                lesson: false,
            }
        },

        computed:{

        },

        methods: {

            submit(){
                api({
                    method: adminAPI.courseUpdate.type,
                    url: adminAPI.courseUpdate.link + this.$route.params.id,
                    data: this.lesson
                })
                    .then(( res )=>{
                        this.$router.go(-1)
                    })
                    .catch((res) => {});
            }

        },
        mounted(){
            api({
                method: adminAPI.courseShow.type,
                url: adminAPI.courseShow.link + this.$route.params.id
            })
                .then(( res )=>{
                    this.lesson = res.data;
                    this.lesson.date_start = moment(this.lesson.date_start).format('YYYY-MM-DD');
                    this.lesson.date_end = moment(this.lesson.date_end).format('YYYY-MM-DD');
                })
                .catch((res) => {});
        }
    }
</script>
