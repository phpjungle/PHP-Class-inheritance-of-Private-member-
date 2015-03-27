<?php
show_source ( __FILE__ );
class base {
	var $name = 'PHPJungle';
	private $age = 1;
}
class son extends base {
	function __construct() {
		var_dump ( $this->age ); // 实际通过$this->自动补全功能访问成员变量时,只显示了public::$name
	}
}

var_dump ( new base () );
var_dump ( new son () );
Reflection::export ( new ReflectionClass ( 'base' ) );
Reflection::export ( new ReflectionClass ( 'son' ) );

/**
* OutPut of var_dump:
*	 object(base)#1 (2) {
*	  ["name"]=>
*	  string(9) "PHPJungle"
*	  ["age":"base":private]=>
*	  int(1)
*	}
*	object(son)#1 (2) {
*	  ["name"]=>
*	  string(9) "PHPJungle"
*	  ["age":"base":private]=>
*	  int(1)
*	}
*/

/**
*   OutPut of Reflection::export():
*	 Class [ <user> class base ] {
*	  @@ C:\wamp\www\PJOOP\base_of_php\class\inheritance\index.php 3-6
*	
*	  - Constants [0] {
*	  }
*	
*	  - Static properties [0] {
*	  }
*	
*	  - Static methods [0] {
*	  }
*	
*	  - Properties [2] {
*	    Property [ <default> public $name ]
*	    Property [ <default> private $age ]
*	  }
*	
*	  - Methods [0] {
*	  }
*	}
*	
*	Class [ <user> class son extends base ] {
*	  @@ C:\wamp\www\PJOOP\base_of_php\class\inheritance\index.php 8-10
*	
*	  - Constants [0] {
*	  }
*	
*	  - Static properties [0] {
*	  }
*	
*	  - Static methods [0] {
*	  }
*	
*	  - Properties [1] {
*	    Property [ <default> public $name ]
*	  }
*	
*	  - Methods [0] {
*	  }
*	}
*
*/
 
/**
 * @abstract 父类的私有成员变量能被子类继承和使用吗?
 * @since 2015/03/27 周五
 * @see http://php.net/manual/en/function.var-dump.php
 * @see http://php.net/manual/en/reflection.export.php
 * 
 * @abstract 1.1 var_dump => All public, private and protected properties of objects will be returned in the output 
 * @abstract 1.2 Reflection::export =>Warning This function is currently not documented; only its argument list is available.
 * 
 * @abstract:通过输出结果发现：
 * 			 1.var_dump打印出来的son对象信息包含了父类的private::$age;
 * 			 2.经过反射出来的son类信息不包含$age
 * 
 * @abstract:那么问题来了------PHP中私有的成员方法能够被子类继承吗，如果可以那么可以在类中(类外就不说了...)访问吗？
 * 			 结果:Notice: Undefined property: son::$age in C:\wamp\www\PJOOP\base_of_php\class\inheritance\index.php on line 10
 */
