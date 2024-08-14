<table
    {{ $attributes->merge(['class' => 'min-w-full md:w-full border-collapse border border-slate-500 bg-green-300 rounded-lg overflow-hidden']) }}>
    {{ $slot }}
</table>
