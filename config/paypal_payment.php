<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => 'AThvafH7ZRQpBJNXAKf1uHP8GM9GftmPG93zEI_0xTtEB9llebjcoP1hOY9E6AjLCMrQ87H1yGoxgtId',
		'ClientSecret' => 'EEYqpjlWRda_y90fIZ_g5KCAsCVEjVQHD25H_zQJI6Br9fYN-KvulYTHJ547ESYv8g2IT9DqcP7DEKvg',
	),

	# Connection Information
	'Http' => array(
		// 'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		'EndPoint' => 'https://api.sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		//'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		//'LogLevel' => 'FINE',
	),
);
