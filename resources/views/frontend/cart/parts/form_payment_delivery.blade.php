<div class="b-card-list">
    <validation-observer ref="form" tag="div" class="">
        <div class="b-card-list__groups-list">
            <div class="b-card-list__group">
                <div class="b-card-list__group-title">

                    @lang('cart.checkout_form.payment.title')
                </div>
                <div class="b-card-list__group-content">
                    <validation-provider name="payment_method" v-slot="{ errors }">
                        <div class="form-check form-radio__default  p-cart__form-radio  ">
                            <input class="form-check-input  form-radio-input__default" type="radio" name="payment"
                                   id="payment-bank_card" value="bank_card" v-model="form.payment_method">
                            <label class="form-check-label form-radio-label__default" for="payment-bank_card">
                                @lang('cart.checkout_form.payment.bank_card')
                            </label>
                        </div>
                        <div class="form-check form-radio__default p-cart__form-radio">
                            <input class="form-check-input  form-radio-input__default" type="radio" name="payment"
                                   id="payment-cash" value="cash" v-model="form.payment_method">
                            <label class="form-check-label form-radio-label__default" for="payment-cash">
                                @lang('cart.checkout_form.payment.cash')
                            </label>
                        </div>
                        <div class="form-check form-radio__default p-cart__form-radio">
                            <input class="form-check-input  form-radio-input__default" type="radio" name="payment"
                                   id="payment-bank_cod" value="cod" v-model="form.payment_method">
                            <label class="form-check-label form-radio-label__default" for="payment-bank_cod">
                                @lang('cart.checkout_form.payment.cod')
                            </label>
                        </div>
                        <div class="invalid-feedback d-block" v-if="errors.length" v-text="errors[0]"></div>
                    </validation-provider>


                </div>
            </div>


            <div class="delivery">
                <vue-delivery @delivery_method_changed="deliveryMethodChanged"
                              @city_changed="cityChanged"
                              @warehouse_changed="warehouseChanged"
                              :delivery-errors="deliveryErrors"></vue-delivery>
            </div>


            <div class="b-card-list__group">
                <div class="b-card-list__group-content">

                    <div class="form-group__default form-group ">
                        <div class="p-cart__to-pay">
                            <div class="p-cart__to-pay-title">

                                @lang('cart.order_info.total')
                            </div>
                            <div class="p-cart__to-pay-value">
                                <span v-text="cart.totalPrice">0</span> грн
                            </div>

                        </div>

                    </div>
                    <div class="form-group__default">
                        <div class="form-checkbox-primary d-inline-block">
                            <validation-provider name="not_call_me" v-slot="{ errors }">
                                <input v-model="form.not_call_me"
                                       class="form-checkbox-primary__input-default" type="checkbox"
                                       value="1"
                                       id="ch_not_call_me" autocomplete="off">
                                <label class="form-checkbox-primary__label-default" for="ch_not_call_me">
                                    @lang('cart.checkout_form.not_call_me')
                                </label>
                                <div class="invalid-feedback d-block" v-if="errors.length"
                                     v-text="errors[0]"></div>
                            </validation-provider>
                        </div>
                    </div>

                    <div class="form-group">

                        <button class="button-default w-100" @click="formCartSubmit">
                            @lang('cart.order_info.to_order')
                        </button>
                    </div>


                </div>
            </div>
        </div>

    </validation-observer>

</div>
