<template>
    <div class="row1 pt-4">


        <div class="b-card-list__group">
            <div class="b-card-list__group-title">
                Спосіб доставки
            </div>
            <div class="b-card-list__group-content">
                <validation-provider name="delivery_method" v-slot="{ errors }">

                    <div class="form-check form-radio__default p-cart__form-radio">
                        <input class="form-check-input  form-radio-input__default" type="radio" name="delivery_method"
                               id="delivery-self-pickup" value="self-pickup" v-model="delivery_method">
                        <label class="form-check-label form-radio-label__default" for="delivery-self-pickup">
                            Самовивіз
                        </label>
                    </div>

                    <div class="form-check form-radio__default p-cart__form-radio">
                        <input class="form-check-input  form-radio-input__default" type="radio" name="delivery_method"
                               id="delivery-nova-poshta" value="nova-poshta" v-model="delivery_method">
                        <label class="form-check-label form-radio-label__default" for="delivery-nova-poshta">
                            Нова пошта
                        </label>
                    </div>


                    <div class="form-check form-radio__default p-cart__form-radio">
                        <input class="form-check-input  form-radio-input__default" type="radio" name="delivery_method"
                               id="delivery-courier" value="courier" v-model="delivery_method">
                        <label class="form-check-label form-radio-label__default" for="delivery-courier">
                            Кур’єром
                        </label>
                    </div>
                    <div class="invalid-feedback d-block" v-if="errors.length" v-text="errors[0]"></div>
                </validation-provider>

                <template v-if="showNovaPoshta">
                    <div class="form-group">

                        <label class="form-control__label"> {{ trans.city }} </label>
                        <select class="form-control__default js-select-delivery" @change="changeCity($event)"  name="city_name">
                            <option value="" disabled selected :key="-1">{{ trans.select_city }}</option>
                            <option v-for="city in cities " :key="city.id" :value_id="city.id" :value="city.title"
                                    v-text="city.title" :selected="city.id == city_id"></option>
                        </select>
                        <div class="invalid-feedback d-block" v-if="errors.city.status"
                             v-text="errors.city.message"></div>

                    </div>
                    <div class="form-group">

                        <label class="form-control__label">{{ trans.warehouse }}</label>
                        <select class="form-control__default js-select-delivery " @change="changeWarehouse($event)"  name="warehouse_name" >
                            <option value="" disabled selected>{{ trans.select_warehouse }}</option>
                            <option v-for="warehouse in  warehouses" :key="warehouse.title"
                                    :selected="warehouse_id == warehouse.id"
                                    :value_id="warehouse.id" :value="warehouse.title"
                                    v-text="warehouse.title"></option>
                        </select>
                        <div class="invalid-feedback d-block" v-if="errors.warehouse.status"
                             v-text="errors.warehouse.message"></div>

                    </div>
                </template>




                <template v-if="showCourierForm">
                    <div class="form-group">

                        <label class="form-control__label"> {{ trans.city }} </label>
                        <input class="form-control__default"  name="city_name" @change="updateCourierCity($event.target.value)">
                        <div class="invalid-feedback d-block" v-if="errors.city.status" v-text="errors.city.message"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-control__label"> {{ trans.address }} </label>
                        <textarea class="form-control__default "  name="warehouse_name"  @change="updateCourierWarehouse($event.target.value)"></textarea>
                        <div class="invalid-feedback d-block" v-if="errors.warehouse.status" v-text="errors.warehouse.message"></div>
                    </div>
                </template>


            </div>
        </div>




    </div>
</template>

<script>

