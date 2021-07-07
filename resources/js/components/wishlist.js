$(document).on("click", ".js-add-product-to-wishlist", function (event) {
    let id = $(this).attr('data-id');
    let self = $(this);
    axios.post(window.routes.wishlist.add, {
        id: id,
        _token: window.Laravel.csrfToken
    })
        .then(function (response) {
            self.closest('.b-product-item__label-favorite-block').addClass('b-product-item__label-favorite-block_active')
            window.store.wishlist.count = response.data.count;
        })
        .catch(function (error) {
            TrekConsole.log('cart add error', error);
        });

});



$(document).on("click", ".js-remove-product-from-wishlist", function (event) {
    let id = $(this).attr('data-id');
    let self = $(this);
    axios.post(window.routes.wishlist.remove, {
        id: id,
        _token: window.Laravel.csrfToken
    })
        .then(function (response) {
            self.closest('.p-profile-wishlist__item').remove();
            window.store.wishlist.count = response.data.count;

        })
        .catch(function (error) {
            TrekConsole.log('cart add error', error);
        });

});







$(document).on("click", ".js-add-product-wishlist-from-product", function (event) {
    let id = $(this).attr('data-id');
    let self = $(this);
    axios.post(window.routes.wishlist.add, {
        id: id,
        _token: window.Laravel.csrfToken
    })
        .then(function (response) {
            self.closest('.p-product__button-item-favorite').addClass('p-product__button-item-favorite_active')
            window.store.wishlist.count = response.data.count;
         })
        .catch(function (error) {
            TrekConsole.log('cart add error', error);
        });

});
