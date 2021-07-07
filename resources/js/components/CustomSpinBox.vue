<template>
    <div class="b-site-spinbox custom_counter" :class="{'b-site-spinbox_disabled':is_disabled}">
        <button type="button" class="b-site-spinbox__quantity-button b-site-spinbox__quantity-down" v-on:click="buttonDown" v-bind:disabled="is_disabled">
        </button>
        <input  v-bind:min="min" v-bind:max="max"
                v-bind:value="count"  class="p-product-show__counter-input b-site-spinbox__input" type="text"
               autocomplete="off" value="1" readonly  v-on:change="textChanged($event)" v-bind:disabled="is_disabled" >
        <button type="button" class="b-site-spinbox__quantity-button b-site-spinbox__quantity-up"  v-on:click="buttonUp" v-bind:disabled="is_disabled">
        </button>
    </div>
</template>

<script>
    export default {
        props:
            {
                value: {
                    //   type:Number,
                    default: 0
                },
                min: {
                    //   type:Number,
                    default: -1000
                },
                max: {
                    //  type:Number,
                    default: 1000
                },
                is_disabled: {
                    default: false
                }
            },
        model: {
            prop: 'count',

        },
        data: function () {
            return {
                count: this.value,

            }
        },

        mounted: function () {

        },
        watch: {
            value: function (value) {
                 this.count = this.value;
            }
        },
        destroyed: function () {

        },
        methods: {
            buttonDown: function () {
                if (
                    this.is_disabled == true) {
                    return;
                }
                console.log("down", this.min, this.count, this.is_disabled);
                if (parseInt(this.min) >= parseInt(this.count)) {
                    return;
                }
                this.count--;
                this.$emit('change_value', this.count);

            },
            buttonUp: function () {
                if (this.is_disabled == true) {
                    return;
                }
                console.log("up", this.min, this.count);
                if (parseInt(this.max) <= parseInt(this.count)) {
                    return;
                }
                this.count++;
                this.$emit('change_value', this.count);

            },
            textChanged: function (event) {
                var count = parseInt(event.target.value);
                // console.log("count",count,parseInt(this.max),parseInt(this.min));
                if (isNaN(count)) {
                    // console.log("is_nan");
                    this.$forceUpdate();
                }
                else if (parseInt(count) <= parseInt(this.max) && parseInt(count) >= parseInt(this.min)) {
                    // console.log("else if")
                    this.count = count;
                    this.$emit('change_value', this.count);
                }
                else {
                    // console.log("else")
                    this.$forceUpdate();
                }
            }
        }
    }
</script>
