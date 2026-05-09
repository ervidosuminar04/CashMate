@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-white/5 border-white/10 focus:border-neon-cyan focus:ring-neon-cyan text-slate-100 rounded-lg shadow-sm backdrop-blur-sm transition-all']) }}>
