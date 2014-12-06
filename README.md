User management module for Yii 2
=====

Perks
---

* User management
* RBAC (roles, permissions and stuff) with web interface
* Registration, authorization, password recovery and so on
* Visit log
* Optimised (zero DB queries during usual user workflow)
* Nice widgets like GhostMenu or GhostHtml::a where elements are visible only if user has access to route where they point


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist webvimark/module-user-management "*"
```

or add

```
"webvimark/module-user-management": "*"
```

to the require section of your `composer.json` file.

Installation and configuration
---

In your config/web.php

```php

'components'=>[
	'user' => [
		'class' => 'webvimark\modules\UserManagement\components\UserConfig',

		// Comment this if you don't want to record user logins
		'on afterLogin' => function($event) {
				\webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
			}
	],
],

'modules'=>[
	'user-management' => [
		'class' => 'webvimark\modules\UserManagement\UserManagementModule',

		// Here you can set your handler to change layout for any controller or action
		// Tip: you can use this event in any module
		'on beforeAction'=>function(ActionEvent $event) {
				if ( $event->action->uniqueId == 'user-management/auth/login' )
				{
					$event->action->controller->layout = 'loginLayout.php';
				};
			},
	],
],

```

To learn about events check:

* http://www.yiiframework.com/doc-2.0/guide-concept-events.html
* http://www.yiiframework.com/doc-2.0/guide-concept-configurations.html#configuration-format

Layout handler example in *AuthHelper::layoutHandler*

To see full list of options check *UserManagementModule* file

Run migrations

```
./yii migrate vendor/webvimark/module-user-management/migrations/

```

Usage
-----

Users - http://site.com/user-management/user/index

Roles - http://site.com/user-management/role/index

Permissions - http://site.com/user-management/permission/index

Permission groups - http://site.com/user-management/auth-item-group/index

Visit log - http://site.com/user-management/user-visit-log/index


Events
------

Events can be handled via config file like following

```php

'modules'=>[
	'user-management' => [
		'class' => 'webvimark\modules\UserManagement\UserManagementModule',
		'on afterRegistration' => function(UserAuthEvent $event) {
			// Here you can do your own stuff like assign roles, send emails and so on
		},
	],
],

```

List of supported events can be found in *UserAuthEvent* class

