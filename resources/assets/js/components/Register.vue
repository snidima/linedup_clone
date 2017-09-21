<template>
    <form @submit.prevent="submit">
        <input placeholder="name"  v-model="inputs.name" value="name">
        <input placeholder="email"  v-model="inputs.email" value="snidima@mail.ru">
        <input type="password" placeholder="pass" v-model="inputs.password" value="123">
        <input type="password" placeholder="pass" v-model="inputs.password_confirm" value="123">
        <input type="submit" value="save">
    </form>
</template>

<script>
    import api from '../api';



    export default {

        data(){
            return{
                inputs: {
                    email: 'snidima@mail.ru',
                    password: '123',
                    password_confirm: '123',
                    name: 'snidima',
                }
            }
        },

        computed:{
            inputs(){
                return {
                    email: this.inputs.email,
                    password: this.inputs.password,
                    password_confirm: this.inputs.password_confirm,
                    name: this.inputs.name,
                }
            }
        },



        methods: {
            submit(){

                api({
                    method: 'post',
                    url: '/register',
                    data: this.inputs
                })
                    .then(( r )=>{
                        console.log( r.data );
                    });

            }

        }
    }
</script>
