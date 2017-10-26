<template>
    <div class="buy-course" v-if="load">
        <div class="buy-course-devider"></div>
        <div class="buy-course-wrapper">
            <div class="buy-course-top">
                <div class="buy-course-title">
                    Шаг <span class="active">{{step}}</span> из 2 - {{stepDesc[step]}}
                </div>

                <div class="buy-course-reg-method-btn" v-if="step === 1">
                    <span v-bind:class="{ 'active': regMethod === 'reg' }" @click="regMethodHandler('reg')"><i class="fa fa-unlock" ></i> Регистрация</span>
                    <div class="devider">/</div>
                    <span v-bind:class="{ 'active': regMethod === 'login' }" @click="regMethodHandler('login')"><i class="fa fa-sign-in"></i> Войти</span>
                </div>
                <div class="buy-course-reg-method-btn" v-if="step === 2">
                    <span class="active"><i class="fa fa-money" aria-hidden="true"></i> Способ оплаты</span>
                </div>

            </div>

            <div v-if="step === 1">
                <register @onLoginSuccess="onLoginSuccess" theme="white" v-if="regMethod === 'reg'"></register>
                <login @onLoginSuccess="onLoginSuccess" theme="white" v-if="regMethod === 'login'"></login>
            </div>

            <div v-if="step === 2">
                <payment></payment>
            </div>

        </div>
    </div>
</template>

<script>
    import api from '../../api';
    import _ from 'lodash';

    export default {

        data(){
            return {
                load: false,
                regMethod: 'reg',
                user: null,
                stepDesc:{
                    1: 'Подтвердите акканут',
                    2: 'Оплата',
                }
            }
        },

        computed:{
            step(){
                return ( this.user ) ? 2 : 1;
            }
        },



        methods: {
            regMethodHandler( m ){
                this.regMethod = m;
            },

            onLoginSuccess( data ){
                console.log( data );
                this.userCheck();
            },

            userCheck(){
                api({
                    method: 'get',
                    url: '/ajax/user-check'
                })
                    .then(( res )=>{
                        this.user = res.data;
                        this.load = true;
                    })
                    .catch((res) => {
                        this.load = true;
                    });
            }

        },
        mounted(){
            this.userCheck();
        }
    }
</script>
