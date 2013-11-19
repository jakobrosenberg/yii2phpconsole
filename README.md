yii2phpconsole
==============
**Php Console extension for Yii2**
https://github.com/barbushin/php-console


Installation
------------

**composer.json**
```
{
  "require": {
      "simpletree/yii2phpconsole": "dev-master"
  }
}
```

**config/main.php**
```
  'preload' => ['phpconsole'],
  ...
  'components' => [
    ...
    'phpconsole' => [
        'class' => '\Simpletree\Phpconsole\Phpconsole',
        'registerGlobal' => true,   //optional, defaults to true
        'password' => '1234'        //optional, defaults to '1234'
    ],
    ...
  ]
```


Usage
-----

**With globals**
```
PC::debug($var, 'tag');
PC::tag($var);
```

**Without globals**
```
PhpConsole\Handler::getInstance()->debug($var, 'some.tags');
```
