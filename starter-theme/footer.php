	<!-- http://www.stevesouders.com/blog/2009/04/27/loading-scripts-without-blocking/ -->
	<script type="text/javascript">

		function deferScriptLoader(src) {
			window._sf_endpt=(new Date()).getTime();
			var script = document.createElement("script");
			document.getElementsByTagName("body")[0].appendChild(script);
			script.src = src;
		}
		deferScriptLoader("<?php bloginfo('siteurl'); ?>assets/scripts/plugins/plugins.js");
		deferScriptLoader("<?php bloginfo('siteurl'); ?>assets/scripts/app.js");
	</script>

	<?php wp_footer(); ?>
</body>
</html>