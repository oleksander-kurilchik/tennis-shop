@if(!Auth::guard('frontend')->check())
<div class="p-cart__user-details mt-1 py-4">
    <validation-observer ref="form2" tag="div" class="">
        <div class="b-card-list">
            <div class="b-card-list__groups-list">
                <div class="b-card-list__group">
                    <div class="b-card-list__group-title">

                        @lang('cart.checkout_form.personal_data')
                    </div>
                    <div class="b-card-list__group-content">
                        <div class="row">
                            <div class="col-lg-4">
                                <validation-provider name="first_name" v-slot="{ errors }">
                                    <div class="form-group form-group__default">
                                        <label for="" class="form-control__label">
                                            @lang('cart.checkout_form.first_name')
                                        </label>
                                        <input v-model="form.first_name" type="text" class="form-control__default"
                                               name="text" placeholder="@lang('cart.checkout_form.first_name')">
                                        <div class="invalid-feedback d-block" v-if="errors.length"
                                             v-text="errors[0]"></div>
                                    </div>
                                </validation-provider>

                            </div>
                            <div class="col-lg-4">
                                <validation-provider name="last_name" v-slot="{ errors }">
                                    <div class="form-group form-group__default">
                                        <label for="" class="form-control__label">@lang('cart.checkout_form.last_name')</label>
                                        <input v-model="form.last_name" type="text" class="form-control__default"
                                               name="text" placeholder="@lang('cart.checkout_form.last_name')">
                                        <div class="invalid-feedback d-block" v-if="errors.length"
                                             v-text="errors[0]"></div>
                                    </div>
                                </validation-provider>
                            </div>
                            <div class="col-lg-4">
                                <validation-provider name="phone" v-slot="{ errors }">
                                    <div class="form-group form-group__default">
                                        <label for="" class="form-control__label">@lang('cart.checkout_form.phone_number')</label>
                                        <input v-model="form.phone" type="text" class="form-control__default" v-mask="'+380#########'"
                                               name="phone" inputmode="tel" placeholder="@lang('cart.checkout_form.phone_number')">
                                        <div class="invalid-feedback d-block" v-if="errors.length"
                                             v-text="errors[0]"></div>

                                    </div>
                                </validation-provider>
                            </div>
                            <div class="col-lg-4">
                                <validation-provider name="email" v-slot="{ errors }">
                                    <div class="form-group form-group__default">
                                        <label for="" class="form-control__label">@lang('cart.checkout_form.email')</label>
                                        <input v-model="form.email" type="email" class="form-control__default"
                                               name="email" inputmode="email" placeholder="@lang('cart.checkout_form.email')">
                                        <div class="invalid-feedback d-block" v-if="errors.length"
                                             v-text="errors[0]"></div>
                                    </div>
                                </validation-provider>
                            </div>
{{--                            <div class="col-lg-8 d-flex align-items-end">--}}
{{--                                <div class="form-group__default">--}}
{{--                                    <div class="form-checkbox-primary d-inline-block">--}}
{{--                                        <validation-provider name="not_call_me" v-slot="{ errors }">--}}
{{--                                            <input v-model="form.not_call_me"--}}
{{--                                                   class="form-checkbox-primary__input-default" type="checkbox"--}}
{{--                                                   value="1"--}}
{{--                                                   id="ch_not_call_me" autocomplete="off">--}}
{{--                                            <label class="form-checkbox-primary__label-default" for="ch_not_call_me">--}}
{{--                                                @lang('cart.checkout_form.not_call_me')--}}
{{--                                            </label>--}}
{{--                                            <div class="invalid-feedback d-block" v-if="errors.length"--}}
{{--                                                 v-text="errors[0]"></div>--}}
{{--                                        </validation-provider>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                        </div>


                    </div>
                </div>

            </div>


        </div>
    </validation-observer>
</div>
@endif
