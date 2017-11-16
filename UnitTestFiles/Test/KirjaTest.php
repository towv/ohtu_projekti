<?php
<<<<<<< HEAD
namespace UnitTestFiles\Test;
use PHPUnit\Framework\TestCase;

class KirjaFTest extends TestCase {

	public function testTrueCheck() {
		$condition = true;
		$this->assertTrue($condition);
	}
}
?>
=======
class KirjaTest extends PHPUnit_Framework_TestCase {
	@Test
   	public function testAll() {
      // Allocate a test fixture.
      $fixture = array();
      // Assert initially empty, count() is 0.
      $this->assertEquals(0, count($fixture));

      // Test array_push().
      // Push an item into array.
      array_push($fixture, 'foo');
      // Assert one item, count() is 1.
      $this->assertEquals(1, count($fixture));
      // Assert item pushed.
      $this->assertEquals('foo', $fixture[count($fixture)-1]);
 
      // Test array_pop().
      $this->assertEquals('foo', array_pop($fixture));
      $this->assertEquals(0, count($fixture));
   }
}
>>>>>>> a374da7d415494a86c9f502182ddf6d60848b248
