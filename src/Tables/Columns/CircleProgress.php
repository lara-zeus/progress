<?php

namespace LaraZeus\Progress\Tables\Columns;

use Filament\Tables\Columns\Column;

class CircleProgress extends Column
{
    protected bool $canShow = true;

    protected string $view = 'progress::tables.columns.circle-progress';

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
