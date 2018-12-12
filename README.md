Box from adminLTE
=================
 Box widget from adminLTE for Yii

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist viktorals/yii2-adminlte-box "*"
```

or add

```
"viktorals/yii2-adminlte-box": "*"
```

to the require section of your `composer.json` file.


**Описание**
-
Простой виджет для использования box от AdminLTE

**Содержание** 
-
Константы типа блока:
```
                const box_default = 'box-default';
		const box_primary = 'box-primary';
		const box_info = 'box-info';
		const box_warning = 'box-warning';
		const box_success = 'box-success';
		const box_danger = 'box-danger';
```

Настройки модуля:
```php
		public $boxType = 'box-default'; - настройки типа блока(используйте константы)
		public $boxClass; - класс всего блока
		public $title = 'Box'; - заголовок блока
		public $headerLine = true; - линия между contentom и header
		public $close = true; - кнопка удаления блока
		public $collapse = true; - кнопка сворачивания блока
		public $footer = true; - будет ли footer
		public $contentFooter = 'footer'; - текст footer
		public $boxSolid =false; - будет ли header закрашен 
```

**Подключение**
-
```php
 
     <?php box::begin(['boxColor'=>box::box_info,'boxSolid'=>true,]); ?>
           
           content that may contains - > то, что будет в блоке.
     
     <?php box::end(); ?>

 
```