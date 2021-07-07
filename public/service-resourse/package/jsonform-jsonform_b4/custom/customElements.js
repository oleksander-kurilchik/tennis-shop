JSONForm.fieldTypes['htmlsnippet'] = {
    template: '<div class="avada kedavra"> <% =node.value%> </div>'
};

JSONForm.fieldTypes['hiddenConst'] = {
    'template':'<div><input type="hidden" id="<%= id %>" name="<%= node.name %>" value="<%= node.value %>" /></div>',
    'inputfield': true,
    onBeforeRender: function (data, node) {
          node.value  = data.schema.value;
    }
};
JSONForm.fieldTypes['laravel_file_manager'] = {
    template: `
                     <div class="input-group lfm-input-group" id="<%=node.id%>">
                    <input type="text" max="255" value="<%= node.value %>"  name="<%= node.name %>" class="form-control" placeholder="" >
                    <div class="input-group-append"><button class="btn btn-outline-secondary button_select_image " type="button">Вибрати зображення  </button>
                    </div>
                   `,
    'fieldtemplate': true,
    'inputfield': true,
    onInsert: function (evt, node) {
        let input = $(node.el).find('input');
        let button = $(node.el).find('button');
        var updateJV = window.updateJsonValue
        // console.log('laravel_file_manager onInsert ', node, evt, input, button)
        button.on('click', function (e) {
            var route_prefix = '/admin/laravel-filemanager?type=image';
            window.open(route_prefix, 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                    return item.url;
                }).join(',');
                input.val('').val(file_path).trigger('change');
                updateJV()
            };
            return false;
        });
    }


};


JSONForm.fieldTypes['ckeditor'] = {
    template: '<textarea class="form-control  ckeditor-jsonform"  id="<%= id %>" name="<%= node.name %>"  cols="50" rows="10"  ><%= node.value %></textarea>',
    'fieldtemplate': true,
    'inputfield': true,
    'onInsert': function (evt, node) {
        // console.log('evt, node', evt, node)
        $(node.el).find('textarea').ckeditor(function (textarea) {
            this.on('change', function (e) {
                updateJsonValue();
            })
        })
    }
};
