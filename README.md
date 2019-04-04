# php-simple-docmarkdowngen

Simple php markdown document generator from clases.. 
is a take of improvement for CI and Guachi first attempt .

Based and forked directly from Marco Cesarato's PHP Class Markdown Documentation

* Web Page: https://venenux.github.io/php-simple-docmarkdowngen/
* Download: https://gitlab.com/venenux/php-simple-docmarkdowngen

**YEAH!: hosted at Gitlab baby!**

## Description

Convert primitives PHPDoc comments from classes into Markdown.

By parsing a class file with a given file name 
and extracts the documentation of its functions and variables that it 
but in primitive PHPDoc format, 
then convert the extracted documentation into a file in Markdown format.

## Example

See documentation below in documentation section.

#### Usage

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
| add_request   | Add Ajax request                                   |        | $name<br>$request<br>bool $public                  | bool           |
| fetch         |                                                    |        | $what<br>null $operators                           | array          |
```

# Documentaton

## ClassMarkdown

**ClassMarkdown, version 0.1.10 (2019-04-05)**: class implementation to output markdown text from class

Copyright (c) 2018, 2019

*   Marco Cesarato <cesarato.developer@gmail.com>
*   PICCORO Lenz McKAY <mckaygerhard@gmail.com>

| Method        | Description                                       | Type                  | Parameters | Return |
| ------------- | ------------------------------------------------- | --------------------- | ---------- | ------ |
| __construct   | ClassMarkdown constructor                         | public                | none       | void   |
| parseClass    | a given class funtions as array keys              | protected <br> static | $class     | array  |
| parseExtended | a given class tags as markdown formated paragraph | protected <br> static | $class     | string |
| getMarkdown   | Get markdown class documentation                  | public <br> static    | $file      | string |
| printMarkdown | Print Markdown class documentation                | public <br> static    | $file      | void   |
| getArray      | Get PHP file as array class documentation         | public <br> static    | $file      | array  |


## ClassParser

**ClassParser, **: Class ClassParser

(c) 2019


| Method                 | Description | Type   | Parameters | Return |
| ---------------------- | ----------- | ------ | ---------- | ------ |
| getClasses             |             | public |            | array  |
| getClassesImplementing |             | public | $interface | array  |
| getClassesExtending    |             | public | $class     | array  |
| parse                  |             | public | $file      | void   |


## TextTable

**TextTable, version 1.00 (2014-04-04)**: Creates a markdown table based on the parsed documentat

(c) 2019

*   Peter-Christoph Haider <peter.haider@zeyon.net>
*   PICCORO Lenz MCKAY <mckaygerhard@gmail.com>

| Method          | Description                                        | Type    | Parameters                                         | Return                                             |
| --------------- | -------------------------------------------------- | ------- | -------------------------------------------------- | -------------------------------------------------- |
| __construct     | can init the default values to markdown text table <br>  | public  | array $header  The header array [key => label, ] <br> array $content Content table as matrix of tags funtions <br> array $align   Alignment optios [key => L\|R\|C, ] | void                                               |
| setAlgin        | Overwrite the alignment array <br>                 | public  | array $align   Alignment optios [key => L\|R\|C, ] | void                                               |
| addData         | Add data to the table from matrix array tags class <br>  | public  | array $content Content matrix of tags class        | class self object class with data content populated |
| renderDelimiter | Add a delimiter based on aling of the class setted <br>  | private |                                                    | string                                             |
| renderRow       | Render a single row for markdown table <br>        | private |  array $row                                        | string                                             |
| render          | Render the table text as markdown <br>             | public  |  array  $content Additional table content          | string                                             |


Copyright (c) 2018, 2019
 
*   Marco Cesarato <cesarato.developer@gmail.com>
*   PICCORO Lenz McKAY <mckaygerhard@gmail.com>

See [LICENSE](LICENSE)

* web Page: https://venenux.github.io/php-simple-docmarkdowngen/
* Download: https://gitlab.com/venenux/php-simple-docmarkdowngen

**YEAH!: hosted at Gitlab baby!**
