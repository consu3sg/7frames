<?php

/**
 * ComparatorUtil
 * Esta classe desenvolvida por Guilherme Oliveira Toccacelli
 * Esta classe possibilita ordenar uma array de objetos baseado em seus atributos
 * @category   ComparatorUtil
 * @package    ComparatorUtil
 * @project    @consu3sg
 * @copyright  Copyright (c) 2015 - 2016 ComparatorUtil (http://www.3sg.com.br/util/commons/ComparatorUtil)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.8, 2012-10-12
 */
class ComparatorUtil {

    private $tmpAttr;
    private $tmpOrder;
    private $orderType;

    public function sort(&$listObject, $attrs = []) {
        if (!is_array($attrs)) {
            $attrs = [$attrs];
        }
        foreach ($attrs as $attr) {
            $this->tmpAttr = $attr;
            $pos = array_search($attr, $attrs);
            if (isset($this->orderType[$pos])) {
                if ($this->orderType[$pos] === true) {
                    $this->tmpOrder = SORT_ASC;
                    uasort($listObject, [$this, "compare"]);
                } else {
                    $this->tmpOrder = SORT_DESC;
                    usort($listObject, [$this, "compare"]);
                }
            } else {
                $this->tmpOrder = SORT_ASC;
                uasort($listObject, [$this, "compare"]);
            }
        }
    }

    public function setOrderType($orderType = []) {
        if (!is_array($orderType)) {
            $orderType = [$orderType];
        }
        $this->orderType = $orderType;
    }

    private function compare($objectA, $objectB) {
        $getter = 'get' . (ctype_upper($this->tmpAttr[1]) ? $this->tmpAttr : ucfirst($this->tmpAttr));
        if (method_exists($objectA, $getter)) {
            $tmpValueA = call_user_func([$objectA, $getter]);
            $tmpValueB = call_user_func([$objectB, $getter]);
        }
        if ($this->tmpOrder === SORT_DESC) {
            return strcmp($tmpValueB, $tmpValueA);
        } else {
            return strcmp($tmpValueA, $tmpValueB);
        }
    }

}
