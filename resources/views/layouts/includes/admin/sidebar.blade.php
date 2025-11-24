@php
use Illuminate\Support\Str;

$links = [
    [
        'name' => 'Dashboard',
        'icon' => 'fa-solid fa-school',
        'href' => route('admin.dashboard'),
        'active' => request()->routeIs('admin.dashboard'),
    ],
    [
        'header' => 'Gestión de Usuarios',
    ],
    [
        'name' => 'Usuarios',
        'icon' => 'fa-solid fa-users-gear',
        'href' => '#',
        'active' => false,
        'submenu' => [
            [
                'name' => 'Profesores',
                'icon' => 'fa-solid fa-chalkboard-user',
                'href' => '#',
                'active' => false,
            ],
            [
                'name' => 'Alumnos',
                'icon' => 'fa-solid fa-chalkboard-user',
                'href' => '#',
                'active' => false,
            ],
            [
                'name' => 'Administradores',
                'icon' => 'fa-solid fa-chalkboard-user',
                'href' => '#',
                'active' => false,
            ]
        ],
    ]
];
@endphp


<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform 
    -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 
    dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            @foreach ($links as $link)
                <li>

                    {{-- Header --}}
                    @isset($link['header'])
                        <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase">
                            {{ $link['header'] }}
                        </div>

                    @else

                        {{-- Si tiene submenu --}}
                        @isset($link['submenu'])

                            @php $menuId = Str::slug($link['name']); @endphp

                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 
                                rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                aria-controls="{{ $menuId }}" data-collapse-toggle="{{ $menuId }}">

                                <span class="w-6 h-6 inline-flex justify-center items-center text-gray-300">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>

                                <span class="flex-1 ms-3 text-left whitespace-nowrap">{{ $link['name'] }}</span>

                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            {{-- Submenu --}}
                            <ul id="{{ $menuId }}" class="hidden py-2 space-y-2">
                                @foreach ($link['submenu'] as $sublink)
                                    <li>
                                        <a href="{{ $sublink['href'] }}"
                                            class="flex items-center w-full p-2 pl-11 rounded-lg transition duration-75 
                                            hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-900 dark:text-white">

                                            <i class="{{ $sublink['icon'] }} text-gray-300 mr-2"></i>
                                            {{ $sublink['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        @else
                            {{-- Enlace normal --}}
                            <a href="{{ $link['href'] }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white 
                                hover:bg-gray-100 dark:hover:bg-gray-700 group
                                {{ $link['active'] ? 'bg-gray-100 dark:bg-gray-700' : '' }}">

                                <span class="w-6 h-6 inline-flex justify-center items-center text-gray-300">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>

                                <span class="ms-3">{{ $link['name'] }}</span>
                            </a>
                        @endisset

                    @endisset

                </li>
            @endforeach

        </ul>
    </div>
</aside>
