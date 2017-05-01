<?php
/**
 * This file is part of the behat-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\Behat\ConsoleExtension\Context\ContextClass;


use Behat\Behat\Context\ContextClass\ClassResolver as ClassResolverInterface;

/**
 * Class Tidal\Behat\ConsoleExtension\Context\ContextClass\ClassResolver
 */
class ClassResolver implements ClassResolverInterface
{
    const CONTEXT_NAMESPACE = 'tidal:console:';

    /**
     * Checks if resolvers supports provided class.
     *
     * @param string $contextClass
     *
     * @return Boolean
     */
    public function supportsClass($contextClass)
    {
        return (strpos($contextClass, self::CONTEXT_NAMESPACE) === 0);
    }

    /**
     * Resolves context class.
     *
     * @param string $contextClass
     *
     * @return string
     */
    public function resolveClass($contextClass)
    {
        if (!$this->supportsClass($contextClass)) {
            throw new ClassResolvingException(
                sprintf(
                    "Context class '%s' not supported by %s",
                    $contextClass,
                    __CLASS__
                )
            );
        }

        return '';
    }
}

