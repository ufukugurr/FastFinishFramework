<?php
class IndexController
{
	function home()
	{
		View::get('index');
	}

	function name($name)
	{
		//$user = User::find(1);
		//echo $user->name;
		return "Hello ".$name;
	}
}