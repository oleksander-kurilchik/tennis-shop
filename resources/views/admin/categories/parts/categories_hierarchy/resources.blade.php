


<style>

    .dd{
        float: none !important;
        max-width:100% !important;
    }

    .dd,
    .dd-list {
        display:block;
        padding:0;
        margin:0;
        position:relative;
        list-style:none
    }
    .dd {
        font-size:13px;
        line-height:20px
    }
    .dd-list .dd-list {
        padding-left:30px
    }
    .dd-collapsed .dd-list {
        display:none
    }
    .dd-empty,
    .dd-item,
    .dd-placeholder {
        display:block;
        position:relative;
        margin:0;
        padding:0;
        min-height:20px;
        font-size:13px;
        line-height:20px
    }
    .dd-handle {
        display:block;
        height:50px;
        padding:14px 25px;
        color:#333;
        border:1px solid #ccc;
        background:#fafafa;
        border-radius:3px;
        -moz-box-sizing:border-box
    }
    .dd-handle:hover {
        color:#2ea8e5;
        background:#fff
    }
    .dd-item>button {
        /*display:block;*/
        position:relative;
        float:left;
        width:40px;
        height:37px;
        padding:0;
        text-indent:100%;
        border:0;
        background:0 0;
        font-size:12px;
        line-height:1;
        text-align:center
    }
    .dd-item>button:before {
        content:'+';
        display:block;
        position:absolute;
        width:100%;
        text-align:center;
        text-indent:0
    }
    .dd-item>button[data-action=collapse]:before {
        content:'-'
    }
    .dd-empty,
    .dd-placeholder {
        margin:5px 0;
        padding:0;
        min-height:30px;
        background:#f2fbff;
        border:1px dashed #b6bcbf;
        box-sizing:border-box;
        -moz-box-sizing:border-box
    }
    .dd-empty {
        border:1px dashed #bbb;
        min-height:100px;
        background-color:#e5e5e5;
        background-image:linear-gradient(45deg,#fff 25%,transparent 25%,transparent 75%,#fff 75%,#fff),linear-gradient(45deg,#fff 25%,transparent 25%,transparent 75%,#fff 75%,#fff);
        background-size:60px 60px;
        background-position:0 0,30px 30px
    }
    .dd-dragel {
        position:absolute;
        pointer-events:none;
        z-index:9999
    }
    .dd-dragel>.dd-item .dd-handle {
        margin-top:0
    }
    .dd-dragel .dd-handle {
        box-shadow:2px 4px 6px 0 rgba(0,0,0,.1)
    }
    .nestable-lists {
        display:block;
        clear:both;
        padding:30px 0;
        width:100%;
        border:0;
        border-top:2px solid #ddd;
        border-bottom:2px solid #ddd
    }
    #nestable-menu {
        padding:0;
        margin:20px 0
    }
    #nestable-output,
    #nestable2-output {
        width:100%;
        height:7em;
        font-size:.75em;
        line-height:1.333333em;
        font-family:Consolas,monospace;
        padding:5px;
        box-sizing:border-box;
        -moz-box-sizing:border-box
    }
    #nestable2 .dd-handle {
        color:#fff;
        border:1px solid #999;
        background:#bbb;
        background:linear-gradient(to bottom,#bbb 0,#999 100%)
    }
    .menus .table>tbody>tr>td {
        line-height:44px
    }
    #nestable2 .dd-handle:hover {
        background:#bbb
    }
    #nestable2 .dd-item>button:before {
        color:#fff
    }
    @media only screen and (min-width:700px) {
        .dd {
            float:left;
            width:100%
        }
        .dd+.dd {
            margin-left:2%
        }
    }
    .dd-hover>.dd-handle {
        background:#2ea8e5!important
    }
    .dd3-content {
        display:block;
        height:30px;
        margin:5px 0;
        padding:5px 10px 5px 40px;
        color:#333;
        font-weight:700;
        border:1px solid #ccc;
        background:#fafafa;
        background:linear-gradient(to bottom,#fafafa 0,#eee 100%);
        border-radius:3px;
        box-sizing:border-box;
        -moz-box-sizing:border-box
    }
    .dd3-content:hover {
        color:#2ea8e5;
        background:#fff
    }
    .dd-dragel>.dd3-item>.dd3-content {
        margin:0
    }
    .dd3-item>button {
        margin-left:30px
    }
    .dd3-handle {
        position:absolute;
        margin:0;
        left:0;
        top:0;
        width:30px;
        text-indent:100%;
        border:1px solid #aaa;
        background:#ddd;
        background:linear-gradient(to bottom,#ddd 0,#bbb 100%);
        border-top-right-radius:0;
        border-bottom-right-radius:0
    }
    .dd3-handle:before {
        content:'≡';
        display:block;
        position:absolute;
        left:0;
        top:3px;
        width:100%;
        text-align:center;
        text-indent:0;
        color:#fff;
        font-size:20px;
        font-weight:400
    }
    .dd3-handle:hover {
        background:#ddd
    }
    .dd-handle__controls {

        height: 50px;
        display: flex;
        justify-content: space-between;
        padding: 0px 14px;
        align-items: center;

    }



</style>



<script>
    $(document).ready(function () {
        $('.dd').nestable({
            callback: function (l, e) {
                console.log('callback', $('.dd').nestable('serialize'));
            }
        });

        $('.js-menu-items-order-save').click(function () {
            var $serialize = $('.dd').nestable('serialize');
            console.log('js-menu-items-order-save', $serialize)
            window.axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest'
            };

            var formData = {};
            formData._token = window.Laravel.csrfToken;
            formData.order = $serialize;
            axios.post(@json(route('admin.categories.update-categories-hierarchy' )), formData)
                .then(function (response) {
                    if (response.data.success == true) {
                        toastr.info(response.data.message);
                    }
                })
                .catch(function (error) {
                    if (error.response && error.response.status == 422) {
                        var errors = error.response.data.errors;
                        for (const prop in errors) {
                            if (errors.hasOwnProperty(prop)) {
                                if (Array.isArray(errors[prop])) {
                                    var errorList = errors[prop];
                                    for (var _i = 0; _i < errorList.length; _i++) {
                                        toastr.error(errorList[_i]);
                                    }
                                }
                            }
                        }
                    } else {
                        toastr.error('Сталась помилка');
                    }
                    console.log(error);
                });


        })

    })


</script>