export default {

    props:
        {
            deliveryErrors: {
                type: Object,
                default: function () {
                    return {}
                }
            },
        },
    data() {

        return {
            delivery_method:null,
            city_id: this.initcity,
            warehouse_id: this.initwarehouse,
            cities: [],
            warehouses: [],
            errors: {
                delivery: {
                    status: false,
                    message: '',

                },
                city: {
                    status: false,
                    message: '',
                },
                warehouse: {
                    status: false,
                    message: '',

                }
            },

            trans: {}
        };
    },
    mounted() {
        this._lang = window._lang;
        this.delivery_method = 'self-pickup';



        if (this.initcity) {
            this.city_id = this.initcity;
        }

        if (this.initwarehouse) {
            this.warehouse = this.initwarehouse;
        }
        this.trans = this.getTranslate(window.lang)

    },

    computed: {

        showCourierForm: function () {
            return this.delivery_method == 'courier';
        },
        showNovaPoshta:function (){
            return this.delivery_method == 'nova-poshta';
        },
    },
    methods: {

        changeCity: function ($event) {
            var cities_id = $($event.target).find("option:selected").attr("value_id");
            var cities_name = $($event.target).find("option:selected").attr("value");
            console.log('cities_id', cities_id, this.city_id);
            this.city_id = cities_id;
            this.warehouses = [];
            this.warehouses = [];
            if (cities_id == null) {
                this.warehouses = [];
                this.$emit("city_changed", null)
                return;
            }
            this.updateWarehouse(cities_id);
            this.$emit("city_changed", {id: cities_id, name: cities_name})
        },
        changeWarehouse: function ($event) {
            var warehouse_id = $($event.target).find("option:selected").attr("value_id");
            var warehouse_name = $($event.target).find("option:selected").attr("value");
            this.warehouse_id = warehouse_id;

            this.$emit("warehouse_changed", {id: warehouse_id, name: warehouse_name})

        },
        updateCity: function () {
            // this.warehouses = [];
            console.log('updateCity', this.delivery_method);
            axios.post("/delivery/cities", {
                _token: window.Laravel.csrfToken,
                delivery_method: this.delivery_method
            })
                .then((response) => {
                    TrekConsole.log('new Delivery MEthod', response);
                    this.cities = response.data.data;
                })
                .catch((error) => {
                    TrekConsole.log('new Delivery MEthod error', error);
                });
        },

        updateWarehouse: function (cities_id) {
            var self = this;
            axios.post('/delivery/warehouses',
                {cities_id: cities_id, _token: window.Laravel.csrfToken, delivery_method: this.delivery_method})
                .then(function (response) {
                    var data = response.data;
                    Vue.set(self, "warehouses", data.data);
                    self.isRequestProcesed = false;
                })
                .catch(function (error) {
                    self.isRequestProcesed = false;
                });
        },
        updateCourierCity($val){
            this.$emit("city_changed", {id: $val, name: $val})
        },
        updateCourierWarehouse($val){
            this.$emit("warehouse_changed", {id: $val, name: $val})
        }
        ,
        getTranslate($lang) {
            switch ($lang) {
                case 'ru': {
                    return {
                        city: 'Город',
                        select_city: 'Вибери тегород',
                        warehouse: 'Отделение',
                        select_warehouse: 'Виберите отделение',
                        self_removal: 'Cамовивоз',
                        nova_poshta: 'Новая пошта',
                        curier: 'Кур’єром',
                        delivery: 'Delivery',
                        address: 'Адрес',

                    };
                }
                default: {
                    return {
                        city: 'Город',
                        select_city: 'Виберите город',
                        warehouse: 'Отделение',
                        select_warehouse: 'Виберите отделение',
                        self_removal: 'Самовивіз',
                        nova_poshta: 'Нова пошта',
                        curier: 'Кур’єром',
                        delivery: 'Delivery',
                        address: 'Адреса',

                    };
                }

            }
        }


    },
    watch: {
        deliveryErrors: function (newVal, oldVal) {
            console.log('Delivery errors update ', newVal, oldVal);
            if (newVal.city_name) {
                this.errors.city.status = true;
                this.errors.city.message = newVal.city_name[0];
            } else {
                this.errors.city.status = false;
            }
            if (newVal.delivery_method) {
                this.errors.delivery.status = true;
                this.errors.delivery.message = newVal.delivery_method[0];
            } else {
                this.errors.delivery.status = false;
            }

            if (newVal.warehouse_name) {
                this.errors.warehouse.status = true;
                this.errors.warehouse.message = newVal.warehouse_name[0];
            } else {
                this.errors.warehouse.status = false;
            }

        },
        delivery_method: function (newVal, oldVal) {

            if (newVal == 'nova-poshta' ) {
                this.updateCity();
            }
            this.warehouses = [];
            this.warehouse_id = '';
            // vue_select_changed
            this.$emit("delivery_method_changed", newVal)

        }
    },
}
</script>
