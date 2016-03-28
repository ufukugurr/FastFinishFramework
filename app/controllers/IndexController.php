<?php
/**
* Index Controller
*/
class IndexController
{
	function home()
	{
		View::get('index');
	}

	function name($name)
	{
		return "Hello ".$name;
	}
}