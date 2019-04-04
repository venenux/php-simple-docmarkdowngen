<?php
include_once(__DIR__ . '/ClassParser.php');
include_once(__DIR__ . '/TextTable.php');

/**
 * class implementation to output markdown text from class file comments
 * 
 * @author Marco Cesarato <cesarato.developer@gmail.com>
 * @author PICCORO Lenz McKAY <mckaygerhard@gmail.com>
 * @copyright Copyright (c) 2018, 2019
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link https://github.com/marcocesarato/PHP-Class-Markdown-Docs
 * @version 0.1.10 (2019-04-05)
 */
class ClassMarkdown
{

    /**
     * ClassMarkdown constructor
     * @param none
     */
    public function __construct()
    {
    }

    /**
     * a given class funtions as array keys
     * @param $class
     * @return array
     */
    protected static function parseClass($class)
    {
        $rows = array();
        foreach ($class['functions'] as $key => $value) {
            $row = array();
            $description = array();
            $parameters = array();
            $return = 'void';
            $row[] = $key;
            $value['doc'] = trim(str_replace(array("\r", "*", "/", '@', '|'), array('', '', '', '', '\|'), $value['doc']));
            $value['doc'] = explode("\n", $value['doc']);
            foreach ($value['doc'] as $line) {
                $line = trim(preg_replace('~[.[:cntrl:]]~', '', $line));
                if (preg_match('/^param/i', $line)) {
                    $line = str_replace('param ', '', $line);
                    $parameters[] = $line;
                } else if (preg_match('/^return/i', $line)) {
                    $line = str_replace('\|', '<br>', $line);
                    $line = str_replace('return ', '', $line);
                    $return = $line;
                } else {
                    $description[] = substr($line,0,50);
                }
            }
            $row[] = implode(' <br> ', $description);
            $row[] = implode(' <br> ', $value['modifiers']);
            $row[] = implode(' <br> ', $parameters);
            $row[] = $return;
            $rows[] = $row;
        }
        return $rows;
    }


    /**
     * a given class tags as markdown formated paragraph
     * @param $class
     * @return string
     */
    protected static function parseExtended($class)
    {
        $name = $class['name'];
        $autor = '';
        $description = NULL;
        $coping = '(c) '.date('Y');
        $version = '';
        $class['doc'] = trim(str_replace(array("\r", "*", "/", '|'), array('', '', '', '', '\|'), $class['doc']));
        $class['doc'] = explode("\n", $class['doc']);
        foreach ($class['doc'] as $line) {
            if (is_null($description)){
                $description = substr($line,0,55);
            }
            if (strpos($line, 'uthor') !== FALSE) {
                $line = str_replace('@author ', '', $line);
                $autor .= '* '.$line. PHP_EOL;
            }
            $line = str_replace('@', '', $line);
            if (strpos($line, 'ersion') !== FALSE) {
                $version = trim(preg_replace('~[[:cntrl:]]~', '', $line));
                $version = $version;
            }else {
                $line = trim(preg_replace('~[.[:cntrl:]]~', '', $line));
                if (preg_match('/^param/i', $line)) {
                    $line = str_replace('param ', '', $line);
                    $parameters = $line;
                } else if (preg_match('/^copyright/i', $line)) {
                    $line = str_replace('\|', '<br>', $line);
                    $line = str_replace('copyright ', '', $line);
                    $coping = $line;
                }
			}
        }
        $info = '**'.$name.', '.$version.'**: '.$description. PHP_EOL. PHP_EOL;
        $info .= $coping. PHP_EOL. PHP_EOL;
        $info .= $autor;
        return $info. PHP_EOL;
    }
    

    /**
     * Get markdown class documentation
     * @param $file
     * @return string
     */
    public static function getMarkdown($file)
    {
        $result = '';
        $cp = new ClassParser();
        $cp->parse($file);
        $classes = $cp->getClasses();
        foreach ($classes as $k => $class) {
            $class['name'] = $k;
            $result .= "## " . $class['name'] . PHP_EOL . PHP_EOL;
            $rows = self::parseClass($class);
            $columns = ['Method', 'Description', 'Type', 'Parameters', 'Return'];
            $result .= self::parseExtended($class);
            $t = new TextTable($columns, $rows);
            $result .= $t->render();
            $result .= PHP_EOL . PHP_EOL;
        }
        return $result;
    }

    /**
     * Print Markdown class documentation
     * @param $file
     */
    public static function printMarkdown($file)
    {
        echo self::getMarkdown($file);
    }

    /**
     * Get PHP file as array class documentation
     * @param $file
     * @return array
     */
    public static function getArray($file)
    {
        $result = array();
        $cp = new ClassParser();
        $cp->parse($file);
        $classes = $cp->getClasses();
        foreach ($classes as $k => $class) {
            $class['name'] = $k;
            $result[] = self::parseClass($class);
        }
        return $result;
    }
}
