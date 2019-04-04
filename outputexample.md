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


