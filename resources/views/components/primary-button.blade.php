<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-4 py-2 
                bg-primary-900 dark:bg-primary-700                 
                border border-transparent rounded-md font-semibold 
                text-xs text-white dark:text-gray-900 
                uppercase tracking-widest 
                hover:bg-primary-800 dark:hover:bg-primary-600 
                focus:bg-primary-800 dark:focus:bg-primary-600 
                active:bg-primary-800 dark:active:bg-primary-500 
                focus:outline-none focus:ring-2 
                focus:ring-primary-600 focus:ring-offset-2 
                dark:focus:ring-offset-gray-800 
                transition ease-in-out duration-150'
    ]) }}>
    {{ $slot }}
</button>