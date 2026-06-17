<?php
declare(strict_types=1);

namespace M2Collective\DefiningUserDevice\Views\Directives;

use M2Collective\BladeDirective\LogicalBladeDirective;

final class IsDesktopDirective implements LogicalBladeDirective
{
    /**
     * @return string
     */
    public function openingTag(): string
    {
        return 'isDesktop';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function openingHandler(mixed $expression): string
    {
        return "<?php if(\M2Collective\DefiningUserDevice\Facades\DefiningUserDevice::isDesktop()) : ?>";
    }

    /**
     * @return string
     */
    public function elseTag(): string
    {
        return 'elseIsDesktop';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function elseHandler(mixed $expression): string
    {
        return "<?php else: ?>";
    }

    /**
     * @return string
     */
    public function closingTag(): string
    {
        return 'endIsDesktop';
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
