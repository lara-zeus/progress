<?php

namespace LaraZeus\Progress\Tables\Columns;

use Filament\Tables\Columns\Column;

class Progress extends Column
{
    protected bool $canShow = true;

    public function hideProgressValue($canShow = false): static
    {
        $this->canShow = $canShow;

        return $this;
    }

    public function getCanShow(): bool
    {
        return $this->canShow;
    }

    public function getProgressData(array $state): array
    {
        $total = $state['total'] ?? 0;
        $progress = $state['progress'] ?? 0;
        $progress = $total > 0 ? ($progress / $total) * 100 : 0;

        if ($progress === 100) {
            $progressColor = '#2980b9';
        } elseif ($progress > 50) {
            $progressColor = '#27ae60';
        } elseif ($progress > 25) {
            $progressColor = '#f39c12';
        } else {
            $progressColor = '#e74c3c';
        }

        $displayProgress = $progress === 100 ? number_format($progress, 0) : number_format($progress, 2);
        $displayProgress = (int) round($displayProgress);

        return [
            'progress' => $progress,
            'progressColor' => $progressColor,
            'displayProgress' => $displayProgress,
        ];
    }
}
