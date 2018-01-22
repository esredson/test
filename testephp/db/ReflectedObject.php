<?php
class ReflectedObject {
    
    private $o;
    private $class;
    private $cachedProperties;

    function __construct($o){
        $this->o = $o;
        $this->class = new ReflectionClass($o);
    }

    function getName(){
        return $this->class->getName();
    }

    function getId(){
        return $this->o->getId();
    }

    function getProperties(){
        if (empty($this->cachedProperties)){
            $this->cachedProperties = array();
            foreach($this->class->getProperties() as $prop) {
                $prop->setAccessible(true);
                $val = $prop->getValue($this->o);
                $this->cachedProperties[$prop->getName()] = is_object($val) ? new ReflectedObject($val) : $val;
            }
        }
        return $this->cachedProperties;
    }

    function getProperty($name){
        foreach($this->getProperties() as $key =>$val){
            if ($key == $name){
                return $val;
            }
        }
    }

    function setProperty($prop, $val){
        $prop = $this->class->getproperty($prop);
        $prop->setAccessible(true);
        $prop->setValue($this->o, $val);
    }

    function newInstance(){
        return new ReflectedObject(new $this->o);
    }

    function getObject(){
        return $this->o;
    }
}
?>