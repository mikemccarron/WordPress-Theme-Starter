(function() {
	tinymce.create('tinymce.plugins.facebookButton', {

		init : function(ed, url) {
			ed.addButton('facebookButton', {
				title : 'Inset Facebook Button',
				image : url+'/mce-button-social-facebook.png',

				onclick : function() {
					var textUrl = prompt("Enter Facebook URL", "");

					if (textUrl != null && textUrl != ''){
						ed.execCommand('mceInsertContent', false, '[facebook url="'+textUrl+'"][/facebook]');
					}
				}
			});
		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : "Facebook",
				author : '1 Trick Pony',
				authorurl : 'http://www.1trickpony.com',
				infourl : '',
				version : "1.0"
			};
		}

	});
	tinymce.PluginManager.add('facebookButton', tinymce.plugins.facebookButton);
})();