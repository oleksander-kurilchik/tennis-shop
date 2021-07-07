///////////////////this is cart index app
//import VueRecaptcha from "vue-recaptcha";


$(document).ready(function () {
    const app_cart = new Vue({
        el: '#cart_index ',
        data: {
            cart: window.store.cart,
            isRequestProcesed: false,
            form: {
                city_id:null,
                city_name:null,
                warehouse_id:null,
                warehouse_name:null,
                delivery_method:null
            },
            deliveryErrors :{},
        },
        components: {},
        methods: {
            productCountChangeHandler: function (count, item) {

                TrekConsole.log("productCountChangeHandler", count, item);
                if (this.isRequestProcesed == true) {
                    return;
                }
                this.isRequestProcesed = true;
                var data = {cart_id: item.card_id, count: count, _token: window.Laravel.csrfToken};
                var self = this;
                axios.post(window.routes.cart.change_count,
                    data)
                    .then(function (response) {

                        TrekConsole.log("productCountChangeHandler ok ", response.data);
                        var cart = window.store.cart;
                        var data = response.data;
                        cart.count = data.count;
                        cart.totalPrice = data.totalPrice;
                        cart.items = data.items;
                        cart.code = data.code;
                        cart.total_discount = data.total_discount;
                        self.isRequestProcesed = false
                        if (cart.count == 0) {
                            location.reload();
                        }
                        app_cart.$forceUpdate();
                    })
                    .catch(function (error) {
                        TrekConsole.log("Error on change count product if product", error);
                        self.isRequestProcesed = false;

                    });


            },
            deleteProductFromCart: function (item, event) {
                if (this.isRequestProcesed == true) {
                    return;
                }
                this.isRequestProcesed = true;
                var self = this;
                axios.post(window.routes.cart.delete_from_cart,
                    {cart_id: item.card_id, _token: window.Laravel.csrfToken})
                    .then(function (response) {
                        var cart = window.store.cart;
                        var data = response.data;
                        cart.count = data.count;
                        cart.totalPrice = data.totalPrice;
                        cart.total_discount = data.total_discount;
                        cart.items = data.items;
                        cart.code = data.code;
                        self.isRequestProcesed = false;
                        if (data.removeCart != null) {
                        }
                        if (cart.count == 0) {
                            location.reload();
                        }

                    })
                    .catch(function (error) {
                        TrekConsole.log(error);
                        self.isRequestProcesed = false;

                    });
            },
            deliveryMethodChanged:function(value){
                this.form.delivery_method = value;
                this.form.city_id = null;
                this.form.city_name = null;
                this.form.warehouse_id = null;
                this.form.warehouse_name = null;
            },
            cityChanged:function(value, event){
                console.log('cityChanged',value)
                if(!value){
                    this.form.city_id = null;
                    this.form.city_name = null;
                }
                else{
                    this.form.city_id = value.id;
                    this.form.city_name = value.name;
                }

            },
            warehouseChanged:function(value){
                console.log('warehouseChanged',value)
                if(!value){
                    this.form.warehouse_id = null;
                    this.form.warehouse_name = null;
                }
                else{
                    this.form.warehouse_id = value.id;
                    this.form.warehouse_name = value.name;
                }
            },
            formCartSubmit: function (event) {
                var data = this.form;
                data._token = window.Laravel.csrfToken;
                data.source = window.location.href;
                // data["g-recaptcha-response"] = token;
                 this.unknownError = null;
                axios.post(window.routes.cart.order_submit, data)
                    .then((response) => {
                        console.log('sendRequest post ', response)
                        var dataResponse = response.data;
                        this.clearForm();
                        // if (dataResponse.message != null) {
                        // $.openModalNotyfy(dataResponse.title, dataResponse.message);
                        // }
                        window.location.href = window.routes.cart.success
                    })
                    .catch(this.handleErrors);
                this.isRequest = false;

            },
            clearForm: function () {
                this.form= {};


            },
            handleErrors: function (error) {
                var response = error.response;
                var responseData = response.data;
                if (response.status == 422) {
                    var errors = responseData.errors;
                    this.$refs.form.reset();
                 ;
                    this.$refs.form.setErrors(errors);
                    if (this.$refs.form2) {
                        this.$refs.form2.reset();
                        this.$refs.form2.setErrors(errors);
                    }
                    let deliveryErrors = {
                        'delivery_method': errors.delivery_method ? errors.delivery_method : null,
                        'city_name': errors.city_name ? errors.city_name : null,
                        'warehouse_name': errors.warehouse_name ? errors.warehouse_name : null,
                    }
                    this.deliveryErrors = Object.assign({}, this.deliveryErrors, deliveryErrors);
                } else {
                    this.unknownError = true;
                    console.log(error);
                }
            },
        },
        mounted: function () {
            if (window._debug == true) {
                TrekConsole.log("Cart index mounted", this.$el, $(this.$el));
            }
        },
        computed: {
            disabledSubmit: () => {
                return false;
            }
        }
    });
    window.app_cart = app_cart;
})












