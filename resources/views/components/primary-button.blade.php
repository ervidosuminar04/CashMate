<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 bg-neon-cyan border border-transparent rounded-lg font-bold text-xs text-gravity-dark uppercase tracking-widest hover:bg-white focus:outline-none focus:ring-2 focus:ring-neon-cyan focus:ring-offset-2 focus:ring-offset-gravity-dark transition ease-in-out duration-150 neon-border-cyan shadow-[0_0_15px_rgba(0,242,255,0.3)]']) }}>
    {{ $slot }}
</button>
