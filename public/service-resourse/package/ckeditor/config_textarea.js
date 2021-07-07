/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
    config.toolbar = []
	config.skin = 'moono-lisa';
    config.plugins = 'a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,notification,button,clipboard,floatpanel,templates,menu,copyformatting,div,resize,elementspath,enterkey,entities,popup ,find,fakeobjects,floatingspace,listblock,richcombo,font,forms,format,horizontalrule,htmlwriter,wysiwygarea,indent,indentblock,indentlist,smiley,justify,menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,,specialchar,scayt,stylescombo,tab,table,tabletools,tableselection,lineutils,';
    config.removePlugins= 'toolbar,elementspath,save,font';
 	config.language = 'ru';
    config.allowedContent =
        'span, div, br';
    config.forcePasteAsPlainText = true;
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_BR;
    config.autoParagraph = false;
    config.height = 100;

};

CKEDITOR.on( 'instanceReady', function( evt ) {
    evt.editor.dataProcessor.htmlFilter.addRules( {
        elements: {
            img: function(el) {
                el.addClass('img-fluid');
            }
        }
    });
});
