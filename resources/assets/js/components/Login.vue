<template>
    <form @submit.prevent="submit" class="form form_login">
        <div class="form__title">Войти</div>
        <div class="form__table form-table">
            <div class="form-table__row">
                <div class="form-table__col form-table__col_label">
                    <label for="email">Email:</label>
                </div>
                <div class="form-table__col form-table__col_input">
                    <input type="text" id="email" placeholder="Email..">
                    <div class="error-text">Плохой емайл</div>
                </div>
            </div>
            <div class="form-table__row">
                <div class="form-table__col form-table__col_label">
                    <label for="password">Пароль:</label>
                </div>
                <div class="form-table__col form-table__col_input">
                    <input type="password" id="password" placeholder="Пароль..">
                </div>
            </div>
            <div class="form-table__row">
                <div class="form-table__col_label"></div>
                <div class="form-table__col_input">
                    <div class="form-submit-block">
                        <div class="form-submit-block__item">
                            <input type="checkbox" id="remember">
                            <label for="remember">Оставаться в системе</label>
                        </div>
                        <div class="form-submit-block__item">
                            <button class="btn btn-normal btn-type-1"><i class="fa fa-sign-in" aria-hidden="true"></i>Войти</button>
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

    export default {

        data(){
            return{

            }
        },

        computed:{
            inputs(){
                return {}
            }
        },



        methods: {
            submit(){}
        }
    }
</script>
