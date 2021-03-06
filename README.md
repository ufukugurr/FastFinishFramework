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

## Dabase ORM
These are your basic methods to find and retrieve records from your database. See the Finders section for more details.
```php
$post = Post::find(1);
echo $post->title; # 'My first blog post!!'
echo $post->author_id; # 5

also the same since it is the first record in the db
$post = Post::first();

finding using dynamic finders
$post = Post::find_by_name('The Decider');
$post = Post::find_by_name_and_id('The Bridge Builder',100);
$post = Post::find_by_name_or_id('The Bridge Builder',100);

finding using a conditions array
$posts = Post::find('all',array('conditions' => array('name=? or id > ?','The Bridge Builder',100)));
```

### Model
```php
<?php
use ActiveRecord\Model as ActiveRecord;

class Post extends ActiveRecord
{
	
}
```

### Create

Here we create a new post by instantiating a new object and then invoking the save() method.
```php
$post = new Post();
$post->title = 'My first blog post!!';
$post->author_id = 5;
$post->save();
# INSERT INTO `posts` (title,author_id) VALUES('My first blog post!!', 5)
```
### Update

To update you would just need to find a record first and then change one of its attributes. It keeps an array of attributes that are "dirty" (that have been modified) and so our sql will only update the fields modified.
```php
$post = Post::find(1);
echo $post->title; # 'My first blog post!!'
$post->title = 'Some real title';
$post->save();
# UPDATE `posts` SET title='Some real title' WHERE id=1

$post->title = 'New real title';
$post->author_id = 1;
$post->save();
# UPDATE `posts` SET title='New real title', author_id=1 WHERE id=1
```
### Delete

Deleting a record will not destroy the object. This means that it will call sql to delete the record in your database but you can still use the object if you need to.
```php
$post = Post::find(1);
$post->delete();
# DELETE FROM `posts` WHERE id=1
echo $post->title; # 'New real title'
```
