<?php

namespace LaraZeus\Progress\Infolists\Components;

use Filament\Infolists\Components\Entry;

class ProgressEntry extends Entry
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

        $displayProgress = number_format($progress);

        return [
            'progress' => $progress,
            'progressColor' => $progressColor,
            'displayProgress' => $displayProgress,
        ];
    }
}
