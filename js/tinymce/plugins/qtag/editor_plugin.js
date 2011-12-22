/**
 * $Id: editor_plugin.js 001 2009-03-25
 *
 * @author Ben Huson
 * @copyright Copyright 2004-2008, Ben Huson, All rights reserved.
 */

(function() {
	tinymce.create('tinymce.plugins.QTag', {
		
		// Init.
		init : function(ed, url) {
			var t = this;

			t.editor = ed;

			// Register commands
			ed.addCommand('mceQTag', function() {
				ed.execCommand('mceReplaceContent', false, '<q>{$selection}</q>');
			});

			// Register buttons
			ed.addButton('qtag', {
				title : 'Q Tag',
				cmd : 'mceQTag',
				image : url + '/img/button.png'
			});

		},
		
		// Get Info
		getInfo : function() {
			return {
				longname : 'Q Tag',
				author : 'Ben Huson',
				authorurl : 'http://www.camber-group.com',
				infourl : 'http://www.camber-group.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}

	});

	// Register plugin
	tinymce.PluginManager.add('qtag', tinymce.plugins.QTag);
	
})();