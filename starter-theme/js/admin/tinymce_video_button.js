(function() {
	tinymce.create('tinymce.plugins.videoButton', {

		init : function(ed, url) {
			ed.addButton('videoButton', {
				title : 'Inset Video Link',
				image : url+'/mce-video-button.png',

				onclick : function() {
					var text = prompt("Inset Link Text", "");
					var videoUrl = prompt("Inset YouTube URL", "");

					if (text != null && text != ''){
						ed.execCommand('mceInsertContent', false, '[videoButton video="'+videoUrl+'"]'+text+'[/videoButton]');
					}
				}
			});
		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : "Video Button",
				author : '1 Trick Pony',
				authorurl : 'http://www.1trickpony.com',
				infourl : '',
				version : "1.0"
			};
		}

	});
	tinymce.PluginManager.add('videoButton', tinymce.plugins.videoButton);
})();