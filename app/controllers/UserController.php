<?php
class UserController
{
	function displayUser()
	{

		View::get('index', [
			'asd' => 'qwe',
			'qwe' => 123
		]);
	}
}