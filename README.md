# Fast Finish Framework BETA

FF Framework is a PHP micro-framework that helps you quickly write simple yet powerful web applications and APIs.

This fast and beautiful.

## File System
Simple file system.

- app
  * controllers
  * models
  * views
  * routes.php
- config
  * settings.php
- lib
- public
- vendor

## Routing
```php
$router->get('/example', function(){
    return 'GET method at the path /example';
});

$router->post('/example/{id}', function($id){
    return 'POST method at the path /example/1234. It passes in the parameter as a function argument.';
});

$router->any('/example', function(){
    return '(POST, GET, DELETE, OPTIONS, HEAD etc...) at the path /example';
});
```
or include controller
```php
$router->get('/', ['IndexController','home']);
$router->get('/{name}', ['IndexController','name']);
```
## Controller

```php
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
```
