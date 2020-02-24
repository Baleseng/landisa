const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/sass/auth.scss', 'public/css')
	.sass('resources/sass/loader.scss','public/css')
  	.sass('resources/sass/crop.scss','public/css')
   	.sass('resources/sass/chatroom.scss','public/css')

   	.sass('resources/sass/dev-search.scss','public/css/search.css')
   	.sass('resources/sass/dev-comment.scss','public/css/comment.css')
   	.sass('resources/sass/dev-table.scss','public/css/table.css')

   	.sass('resources/sass/imported-user.scss','public/css/user.css')
   	.sass('resources/sass/imported-admin.scss','public/css/admin.css')
   	.sass('resources/sass/imported-theme-section.scss','public/css/theme.css')
   	.sass('resources/sass/imported-media-screens.scss','public/css/screens.css')

	.sass('resources/sass/dev-flipcard.scss','public/css/flip.css')
	.sass('resources/sass/dev-calendar.scss','public/css/calendar.css');

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/chat.js', 'public/js')
	.js('resources/js/btn.js', 'public/js')
	.js('resources/js/crop.js', 'public/js')

	// .js('node_modules/videojs-vr/dist/videojs-vr.min.js', 'public/js')
	// .js('node_modules/videojs-vr/dist/videojs-vr.js', 'public/js')
	// .js('node_modules/video.js/dist/video.js', 'public/js')
	// .js('node_modules/video.js/dist/video.min.js', 'public/js')

	.js('resources/js/realtime.js', 'public/js')

	.js('resources/js/sparkline.js', 'public/js')
	 
	.js('resources/js/moderator-realtime-writers.js', 'public/js')
	.js('resources/js/moderator-realtime-users.js', 'public/js')

	.js('resources/js/admin-realtime-writers.js', 'public/js')
	.js('resources/js/admin-realtime-users.js', 'public/js')
	.js('resources/js/admin-realtime-moderators.js', 'public/js')
	.js('resources/js/admin-realtime-operators.js', 'public/js')

	.js('resources/js/cms-realtime-editors.js', 'public/js')
	.js('resources/js/cms-realtime-writers.js', 'public/js')
	.js('resources/js/cms-realtime-users.js', 'public/js')
	.js('resources/js/cms-realtime-moderators.js', 'public/js')
	.js('resources/js/cms-realtime-adops.js', 'public/js')
	.js('resources/js/cms-realtime.js', 'public/js')

	.js('resources/js/admin-activity-writers.js', 'public/js')
	.js('resources/js/admin-activity-users.js', 'public/js')
	.js('resources/js/admin-activity-moderators.js', 'public/js')
	.js('resources/js/admin-activity-operators.js', 'public/js')

	.js('resources/js/admin-chart-revenue.js', 'public/js/revenue.js')
	 
	.js('resources/js/african.js', 'public/js')
	.js('resources/js/chart-afr.js', 'public/js')
	.js('resources/js/chart-ao.js', 'public/js')
	.js('resources/js/chart-bw.js', 'public/js')
	.js('resources/js/chart-ke.js', 'public/js')
	.js('resources/js/chart-map.js', 'public/js')
	.js('resources/js/chart-mz.js', 'public/js')
	.js('resources/js/chart-na.js', 'public/js')
	.js('resources/js/chart-tz.js', 'public/js')
	.js('resources/js/chart-za.js', 'public/js')
	.js('resources/js/chart-zm.js', 'public/js')
	.js('resources/js/chart-zw.js', 'public/js')

	.js('resources/js/scrollfixed-div-index.js', 'public/js/fixdiv-index.js')
	.js('resources/js/scrollfixed-div-news.js', 'public/js/fixdiv-news.js')
	.js('resources/js/scrollfixed-div-post.js', 'public/js/fixdiv-post.js')
	.js('resources/js/scrollfixed-div-wall.js', 'public/js/fixdiv-wall.js')

	.js('resources/js/section-highlight.js', 'public/js/highlight.js')
	.js('resources/js/section-option.js', 'public/js/option.js')

	.js('resources/js/writer_previewimg.js', 'public/js/previewimg.js')
	.js('resources/js/writer_subsection.js', 'public/js/subsection.js');
   
mix.copyDirectory('resources/js/ckeditor', 'public/js/ckeditor')
	.copyDirectory('resources/json', 'public/json');
