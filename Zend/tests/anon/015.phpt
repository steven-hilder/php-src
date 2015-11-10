--TEST--
Ensure anonymous class name suffix is hidden in userland
--FILE--
<?php

new class {
	function __construct() {
		class_alias(new class {}, 'AnonAlias');
		var_dump([
			$this,
			new ReflectionClass($this),
			new ReflectionClass(new class {}),
			(new ReflectionClass($this))->getName(),
			(new ReflectionClass(new class {}))->getName(),
			__CLASS__,
			self::class,
			get_class(),
			get_class($this),
			get_class(new class {}),
			get_called_class(),
			get_parent_class(new class extends AnonAlias {}),
			(new ReflectionClass(new class extends AnonAlias {}))->getParentClass()->getName(),
		]);
	}
};

(string) new class {};

?>
--EXPECTF--
array(%d) {
  [0]=>
  object(class@anonymous)#%d (0) {
  }
  [1]=>
  object(ReflectionClass)#%d (1) {
    ["name"]=>
    string(15) "class@anonymous"
  }
  [2]=>
  object(ReflectionClass)#%d (1) {
    ["name"]=>
    string(15) "class@anonymous"
  }
  [3]=>
  string(15) "class@anonymous"
  [4]=>
  string(15) "class@anonymous"
  [5]=>
  string(15) "class@anonymous"
  [6]=>
  string(15) "class@anonymous"
  [7]=>
  string(15) "class@anonymous"
  [8]=>
  string(15) "class@anonymous"
  [9]=>
  string(15) "class@anonymous"
  [10]=>
  string(15) "class@anonymous"
  [11]=>
  string(15) "class@anonymous"
  [12]=>
  string(15) "class@anonymous"
}

Catchable fatal error: Object of class class@anonymous could not be converted to string in %s on line %d
