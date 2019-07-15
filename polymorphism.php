<?php


/**
 * 
 * Polymorphism in which classes have different functionality while sharing a common interface.
 * 
 **/


/**
* The Interface Data class.
**/
interface Data {
  
  public function save();
}

/**
* The DataUtils class.
**/
class DataUtils {
  
   function saveData(Data $DataObj) {
    $Data_type = get_class($DataObj);
    return "<br><br><br>The Class Name is a {$Data_type} and it's data format is as <br> {$DataObj->save()}";
  }
}

/**
* Json class.
**/
class Json implements Data {  
  
  private $value;

  public function __construct( $value) {   
    $this->value = $value;
  }

  public function save() {
    return json_encode($this->value);
  }
}

/**
* Csv class.
**/
class Csv implements Data {

  private $value;

  public function __construct($value) {
    $this->value = $value;
  }

  public function save() {
    $str='';
    foreach($this->value as $key => $val){
        $str .=$key.':'.$val.', ';
    }
    return $str;
  }
}

$sampleData=array(
  'name'=>'php',
  'typing'=>'dynamic weak',  
  'designedby'=>'Rasmus Lerdorf'
);

$a=new DataUtils();

echo $a->saveData(new Json( $sampleData ));


echo $a->saveData(new Csv( $sampleData ))

?>
