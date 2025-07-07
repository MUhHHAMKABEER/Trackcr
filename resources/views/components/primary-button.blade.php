<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center justify-center px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full font-semibold text-sm text-black uppercase tracking-wide hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
