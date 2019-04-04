# php-simple-docmarkdowngen

Simple php markdown document generator from clases.. 
is a take of improvement for CI and Guachi first attempt .

Based and forked directly from Marco Cesarato's PHP Class Markdown Documentation

* web Page: https://venenux.github.io/php-simple-docmarkdowngen/
* Download: https://gitlab.com/venenux/php-simple-docmarkdowngen

**YEAH!: hosted at gitlab baby!**

## Description

Convert primitives PHPDoc comments from classes into Markdown.

By parsing a class file with a given file name 
and extracts the documentation of its functions and variables that it 
but in primitive PHPDoc format, 
then convert the extracted documentation into a file in Markdown format.

## Methods

| Method        | Description                        | Type                | Parameters | Return |
| ------------- | ---------------------------------- | ------------------- | ---------- | ------ |
| getMarkdown   | Get markdown class documentation   | public<br>static    | $file      | string |
| printMarkdown | Print Markdown class documentation | public<br>static    | $file      |        |
| getArray      | Get php array class documentation  | public<br>static    | $file      | array  |

## Example

### Usage

```php
php "include 'ClassMarkdown.php'; ClassMarkdown::printMarkdown('CoreClass.php');" >> ver.md
```


#### Output Text

```text
## CoreClass

**CoreClass, version 0.1**: Class core for all framework user base code

Copyright (c) 2018, 2019

*   PICCORO Lenz McKAY <mckaygerhard@gmail.com>

| Method        | Description                                        | Type   | Parameters                                         | Return         |
| ------------- | -------------------------------------------------- | ------ | -------------------------------------------------- | -------------- |
| __construct   | Constructor                                        | public |                                                    | void           |
| __init        | Initialize                                         |        |                                                    | bool           |
| add_request   | Add Ajax request                                   |        | $name<br>$request<br>bool $public                  | bool           |
| exists        | Check if element already exists if exists it will be updated on Save else it will be inserted |        | null $what<br>bool $undelete                       | bool           |
| retrieve      | Retrieve element                                   |        | null $what<br>bool $encode<br>null $onlyFields<br>null $orderBy<br>bool $returnAsArray<br>null $operators<br>bool $dump | array<br>mixed |
| fetch         |                                                    |        | $what<br>null $operators                           | array          |
```

#### Markdown Result

## CoreClass

**CoreClass, version 0.1**: Class core for all framework user base code

Copyright (c) 2018, 2019

*   PICCORO Lenz McKAY <mckaygerhard@gmail.com>

| Method        | Description                                        | Type   | Parameters                                         | Return         |
| ------------- | -------------------------------------------------- | ------ | -------------------------------------------------- | -------------- |
| __construct   | Constructor                                        | public |                                                    | void           |
| __init        | Initialize                                         |        |                                                    | bool           |
| add_request   | Add Ajax request                                   |        | $name<br>$request<br>bool $public                  | bool           |
| exists        | Check if element already exists if exists it will be updated on Save else it will be inserted |        | null $what<br>bool $undelete                       | bool           |
| retrieve      | Retrieve element                                   |        | null $what<br>bool $encode<br>null $onlyFields<br>null $orderBy<br>bool $returnAsArray<br>null $operators<br>bool $dump | array<br>mixed |
| fetch         |                                                    |        | $what<br>null $operators                           | array          |


* web Page: https://venenux.github.io/php-simple-docmarkdowngen/
* Download: https://gitlab.com/venenux/php-simple-docmarkdowngen

**YEAH!: hosted at gitlab baby!**

