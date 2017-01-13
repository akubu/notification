
<?php

return [

    'KEY' => 'AIzaSyDez2cOp0XsluuNzGg49JwcK830-qJzvo8',
	
	/**
	 * Application Name.
	 */
	'application_name' => 'Function',

	/**
	 * Client ID.
	 */
	'client_id' => '300854638483-ok3me6g825mh0unhq2aksdn0tj2564op.apps.googleusercontent.com',

	/**
	 * Client Secret.
	 */
	'client_secret' => '8TpOH88pKJQgfF4XfGMUwX7W',

	/**
	 * Access Type
	 */
	'access_type' => 'offline',

	/**
	 * Approval Prompt
	 */
	'approval_prompt' => 'auto',

	/**
	 * Scopes.
	 */
	'scopes' => [
		'https://www.googleapis.com/auth/youtube',
		'https://www.googleapis.com/auth/youtube.upload',
		'https://www.googleapis.com/auth/youtube.readonly'
	],

	/**
	 * Developer key.
	 */
	'developer_key' => 'AIzaSyDez2cOp0XsluuNzGg49JwcK830-qJzvo8',

	/**
	 * Route URI's
	 */
	'routes' => [

		/**
		 * The prefix for the below URI's
		 */
		'prefix' => 'youtube',

		/**
		 * Redirect URI
		 */
		'redirect_uri' => 'callback',

		/**
		 * The autentication URI
		 */
		'authentication_uri' => 'auth',

	]

];