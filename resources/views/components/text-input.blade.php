@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-surface-container-lowest border border-outline-variant/50 focus:border-primary focus:ring-primary/20 text-on-surface rounded-lg shadow-sm font-body-md transition-colors']) }}>
