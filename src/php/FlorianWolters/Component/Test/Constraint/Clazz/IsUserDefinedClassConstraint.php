<?php
namespace FlorianWolters\Component\Test\Constraint\Clazz;

use \PHPUnit_Framework_Constraint;
use \ReflectionClass;

/**
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Test
 * @since     Class available since Release 0.1.0
 */
class IsUserDefinedClassConstraint extends PHPUnit_Framework_Constraint
{
    /**
     * Evaluates this constraint for the specified argument.
     *
     * {@inheritdoc}
     *
     * @param object|string $other The object to evaluate or a `string`
     *                             containing the name of the class to evaluate.
     *
     * @return boolean `true` if the constraint is met; `false` otherwise.
     */
    public function matches($other)
    {
        $reflector = new ReflectionClass($other);

        return $reflector->inNamespace();
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function toString()
    {
        return 'is user defined class';
    }
}
