<?php namespace  Xtwoend\Products;

class InvalidDataException extends \UnexpectedValueException {}
class ProductNotFoundException extends \OutOfBoundsException {}
class ProductExistsException extends \UnexpectedValueException {}
class ProductCreateException extends \RuntimeException {}
class CategoryCreateException extends \RuntimeException {}

