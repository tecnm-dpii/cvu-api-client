<?php

namespace TecNM_DPII\CVU_API_Client;
use Iterator;
use Countable;
use JsonSerializable;

abstract class TnmApiCollectionBase extends TnmApiModelBase implements Iterator, Countable, JsonSerializable
{
    protected $collection_key	= 'items';
    protected $keyIndexName		= null;

    public function rewind()
    {
        if (isset($this->modelData[$this->collection_key])
            && is_array($this->modelData[$this->collection_key])) {
            reset($this->modelData[$this->collection_key]);
        }
    }
    public function current()
    {
        $this->coerceType($this->key());
        if (is_array($this->modelData[$this->collection_key])) {
            return current($this->modelData[$this->collection_key]);
        }
    }
    public function key()
    {
        if (isset($this->modelData[$this->collection_key])
            && is_array($this->modelData[$this->collection_key])) {
            return key($this->modelData[$this->collection_key]);
        }
    }
    public function next()
    {
        return next($this->modelData[$this->collection_key]);
    }
    public function valid()
    {
        $key = $this->key();
        return $key !== null && $key !== false;
    }
    public function count()
    {
        if (!isset($this->modelData[$this->collection_key])) {
            return 0;
        }
        return count($this->modelData[$this->collection_key]);
    }
    public function offsetSet($offset, $value)
    {
        if (!is_numeric($offset)) {
            return parent::offsetSet($offset, $value);
        }
        $this->modelData[$this->collection_key][$offset] = $value;
    }
    public function offsetExists($offset)
    {
        if (!is_numeric($offset)) {
            return parent::offsetExists($offset);
        }
        return isset($this->modelData[$this->collection_key][$offset]);
    }
    public function offsetUnset($offset)
    {
        if (!is_numeric($offset)) {
            return parent::offsetUnset($offset);
        }
        unset($this->modelData[$this->collection_key][$offset]);
    }
    public function offsetGet($offset)
    {
        if (!is_numeric($offset)) {
            return parent::offsetGet($offset);
        }
        $this->coerceType($offset);
        return $this->modelData[$this->collection_key][$offset];
    }
    public function setKeyAsIndex()
    {
        if (!is_null($this->itemsKeyName)) {
            $ids = self::array_column($this->modelData[$this->collection_key],$this->itemsKeyName);
            $this->modelData[$this->collection_key] = array_combine($ids, $this->modelData[$this->collection_key]);
        }
    }
    private function coerceType($offset)
    {
        $typeKey = $this->keyType($this->collection_key);
        if (isset($this->$typeKey) && !is_object($this->modelData[$this->collection_key][$offset])) {
            $type = $this->$typeKey;
            $this->modelData[$this->collection_key][$offset] =
                new $type($this->modelData[$this->collection_key][$offset]);
        }
    }
    protected static function array_column($array, $column_name, $index = null)
    {
        $return = array();
        foreach ($array as $key => $value) {
            if (is_null($index)) {
                $return[$key] = $value[$column_name];
            } else {
                $return[$value[$index]] = $value[$column_name];
            }
        }
        return $return;
    }
    public function jsonSerialize()
    {
        if (isset($this->modelData[$this->collection_key])) {
            return $this->modelData[$this->collection_key];
        } else {
            return parent::jsonSerialize();
        }
    }
}
