/**
 * $Id: editor_plugin.js 001 2009-03-25
 *
 * @author Ben Huson
 * @copyright Copyright 2004-2008, Ben Huson, All rights reserved.
 */

(function() {
	tinymce.create('tinymce.plugins.CiteTag', {
		
		// Init.
		init : function(ed, url) {
			var t = this;

			t.editor = ed;

			// Register commands
			ed.addCommand('mceCiteTag', function() {
				ed.execCommand('mceReplaceContent', false, ' <cite>{$selection}</cite> ');
			});

			// Register buttons
			ed.addButton('citetag', {
				title : 'Cite Tag',
				cmd : 'mceCiteTag',
				image : url + '/img/button.svg'
			});

		},
		
		// Get Info
		getInfo : function() {
			return {
				longname : 'Cite Tag',
				author : 'Ben Huson',
				authorurl : 'https://github.com/benhuson',
				infourl : 'https://github.com/benhuson/inline-quote-tag',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}

	});

	// Register plugin
	tinymce.PluginManager.add('citetag', tinymce.plugins.CiteTag);
	
})();