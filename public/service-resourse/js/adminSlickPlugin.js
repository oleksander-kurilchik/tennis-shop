function _classCallCheck(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,n){for(var t=0;t<n.length;t++){var i=n[t];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}function _createClass(e,n,t){return n&&_defineProperties(e.prototype,n),t&&_defineProperties(e,t),e}!function(e){var n=function(){function n(t){_classCallCheck(this,n),this.jsonElement=t;var i=e("<div><div/>");i.addClass("slider-json-wrap"),i.addClass("slider-json-wrap666"),this.jsonElement.wrap(i),this.container=this.jsonElement.parent(),this.makeButtonCreate(),this.makeSlickTypeSelect(),this.loadImagesFromJsonArea()}return _createClass(n,[{key:"init",value:function(e){}},{key:"getDefaultValue",value:function(){return{slides:[],type:"slide"}}},{key:"updateJsonValue",value:function(){var n={slides:[]};n.type=this.container.find("._type").val(),this.container.find(".slider_form_item").each(function(t){var i={};i.title=e(this).find("._title").val(),i.description=e(this).find("._description").val(),i.image_src=e(this).find("._image_src").val(),n.slides.push(i)});var t=JSON.stringify(n);console.log("onChancheUpdate",t),this.jsonElement.val(t)}},{key:"makeButtonCreate",value:function(){var n=this,t=e('<div class="form-group"></div>'),i=e('<button class="btn btn-primary" type="button"  >Додати картинку</button>');t.append(i),i.on("click",function(){n.makeImageSrcForm(),n.updateJsonValue()}),this.container.append(t)}},{key:"makeSlickTypeSelect",value:function(){var n=this,t="slide",i=this.jsonElement.val(),a={};try{(a=e.parseJSON(i)).type&&(t=a.type)}catch(e){}var o=e('<div class="form-group"></div>'),r=e('<label for="">Тип Слайлера</label>'),l=e('<select  class="form-control _type"  placeholder=""></select>');l.append('<option value="fade">Fade</option>'),l.append('<option value="slide">Slide</option>'),l.find(" option[value="+t+"]").prop("selected",!0),l.on("change",function(){n.updateJsonValue()}),o.append(r),o.append(l),this.container.append(o)}},{key:"makeImageSrcForm",value:function(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=this,i=e('<div class="slider-form-item slider_form_item"></div>').html(this.getImageFormTemplate()),a=i.find("._button_remove_item"),o=i.find("._button_select_image"),r=i.find("._image_src").val(n.image_src);i.find("._title").val(n.title),i.find("._description").val(n.description);this.timer=0,i.find("._title , ._description").on("input",function(){clearTimeout(t.timer),t.timer=setTimeout(function(){console.log("input 200 n"),t.updateJsonValue()},200)}),o.on("click",function(e){return window.open("/admin/laravel-filemanager?type=image","FileManager","width=900,height=600"),window.SetUrl=function(e){var n=e.map(function(e){return e.url}).join(",");r.val("").val(n).trigger("change"),t.updateJsonValue()},!1}),a.on("click",function(n){e(n.target).closest(".slider_form_item").remove(),t.updateJsonValue()}),this.container.append(i)}},{key:"loadImagesFromJsonArea",value:function(){var n=this.jsonElement.val(),t={};try{t=e.parseJSON(n)}catch(e){}t=e.extend({},this.getDefaultValue(),t);for(var i=0;i<t.slides.length;i++)this.makeImageSrcForm(t.slides[i])}},{key:"getImageFormTemplate",value:function(){return'\n                 <div class="row border-bottom border-top py-3">\n                    <div class="col">\n                        <div class="form-group">\n                            <label for="">Посилання на картинку</label>\n                            <div class="input-group lfm-input-group  d-flex align-items-center">\n                                <input type="text" max="255" class="form-control _image_src" \n                                       placeholder="">\n                                <div class="input-group-append">\n                                    <button class="btn btn-outline-secondary  _button_select_image" type="button">Вибрати зображення\n                                    </button>\n                                    <button class="btn btn-danger _button_remove_item" type="button"><i class="fa fa-trash"\n                                                                                    aria-hidden="true"></i></button>\n                                </div>\n                            </div>\n                        </div>\n                        <div class="form-group d-none">\n                            <label for="exampleInputEmail1">Заголовок</label>\n                            <input type="text" class="form-control _title">\n                        </div>\n                \n                        <div class="form-group d-none">\n                            <label>Додатковий текст</label>\n                            <textarea class="form-control _description" rows="3"></textarea>\n                        </div>\n                    </div>\n                    <div class="col-auto d-flex flex-column justify-content-center">\n                        <div class="btn-group-vertical ">\n                            <button type="button" class="btn btn-primary d-none _button_image_move_up"><i\n                                        class="fa fa-arrow-up" aria-hidden="true"></i>\n                            </button>\n                            <button type="button" class="btn btn-primary d-none _button_image_move_down"><i\n                                        class="fa fa-arrow-down" aria-hidden="true"></i>\n                            </button>\n                        </div>\n                    </div>\n                </div>\n\n'}}]),n}();e.fn.sliderJson=function(t){return this.each(function(){new n(e(this))})}}(jQuery);