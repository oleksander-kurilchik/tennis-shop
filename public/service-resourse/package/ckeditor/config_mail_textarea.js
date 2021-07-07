/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {

    // %REMOVE_START%
    // The configuration options below are needed when running CKEditor from source files.
    config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,'+
        'notification,button,toolbar,clipboard,panelbutton,panel,floatpanel,colorbutton,'+
        'colordialog,templates,menu,contextmenu,copyformatting,div,resize,elementspath,enterkey,'+
        'entities,popup,filetools,filebrowser,find,fakeobjects,flash,floatingspace,listblock,'+
        'richcombo,font,forms,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,'+
        'indentblock,indentlist,smiley,justify,menubutton,language,link,list,liststyle,magicline,'+
        'maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall'+
        ',showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,tableselection,'+
        'undo,lineutils,widgetselection,widget,notificationaggregator,uploadwidget,uploadimage,wsc,'+
        'lineheight';
    config.skin = 'moono-lisa';
    // %REMOVE_END%

    // Define changes to default configuration here. For example:
    config.language = 'ru';
    // config.uiColor = '#AADC6E';
    /*config.extraPlugins = 'youtube',
    config.youtube_autoplay = false;*/
    config.youtube_controls = false;
    config.allowedContent = true;
    // config.imageUploadUrl = window.Laravel.imageUploadUrl;
    //config.filebrowserImageBrowseLinkUrl = "/admin/ckeditor/pictures";
    //config.filebrowserImageBrowseUrl = "/admin/ckeditor/pictures";
    //config.filebrowserImageUploadUrl = window.Laravel.imageUploadUrl;
    //
    config.filebrowserImageBrowseUrl= '/admin/laravel-filemanager?type=Images';
    config.filebrowserImageUploadUrl= '/admin/laravel-filemanager/upload?type=Images&_token=';
    config.filebrowserBrowseUrl= '/admin/laravel-filemanager?type=Files';
    config.filebrowserUploadUrl= '/admin/laravel-filemanager/upload?type=Files&_token=';

   /// config.contentsCss = ['/css/app.css'] ;

    // config.font_names =
    //     'Arial/Arial, Helvetica, sans-serif;' +
    //     'Times New Roman/Times New Roman, Times, serif;' +
    //     'Verdana;Roboto;RotondaCBold;RotondaC';
    // config.bodyClass = 'admin-ckeditor';
    config.line_height="0.8;0.9;1;1.1;1.2;1.3;1.4;1.5;1.6;1.7;1.8;1.9;2;2.2;2.5;2.8;2.9;0.4em;0.5em;0.6em;0.7em;0.8em;0.9em;1em;1.1em;1.2em;1.3em;1.4em;1.5em;1.6em;1.8em;2em;2.1em;2.2em;2.3em;2.5em;2.7em;3em;4em;5em;6em;7em;8em" ;

};
