<template>
    <div v-if="billings">

        <div class="course-buy-thumb-block-content__title" style="margin-top: 30px">
            История платежей
        </div>
        <div class="buy-history">
            <div class="buy-history__item buy-history-item" v-for="(billing, key) in billings">
                <div class="buy-history-item__date">{{billing.created_at}}</div>
                <div class="buy-history-item__amount">{{billing.amount}} руб.</div>
                <div class="buy-history-item__promo"  v-if="billing.promo">+{{billing.sale.value}}%</div>
                <div class="buy-history-item__promo"  v-if="!billing.promo">Без промокода</div>
            </div>
        </div>
    </div>
</template>

<script>
    import api from '../../api';




    export default {

        props: ['course'],

        data(){
            return {
                billings: false,
            }
        },

        computed:{

        },



        methods: {

            init(){
                api({
                    method: 'post',
                    url: '/user/ajax/billing-history',
                    data: {
                        course : this.course
                    }
                })
                    .then(( res )=>{
                        this.billings = res.data
                        this.$emit( 'onHalfpay', true )
                    })
                    .catch((res) => {
                        this.billings = false
                    });
            }

        },
        mounted(){
            this.init()
        }
    }
</script>