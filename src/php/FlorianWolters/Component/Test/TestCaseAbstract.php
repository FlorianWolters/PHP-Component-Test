<?php
namespace FlorianWolters\Component\Test;

use \PHPUnit_Framework_AssertionFailedError;
use \PHPUnit_Framework_Constraint;
use \PHPUnit_Framework_TestCase;
use \PHPUnit_Util_InvalidArgumentHelper;
use \ReflectionException;

use FlorianWolters\Component\Test\Constraint\IsInterfaceConstraint;
use FlorianWolters\Component\Test\Constraint\IsTraitConstraint;
use FlorianWolters\Component\Test\Constraint\Clazz\IsAbstractClassConstraint;
use FlorianWolters\Component\Test\Constraint\Clazz\IsCloneableClassConstraint;
use FlorianWolters\Component\Test\Constraint\Clazz\IsFinalClassConstraint;
use FlorianWolters\Component\Test\Constraint\Clazz\IsInstantiableClassConstraint;
use FlorianWolters\Component\Test\Constraint\Clazz\IsInternalClassConstraint;
use FlorianWolters\Component\Test\Constraint\Clazz\IsIterateableClassConstraint;
use FlorianWolters\Component\Test\Constraint\Clazz\IsNamespacedClassConstraint;
use FlorianWolters\Component\Test\Constraint\Clazz\IsUserDefinedClassConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsAbstractMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsConstructorMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsDeprecatedMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsDestructorMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsFinalMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsInternalMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsNamespacedMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsPrivateMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsProtectedMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsPublicMethodConstraint;
use FlorianWolters\Component\Test\Constraint\Method\IsUserDefinedMethodConstraint;

/**
 * The abstract class {@see TestCaseAbstract} is the base class for all test
 * cases.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Test
 */
abstract class TestCaseAbstract extends PHPUnit_Framework_TestCase
{
    /**
     * Asserts that the specified argument is not an `interface`.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotInterface($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isInterface()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is an `interface`.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertInterface($actual, $message = '')
    {
        self::assertThat($actual, self::isInterface(), $message);
    }

    /**
     * Returns a {@see IsInterfaceConstraint} matcher object.
     *
     * @return IsInterfaceConstraint The matcher object.
     */
    public static function isInterface()
    {
        return new IsInterfaceConstraint;
    }

    /**
     * Asserts that the specified argument is not a `trait`.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotTrait($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isTrait()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is a `trait`.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertTrait($actual, $message = '')
    {
        self::assertThat($actual, self::isTrait(), $message);
    }

    /**
     * Returns a {@see IsTraitConstraint} matcher object.
     *
     * @return IsTraitConstraint The matcher object.
     */
    public static function isTrait()
    {
        return new IsTraitConstraint;
    }

    /**
     * Asserts that the specified argument is not an `abstract` class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotAbstractClass($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isAbstractClass()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is an `abstract` class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertAbstractClass($actual, $message = '')
    {
        self::assertThat($actual, self::isAbstractClass(), $message);
    }

    /**
     * Returns a {@see IsAbstractClassConstraint} matcher object.
     *
     * @return IsAbstractClassConstraint The matcher object.
     */
    public static function isAbstractClass()
    {
        return new IsAbstractClassConstraint;
    }

    /**
     * Asserts that the specified argument is not a cloneable class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotCloneableClass($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isCloneableClass()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is a cloneable class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertCloneableClass($actual, $message = '')
    {
        self::assertThat($actual, self::isCloneableClass(), $message);
    }

    /**
     * Returns a {@see IsCloneableClassConstraint} matcher object.
     *
     * @return IsCloneableClassConstraint The matcher object.
     */
    public static function isCloneableClass()
    {
        return new IsCloneableClassConstraint;
    }

    /**
     * Asserts that the specified argument is not a `final` class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotFinalClass($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isFinalClass()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is a `final` class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertFinalClass($actual, $message = '')
    {
        self::assertThat($actual, self::isFinalClass(), $message);
    }

    /**
     * Returns a {@see IsFinalClassConstraint} matcher object.
     *
     * @return IsFinalClassConstraint The matcher object.
     */
    public static function isFinalClass()
    {
        return new IsFinalClassConstraint;
    }

