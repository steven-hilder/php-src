--TEST--
Support instance as first argument to class_alias()
--FILE--
<?php

class Foo {}
class_alias(new Foo, 'Bar');
var_dump(new Bar);

class_alias(new class {}, 'Baz');
var_dump(new Baz);

?>
--EXPECTF--
object(Foo)#%d (0) {
}
object(class@anonymous)#%d (0) {
}
