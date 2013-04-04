<?php
namespace FlorianWolters\Component\Test;

/**
 * Test class for {@see TestCaseAbstract}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Test
 * @since     Class available since Release 0.1.0
 *
 * @covers    FlorianWolters\Component\Test\TestCaseAbstract
 */
class TestCaseAbstractTest extends TestCaseAbstract
{
    /**
     * @return void
     *
     * @coversDefaultClass assertNotInterface
     * @dataProvider providerNotInterface
     * @test
     */
    public function testAssertNotInterfacePasses($actual)
    {
        $this->assertNotInterface($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotInterface()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotInterface
     * @dataProvider providerInterface
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotInterfaceFails($actual)
    {
        $this->assertNotInterface($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerInterface()
    {
        return array(
            '\Iterator passed as string' => array('\Iterator')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertInterface
     * @dataProvider providerInterface
     * @test
     */
    public function testAssertInterfacePasses($actual)
    {
        $this->assertInterface($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertInterface
     * @dataProvider providerNotInterface
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertInterfaceFails($actual)
    {
        $this->assertInterface($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotTrait
     * @dataProvider providerNotTrait
     * @test
     */
    public function testAssertNotTraitPasses($actual)
    {
        $this->assertNotTrait($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotTrait()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass),
            '\Iterator passed as string' => array('\Iterator')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotTrait
     * @dataProvider providerTrait
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotTraitFails($actual)
    {
        $this->assertNotTrait($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerTrait()
    {
        return array(
            'FlorianWolters\Mock\TraitImpl passed as string' => array('FlorianWolters\Mock\TraitImpl')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertTrait
     * @dataProvider providerTrait
     * @test
     */
    public function testAssertTraitPasses($actual)
    {
        $this->assertTrait($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertTrait
     * @dataProvider providerNotTrait
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertTraitFails($actual)
    {
        $this->assertTrait($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotAbstractClass
     * @dataProvider providerNotAbstractClass
     * @test
     */
    public function testAssertNotAbstractClassPasses($actual)
    {
        $this->assertNotAbstractClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotAbstractClass()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotAbstractClass
     * @dataProvider providerAbstractClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotAbstractClassFails($actual)
    {
        $this->assertNotAbstractClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerAbstractClass()
    {
        return array(
            '\SplHeap passed as string' => array('\SplHeap')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertAbstractClass
     * @dataProvider providerAbstractClass
     * @test
     */
    public function testAssertAbstractClassPasses($actual)
    {
        $this->assertAbstractClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertAbstractClass
     * @dataProvider providerNotAbstractClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertAbstractClassFails($actual)
    {
        $this->assertAbstractClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotCloneableClass
     * @dataProvider providerNotCloneableClass
     * @test
     */
    public function testAssertNotCloneableClassPasses($actual)
    {
        $this->assertNotCloneableClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotCloneableClass()
    {
        return array(
            '\FlorianWolters\Mock\NotCloneableClassImpl passed as string' => array('\FlorianWolters\Mock\NotCloneableClassImpl')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotCloneableClass
     * @dataProvider providerCloneableClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotCloneableClassFails($actual)
    {
        $this->assertNotCloneableClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerCloneableClass()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertCloneableClass
     * @dataProvider providerCloneableClass
     * @test
     */
    public function testAssertCloneableClassPasses($actual)
    {
        $this->assertCloneableClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertCloneableClass
     * @dataProvider providerNotCloneableClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertCloneableClassFails($actual)
    {
        $this->assertCloneableClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotFinalClass
     * @dataProvider providerNotFinalClass
     * @test
     */
    public function testAssertNotFinalClassPasses($actual)
    {
        $this->assertNotFinalClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotFinalClass()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotFinalClass
     * @dataProvider providerFinalClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotFinalClassFails($actual)
    {
        $this->assertNotFinalClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerFinalClass()
    {
        return array(
            '\Closure passed as string' => array('\Closure')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertFinalClass
     * @dataProvider providerFinalClass
     * @test
     */
    public function testAssertFinalClassPasses($actual)
    {
        $this->assertFinalClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertFinalClass
     * @dataProvider providerNotFinalClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertFinalClassFails($actual)
    {
        $this->assertFinalClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotInstantiableClass
     * @dataProvider providerNotInstantiableClass
     * @test
     */
    public function testAssertNotInstantiableClassPasses($actual)
    {
        $this->assertNotInstantiableClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotInstantiableClass()
    {
        return array(
            '\SplHeap passed as string' => array('\SplHeap'),
            '\Iterator passed as string' => array('\Iterator'),
            '\Closure passed as string' => array('\Closure'),
            'FlorianWolters\Mock\TraitImpl passed as string' => array('FlorianWolters\Mock\TraitImpl')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotInstantiableClass
     * @dataProvider providerInstantiableClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotInstantiableClassFails($actual)
    {
        $this->assertNotInstantiableClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerInstantiableClass()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertInstantiableClass
     * @dataProvider providerInstantiableClass
     * @test
     */
    public function testAssertInstantiableClassPasses($actual)
    {
        $this->assertInstantiableClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertInstantiableClass
     * @dataProvider providerNotInstantiableClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertInstantiableClassFails($actual)
    {
        $this->assertInstantiableClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotInternalClass
     * @dataProvider providerNotInternalClass
     * @test
     */
    public function testAssertNotInternalClassPasses($actual)
    {
        $this->assertNotInternalClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotInternalClass()
    {
        return array(
            'FlorianWolters\Mock\NotCloneableClassImpl passed as string' => array('FlorianWolters\Mock\NotCloneableClassImpl'),
            'FlorianWolters\Mock\NotCloneableClassImpl passed as object' => array(new \FlorianWolters\Mock\NotCloneableClassImpl),
            'FlorianWolters\Mock\TraitImpl passed as string' => array('FlorianWolters\Mock\TraitImpl')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotInternalClass
     * @dataProvider providerInternalClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotInternalClassFails($actual)
    {
        $this->assertNotInternalClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerInternalClass()
    {
        return array(
            '\Closure passed as string' => array('\Closure')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertInternalClass
     * @dataProvider providerInternalClass
     * @test
     */
    public function testAssertInternalClassPasses($actual)
    {
        $this->assertInternalClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertInternalClass
     * @dataProvider providerNotInternalClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertInternalClassFails($actual)
    {
        $this->assertInternalClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotIterateableClass
     * @dataProvider providerNotIterateableClass
     * @test
     */
    public function testAssertNotIterateableClassPasses($actual)
    {
        $this->assertNotIterateableClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotIterateableClass()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotIterateableClass
     * @dataProvider providerIterateableClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotIterateableClassFails($actual)
    {
        $this->assertNotIterateableClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerIterateableClass()
    {
        return array(
            '\IteratorIterator passed as string' => array('\IteratorIterator')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertIterateableClass
     * @dataProvider providerIterateableClass
     * @test
     */
    public function testAssertIterateableClassPasses($actual)
    {
        $this->assertIterateableClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertIterateableClass
     * @dataProvider providerNotIterateableClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertIterateableClassFails($actual)
    {
        $this->assertIterateableClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotNamespacedClass
     * @dataProvider providerNotNamespacedClass
     * @test
     */
    public function testAssertNotNamespacedClassPasses($actual)
    {
        $this->assertNotNamespacedClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotNamespacedClass()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotNamespacedClass
     * @dataProvider providerNamespacedClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotNamespacedClassFails($actual)
    {
        $this->assertNotNamespacedClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNamespacedClass()
    {
        return array(
            'FlorianWolters\Mock\TraitImpl passed as string' => array('FlorianWolters\Mock\TraitImpl')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNamespacedClass
     * @dataProvider providerNamespacedClass
     * @test
     */
    public function testAssertNamespacedClassPasses($actual)
    {
        $this->assertNamespacedClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNamespacedClass
     * @dataProvider providerNotNamespacedClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNamespacedClassFails($actual)
    {
        $this->assertNamespacedClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotUserDefinedClass
     * @dataProvider providerNotUserDefinedClass
     * @test
     */
    public function testAssertNotUserDefinedClassPasses($actual)
    {
        $this->assertNotUserDefinedClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerNotUserDefinedClass()
    {
        return array(
            '\stdClass passed as string' => array('\stdClass'),
            '\stdClass passed as object' => array(new \stdClass)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertNotUserDefinedClass
     * @dataProvider providerUserDefinedClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertNotUserDefinedClassFails($actual)
    {
        $this->assertNotUserDefinedClass($actual);
    }

    /**
     * @return mixed[]
     */
    public static function providerUserDefinedClass()
    {
        return array(
            'FlorianWolters\Mock\TraitImpl passed as string' => array('FlorianWolters\Mock\TraitImpl'),
            'FlorianWolters\Mock\NotCloneableClassImpl passed as string' => array('FlorianWolters\Mock\NotCloneableClassImpl')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertUserDefinedClass
     * @dataProvider providerUserDefinedClass
     * @test
     */
    public function testAssertUserDefinedClassPasses($actual)
    {
        $this->assertUserDefinedClass($actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass assertUserDefinedClass
     * @dataProvider providerNotUserDefinedClass
     * @expectedException \PHPUnit_Framework_ExpectationFailedException
     * @test
     */
    public function testAssertUserDefinedClassFails($actual)
    {
        $this->assertUserDefinedClass($actual);
    }
}
