<div class="p-page-contacts__feedback" id="feedbackForm">
    <div class="p-page-contacts__feedback-title">
        @lang('contacts.form.title')
    </div>
    <validation-observer ref="form" v-slot="{ handleSubmit }" tag="div" class="p-page-contacts__feedback-form">
        <div class="p-page-contacts__feedback-item">
            <div class="form-group form-group__default">
                <validation-provider name="email" v-slot="{ errors }">
                    <label for=""
                           class="form-control__label">Email</label>
                    <input type="email" class="form-control__default" name="email" v-model="inputs.email"
                           placeholder=" " value="">
                    <div class="invalid-feedback d-block" v-text="errors[0]"></div>
                </validation-provider>

            </div>
        </div>
        <div class="p-page-contacts__feedback-item">
            <div class="form-group form-group__default">
                <validation-provider :rules="{}" name="name" v-slot="{ errors }">
                    <label for=""
                           class="form-control__label">@lang('contacts.form.name')</label>
                    <input type="text" class="form-control__default" name="name"  v-model="inputs.name"
                           placeholder=" " value="">
                    <div class="invalid-feedback d-block" v-text="errors[0]"></div>
                </validation-provider>

            </div>
        </div>


        <div class="p-page-contacts__feedback-item">
            <div class="form-group form-group__default">
                <validation-provider name="description" v-slot="{ errors }">
                    <label for=""
                           class="form-control__label">@lang('contacts.form.message')</label>
                    <textarea type="text" class="form-control__default" name="message"  v-model="inputs.description"
                              placeholder=" "></textarea>
                    <div class="invalid-feedback d-block" v-text="errors[0]"></div>
                </validation-provider>

            </div>
        </div>

        <div class="p-page-contacts__feedback-item pt-2">
            <div class="form-group form-group__default">
                <button class="button-default w-100" v-on:click="sendRequest">
                    @lang('contacts.form.send_message')
                </button>
            </div>
        </div>
    </validation-observer>
</div>
