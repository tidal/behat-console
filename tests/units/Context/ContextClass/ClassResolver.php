<?php
/**
 * This file is part of the behat-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\Behat\ConsoleExtension\tests\units\Context\ContextClass;

use atoum;

/**
 * Class Tidal\Behat\ConsoleExtension\tests\units\Context\ContextClass\ClassResolver
 *
 * @php 7.0
 */
class ClassResolver extends atoum
{
    const NS = 'tidal:console:';

    public function test_supports_tidal_console_namespace()
    {
        $cls = self::NS.':foo';

        $this
            // creation of a new instance of the tested class
            ->given($this->newTestedInstance)

            ->then()
            ->boolean($this->testedInstance->supportsClass($cls))
            ->isTrue()
        ;
    }

    public function test_rejects_invalid_namespace()
    {
        $cls = 'foo:bar';

        $this
            // creation of a new instance of the tested class
            ->given($this->newTestedInstance)
            ->then()
            ->boolean($this->testedInstance->supportsClass($cls))
            ->isFalse()
        ;
    }
}

