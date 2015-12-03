<?php
$return = [
			[
				'question' => 'Are Core and plugins up-to-date ?',
				'aide' => '<p>Use <a href="http://www.drush.org/en/master/" target="_blank">Drush</a> to update easily</p>'
			],
			[
				'question' => 'Have you enabled Drupal\'s cache and compression ?',
				'aide' => '<p>You have to. Go to <em>Configuration > Performance</em>.</p>'
			],
			[
				'question' => 'Have you protected your preproduction server with a login and a password ?',
				'aide' => '<p>Add this to your <em>.htaccess</em> file</p><pre>AuthType Basic
AuthName "Restricted"
AuthUserFile /path/to/.htpasswd
Require valid-user</pre>'
			],
			[
				'question' => 'Have you deleted unnecessary files (readme.txt, license.txt, etc.) ?',
				'aide' => '<p>You should!</p>'
			],
			[
				'question' => 'Have you disabled the auto-update (if necessary) ?',
				'aide' => '<p>Disable the update module in core modules.</p>'
			],
			[
				'question' => 'Have you enabled a cookie notice plugin ?',
				'aide' => '<p>You should use that plugin : <a href="https://www.drupal.org/project/eu_cookie_compliance" target="_blank">EU Cookie Compliance</a></p>'
			]
		  ];

echo json_encode($return);