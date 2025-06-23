<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @php
        $data = $column->getProgressData($getState());
    @endphp

    <div class="progress-circle" style="
        background: conic-gradient(
            {{ $data['progressColor'] }} {{ $data['displayProgress'] * 3.6 }}deg,
            #e5e7eb {{ $data['displayProgress'] * 3.6 }}deg
        );">
        @if($entry instanceof \LaraZeus\Progress\Infolists\Components\CircleProgressEntry && $entry->getCanShow())
            <small>{{ $data['displayProgress'] }}%</small>
        @endif
    </div>

    <style>
        .progress-circle {
            position: relative;
            width: 55px;
            height: 55px;
            margin:10px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: #fff;
            font-weight: 600;
        }
        .progress-circle::before {
            content: '';
            position: absolute;
            width: 70%;
            height: 70%;
            background-color: #fff;
            border-radius: 50%;
            z-index: 1;
        }
        .progress-circle small {
            position: absolute;
            color: black;
            font-size: 8pt;
            z-index: 2;
        }
    </style>
</x-dynamic-component>
