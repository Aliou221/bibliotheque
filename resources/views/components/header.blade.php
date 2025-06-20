
<header class="sticky top-0 z-1300">
    <nav class="flex shadow-sm py-3 bg-white w-full items-center justify-between">
        <div class="container flex items-center gap-2">
            <span class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0d6efd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book h-8 w-8 text-blue-600" data-lov-id="src/components/Navigation.tsx:22:14" data-lov-name="Book" data-component-path="src/components/Navigation.tsx" data-component-line="22" data-component-file="Navigation.tsx" data-component-name="Book" data-component-content="%7B%22className%22%3A%22h-8%20w-8%20text-blue-600%22%7D"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"></path></svg>
                <h2 class="text-xl cursor-pointer animate-pulse hover:scale-[1.1] transition ease-in duration-[.3s] font-bold">
                    Bibliothèque
                </h2>
            </span>
        </div>
    </nav>
    <div class="sidebar absolute min-h-[calc(100vh-112px)] py-[4%] px-2 w-50 bg-white">
        <ul class="flex flex-col gap-2 ">
            <li class="flex w-full items-center gap-2">
                <a href="{{route('Index')}}" class="{{ Route::currentRouteName() === 'Index' ? 'py-3 px-3 bg-[#0f172a14] rounded text-gray-900 font-bold' : '' }} py-3 px-3 hover:font-bold hover:bg-[#0f172a14] hover:rounded transition-all  duration-[.3s] ease-out hover:text-gray-900 hover:p-3 gap-2 flex items-center w-full">
                    <x-utils.svg icon="home" iconClasse="text-dark h-[20px] w-[20px]"/>
                    Tableau de bord
                </a>
            </li>
            <li class="flex w-full items-center gap-2">
                <a href="{{route('Livres')}}" class="{{ Route::currentRouteName() === 'Livres' ? 'py-3 px-3 bg-[#0f172a14] rounded text-gray-900 font-bold' : '' }} py-3 px-3 hover:font-bold hover:bg-[#0f172a14] hover:rounded transition-all duration-[.3s] ease-out hover:text-gray-900 hover:p-3 gap-2 flex items-center w-full">
                    <x-utils.svg icon="book" iconClasse="text-dark h-[20px] w-[20px]"/>
                    Livre
                </a>
            </li>
            <li class="flex w-full items-center gap-2">
                <a href="{{route('Usagers')}}" class="{{ Route::currentRouteName() === 'Usagers' ? 'py-3 px-3 bg-[#0f172a14] rounded text-gray-900 font-bold' : '' }} py-3 px-3 hover:font-bold hover:bg-[#0f172a14] hover:rounded transition-all duration-[.3s] ease-out hover:text-gray-900 hover:p-3 gap-2 flex items-center w-full">
                    <x-utils.svg icon="users" iconClasse="text-dark h-[20px] w-[20px]"/>
                    Usagers
                </a>
            </li>
            <li class="flex w-full items-center gap-2">
                <a href="{{route('Emprunts')}}" class="{{ Route::currentRouteName() === 'Emprunts' ? 'py-3 px-3 bg-[#0f172a14] rounded text-gray-900 font-bold' : '' }} py-3 px-3 hover:font-bold hover:bg-[#0f172a14] hover:rounded transition-all duration-[.3s] ease-out hover:text-gray-900 hover:p-3 gap-2 flex items-center w-full">
                    <x-utils.svg icon="emprunt-cours" iconClasse="text-dark h-[20px] w-[20px]"/>
                    Emprunts
                </a>
            </li>
        </ul>
    </div>
</header>