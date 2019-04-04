<?php
/**
 * Creates a markdown table based on the parsed documentation
 *
 * @author Peter-Christoph Haider <peter.haider@zeyon.net>
 * @author PICCORO Lenz MCKAY <mckaygerhard@gmail.com>
 * @package Apidoc
 * @version 1.00 (2014-04-04)
 * @license GNU Lesser Public License
 */
class TextTable {
	/** @var int max leng of descriptions */
	public $maxlen = 50;
	/** @var array data to be procesed */
	private $data = array();
	/** @var array header of the table output text */
	private $header = array();
	/** @var array The source path */
	private $len = array();
	/** @var array alingment of the headers columns */
	private $align = array(
		'name' => 'L',
		'type' => 'C'
	);

	/**
	 * can init the default values to markdown text table
	 * 
	 * @param array $header  The header array [key => label, ...]
	 * @param array $content Content table as matrix of tags funtions
	 * @param array $align   Alignment optios [key => L|R|C, ...]
	 */
	public function __construct($header=null, $content=array(), $align=false) {
		if ($header) {
			$this->header = $header;
		} elseif ($content) {
			foreach ($content[0] as $key => $value)
				$this->header[$key] = $key;
		}

		foreach ($this->header as $key => $label) {
			$this->len[$key] = strlen($label);
		}

		if (is_array($align))
			$this->setAlgin($align);

		$this->addData($content);
	}

	/**
	 * Overwrite the alignment array
	 *
	 * @param array $align   Alignment optios [key => L|R|C, ...]
	 */
	public function setAlgin($align) {
		$this->align = $align;
	}

	/**
	 * Add data to the table from matrix array tags class
	 *
	 * @param array $content Content matrix of tags class
	 * @return class self object class with data content populated
	 */
	public function addData($content) {
		foreach ($content as &$row) {
			foreach ($this->header as $key => $value) {
				if (!isset($row[$key])) {
					$row[$key] = '-';
				} elseif (strlen($row[$key]) > $this->maxlen) {
					$this->len[$key] = $this->maxlen;
				} elseif (strlen($row[$key]) > $this->len[$key]) {
					$this->len[$key] = strlen($row[$key]);
				}
			}
		}

		$this->data = $this->data + $content;
		return $this;
	}

	/**
	 * Add a delimiter based on aling of the class setted
	 *
	 * @return string
	 */
	private function renderDelimiter() {
		$res = '|';
		foreach ($this->len as $key => $l)
			$res .= (isset($this->align[$key]) && ($this->align[$key] == 'C' || $this->align[$key] == 'L') ? ':' : ' ')
			        .str_repeat('-', $l)
			        .(isset($this->align[$key]) && ($this->align[$key] == 'C' || $this->align[$key] == 'R') ? ':' : ' ')
			        .'|';
		return $res."\n";
	}

	/**
	 * Render a single row for markdown table
	 *
	 * @param  array $row
	 * @return string
	 */
	private function renderRow($row) {
		$res = '|';
		foreach ($this->len as $key => $l) {
			$res .= ' '.$row[$key].($l > strlen($row[$key]) ? str_repeat(' ', $l - strlen($row[$key])) : '').' |';
		}

		return $res."\n";
	}

	/**
	 * Render the table text as markdown
	 *
	 * @param  array  $content Additional table content
	 * @return string
	 */
	public function render($content=array()) {
		$this->addData($content);

		$res = $this->renderRow($this->header).$this->renderDelimiter();
		foreach ($this->data as $row)
			$res .= $this->renderRow($row);

		return $res;
	}
}
