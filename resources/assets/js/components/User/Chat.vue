<template>
    <div class="chat">
        <div class="chat__body">

            <div class="chat-line chat-line_from-me">
                <div class="chat-line-talk">
                    <div class="chat-line-talk__message">
                        Flush to the bottom right. Uses .btm-right only
                    </div>
                    <div class="chat-line-talk__author">
                        Вы
                    </div>
                </div>
            </div>

            <div class="chat-line chat-line_to-me new">
                <div class="chat-line-talk">
                    <div class="chat-line-talk__message">
                        Flush to the bottom right. Uses .btm-right only
                    </div>
                    <div class="chat-line-talk__author">
                        Куратор
                    </div>
                </div>
            </div>


        </div>
        <div class="chat__bottom chat-bottom">
            <div class="chat-input" contenteditable="true" aria-multiline="true"></div>
            <div class="chat-icon">
                <i class="fa fa-paperclip" aria-hidden="true"></i>
            </div>
            <div class="chat-icon">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
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


        components: {
            rows(){
                return 2
            }
        },


        data(){
            return{
                message: ''
            }
        },

        computed:{

        },

        methods: {

            moment: moment,






        },

        mounted(){

        }
    }
</script>
