<?php


/**
 * #############################################################################################################################
 * #                                                                                                                           #
 * #  Polymorphism describes a pattern in oop in which classes have different functionality while sharing a common interface.  #
 * #  This mean that the code will work with different classes without the need to know the exact class it's operating on.     #
 * #                                                                                                                           #
 * # ###########################################################################################################################
 **/


/**
* The Interface Shape class.
**/
interface Shape {
  
  public function calcArea();
}

/**
* The ShapeUtils class.
**/
class ShapeUtils {
  
  static function getShapeInfo(Shape $shapeObj) {
    $shape_type = get_class($shapeObj);
    return "The shape type is a {$shape_type} and it's area size is: {$shapeObj->calcArea()}";
  }
}

/**
* Rectangle class.
**/
class Rectangle implements Shape {
  
  private $height;
  private $width;

  public function __construct($height, $width) {
    $this->height = $height;
    $this->width = $width;
  }

  public function calcArea() {
    return $this->height * $this->width;
  }
}

/**
* Circle class.
**/
class Circle implements Shape {

  private $radius;

  public function __construct($radius) {
    $this->radius = $radius;
  }

  public function calcArea() {
    return pow($this->radius, 2) * pi();
  }
}

// Display the "Rectangle" info.
echo ShapeUtils::getShapeInfo(new Rectangle(4, 5));
echo "</br>";
// Display the "Circle" info.
echo ShapeUtils::getShapeInfo(new Circle(4));

?>
