<?php
namespace FlorianWolters\Component\Test\Constraint;

use \PHPUnit_Framework_Constraint;
use \PHPUnit_Framework_TestCase;

abstract class ReflectionConstraintTestAbstract extends PHPUnit_Framework_TestCase
{
    /**
     * The {@see PHPUnit_Framework_Constraint} under test.
     *
     * @var PHPUnit_Framework_Constraint
     */
    protected $constraint;

    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->setUpConstraint();
    }

    abstract protected function setUpConstraint();

    /**
     * @param mixed $other
     *
     * @return void
     *
     * @coversDefaultClass matches
     * @dataProvider providerTestMatchesThrowsReflectionException
     * @expectedException \ReflectionException
     * @test
     */
    public function testMatchesThrowsReflectionException($other)
    {
        $this->constraint->matches($other);
    }

    /**
     * @return mixed[]
     */
    public static function providerTestMatchesThrowsReflectionException()
    {
        return array(
            array(null),
            array(false),
            array(0),
            array(''),
            array('\invalidClass')
        );
    }

    /**
     * @param boolean       $expected
     * @param string|object $other
     *
     * @return void
     *
     * @coversDefaultClass matches
     * @dataProvider providerTestMatches
     * @test
     */
    public function testMatches($expected, $other)
    {
        $this->assertEquals($expected, $this->constraint->matches($other));
    }
}
