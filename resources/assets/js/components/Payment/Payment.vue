<template>
    <div>

        <div class="payment-methods">
            <div class="payment-methods__item payment-methods-item" v-for="(pay, key) in paymethods">
                <div class="payment-methods-item-wrapper-select" v-bind:class="{ 'active': paymethodsActive == key }" @click="methodClick(key)">
                    <div class="payment-methods-item__image">
                        <img v-bind:src="pay.img">
                    </div>
                    <div class="payment-methods-item__title">
                        {{pay.title}}
                    </div>
                </div>
            </div>
        </div>

        <div class="payment-buy-wrapper">
            <form class="payment-promo form" v-on:submit.prevent="onPromoSubmit" v-bind:class="{ 'pending': promoPending, 'promo-active' : !priceAfterPromo}">
                <input type="text" placeholder="Промо-код" class="gray payment-promo__input" v-model="promoCode">
                <input type="submit" class="btn btn-type-1 btn-normal" value="Ок">
                <div class="pending-block" v-if="promoPending">
                    <div class="cssload-speeding-wheel"></div>
                </div>
            </form>
            <div class="payment-btn">
                <div class="payment-btn__summ">
                    К оплате <b>{{priceM}}</b> руб.
                </div>
                <div class="payment-btn__btn">
                    <button class="btn btn-normal btn-type-1" @click="submit()"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Оплатить курс</button>
                </div>
            </div>
        </div>



        <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml" id="pay-form" style="display: none">
            <input type="hidden" name="receiver" value="410012589431126">
            <input type="hidden" name="formcomment" value="Школа видеомонтажа LINEDUP">
            <input type="hidden" name="short-dest" value="Школа видеомонтажа LINEDUP">
            <input type="hidden" name="label" v-model="orderId">
            <input type="hidden" name="quickpay-form" value="shop">
            <input type="hidden" name="targets" value="транзакция {order_id}">
            <input type="hidden" name="sum"  data-type="number" v-model="priceM">
            <input type="hidden" name="comment" value="Оплата курса 'Основы Adobe After Effect'">
            <input type="hidden" name="need-fio" value="false">
            <input type="hidden" name="need-email" value="false">
            <input type="hidden" name="need-phone" value="false">
            <input type="hidden" name="need-address" value="false">
            <input type="hidden" name="paymentType"  v-model="paymethods[paymethodsActive].value">
        </form>


    </div>
</template>

<script>
    import api from '../../api';
    import _ from 'lodash';
    import '../../../svg/if_maestro_213735.svg'
    import '../../../svg/if_mastercard_213734.svg'
    import '../../../svg/if_visa_213724.svg'
    import '../../../svg/if_yandex_213718.svg'




    export default {

        props: ['price', 'user', 'course'],
        data(){
            return {
                promoPending: false,
                promoCode: '',
                priceAfterPromo: false,

                orderId: false,

                paymethods: [
                    {
                        title: 'Yandex.Деньги',
                        img: '/fonts/if_yandex_213718.svg',
                        value: 'PC',
                    },
                    {
                        title: 'Банковская карта "Visa"',
                        img: '/fonts/if_visa_213724.svg',
                        value: 'AC',
                    },
                    {
                        title: 'Банковская карта "Master Card"',
                        img: '/fonts/if_mastercard_213734.svg',
                        value: 'AC',
                    },
                    {
                        title: 'Банковская карта "Maestro"',
                        img: '/fonts/if_maestro_213735.svg',
                        value: 'MC',
                    }
                ],
                paymethodsActive: 1
            }
        },

        computed:{
            priceM(){
                return ( this.priceAfterPromo ) ? this.priceAfterPromo : this.price
            },
            label(){
                return this.orderId
            }
        },



        methods: {
            orderCreate(){

                api({
                    method: 'post',
                    url: '/ajax/order-create',
                    data: {
                        promoCode: this.promoCode,
                        user: this.user,
                        course: this.course,
                    }
                })
                    .then(( res )=>{
                        this.orderId = res.data;
                        alert( this.orderId );
                        $('#pay-form').submit();
                    })
                    .catch((res) => {
                        console.log( res.data );
                    });

            },
            onPromoSubmit(){
                this.promoPending = true;
                api({
                    method: 'post',
                    url: '/ajax/promo-code-check',
                    data: {code: this.promoCode}
                })
                    .then(( res )=>{
                        this.promoPending = false;
                        this.priceAfterPromo = res.data;
                    })
                    .catch((res) => {
                        this.promoPending = false;
                    });
            },
            methodClick( key ){
                this.paymethodsActive = key;
            },

            submit(){
                this.orderCreate();
                return false;
            }

        },
        mounted(){

        }
    }
</script>
