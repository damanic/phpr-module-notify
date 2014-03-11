<?php

// Create user email provider
// 

$exisiting_provider = Notify_Provider::create()->find_by_code('public_emailer');

if (!$exisiting_provider) {

	$provider = Notify_Provider::create();
	$provider->code = 'public_emailer';
	$provider->class_name = 'Notify_Public_Email_Provider';
	$provider->send_mode = Notify_Public_Email_Provider::mode_mail;
	$provider->init_form_fields();

	$provider->public_template_css = 'a, a:hover {
	text-decoration: none;
	color: #0862A2;
	font-weight: bold;
}
	
td, tr, th, table { 
	padding: 0px;
	margin: 0px;
}

p { 
	margin: 10px 0;
}';

	$provider->public_template_content = '<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="en-us"/>
		<style type="text/css" media="screen">
			<?=$this->css ?>
		</style>
	</head>
	<body>
		<?=$message ?>
	</body>
</html>';

	$provider->save();

}

// Create admin email provider
// 

$exisiting_provider = Notify_Provider::create()->find_by_code('private_emailer');

if (!$exisiting_provider) {

	$provider = Notify_Provider::create();
	$provider->code = 'private_emailer';
	$provider->class_name = 'Notify_Private_Email_Provider';
	$provider->send_mode = Notify_Private_Email_Provider::mode_mail;
	$provider->init_form_fields();

	$provider->private_template_css = 'a, a:hover { 
	text-decoration: none;
	color: #0862A2;
	font-weight: bold;
}
	
td, tr, th, table { 
	padding: 0px;
	margin: 0px;
}

p { 
	margin: 10px 0;
}';

	$provider->private_template_content = '<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="en-us"/>
		<style type="text/css" media="screen">
			<?=$this->css ?>
		</style>
	</head>
	<body>
		<?=$message ?>
		<hr/>
		<p>This is an automatic message. Do not reply to it.</p>
	</body>
</html>';

	$provider->save();

}