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
                <datepicker placeholder="Период" :options="calendarOption" v-if="lesson"></datepicker>
            </div>

            <md-input-container>
                <label>Активность</label>
                <md-input v-model="lesson.active"></md-input>
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

    import { ru } from 'flatpickr/dist/l10n/ru';

    export default {

        data(){
            return {
                lesson: false,
                calendarOption: {
                    locale: ru,
                    altInput: true,
                    altFormat: 'F j, Y',
                    mode: "range",
                    onClose: this.onChangeDate,
                },
            }
        },

        computed:{

        },

        methods: {
            onChangeDate(e,q,w){
                this.lesson.date_start = e[0].toDateString();
                this.lesson.date_end = e[1].toDateString();
            },
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
                    this.calendarOption.defaultDate=[
                        res.data.date_start,
                        res.data.date_end
                    ];
                })
                .catch((res) => {});
        }
    }
</script>
