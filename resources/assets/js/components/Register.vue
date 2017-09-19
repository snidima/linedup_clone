<template>
    <form @submit.prevent="submit">
        <input placeholder="name"  v-model="inputs.name">
        <input placeholder="email"  v-model="inputs.email">
        <input type="password" placeholder="pass" v-model="inputs.password">
        <input type="password" placeholder="pass" v-model="inputs.password_confirm">
        <input type="submit" value="save">
    </form>
</template>

<script>
    import api from '../api';



    export default {

        data(){
            return{
                inputs: {
                    email: '',
                    password: '',
                    password_confirm: '',
                    name: '',
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

        mounted() {
            console.log('Component mounted.')
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
