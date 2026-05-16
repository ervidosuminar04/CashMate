<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-lg py-sm bg-primary border border-transparent rounded-lg font-label-md text-label-md text-on-primary hover:bg-surface-tint hover:scale-[0.98] focus:bg-surface-tint focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all shadow-md shadow-primary/20']) }}>
    {{ $slot }}
</button>
