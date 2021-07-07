// window.Vue = require('vue');
// import VeeValidate, {Validator} from 'vee-validate';
// import VeeValidateMessagesRU from "vee-validate/dist/locale/ru";
// import VeeValidateMessagesUK from "vee-validate/dist/locale/uk";
// import VueRecaptcha from 'vue-recaptcha';
// import 'core-js/fn/promise';
//
// import axios from 'axios'
// import VueAxios from 'vue-axios'
//
// Vue.use(VueAxios, axios);
//
//
// function lroute(route_name,args) {
//     var route =   window.Laravel.routes[route_name].uri;
//     console.log("6666", route_name,args , route);
//     if ( route != undefined )
//     {
//
//         console.log(route,989898);
//         for(var arg in args) {
//
//             route  = route.replace("{"+arg+"}",args[arg]);
//         }
//         return route;
//
//
//     }
//     else {
//         console.error("lroute errors",route_name);
//     }
//
//
//
// }
//
//
// const vendors_links_edit = new Vue({
//     el: '#container_vue_vendors_links',
//     ViewMode:{index:0,edit:1},
//     crud_fields : [{name:"id",type:"hidden"}],
//     data:
//         { vendors_links:[]
//             ,
//             fillItem : {'title':'','url':'','sorting':0,'published':false},
//             formErrorsUpdate:{},
//
//             // newItem : {'title':'','description':''},
//
//             // fillItem : {'title':'','description':'','id':''}
//         },
//     methods: {
//         setViewModeGrid: function (event) {
//             this.view_mode = 1;
//         },
//         setViewModeList: function (event) {
//             this.view_mode = 2;
//         },
//         deleteLinks: function (id) {
//
//         },
//         changeSorting:function(vendors_links_id,event)
//         {
//             var  sorting =event.target.value ;
//
//             // var url  = window.Laravel.routes["admin.vendors_links.sorting"].uri.replace("{id}",vendors_links_id);
//             var url  = lroute("admin.vendors_links.sorting",{id:vendors_links_id});
//
//             axios.post(url, {
//                 sorting: sorting,
//                 _token: window.Laravel.csrfToken
//             })
//                 .then(function (response) {
//                     console.log("ok",response);
//                 })
//                 .catch(function (error) {
//                     console.log("Errors changeSorting",error);
//                 });
//
//         },
//         deleteItem: function(vendors_links_id){
//
//
//             var url  = window.Laravel.routes["admin.vendors_links.delete"].uri.replace("{id}",vendors_links_id);
//             axios.delete(url, {
//                 _token: window.Laravel.csrfToken
//             })
//                 .then(function (response) {
//                     console.log("ok",response);
//                     toastr.success('Елемент видалено', 'Success Alert', {timeOut: 5000});
//                 })
//                 .catch(function (error) {
//                     console.log("Errors",error);
//                 });
//
//
//
//         },
//
//
//         editItem: function(item){
//
//             this.fillItem.title = item.title;
//
//             this.fillItem.id = item.id;
//
//             this.fillItem.url = item.url;
//
//             // $("#edit-item").modal('show');
//
//             console.log("editItem",item);
//
//
//         },
//
//
//
//
//
//
//
//
//
//
//
//     }
//
//
//
//     ,
//
//     created: function () {
//         var vm = this;
//
//         axios.get(window.Laravel.routes["admin.vendors_links.index"].uri.replace("{vendors_id}",5))
//             .then(function (response) {
//                 console.log(" 999 -- ", response );
//                 vm.vendors_links  =  response.data.data.data
//             })
//     .catch(function (errors) {
//         console.log("666", errors);
//     })
//
//
//
//     },
//     computed:
//         {
//             c_showGrid: function () {
//                 return this.view_mode == 1;
//             },
//             c_showList: function () {
//                 return this.view_mode == 2;
//             }
//         }
//
// });