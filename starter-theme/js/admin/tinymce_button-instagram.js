(function() {
	tinymce.create('tinymce.plugins.instagramButton', {

		init : function(ed, url) {
			ed.addButton('instagramButton', {
				title : 'Inset Instagram Button',
				image : url+'/mce-button-social-instagram.png',

				onclick : function() {
					var textUrl = prompt("Enter Instagram URL", "");

					if (textUrl != null && textUrl != ''){
						ed.execCommand('mceInsertContent', false, '[instagram url="'+textUrl+'"][/instagram]');
					}
				}
			});
		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : "Instagram",
				author : '1 Trick Pony',
				authorurl : 'http://www.1trickpony.com',
				infourl : '',
				version : "1.0"
			};
		}

	});
	tinymce.PluginManager.add('instagramButton', tinymce.plugins.instagramButton);
})();