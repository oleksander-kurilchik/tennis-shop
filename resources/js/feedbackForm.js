
$(document).ready(function () {
//modal callback
    const feedbackForm = new Vue({
        el: '#feedbackForm',
        data: {
            inputs: {name: "",email: "",description:''},
            unknownError: null,
            sitekey: window.captcha,
            requestUrl: window.routes.feedback.send,
            isRequest :false,
        },
        components: {
            // 'vue-recaptcha': VueRecaptcha
        },
        mounted: function () {
        },
        methods: {
            sendRequest: function (event) {

                // grecaptcha.execute(window.captcha, {action: 'login'}).then((token) => {
                var data = this.inputs;
                data._token = window.Laravel.csrfToken;
                data.source = window.location.href;
                // data["g-recaptcha-response"] = token;
                // this.errors.clear();
                this.unknownError = null;
                axios.post(this.requestUrl, data)
                    .then((response) => {
                        console.log('sendRequest post ', response)
                        var dataResponse = response.data;
                        this.clearForm();
                         // if (dataResponse.message != null) {
                            $.openModalNotyfy(dataResponse.title, dataResponse.message);
                        // }
                    })
                    .catch(this.handleErrors);
                    this.isRequest = false;

                // },()=>{
                //     this.isRequest = false;
                // });

            },
            clearForm: function () {
                this.inputs.name = "";
                // this.inputs.phone = "";
                this.inputs.email = "";
                this.inputs.description = "";
                // this.$refs.recaptcha.reset();
                setTimeout(() => {
                    //this.errors.clear();
                }, 200);
            },

            handleErrors: function (error) {
                 var response = error.response;
                var responseData = response.data;
                if (response.status == 422) {
                    var errors = responseData.errors;
                    this.$refs.form.setErrors( errors);
                } else {
                    this.unknownError = true;
                    console.log(error);
                }
             }
        },
    });
    window.feedbackForm = feedbackForm;
});
