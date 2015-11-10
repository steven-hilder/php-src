--TEST--
Testing creation of alias to an internal class
--FILE--
<?php

class_alias('stdclass', 'foo');

?>
--EXPECTF--
Warning: First argument of class_alias() must be an instance or name of a user defined class in %s on line %d
