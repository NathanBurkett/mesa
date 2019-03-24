# Mesa

[![CircleCI](https://circleci.com/gh/NathanBurkett/mesa.svg?style=svg)](https://circleci.com/gh/NathanBurkett/mesa) [![codecov](https://codecov.io/gh/NathanBurkett/mesa/branch/master/graph/badge.svg)](https://codecov.io/gh/NathanBurkett/mesa)

Mesa is a programmatic table builder and/or interpreter.

## Installation

```sh
composer require nathanburkett/mesa
```

## Usage

### Via [`GeneratesTables` Trait](src/GeneratesTables.php)

Using the `GeneratesTables` trait is the simplest way to start consuming tables.

```php
<?php namespace Foo\Bar\Baz;

use NathanBurkett\Mesa\GeneratesTables;

class FooClass
{
    use GeneratesTables;
}
```

Then build a table by calling:
```php
<?php namespace Foo\Bar\Baz;

use NathanBurkett\Mesa\GeneratesTables;

class FooClass
{
    use GeneratesTables;
    
    public function run(): iterable
    {
        $tableContext = __DIR__ . '/some/php/file.php';

        return $this->generateTable($tableContext);
    } 
}
```

`$tableContext` is the data source the table is interpreting.

An optional callable can be passed to `generateTable` as the 2nd parameter which will be run on each of the table iteration's value and will replace that value.

Example:
```php
<?php
// ./some/php/file.php

return [
    'one' => [
        'name' => 'foo',
    ],
    'two' => [
        'name' => 'bar',
    ],
];
```

```php
<?php namespace Foo\Bar\Baz;

use NathanBurkett\Mesa\GeneratesTables;

class FooClass
{
    use GeneratesTables;
    
    public function run(): iterable
    {
        $tableContext = __DIR__ . '/some/php/file.php'; // THIS IS WHERE $tableContext COMES FROM

        return $this->generateTable($tableContext, function(array $row, $index) {
            if ($index === 'two') {
                $row['name'] = 'baz';
            }
            
            return $row;
        });
    } 
}
``` 

In the above example, `$table['two']['name']` would equal `'baz'`.

#### Loaders

The current default behavior of `$tableContext` passed as the first parameter to `GeneratesTables::generateTable()` is intended to be an absolute path to a PHP or YAML file. Anything else and [`FileLoaderFactory`](src/Loader/File/FileLoaderFactory.php) will throw an exception.

Other types can be interpreted by extending [`LoaderFactory`](src/Loader/LoaderFactory.php) and overridding any of the methods and then overriding the [`GeneratesTables::getLoaderFactory()`](src/GeneratesTables.php#L30)

```php
<?php namespace Foo\Bar\Baz;

use NathanBurkett\Mesa\GeneratesTables;
use NathanBurkett\Mesa\Loader\LoaderFactoryInterface;

class FooClass
{
    use GeneratesTables;
    
    // ...
    
    protected function getLoaderFactory(): LoaderFactoryInterface
    {
        return new YourNewFactoryLoader();
    }
}
```

#### Output

Once data has been read into a table, it will then be output by an [OutputStrategy](src/Output/OutputStrategy.php). The default OutputStrategy iterates over the table and yields an index and value via a generator function.

An optional callable can be passed as the 2nd parameter which will be run on each iteration's value and replace that iteration value.

An optional callable can be passed to `generateTable` as the 2nd parameter which will be run on each of the table iteration's value and will replace that value.

Example:
```php
<?php
// ./some/php/file.php

return [
    'one' => [
        'name' => 'foo',
    ],
    'two' => [
        'name' => 'bar',
    ],
];
```

```php
<?php namespace Foo\Bar\Baz;

use NathanBurkett\Mesa\GeneratesTables;

class FooClass
{
    use GeneratesTables;
    
    public function run(): iterable
    {
        $tableContext = __DIR__ . '/some/php/file.php'; // THIS IS WHERE $tableContext COMES FROM

        return $this->generateTable($tableContext, function(array $row, $index) {
            if ($index === 'two') {
                $row['name'] = 'baz';
            }
            
            return $row;
        });
    } 
}
``` 

In the above example, `$table['two']['name']` would equal `'baz'`.

An alternate OutputStrategy can be used by overriding [`GeneratesTables::getOutputStrategy()`](src/GeneratesTables.php#L40)