    /**
     * Asserts that the specified argument is not an instantiable class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotInstantiableClass($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isInstantiableClass()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is an instantiable class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertInstantiableClass($actual, $message = '')
    {
        self::assertThat($actual, self::isInstantiableClass(), $message);
    }

    /**
     * Returns a {@see IsInstantiableClassConstraint} matcher object.
     *
     * @return IsInstantiableClassConstraint The matcher object.
     */
    public static function isInstantiableClass()
    {
        return new IsInstantiableClassConstraint;
    }

    /**
     * Asserts that the specified argument is not an internal class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotInternalClass($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isInternalClass()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is an internal class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertInternalClass($actual, $message = '')
    {
        self::assertThat($actual, self::isInternalClass(), $message);
    }

    /**
     * Returns a {@see IsInternalClassConstraint} matcher object.
     *
     * @return IsInternalClassConstraint The matcher object.
     */
    public static function isInternalClass()
    {
        return new IsInternalClassConstraint;
    }

    /**
     * Asserts that the specified argument is not an iterateable class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotIterateableClass($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isIterateableClass()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is an iterateable class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertIterateableClass($actual, $message = '')
    {
        self::assertThat($actual, self::isIterateableClass(), $message);
    }

    /**
     * Returns a {@see IsIterateableClassConstraint} matcher object.
     *
     * @return IsIterateableClassConstraint The matcher object.
     */
    public static function isIterateableClass()
    {
        return new IsIterateableClassConstraint;
    }

    /**
     * Asserts that the specified argument is not a namespaced class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotNamespacedClass($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isNamespacedClass()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is a namespaced class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNamespacedClass($actual, $message = '')
    {
        self::assertThat($actual, self::isNamespacedClass(), $message);
    }

    /**
     * Returns a {@see IsNamespacedClassConstraint} matcher object.
     *
     * @return IsNamespacedClassConstraint The matcher object.
     */
    public static function isNamespacedClass()
    {
        return new IsNamespacedClassConstraint;
    }

    /**
     * Asserts that the specified argument is not an user defined class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertNotUserDefinedClass($actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::logicalNot(self::isUserDefinedClass()),
            $message
        );
    }

    /**
     * Asserts that the specified argument is an user defined class.
     *
     * @param object|string $actual  The object to evaluate or a `string`
     *                               containing the name of the class to
     *                               evaluate.
     * @param string        $message The optional error message.
     *
     * @return void
     * @throws PHPUnit_Framework_AssertionFailedError If the constraint is not
     *                                                met.
     */
    public static function assertUserDefinedClass($actual, $message = '')
    {
        self::assertThat($actual, self::isUserDefinedClass(), $message);
    }

    /**
     * Returns a {@see IsUserDefinedClassConstraint} matcher object.
     *
     * @return IsUserDefinedClassConstraint The matcher object.
     */
    public static function isUserDefinedClass()
    {
        return new IsUserDefinedClassConstraint;
    }

    /**
     * Evaluates a {@see PHPUnit_Framework_Constraint} matcher object.
     *
     * @param mixed                        $actual     The value to evaluate.
     * @param PHPUnit_Framework_Constraint $constraint The matcher object.
     * @param string                       $message    The optional error
     *                                                 message.
     *
     * @return void
     */
    public static function assertThat(
        $actual,
        PHPUnit_Framework_Constraint $constraint,
        $message = ''
    ) {
        try {
            parent::assertThat($actual, $constraint, $message);
        } catch (ReflectionException $ex) {
            self::throwMustBeObjectOrClassNameException();
        }
    }

    /**
     * Throws a {@see PHPUnit_Framework_Exception}.
     *
     * @return void
     * @throws PHPUnit_Framework_Exception Always.
     */
    private static function throwMustBeObjectOrClassNameException()
    {
        throw PHPUnit_Util_InvalidArgumentHelper::factory(
            1,
            'object, class name, interface name or trait name'
        );
    }
}
