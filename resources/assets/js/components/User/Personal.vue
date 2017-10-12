<template>

    <div class="course-info">

        <div class="course-info__field course-info-field">
            <div class="course-info-field__title">Состояние курса:</div>
            <div class="course-info-field__value">
                <div class="course-info-graph">
                    <div class="course-info-graph__complete" v-bind:style="{ width: qwe + '%'}">
                        <div class="course-info-graph-complete__text">{{qwe}}%</div>
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

</template>

<script>
    import api from '../../api';
//    import _ from 'lodash';

    export default {

        data(){
            return{
                qwe: 10
            }
        },

        computed:{
        },

        methods: {

        },

        mounted(){
            alert
        }
    }
</script>
