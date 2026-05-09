@props(['hover' => false])

<div {{ $attributes->merge(['class' => 'glass-panel p-6 shadow-xl transition-all duration-300 ' . ($hover ? 'hover:neon-border-cyan hover:-translate-y-1' : '')]) }}>
    {{ $slot }}
</div>
