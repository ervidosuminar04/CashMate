@props(['title', 'value', 'icon', 'color' => 'primary', 'subtitle' => null])

@php
    $colorClasses = [
        'primary' => ['bg' => 'bg-primary-container', 'text' => 'text-primary', 'on_bg' => 'text-on-primary-container'],
        'secondary' => ['bg' => 'bg-secondary-container', 'text' => 'text-secondary', 'on_bg' => 'text-on-secondary-container'],
        'tertiary' => ['bg' => 'bg-tertiary-container', 'text' => 'text-tertiary', 'on_bg' => 'text-on-tertiary-container'],
        'neutral' => ['bg' => 'bg-surface-container-highest', 'text' => 'text-on-surface', 'on_bg' => 'text-on-surface'],
        'error' => ['bg' => 'bg-error-container', 'text' => 'text-error', 'on_bg' => 'text-on-error-container'],
    ];
    $theme = $colorClasses[$color] ?? $colorClasses['primary'];
@endphp

<div class="glass-panel rounded-xl p-md flex flex-col justify-between hover:-translate-y-1 transition-transform duration-300">
    <div class="flex justify-between items-start mb-lg">
        <div class="w-10 h-10 rounded-lg {{ $theme['bg'] }} flex items-center justify-center {{ $theme['on_bg'] }}">
            <span class="material-symbols-outlined">{{ $icon }}</span>
        </div>
        @if($subtitle)
            <span class="px-sm py-xs bg-surface-container-highest rounded-full font-label-md text-label-md text-on-surface-variant text-[10px]">{{ $subtitle }}</span>
        @endif
    </div>
    <div>
        <p class="font-label-md text-label-md text-on-surface-variant mb-xs">{{ $title }}</p>
        <p class="font-number-lg text-number-lg {{ $theme['text'] }}">{{ $value }}</p>
    </div>
</div>
