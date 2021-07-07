$(document).ready(function () {
    const app_cart_header_desktop = new Vue({
        el: '#cart_header_desktop',
        // store,
        data: {
            cart: window.store.cart,
            wishlist: window.store.wishlist,

        }

    });
})


$(document).ready(function () {
    const app_cart_header_mobile = new Vue({
        el: '#cart_header_mobile',
        // store,
        data: {
            cart: window.store.cart,
            wishlist: window.store.wishlist,

        }

    });
})



require('./components/buttonAddProductToCart');
require('./components/app_cart');
// require('./components/modalOneClick');
