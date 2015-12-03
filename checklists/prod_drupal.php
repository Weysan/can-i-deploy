<?php
$return = [
			[
				'question' => 'Are Core and plugins up-to-date ?',
				'aide' => '<p>Use <a href="http://www.drush.org/en/master/" target="_blank">Drush</a> to update easily</p>'
			],
			[
				'question' => 'Have you enabled email notifications for update ?',
				'aide' => '<p>Go to <em>Reports > Available Updates > Settings</em>.</p>'
			],
			[
				'question' => 'Have you enabled Drupal\'s cache and compression ?',
				'aide' => '<p>You have to. Go to <em>Configuration > Performance</em>.</p>'
			],
			[
				'question' => 'Have you disabled display errors ?',
				'aide' => '<p>You have to. Go to <em>Configuration > Logging and errors</em>.</p>'
			],
			[
				'question' => 'Have you removed the preproduction login and password from the production .htaccess file?',
				'aide' => '<p>You should!</p>'
			],
			[
				'question' => 'Have you disabled update for hacked modules ?',
				'aide' => '<p>You can do it with that hook : <a href="https://api.drupal.org/api/drupal/modules%21update%21update.api.php/function/hook_update_projects_alter/7" target="_blank">hook_update_projects_alter</a></p>'
			],
			[
				'question' => 'Have you deleted unnecessary files (readme.txt, license.txt, etc.) ?',
				'aide' => '<p>You should!</p>'
			],
			[
				'question' => 'Have you disabled drupal cron task ?',
				'aide' => '<p>With Drush : </p><pre>drush vset cron_safe_threshold 0</pre><p>Backoffice, go to <em>Configuration > System > Cron</em></p>'
			],
			[
				'question' => 'Have you enabled drupal cron task to server crontab ?',
				'aide' => '<p>You should !</p>'
			],
			[
				'question' => 'Have you disabled the auto-update (if necessary) ?',
				'aide' => '<p>Disable the update module in core modules.</p>'
			],
			[
				'question' => 'Have you configured periodic backup ?',
				'aide' => '<p>With that module : <a href="https://www.drupal.org/project/backup_migrate" target="_blank">Backup & Migrate</a></p>'
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
				'question' => 'Have you enabled a cookie notice plugin ?',
				'aide' => '<p>You should use that plugin : <a href="https://www.drupal.org/project/eu_cookie_compliance" target="_blank">EU Cookie Compliance</a></p>'
			]
		  ];

echo json_encode($return);