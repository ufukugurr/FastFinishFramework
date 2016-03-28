<?php
/**
* View class 28.03.2016
*/
class View
{
	function get($template, $data = null)
	{
		if (isset($data)) {
			extract($data);
		}
		include __DIR__ . '/../app/views/'.$template.'.php';

	}
}