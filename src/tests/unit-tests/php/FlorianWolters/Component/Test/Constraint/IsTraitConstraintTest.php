<?php
namespace FlorianWolters\Component\Test\Constraint;

/**
 * Test class for {@see IsTraitConstraint}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Test
 * @since     Class available since Release 0.1.0
 *
 * @covers    FlorianWolters\Component\Test\Constraint\IsTraitConstraint
 */
class IsTraitConstraintTest extends ReflectionConstraintTestAbstract
{
    /**
     * {@inheritdoc}
     */
    public function setUpConstraint()
    {
        $this->constraint = new IsTraitConstraint;
    }

    /**
     * @return mixed[]
     */
    public static function providerTestMatches()
    {
        return array(
            array(true, 'FlorianWolters\Mock\TraitImpl'),
            array(false, '\Iterator'),
            array(false, '\stdClass'),
            array(false, new \stdClass)
        );
    }
}
