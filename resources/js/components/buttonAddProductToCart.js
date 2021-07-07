$(document).on("click", ".js-add-product-to-cart", function (event) {
    let count = $(this).closest(".js-add-product-to-cart-container").find(".js-add-product-to-cart-input").val();
    count = (count == null ? 1 : count);
    let id = $(this).attr('data-id');
    TrekConsole.log('cart add start', id, count, window.routes.cart.add);
    axios.post(window.routes.cart.add, {
        id: id, count: count ,
        _token: window.Laravel.csrfToken
    })
        .then(function (response) {
            TrekConsole.log('cart add response', response);
            var cart = window.store.cart;
            var dataCart = response.data.cart;
            TrekConsole.log('#button_buy_product', dataCart);
            cart.count = dataCart.count;
            cart.totalPrice = dataCart.totalPrice;
            cart.items = dataCart.items;
            let lastProduct = response.data.last;
            let modalContent = '';
            if (lastProduct.logo) {
                modalContent += `<div class="b-cart-add-modal__product-logo">
                <img class="b-cart-add-modal__product-image img-fluid" src="${lastProduct.logo}"></div>`;
            }
            modalContent += `<div class="b-cart-add-modal__product-title b-site-modal__title">${lastProduct.title}</div>`;
            $.openModalCartAdd(modalContent);
        })
        .catch(function (error) {
            TrekConsole.log('cart add error', error);
        });
});
