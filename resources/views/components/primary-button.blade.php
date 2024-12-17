<button {{ $attributes->merge(['type' => 'submit', 'class' =>
'inline-flex
 font-radikal
 items-center
 px-4
 py-2
 bg-[#AA0160]
 border
 border-transparent
 rounded-full
 font-semibold
 text-xs
 text-white
 hover:text-[#AA0160]
 uppercase
 tracking-widest
 hover:bg-gray-700
 dark:hover:bg-white
 hover:shadow-[0_0_0_3px_#AA0160]
 focus:shadow-[0_0_0_3px_#AA0160]
 focus:bg-gray-700
 focus:text-[#AA0160]
 dark:focus:bg-white
 active:bg-gray-900
 dark:active:bg-gray-300
 focus:outline-none
 focus:ring-2
 focus:ring-indigo-500
 focus:ring-offset-2
 dark:focus:ring-offset-gray-800
 transition-all
 ease-in-out
 duration-400'
 ]) }}>
    {{ $slot }}
</button>
