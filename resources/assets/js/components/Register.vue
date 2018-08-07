<template>
    <form @submit.prevent="submit" class="form form_login" v-bind:class="{ 'pending': pending, 'form_login_white': theme == 'white' }">

        <div class="form__title" v-if="theme != 'white'">Регистрация</div>

        <div class="form__common-error" v-if="commonError">{{commonError}}</div>
        <div class="form__table form-table">
            <div class="form-table__row">
                <div class="form-table__col form-table__col_label">
                    <label for="name" class="required">Имя:</label>
                </div>
                <div class="form-table__col form-table__col_input" v-bind:class="{ 'input-error': showErrorClass.name }">
                    <input type="text" id="name" placeholder="Имя.." v-model="rawInputs.name.value">
                    <div class="error-text" v-if="showErrorClass">{{rawInputs.name.error}}</div>
                </div>
            </div>
            <div class="form-table__row">
                <div class="form-table__col form-table__col_label">
                    <label for="email" class="required">Email:</label>
                </div>
                <div class="form-table__col form-table__col_input" v-bind:class="{ 'input-error': showErrorClass.email }">
                    <input type="text" id="email" placeholder="Email.." v-model="rawInputs.email.value">
                    <div class="error-text" v-if="showErrorClass">{{rawInputs.email.error}}</div>
                </div>
            </div>
            <div class="form-table__row">
                <div class="form-table__col form-table__col_label">
                    <label for="password" class="required">Пароль:</label>
                </div>
                <div class="form-table__col form-table__col_input" v-bind:class="{ 'input-error': showErrorClass.password }">
                    <input type="password" id="password" placeholder="Пароль.." v-model="rawInputs.password.value">
                    <div class="error-text" v-if="showErrorClass.password">{{rawInputs.password.error}}</div>
                </div>
            </div>
            <div class="form-table__row">
                <div class="form-table__col_label"></div>
                <div class="form-table__col_input">
                    <div class="form-submit-block form-submit-block_right">
                        <div class="form-submit-block__item">
                            <button class="btn btn-normal btn-type-1"><i class="fa fa-unlock" ></i>Зарегистрироваться</button>
                        </div>
                    </div>
                    <div class="form-under-submit-block agree-text">
                        Нажимая кнопку «Зарегистрироваться», вы принимаете условия <a href="#">Пользовательского соглашения</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pending-block" v-if="pending">
            <div class="cssload-speeding-wheel"></div>
        </div>
    </form>



</template>

<script>
    import api from '../api';
    import _ from 'lodash';
    import alertify from 'alertify.js'

    export default {

        props: ['theme'],

        data(){
            return{
                rawInputs:{
                    email: {
                        error: false,
                        value: ''
                    },
                    password: {
                        error: false,
                        value: ''
                    },
                    name: {
                        error: false,
                        value: ''
                    },
                },
                lastErrorValues: {
                    email:    [],
                    password: [],
                    name: [],
                },
                commonError: false,
                pending: false
            }
        },

        computed:{
            inputs(){
                return _.mapValues(this.rawInputs, (o) => o.value);
            },

            showErrorClass(){
                return {
                    email: _.includes(this.lastErrorValues.email, this.rawInputs.email.value) && this.rawInputs.email.error,
                    password: _.includes(this.lastErrorValues.password, this.rawInputs.password.value) && this.rawInputs.password.error,
                    name: _.includes(this.lastErrorValues.name, this.rawInputs.name.value) && this.rawInputs.name.error,
                }
            }
        },



        methods: {

            fromPaymentSubmit( data ){
//                this.$emit( 'onRegisterSuccess', data )
            },

            submit(){
                this.pending = true;
                api({
                    method: 'post',
                    url: '/register',
                    data: this.inputs
                })
                    .then(( res )=>{

                        this.pending = false;

                        if( this.theme === 'white' ){
                            this.$emit( 'onRegisterSuccess')
                            return;
                        }

                        alertify
                            .okBtn("Проверить email и войти")
                            .alert('<b>Регистрация завершена.</b> На ваш email отправлено письмо с инструкциями для активации аккаунта.',()=>window.location.replace(res.data.redirect));
                    })
                    .catch((res) => {

                        this.pending = false;
                        let self = this;
                        if( res.response.data.commonError ){
                            this.commonError = res.response.data.commonError;
                            return;
                        }
                        this.commonError = false;
                        _.forEach(this.rawInputs, function(el, key){
                            if( res.response.data.errors[key] ){
                                el.error = res.response.data.errors[key][0];
                                if( !_.includes(self.lastErrorValues[key], self.rawInputs[key].value) ) self.lastErrorValues[key].push(self.rawInputs[key].value);
//
                            } else {
                                el.error = false;
                            }
                        });

                    });
            },
        }
    }
</script>
