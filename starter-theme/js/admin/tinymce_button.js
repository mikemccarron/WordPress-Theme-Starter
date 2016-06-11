(function() {
	tinymce.create('tinymce.plugins.regularButton', {

		init : function(ed, url) {
			ed.addButton('regularButton', {
				title : 'Inset Button',
				image : url+'/mce-button.png',

				onclick : function() {
					var text = prompt("Inset Link Text", "");
					var textUrl = prompt("Inset URL", "");
					var textColor = prompt("Choose a color. If you do not know the color, leave this empty. Make sure it is all lowercase (blue).", "");

					if (text != null && text != ''){
						ed.execCommand('mceInsertContent', false, '[button url="'+textUrl+'" color="'+textColor+'"]'+text+'[/button]');
					}
				}
			});
		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : "Button",
				author : '1 Trick Pony',
				authorurl : 'http://www.1trickpony.com',
				infourl : '',
				version : "1.0"
			};
		}

	});
	tinymce.PluginManager.add('regularButton', tinymce.plugins.regularButton);
})();