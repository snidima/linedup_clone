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

        <div class="payment-btn">
            <div class="payment-btn__summ">
                К оплате <b>{{price}}</b> руб.
            </div>
            <div class="payment-btn__btn">
                <button class="btn btn-normal btn-type-1" @click="submit()"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Оплатить курс</button>
            </div>
        </div>



        <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml" id="pay-form" style="display: none">
            <input type="hidden" name="receiver" value="410012589431126">
            <input type="hidden" name="formcomment" value="Школа видеомонтажа LINEDUP">
            <input type="hidden" name="short-dest" value="Школа видеомонтажа LINEDUP">
            <input type="hidden" name="label" value="123">
            <input type="hidden" name="quickpay-form" value="shop">
            <input type="hidden" name="targets" value="транзакция {order_id}">
            <input type="hidden" name="sum"  data-type="number" v-model="price">
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
    //    import api from '../api';
    import _ from 'lodash';
    import '../../../svg/if_maestro_213735.svg'
    import '../../../svg/if_mastercard_213734.svg'
    import '../../../svg/if_visa_213724.svg'
    import '../../../svg/if_yandex_213718.svg'




    export default {

        props: ['price'],
        data(){
            return {
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

        },



        methods: {
            methodClick( key ){
                this.paymethodsActive = key;
            },

            submit(){
                $('#pay-form').submit();
            }

        },
        mounted(){
            console.log( this.price );
        }
    }
</script>
