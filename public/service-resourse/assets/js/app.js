
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



//
//
window.Vue = require('vue');
import {ValidationProvider} from 'vee-validate';
import {ValidationObserver} from 'vee-validate';




window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};






class TrekConsole {
    static log() {
        if (window._debug == true) {
            console.log.apply(console, arguments);
        }
    }
}

window.TrekConsole = TrekConsole;
Vue.component('vue-delivery', require('./components/Delivery.vue').default);



$(document).ready(function () {
    const orders_delivery_form = new Vue({
        el: '#orders_delivery_form ',
        data: {
        },

        methods: {


        },
        mounted: function () {
            if (window._debug == true) {
                TrekConsole.log("Cart index mounted", this.$el, $(this.$el));
            }

        },
        computed: {

        }
    });
    window.orders_delivery_form = orders_delivery_form;
})
$(document).ready(function () {
    const orders_delivery_form = new Vue({
        el: '#frontend_users_delivery_form ',
        data: {
        },

        methods: {


        },
        mounted: function () {
            if (window._debug == true) {
                TrekConsole.log("Cart index mounted", this.$el, $(this.$el));
            }

        },
        computed: {

        }
    });
    window.orders_delivery_form = orders_delivery_form;
})
