/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'undo' },
		{ name: 'styles' },
		{ name: 'basicstyles' },
		{ name: 'align' },
		{ name: 'insert' },
		{ name: 'blocks' },
		{ name: 'list' },
		{ name: 'links' },
		{ name: 'indent' },
		{ name: 'mode' },
		{ name: 'tools' },
	];

	config.height = '22.5em';  
	config.tabIndex = 4;
	//config.removeButtons = 'Underline,Subscript,Superscript';
	config.format_tags = 'p;h2;h3;pre;address;div';
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.image2_prefillDimensions = false;
	config.tabSpaces = 4;
	config.extraPlugins = 'justify,codeX';
};
