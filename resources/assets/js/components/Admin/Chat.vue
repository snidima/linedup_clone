<template>
    <div class="chat">
        <div class="chat__body" id="chat-messages">
            <div class="chat-line" v-for="(message, key) in messages" v-bind:class="{'chat-line_from-me': (message.from == userid),'chat-line_to-me': (message.from != userid) }">
                <div class="chat-line-talk">
                    <div class="chat-line-talk__message" v-html="messageF(message).message"></div>
                    <div class="chat-line-talk__author">
                        {{messageF(message).label}}
                    </div>
                </div>
            </div>

            <!--<div class="chat-line chat-line_to-me new">-->
            <!--<div class="chat-line-talk">-->
            <!--<div class="chat-line-talk__message">-->
            <!--Flush to the bottom right. Uses .btm-right only-->
            <!--</div>-->
            <!--<div class="chat-line-talk__author">-->
            <!--Куратор-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->


        </div>
        <div class="chat__bottom chat-bottom">
            <div class="chat-input" contenteditable="true" aria-multiline="true" @input="trigger" id="current-input"></div>
            <div class="chat-icon">
                <i class="fa fa-paperclip" aria-hidden="true"></i>
            </div>
            <div class="chat-icon" @click="sendMessage">
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

    import Pusher from 'pusher-js';
    import Echo from "laravel-echo"




    export default {




        data(){
            return{
                userid: 5,
                messages: []
            }
        },

        computed:{

        },

        methods: {

            moment: moment,

            messageF( message ){
                return Object.assign(message, {
                    label: ( message.from == this.userid ) ? 'Вы' : 'Куратор' ,
                    message: message.message.replace(/\n/g, "<br>")
                });
            },

            trigger(e){

            },

            sendMessage(){
                let el = document.getElementById("current-input");

                let message = el.innerText;

                if( !message ) return;
                el.innerHTML = '';

                this.messages.push({
                    from: this.userid,
                    chanel: 1,
                    message: message
                });

                this.scrollToBottom();

                api({
                    method: 'POST',
                    url: '/chat/send-message',
                    data: {
                        message: message
                    }
                })
                    .then(( res )=>{
                        console.log( res.data );
                    })
                    .catch((res) => {
                        console.log( res );
                    });

            },

            getMessages(){
                api({
                    method: 'POST',
                    url: '/chat/get-message'
                })
                    .then(( res )=>{
                        this.messages = res.data;
                        this.scrollToBottom();
                    })
                    .catch((res) => {

                    });
            },

            listenChanel(){
                let echo = new Echo({
                    broadcaster: 'pusher',
                    key: '5d4e984fb91da94cfc38',
                    cluster: 'eu',
                    encrypted: true
                });
                echo.channel('private-chat.' + 1)
                    .listen("ChatEvent", (e) => {
                        if( e.from == this.userid ) return;
                        this.messages.push( e );
                        this.scrollToBottom();
                    });
            },

            scrollToBottom(){
                setTimeout(function(){
                    let el = document.getElementById("chat-messages");
                    console.log( el.scrollHeight );
                    el.scrollTop = el.scrollHeight;

                }, 10);
            }




        },

        mounted(){
            this.listenChanel();
            this.getMessages();
        }
    }
</script>
