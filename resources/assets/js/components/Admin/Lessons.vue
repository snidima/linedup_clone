<template>
    <md-tabs>
        <md-tab id="movies" md-label="Уроки">


            <div class="container">
                <md-card class="admin-card">
                    <md-card-header>
                        <md-card-header-text>
                            <div class="md-title">Введение в Adobe After Effects</div>
                            <div class="md-subhead">активен</div>
                        </md-card-header-text>

                        <md-menu md-size="4" md-direction="bottom left">
                            <md-button class="md-icon-button" md-menu-trigger>
                                <md-icon>more_vert</md-icon>
                            </md-button>

                            <md-menu-content>
                                <md-menu-item>
                                    <span  v-on:click="test">Call</span>
                                    <md-icon>phone</md-icon>
                                </md-menu-item>

                                <md-menu-item>
                                    <span>Send a message</span>
                                    <md-icon>message</md-icon>
                                </md-menu-item>
                            </md-menu-content>
                        </md-menu>
                    </md-card-header>

                    <md-card-media>
                        <img src="https://spb.dantk.ru/media/uploads/1dajvingmaldives.jpg" alt="People">
                    </md-card-media>

                    <md-card-content>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio itaque ea, nostrum odio. Dolores, sed accusantium quasi non, voluptas eius illo quas, saepe voluptate pariatur in deleniti minus sint. Excepturi.
                    </md-card-content>
                </md-card>
            </div>





        </md-tab>
    </md-tabs>
</template>

<script>
    import api from '../../api';
    import _ from 'lodash';

    export default {

        data(){
            return{
            }
        },

        computed:{
        },

        methods: {
            test(){
                api({
                    method: 'post',
                    url: '/admin/lessons',
                    data: this.inputs
                })
                    .then(( res )=>{
                        console.log(res);
                    })
                    .catch((res) => {});
            }
        }
    }
</script>
