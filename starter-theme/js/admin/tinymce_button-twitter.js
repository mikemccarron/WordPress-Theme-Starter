(function() {
	tinymce.create('tinymce.plugins.twitterButton', {

		init : function(ed, url) {
			ed.addButton('twitterButton', {
				title : 'Inset Twitter Button',
				image : url+'/mce-button-social-twitter.png',

				onclick : function() {
					var textUrl = prompt("Enter Twitter URL", "");

					if (textUrl != null && textUrl != ''){
						ed.execCommand('mceInsertContent', false, '[twitter url="'+textUrl+'"][/twitter]');
					}
				}
			});
		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : "Twitter",
				author : '1 Trick Pony',
				authorurl : 'http://www.1trickpony.com',
				infourl : '',
				version : "1.0"
			};
		}

	});
	tinymce.PluginManager.add('twitterButton', tinymce.plugins.twitterButton);
})();