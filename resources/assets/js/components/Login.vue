<template>
    <form @submit.prevent="submit" class="form form_login">
        <div class="form__title">Войти</div>
        <div class="commonError" v-if="commonError">{{commonError}}</div>
        <div class="form__table form-table">
            <div class="form-table__row">
                <div class="form-table__col form-table__col_label">
                    <label for="email">Email:</label>
                </div>
                <div class="form-table__col form-table__col_input" v-bind:class="{ 'input-error': showErrorClass.email }">
                    <input type="text" id="email" placeholder="Email.." v-model="rawInputs.email.value">
                    <div class="error-text" v-if="showErrorClass">{{rawInputs.email.error}}</div>
                </div>
            </div>
            <div class="form-table__row">
                <div class="form-table__col form-table__col_label">
                    <label for="password">Пароль:</label>
                </div>
                <div class="form-table__col form-table__col_input" v-bind:class="{ 'input-error': showErrorClass.password }">
                    <input type="password" id="password" placeholder="Пароль.." v-model="rawInputs.password.value">
                    <div class="error-text" v-if="showErrorClass.password">{{rawInputs.password.error}}</div>
                </div>
            </div>
            <div class="form-table__row">
                <div class="form-table__col_label"></div>
                <div class="form-table__col_input">
                    <div class="form-submit-block">
                        <div class="form-submit-block__item">
                            <input type="checkbox" id="remember" v-model="rawInputs.remember.value">
                            <label for="remember">Оставаться в системе</label>
                        </div>
                        <div class="form-submit-block__item">
                            <button class="btn btn-normal btn-type-1"><i class="fa fa-sign-in"></i>Войти</button>
                        </div>
                    </div>
                    <div class="form-under-submit-block">
                        <div class="form-under-submit-block__item"><a href="#">Регистрация</a></div>
                        <div class="form-under-submit-block__item"><a href="#">Забыли пароль?</a></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import api from '../api';
    import _ from 'lodash';

    export default {

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
                    remember: {
                        error: false,
                        value: false
                    },
                },
                lastErrorValues: {
                    email:    [],
                    password: [],
                    remember: [],
                },
                commonError: false
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
                    remember: _.includes(this.lastErrorValues.remember, this.rawInputs.remember.value) && this.rawInputs.remember.error,
                }
            }
        },



        methods: {

            submit(){
                api({
                    method: 'post',
                    url: '/login',
                    data: this.inputs
                })
                    .then(( r )=>{
                       alert('ok');
                    })
                    .catch((res) => {
                        let self = this;

                        if( res.response.data.commonError ){
                            this.commonError = res.response.data.commonError;
                            return;
                        }
                        this.commonError = false;
                        _.forEach(this.rawInputs, function(el, key){
                            console.log(key);
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
