<template>
    <div class="products-reviews-block-template  ">
        <transition name="fade">
        <div v-show="!this.showForm" class="b-product-reviews ">
            <div class="b-product-reviews__list">
                <div v-for="review in reviews" :key="review.id" class="b-product-reviews__item">
                    <div class="b-product-reviews__item-title">
                     <span class="b-product-reviews__item-user-name" v-text="review.user_name">
                    </span>
                        <span class="b-product-reviews__item-user-date" v-text="review.date">

                        </span>
                    </div>
                    <div class="b-product-reviews__item-user-message" v-text="review.description">

                    </div>

                    <div class="b-product-reviews__item b-product-reviews__item-answer" v-if="review.answer">
                        <div class="b-product-reviews__item-title">
                             <span class="b-product-reviews__item-user-name" v-text="review.answer.user_name">

                            </span>
                            <span class="b-product-reviews__item-user-date" v-if="review.answer.date"
                                  v-text="review.answer.date">

                            </span>
                        </div>
                        <div class="b-product-reviews__item-user-message" v-html="review.answer.description">

                        </div>
                    </div>

                </div>
                <div v-if="reviews.length == 0" class="b-product-reviews__list-empty">
                    {{ trans.empty }}
                </div>
            </div>
            <div class="b-product-reviews__show-form-wrap">
                <button type="button" v-on:click="toggleShowFrom"
                        class="b-product-reviews__show-form  js-b-product-reviews__show-form    button-default text-uppercase">

                    {{ trans.add_reviews }}
                </button>
            </div>
        </div>
        </transition>
        <transition name="fade">

        <div v-show="this.showForm" class="b-product-reviews__form ">

            <validation-observer ref="form" v-slot="{ handleSubmit }" tag="div" class="row">
                <div class="col-lg-6">
                    <div class="form-group form-group__default">
                        <validation-provider name="user_name" v-slot="{ errors }">
                            <label for=""
                                   class="form-control__label"> {{ trans.your_name }} </label>
                            <input type="text" class="form-control__default" name="user_name" v-model="input.user_name"
                                   placeholder="">
                            <div class="invalid-feedback d-block" v-if="errors.length" v-text="errors[0]"></div>
                        </validation-provider>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group form-group__default">
                        <validation-provider name="email" v-slot="{ errors }">
                            <label for=""
                                   class="form-control__label">Email</label>
                            <input type="email" class="form-control__default" name="email" v-model="input.email"
                                   placeholder="">
                            <div class="invalid-feedback d-block" v-if="errors.length" v-text="errors[0]"></div>
                        </validation-provider>

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-group__default">
                        <validation-provider name="description" v-slot="{ errors }">
                            <label for=""
                                   class="form-control__label"> {{ trans.review }} </label>
                            <textarea class="form-control__default b-product-reviews__form-message-input"
                                      name="description"
                                      placeholder="" v-model="input.description"></textarea>
                            <div class="invalid-feedback d-block" v-if="errors.length" v-text="errors[0]"></div>
                        </validation-provider>

                    </div>
                </div>
                <div class="col-12">
                    <div class="b-product-reviews__form-button-list">
                        <div class="b-product-reviews__form-submit-wrap">
                            <button v-on:click="sendRequest" type="button"
                                    class="button-default b-product-reviews__form-submit-btn">
                                <svg class="b-product-reviews__form-submit-icon" width="22" height="22"
                                     viewBox="0 0 22 22"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M21 10.4445C21.0038 11.911 20.6612 13.3577 20 14.6667C18.4011 17.866 15.1321 19.8875 11.5556 19.8889C10.089 19.8927 8.64235 19.5501 7.33333 18.8889L1 21L3.11111 14.6667C2.44992 13.3577 2.10729 11.911 2.11111 10.4445C2.1125 6.86791 4.13408 3.59897 7.33333 2.00003C8.64235 1.33884 10.089 0.996208 11.5556 1.00003H12.1111C16.9065 1.26459 20.7354 5.09358 21 9.88892V10.4445V10.4445Z"
                                          stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                                {{ trans.sent_review }}
                            </button>
                        </div>
                        <div class="b-product-reviews__form-cancel-wrap">
                            <button type="button" class="button-default-primary b-product-reviews__form-cancel"
                                    v-on:click="toggleShowFrom">
                                {{ trans.cancel }}
                            </button>
                        </div>
                    </div>
                </div>

            </validation-observer>

        </div>
        </transition>
    </div>
</template>


<style lang="scss">
.fade-enter-active, .fade-leave-active {
    transition: opacity .2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
    opacity: 0;
}

</style>


<script>
export default {
    props: [],
    mounted() {
        // window.current_products_id = 557;
        var self = this;
        this.reviews = []
        if (window.lang == 'uk') {
            this.trans = {
                empty: 'Список відгуків порожній',
                add_reviews: 'додати відгук',
                your_name: 'Ваше ім\'я',
                review: 'Відгук',
                sent_review: 'Відправити відгук',
                cancel: 'Скасувати',
            };
        } else {
            this.trans = {
                empty: 'Список отзывов пуст ',
                add_reviews: 'добавить отзыв',
                your_name: 'Ваше имя ',
                review: 'Отзыв',
                sent_review: 'Отправить отзыв',
                cancel: 'Отменить',
            };
        }


        axios.post(window.routes.reviews.product, {
            // products_id: window.product.current_product,
            products_id: window.current_products_id,
            //products_id:557,
            _token: window.Laravel.csrfToken
        }).then(function (response) {
            self.reviews = response.data.data;
            if (self.reviews.length > 2) {
                self.isShowBtnShowComments = true;
            }

            console.log("response.data", response.data);
        })
            .catch(function (error) {
                console.log("product_reviews_block", error)
            });

    },
    data: function () {
        return {
            reviews: [],
            input: {
                user_name: '',
                email: '',
                description: '',
                rating: 1,

            },
            showForm: false,
            isRequest: false,
            products_id: window.current_products_id,
            trans:{}

            // is_disabled:this.isRequestProcesed,
        };
    },
    methods: {
        sendReview: function () {

        },
        toggleShowFrom: function () {
            this.showForm = !this.showForm;
        },


        sendRequest: function (event) {
            if (this.isRequest){
                return ;
            }
            this.isRequest = true;
            // grecaptcha.execute(window.captcha, {action: 'login'}).then((token) => {
                var data = this.input;

                data.products_id = window.current_products_id;
                data._token = window.Laravel.csrfToken;
                // data["g-recaptcha-response"] = token;
                data["source"] = window.location.href;


                this.$refs.form.reset();
                this.unknownError = null;
                axios.post(window.routes.reviews.add, data)
                    .then((response) => {
                        var dataResponse = response.data;
                        this.isRequest = false;
                        this.clearForm();
                        $.openModalNotyfy(dataResponse.title, dataResponse.message);
                        this.reviews = dataResponse.reviews;
                        this.toggleShowFrom();
                    })
                    .catch(this.handleErrors);
            // }, () => {
            //     this.isRequest = false;
            // });

        },
        clearForm: function () {
            this.input.user_name = "";
            this.input.description = "";
            this.input.email = "";

        },
        handleErrors: function (error) {
            var response = error.response;
            var responseData = response.data;
            if (response.status == 422) {
                var errors = responseData.errors;
                this.$refs.form.setErrors( errors);
            } else {
                this.unknownError = true;
                //TrekConsole.log(error);
            }
            this.isRequest = false;
        },


    },
    computed: {},
    watch: {
        reviews: function (val) {
            $('.js-product-reviews-tabpanel__count,.js-p-product__qty-reviews-count').text(val.length)
        },

    }
}
</script>
