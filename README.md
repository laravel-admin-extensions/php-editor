PHP editor extension for laravel-admin based on code-mirror
======

## Installation 

```bash
composer require laravel-admin-ext/php-editor

php artisan vendor:publish --tag=laravel-admin-code-mirror
```

## 配置

在`config/admin.php`文件的`extensions`，加上属于这个扩展的一些配置
```php

    'extensions' => [

        'php-editor' => [
        
            // 如果要关掉这个扩展，设置为false
            'enable' => true,
            
            // 编辑器的配置
            'config' => [
                
            ]
        ]
    ]

```

更多配置可以到[CodeMirror文档](https://codemirror.net/)找到

## 使用

在form表单中使用它：
```php
$form->php('code');
```

设置高度
```php
$form->php('code')->height(500);
```

## 支持

如果觉得这个项目帮你节约了时间，不妨支持一下;)

![-1](https://cloud.githubusercontent.com/assets/1479100/23287423/45c68202-fa78-11e6-8125-3e365101a313.jpg)

License
------------
Licensed under [The MIT License (MIT)](LICENSE).