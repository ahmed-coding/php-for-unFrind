<?php

function lang($phrase)
{

	static $lang = array(

		'HOME_ADMIN'  => 'Home',
		'CATEGORIES'  => 'Switch User',
		'ITEMS'       => 'Logout',
		'MEMBERS'     => 'Members',
		'COMMENTS'     => 'Comments',
		'LOGS'        => 'Logs',


	);
	return $lang[$phrase];
}
