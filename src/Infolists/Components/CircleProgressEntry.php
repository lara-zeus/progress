<?php

namespace LaraZeus\Progress\Infolists\Components;

use Filament\Infolists\Components\Entry;

class CircleProgressEntry extends Entry
{
    protected bool $canShow = true;

    protected string $view = 'lara-zeus-progress::infolists.components.circle-progress-entry';

    public function hideProgressValue($canShow = false): static
    {
        $this->canShow = $canShow;

        return $this;
    }

    public function getCanShow(): bool
    {
        return $this->canShow;
    }
}
