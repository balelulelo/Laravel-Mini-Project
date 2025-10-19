<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-4 py-2 
                bg-primary-600 dark:bg-primary-500                 
                border border-transparent rounded-md font-semibold 
                text-xs text-white dark:text-gray-900 
                uppercase tracking-widest 
                hover:bg-primary-700 dark:hover:bg-primary-400 
                focus:bg-primary-700 dark:focus:bg-primary-400 
                active:bg-primary-800 dark:active:bg-primary-300 
                focus:outline-none focus:ring-2 
                focus:ring-primary-500 focus:ring-offset-2 
                dark:focus:ring-offset-gray-800 
                transition ease-in-out duration-150'
    ]) }}>
    {{ $slot }}
</button>