/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	CKEDITOR.config.removePlugins = 'elementspath,save,image,flash,iframe,preview,forms,smiley,pagebreak,templates,about,maximize,showblocks,newpage,language';
	CKEDITOR.config.removeButtons = 'Anchor,AlignRight,Justify,Find,Replace,SpellChecker,CopyFormatting,RemoveFormat,Styles,Font,Format,Subscript,Superscript,Print,Form,TextDirection,TextField,Textarea,Button,SelectAll,Strike,CreateDiv,HorizontalRule,Table,PasteText,PasteFromWord,Select,HiddenField,SpecialChar';

	CKEDITOR.config.resize_enabled = true;
	CKEDITOR.config.width = 'auto';
	CKEDITOR.config.height = 'auto';
	CKEDITOR.config.autoGrow_maxHeight = 900;
};
