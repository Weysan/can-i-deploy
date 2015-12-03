<?php
$return = [
			[
				'question' => 'Are Core and plugins up-to-date ?',
				'aide' => '<p>Use <a href="http://wp-cli.org/" target="_blank">wp_cli</a> to update easily</p>'
			],
			[
				'question' => 'Is wp_config.php protected in your .htaccess file?',
				'aide' => '<p>Add this to your <em>.htaccess</em> file</p><pre>&lsaquo;files wp-config.php&rsaquo;
order allow,deny
deny from all
&lsaquo;/files&rsaquo;</pre>'
			],
			[
				'question' => 'Have you enabled the Google\'s crawling in the backoffice?',
				'aide' => '<p>You should! Go to <em>Reading options page</em></p>'
			],
			[
				'question' => 'Have you removed the preproduction login and password from the production .htaccess file?',
				'aide' => '<p>You should!</p>'
			],
			[
				'question' => 'Have you removed the Wordpress version in CMS\' meta tags ?',
				'aide' => '<p>Add this to your <em>function.php</em> file :</p><p><pre>remove_action(\'wp_head\', \'wp_generator\');</pre></p>'
			],
			[
				'question' => 'Have you disabled the theme Editor ?',
				'aide' => '<p>Add this to your <em>function.php</em> file :</p><p><pre>define( \'DISALLOW_FILE_EDIT\', true );</pre></p>'
			],
			[
				'question' => 'Have you disabled comments (if necessary) ?',
				'aide' => '<p>See that tutorial : <a href="https://www.dfactory.eu/turn-off-disable-comments/" target="_blank">https://www.dfactory.eu/turn-off-disable-comments/</a></p>'
			],
			[
				'question' => 'Have you deleted unnecessary files (readme.txt, license.txt, etc.) ?',
				'aide' => '<p>You should!</p>'
			],
			[
				'question' => 'Have you disabled the auto-update (if necessary) ?',
				'aide' => '<p>Add this to your <em>wp_config.php</em> file :</p><p><pre>define( \'WP_AUTO_UPDATE_CORE\', false );</pre></p>'
			],
			[
				'question' => 'Have you enabled a cookie notice plugin ?',
				'aide' => '<p>You should use that plugin : <a href="https://fr.wordpress.org/plugins/cookie-notice/" target="_blank">Cookie Notice by dFactory</a></p>'
			],
			[
				'question' => 'Have you added the google analytics tags ?',
				'aide' => '<p>Ask to your project-manager!!!</p>'
			],
			[
				'question' => 'Is your robots.txt file ok ?',
				'aide' => '<p>Make it OK!</p>'
			],
			[
				'question' => 'Have you checked cron tasks are running safely ?',
				'aide' => '<p>Fix-it!</p>'
			]
		  ];

echo json_encode($return);