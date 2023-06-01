<?php

declare(strict_types=1);

namespace kr0lik\CodeStyleFixer\Tests\Rules;

use kr0lik\CodeStyleFixer\Rules\PhpdocThrowsSortFixer;
use PhpCsFixer\Tokenizer\Tokens;
use PHPUnit\Framework\TestCase;
use SplFileInfo;

/**
 * @internal
 */
class PhpdocThrowsSortFixerTest extends TestCase
{
    /**
     * @dataProvider fixDataProvider
     */
    public function testFix(string $code, string $fixedCode): void
    {
        $tokens = Tokens::fromCode($code);
        $fixer = new PhpdocThrowsSortFixer();

        $fixer->fix(new SplFileInfo('.'), $tokens);

        self::assertEquals($fixedCode, $tokens->generateCode());
    }

    public function fixDataProvider(): array
    {
        return [
            [
                <<<'EOF'
<?php

declare(strict_types=1);

class Tmp
{
    public function __construct()
    {
    }

    /**
     * Some comment here
     *
     * @param mixed|InputInterface $input
     *
     * @throws NotFoundException
     * @throws InvalidArgumentException
     *
     * @return int
     */
    public function one(InputInterface $input, OutputInterface $output): int
    {
        var_dump(false);
    }
}
EOF,
                <<<'EOF'
<?php

declare(strict_types=1);

class Tmp
{
    public function __construct()
    {
    }

    /**
     * Some comment here
     *
     * @param mixed|InputInterface $input
     *
     * @throws InvalidArgumentException
     * @throws NotFoundException
     *
     * @return int
     */
    public function one(InputInterface $input, OutputInterface $output): int
    {
        var_dump(false);
    }
}
EOF,
            ],
            [
                <<<'EOF'
<?php

declare(strict_types=1);

class Tmp
{
    public function __construct()
    {
    }

    /**
     * Some comment here
     *
     * @param mixed|InputInterface $input
     *
     * @throws NotFoundException
     * @throws InvalidArgumentException
     *
     * @return int
     */
    public function one(InputInterface $input, OutputInterface $output): int
    {
        var_dump(false);
    }

    /**
     * Some comment here
     *
     * @param mixed $input
     *
     * @throws NotFoundException
     * @throws RuntimeException
     * @throws \Namespace\Exception
     * @throws InvalidArgumentException
     *
     * @return string
     */
    public function two(): string
    {
        var_dump(false);
    }
}
EOF,
                <<<'EOF'
<?php

declare(strict_types=1);

class Tmp
{
    public function __construct()
    {
    }

    /**
     * Some comment here
     *
     * @param mixed|InputInterface $input
     *
     * @throws InvalidArgumentException
     * @throws NotFoundException
     *
     * @return int
     */
    public function one(InputInterface $input, OutputInterface $output): int
    {
        var_dump(false);
    }

    /**
     * Some comment here
     *
     * @param mixed $input
     *
     * @throws InvalidArgumentException
     * @throws NotFoundException
     * @throws RuntimeException
     * @throws \Namespace\Exception
     *
     * @return string
     */
    public function two(): string
    {
        var_dump(false);
    }
}
EOF,
            ],
        ];
    }
}
