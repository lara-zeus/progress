<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @php
        $data = $entry->getProgressData($getState());
    @endphp

    <div class="progress-container">
        <div class="progress-bar" style="width: {{ $data['displayProgress'] }}%; background-color: {{ $data['progressColor'] }};"></div>
        <div class="progress-text">
            @if($entry instanceof \LaraZeus\Progress\Infolists\Components\ProgressBarEntry && $entry->getCanShow())
                <small @class([
                    'text-gray-700' => $data['displayProgress'] != 100,
                    'text-white' => $data['displayProgress'] == 100
                    ])>
                    {{ $data['displayProgress'] }}%
                </small>
            @endif
        </div>
    </div>

    <style>
        .progress-container {
            width: 100%;
            background-color: #e5e7eb;
            border-radius: 0.375rem;
            height: 1.5rem;
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .progress-bar {
            height: 100%;
            border-radius: 0.375rem;
            transition: width 0.3s, background-color 0.3s;
            width: 0;
        }
        .progress-text {
            text-align: center;
            font-size: 0.875rem;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        .progress-bar::after {
            content: '';
            display: block;
            height: 100%;
            border-radius: 0.375rem;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 25%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%);
            background-size: 40px 40px;
            animation: progress-bar-stripes 1s linear infinite;
        }
        @keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
    </style>
</x-dynamic-component>
