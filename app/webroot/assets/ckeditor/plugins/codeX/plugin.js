/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.plugins.add('codeX', {
	icons: 'code',
	init: function (editor) {
		var addButtonCommand = function (buttonName, buttonLabel, commandName, styleDefiniton) {
			if (!styleDefiniton)
				return;
			var style = new CKEDITOR.style(styleDefiniton),
				forms = contentForms[commandName];
			forms.unshift(style);
			editor.attachStyleStateChange(style, function (state) {
				!editor.readOnly && editor.getCommand(commandName).setState(state);
			});
			editor.addCommand(commandName, new CKEDITOR.styleCommand(style, {
				contentForms: forms
			}));
			if (editor.ui.addButton) {
				editor.ui.addButton(buttonName, {
					label: buttonLabel,
					command: commandName,
					toolbar: 'basicstyles'
				});
			}
		};

		// element
		var contentForms = {
			code: [
				'code'
			]
		},
		config = editor.config;

		// button
		addButtonCommand('Code', 'Code', 'code', config.coreStyles_code);
	}
});

// the style definition that applies the **...** style to the text.
CKEDITOR.config.coreStyles_code = {
	element: 'code'
};
