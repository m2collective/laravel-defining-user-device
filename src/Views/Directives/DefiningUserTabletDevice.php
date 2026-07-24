<?php
declare(strict_types=1);

namespace M2Collective\DefiningUserDevice\Views\Directives;

use M2Collective\ViewDirectives\Contracts\ClosingDirective;
use M2Collective\ViewDirectives\Contracts\LogicalDirective;
use M2Collective\ViewDirectives\Contracts\OpeningDirective;

final class DefiningUserTabletDevice implements OpeningDirective, LogicalDirective, ClosingDirective
{
    /**
     * @var string
     */
    protected string $openingTag;

    /**
     * @var string
     */
    protected string $logicalTag;

    /**
     * @var string
     */
    protected string $closingTag;

    /**
     * @param string $openingTag
     * @param string $logicalTag
     * @param string $closingTag
     */
    public function __construct(string $openingTag, string $logicalTag, string $closingTag)
    {
        $this->openingTag = $openingTag;
        $this->logicalTag = $logicalTag;
        $this->closingTag = $closingTag;
    }

    /**
     * @return string
     */
    public function openingTag(): string
    {
        return $this->openingTag;
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function openingHandler(mixed $expression): string
    {
        return "<?php if(\M2Collective\DefiningUserDevice\Facades\DefiningUserDevice::isTablet()) : ?>";
    }

    /**
     * @return string
     */
    public function logicalTag(): string
    {
        return $this->logicalTag;
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function logicalHandler(mixed $expression): string
    {
        return "<?php else: ?>";
    }

    /**
     * @return string
     */
    public function closingTag(): string
    {
        return $this->closingTag;
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function closingHandler(mixed $expression): string
    {
        return "<?php endif; ?>";
    }
}
