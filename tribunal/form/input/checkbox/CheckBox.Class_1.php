<?php
include_once(dirname(__FILE__) . "/../input/Input.Class.php");
include_once(dirname(__FILE__)."/../../tags/label/Label.Class.php");
class CheckBox implements Input {

    private $html;
    private $value;
    private $name;
    private $class;
    private $events;
    private $id;
    private $text;
    private $enable;
    private $check;
    
    private $title;
    private $alt;
    private $type;

    public function __construct($param) {
        $this->param($param);
        $this->generaTagHtml();
        if($this->text!=""){
            $param=array("text"=>$this->text);
            $label = new Label($param);
            $this->html.=$label->returnHtml();
        }
        return $this->html;
    }

    public function param($param) {
        foreach ($param as $tag => $value) {
            if (($tag == "value") && ($value != ""))
                $this->_value($value);
            if (($tag == "type") && ($value != ""))
                $this->_type($value);
            if (($tag == "name") && ($value != ""))
                $this->_name($value);
            if (($tag == "class") && ($value != ""))
                $this->_class($value);
            if (($tag == "enamble") && ($value != ""))
                $this->_enamble($value);
            if (($tag == "id") && ($value != ""))
                $this->_id($value);
            if (($tag == "title") && ($value != ""))
                $this->_title($value);
            
            if (($tag == "text") && ($value != ""))
                $this->_text($value);
            if (($tag == "events") && ($value != ""))
                $this->_events($value);
            if (($tag == "check") && ($value != ""))
                $this->_check($value);
        }
    }

    public function addEvents() {
      if(is_array($this->events)){
          foreach ($this->events as $tag => $value){
             $this->html.=" ".$tag."= \"$value\"";
          }
      }

    }

    public function generaTagHtml() {
        $this->html.="<input ";
        $this->html.= ( $this->type != "") ? "type='" . $this->type . "' " : "type='Checkbox'";
        $this->html.= ( $this->value != "") ? "value='" . $this->value . "' " : "";
        $this->html.= ( $this->name != "") ? "name='" . $this->name . "' " : "name='' ";
        $this->html.= ( $this->class != "") ? "class=" . $this->class." '" : "";
        $this->html.= ( $this->id != "") ? "id='" . $this->id . "' " : "";
        $this->html.= ( $this->enable == true) ? "readonly " : "";
        $this->html.= ( $this->title != "") ? "title='" . $this->title . "' " : "";
        
        
        $this->html.= ( $this->check != "") ? "checked " : "";
        $this->addEvents();
        $this->html.="/>";
    }

    private function _check($check){
        $this->check=$check;
    }

    public  function _text($text){
      $this->text=$text;
    }

    public function _type($type) {
        $this->type = "Checkbox";
    }

    public function _name($name) {
        $this->name = $name;
    }

    public function _class($class) {
        $this->class = $class;
    }

    public function _value($value) {
        $this->value = $value;
    }

    public function _enamble($enable) {
        $this->enable = $enable;
    }

    public function _id($id) {
        $this->id = $id;
    }

    public function _title($title) {
        $this->title = $title;
    }

    public function _events($events) {
        $this->events = $events;
    }

    public function imprime() {
        echo $this->html;
    }
    public function returnHtml(){
        return $this->html;
    }
}
?>