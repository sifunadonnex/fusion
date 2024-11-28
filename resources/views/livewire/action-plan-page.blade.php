<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <!-- Dashboard actions -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Action Plan</h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <!-- New Action Plan Button -->
            <button wire:click="createActionPlan" class="btn bg-orange-600 text-white hover:bg-orange-700">
                <i class="fas fa-plus-circle mr-1"></i> New Action Plan
            </button>

            <!-- Datepicker built with flatpickr -->
            <x-datepicker />
        </div>

    </div>
    {{-- get 2 divs one vertical having dropdowns for criteria another containing the action plans  --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <div class="flex justify-between items-start">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Criteria</h4>
                {{-- refresh --}}
                <button wire:click="refreshCriteria"
                    class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="#f06305"
                            d="M3.68 11.333h-.75zm0 1.667l-.528.532a.75.75 0 0 0 1.056 0zm2.208-1.134A.75.75 0 1 0 4.83 10.8zM2.528 10.8a.75.75 0 0 0-1.056 1.065zm16.088-3.408a.75.75 0 1 0 1.277-.786zM12.079 2.25c-5.047 0-9.15 4.061-9.15 9.083h1.5c0-4.182 3.42-7.583 7.65-7.583zm-9.15 9.083V13h1.5v-1.667zm1.28 2.2l1.679-1.667L4.83 10.8l-1.68 1.667zm0-1.065L2.528 10.8l-1.057 1.065l1.68 1.666zm15.684-5.86A9.16 9.16 0 0 0 12.08 2.25v1.5a7.66 7.66 0 0 1 6.537 3.643zM20.314 11l.527-.533a.75.75 0 0 0-1.054 0zM18.1 12.133a.75.75 0 0 0 1.055 1.067zm3.373 1.067a.75.75 0 1 0 1.054-1.067zM5.318 16.606a.75.75 0 1 0-1.277.788zm6.565 5.144c5.062 0 9.18-4.058 9.18-9.083h-1.5c0 4.18-3.43 7.583-7.68 7.583zm9.18-9.083V11h-1.5v1.667zm-1.276-2.2L18.1 12.133l1.055 1.067l1.686-1.667zm0 1.066l1.686 1.667l1.054-1.067l-1.686-1.666zM4.04 17.393a9.2 9.2 0 0 0 7.842 4.357v-1.5a7.7 7.7 0 0 1-6.565-3.644z" />
                    </svg>
                </button>
            </div>
            <ul class="mt-3">
                <!-- Assigned to-->
                <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['job'])) {{ 'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['job']) ? 1 : 0 }} }">
                    <a class="block text-gray-800 dark:text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['job'])) {{ 'hover:text-gray-900 dark:hover:text-white' }} @endif"
                        href="#0" @click.prevent="open = !open;">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M5.854 3.354a.5.5 0 1 0-.708-.708L3.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zM8.75 3.5a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5zm0 5a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5zm1.272 6.5a5.5 5.5 0 0 1 .353-1.5H8.75a.75.75 0 0 0 0 1.5zM5.854 8.854a.5.5 0 1 0-.708-.708L3.5 9.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 4.292a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647l1.646-1.647a.5.5 0 0 1 .708 0M20 15.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-4-2a.5.5 0 0 0-1 0V15h-1.5a.5.5 0 0 0 0 1H15v1.5a.5.5 0 0 0 1 0V16h1.5a.5.5 0 0 0 0-1H16z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-4 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Assigned
                                    To</span>
                            </div>
                            <!-- Icon -->
                            <div
                                class="flex shrink-0 ml-2 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 @if (in_array(Request::segment(1), ['job'])) {{ 'rotate-180' }} @endif"
                                    :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class=" 2xl:block">
                        <ul class="pl-8 mt-1 @if (!in_array(Request::segment(1), ['tasks'])) {{ 'hidden' }} @endif"
                            :class="open ? '!block' : 'hidden'">
                            {{-- user list --}}
                            @foreach ($users as $user)
                                <li class="mb-1 last:mb-0">
                                    <a class="block text
                                @if ($user->id == auth()->user()->id) {{ 'text-violet-500' }}@else{{ 'text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200' }} @endif
                                transition truncate"
                                        href="#"
                                        wire:click.prevent="$set('filterByAssignedTo', {{ $user->id }})">
                                        <span
                                            class="text-sm font-medium lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $user->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <!-- Assigned By -->
                <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['tasks'])) {{ 'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['tasks']) ? 1 : 0 }} }">
                    <a class="block text-gray-800 dark:text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['tasks'])) {{ 'hover:text-gray-900 dark:hover:text-white' }} @endif"
                        href="#0" @click.prevent="open = !open;">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="M5.08 15.296c-1.218.738-4.412 2.243-2.466 4.126c.95.92 2.009 1.578 3.34 1.578h7.593c1.33 0 2.389-.658 3.34-1.578c1.945-1.883-1.25-3.389-2.468-4.126a9.06 9.06 0 0 0-9.338 0M13.5 7a4 4 0 1 1-8 0a4 4 0 0 1 8 0M17 5h5m-5 3h5m-2 3h2"
                                        color="currentColor" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-4 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Assigned
                                    By</span>
                            </div>
                            <!-- Icon -->
                            <div
                                class="flex shrink-0 ml-2 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 @if (in_array(Request::segment(1), ['tasks'])) {{ 'rotate-180' }} @endif"
                                    :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class=" 2xl:block">
                        <ul class="pl-8 mt-1 @if (!in_array(Request::segment(1), ['tasks'])) {{ 'hidden' }} @endif"
                            :class="open ? '!block' : 'hidden'">
                            {{-- user list --}}
                            @foreach ($users as $user)
                                <li class="mb-1 last:mb-0">
                                    <a class="block text
                                @if ($user->id == auth()->user()->id) {{ 'text-violet-500' }}@else{{ 'text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200' }} @endif
                                transition truncate"
                                        href="#"
                                        wire:click.prevent="$set('filterByCreatedBy', {{ $user->id }})">
                                        <span
                                            class="text-sm font-medium lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $user->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <!-- Audit -->
                <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['settings'])) {{ 'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['settings']) ? 1 : 0 }} }">
                    <a class="block text-gray-800 dark:text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['settings'])) {{ 'hover:text-gray-900 dark:hover:text-white' }} @endif"
                        href="#0" @click.prevent="open = !open; ">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                        <path
                                            d="M19 10.5V10c0-3.771 0-5.657-1.172-6.828S14.771 2 11 2S5.343 2 4.172 3.172S3 6.229 3 10v6c0 1.864 0 2.796.304 3.53a4 4 0 0 0 2.165 2.165C6.204 22 7.136 22 9 22M7 7h8m-8 4h4" />
                                        <path
                                            d="M15.283 19.004c-.06-.888-.165-1.838-.601-2.912c-.373-.916-.269-3.071 1.818-3.071s2.166 2.155 1.794 3.07c-.436 1.075-.518 2.025-.576 2.913M21 22h-9v-1.246c0-.446.266-.839.653-.961l2.255-.716q.242-.077.494-.077h2.196q.252 0 .494.077l2.255.716c.387.122.653.515.653.961z" />
                                    </g>
                                </svg>
                                <span
                                    class="text-sm font-medium ml-4  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Audit</span>
                            </div>
                            <!-- Icon -->
                            <div
                                class="flex shrink-0 ml-2  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 @if (in_array(Request::segment(1), ['settings'])) {{ 'rotate-180' }} @endif"
                                    :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class=" 2xl:block">
                        <ul class="pl-8 mt-1 @if (!in_array(Request::segment(1), ['settings'])) {{ 'hidden' }} @endif"
                            :class="open ? '!block' : 'hidden'">
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('account')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('account') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Account</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('notifications')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('notifications') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Notifications</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('apps')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('apps') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Connected
                                        Apps</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('plans')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('plans') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Plans</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('billing')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('billing') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Billing
                                        & Invoices</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('feedback')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('feedback') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Give
                                        Feedback</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Source -->
                <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['settings'])) {{ 'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['settings']) ? 1 : 0 }} }">
                    <a class="block text-gray-800 dark:text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['settings'])) {{ 'hover:text-gray-900 dark:hover:text-white' }} @endif"
                        href="#0" @click.prevent="open = !open; ">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M13 14c-3.36 0-4.46 1.35-4.82 2.24A3.002 3.002 0 0 1 7 22c-1.66 0-3-1.34-3-3c0-1.31.83-2.42 2-2.83V7.83A2.99 2.99 0 0 1 4 5c0-1.66 1.34-3 3-3s3 1.34 3 3c0 1.31-.83 2.42-2 2.83v5.29c.88-.65 2.16-1.12 4-1.12c2.67 0 3.56-1.34 3.85-2.23A3.01 3.01 0 0 1 14 7c0-1.66 1.34-3 3-3s3 1.34 3 3c0 1.34-.88 2.5-2.09 2.86C17.65 11.29 16.68 14 13 14m-6 4c-.55 0-1 .45-1 1s.45 1 1 1s1-.45 1-1s-.45-1-1-1M7 4c-.55 0-1 .45-1 1s.45 1 1 1s1-.45 1-1s-.45-1-1-1m10 2c-.55 0-1 .45-1 1s.45 1 1 1s1-.45 1-1s-.45-1-1-1m-.25 15.16l-2.75-3L15.16 17l1.59 1.59L20.34 15l1.16 1.41z" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-4  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Source</span>
                            </div>
                            <!-- Icon -->
                            <div
                                class="flex shrink-0 ml-2  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 @if (in_array(Request::segment(1), ['settings'])) {{ 'rotate-180' }} @endif"
                                    :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class=" 2xl:block">
                        <ul class="pl-8 mt-1 @if (!in_array(Request::segment(1), ['settings'])) {{ 'hidden' }} @endif"
                            :class="open ? '!block' : 'hidden'">
                            @foreach ($sourceList as $source)
                                <li class="mb-1 last:mb-0">
                                    <a class="block text text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate"
                                        href="#"
                                        wire:click.prevent="$set('filterBySource', '{{ $source }}')">
                                        <span
                                            class="text-sm font-medium lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $source }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                {{-- department --}}
                <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['settings'])) {{ 'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['settings']) ? 1 : 0 }} }">
                    <a class="block text-gray-800 dark:text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['settings'])) {{ 'hover:text-gray-900 dark:hover:text-white' }} @endif"
                        href="#0" @click.prevent="open = !open; ">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M17 20c0-1.657-2.239-3-5-3s-5 1.343-5 3m14-3c0-1.23-1.234-2.287-3-2.75M3 17c0-1.23 1.234-2.287 3-2.75m12-4.014a3 3 0 1 0-4-4.472m-8 4.472a3 3 0 0 1 4-4.472M12 14a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                                </svg>
                                <span
                                    class="text-sm font-medium ml-4  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Department</span>
                            </div>
                            <!-- Icon -->
                            <div
                                class="flex shrink-0 ml-2  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 @if (in_array(Request::segment(1), ['settings'])) {{ 'rotate-180' }} @endif"
                                    :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class=" 2xl:block">
                        <ul class="pl-8 mt-1 @if (!in_array(Request::segment(1), ['settings'])) {{ 'hidden' }} @endif"
                            :class="open ? '!block' : 'hidden'">
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('account')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('account') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Account</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('notifications')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('notifications') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Notifications</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('apps')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('apps') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Connected
                                        Apps</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('plans')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('plans') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Plans</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('billing')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('billing') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Billing
                                        & Invoices</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('feedback')) {{ '!text-violet-500' }} @endif"
                                    href="{{ route('feedback') }}">
                                    <span
                                        class="text-sm font-medium  lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Give
                                        Feedback</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="bg-transparent dark:bg-gray-800 md:col-span-3 rounded-lg p-0">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.live.debounce.300ms="search" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <select id="actionStatus" wire:model.live="actionStatus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-[100px] p-3 ">
                                <option value="">All</option>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                    @foreach ($actionPlans as $actionPlan)
                        {{-- cards for each action plan --}}
                        <div wire:click="showActionPlanDetails({{ $actionPlan->id }})"
                            class="bg-white dark:bg-gray-800 cursor-pointer shadow overflow-hidden rounded-md sm:rounded-lg gap-2 flex flex-col p-4">
                            <div class="flex justify-between">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                        viewBox="0 0 24 24">
                                        <path
                                            fill="{{ // level 1: yellow, level 2: orange, level 3: red
                                                $actionPlan->FindingGradeId == 'level1' ? 'yellow' : ($actionPlan->FindingGradeId == 'level2' ? 'orange' : 'red') }}"
                                            d="M12.003 21q-1.866 0-3.51-.708q-1.643-.709-2.859-1.924t-1.925-2.856T3 12.003t.709-3.51Q4.417 6.85 5.63 5.634t2.857-1.925T11.997 3t3.51.709q1.643.708 2.859 1.922t1.925 2.857t.709 3.509t-.708 3.51t-1.924 2.859t-2.856 1.925t-3.509.709" />
                                    </svg>
                                    <h2 class="text-md font-semibold text-gray-800 dark:text-gray-200">
                                        {{ $actionPlan->CAPName }}</h2>
                                </div>
                                <div class="flex items-center space-x-3">
                                    {{-- status with different colors open:green, ongoing:orange etc --}}
                                    <div class="flex items -center">
                                        <span
                                            class="text-sm font-semibold rounded-xl p-2 {{ $actionPlan->CAPStatusId == 'open' ? 'bg-green-100 text-green-800' : ($actionPlan->CAPStatusId == 'in-progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">{{ $actionPlan->CAPStatusId }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- icon with assigned to --}}
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M18 19v-1.25c0-2.071-1.919-3.75-4.286-3.75h-3.428C7.919 14 6 15.679 6 17.75V19m9-11a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                </svg>
                                <div class="flex flex-col items-start">
                                    <span class="text-xs text-gray-400 dark:text-gray-100">Assigned To</span>
                                    <span
                                        class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ // get the name of the user who is assigned the action plan from users table
                                            $users->where('id', $actionPlan->ResponsiblePersonId)->first()->name }}</span>
                                </div>
                            </div>
                            {{-- findind text --}}
                            <p class="text-sm text-gray-500 ml-2 dark:text-gray-300">
                                {{-- cropped text: --}}
                                {{ substr($actionPlan->Finding, 0, 100) }}
                                {{ strlen($actionPlan->Finding) > 100 ? '...' : '' }}
                            </p>
                            {{-- icon with assigned by --}}
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0a3.75 3.75 0 0 1 7.5 0M4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.9 17.9 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632" />
                                    </svg>
                                    <div class="flex flex-col items-start">
                                        <span class="text-xs text-gray-400 dark:text-gray-100">Assigned By</span>
                                        <span
                                            class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ // get the name of the user who assigned the action plan from users table
                                                $users->where('id', $actionPlan->CreatedById)->first()->name }}</span>
                                    </div>
                                </div>
                                {{-- date --}}
                                <span class="text-xs text-gray-400 dark:text-gray-100">23-05-2021</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label for="perPage" class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select id="perPage" wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="6">6</option>
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="48">48</option>
                                <option value="96">96</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- new action plan dialog --}}
    <x-modal wire:model="showActionPlanModal" id="ActionPlanModal" maxWidth="2xl">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">New Action Plan</h2>
            <div class="mt-4">
                {{-- file details: Action Plan ID, status, Asigned To, source, CC --}}
                <p class="text-sm text-gray-500 dark:text-gray-300">File Details</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="action_plan_id"
                            class="block text
                        -sm font-medium text-gray-700 dark:text-gray-200">Action
                            Plan ID</label>
                        <input type="text" wire:model="actionPlanId" id="action_plan_id" name="action_plan_id"
                            class="form-input w-full" placeholder="Action Plan ID">
                        @error('actionPlanId')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="status"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                        {{-- select: open, closed...etc --}}
                        <select wire:model="status" id="status" name="status" class="form-select w-full">
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                        @error('status')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="assigned_to"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Assigned To</label>
                        <select wire:model="assigned_to" id="assigned_to" name="assigned_to"
                            class="form-select w-full">
                            {{-- <option value="level1">Level I</option>
                            <option value="level2">Level II</option>
                            <option value="level3">Level III</option> --}}
                            @foreach ($users as $user)
                                <option value={{ $user->id }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="source"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Source</label>
                        <select x-data="" x-init="$nextTick(() => {
                            $('#source').select2();
                        })" wire:model.live="source"
                            name="source" id="source" style="width: 100%" class="form-input">
                            <option value="">Select a Source</option>
                            @foreach ($sourceList as $source)
                                <option value="{{ $source }}">{{ $source }}</option>
                            @endforeach
                        </select>
                        @error('source')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div wire:ignore>
                        <label for="cc"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">CC</label>
                        <select multiple x-data="" x-init="$nextTick(() => {
                            $('#cc').select2();
                        })" wire:model.live="cc"
                            name="cc" id="cc" style="width: 100%" class="">
                            @foreach ($users as $user)
                                <option value="{{ $user['id'] }}" wire:key="cc-{{ $user['id'] }}">
                                    {{ $user['name'] }}</option>
                            @endforeach
                        </select>
                        @error('cc')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Nonconformity: finding, grade --}}
                <p class="text-sm text-gray-500 mt-4 dark:text-gray-300">Nonconformity</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="finding"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Finding</label>
                        <input type="text" wire:model="finding" id="finding" name="finding"
                            class="form-input w-full" placeholder="Finding">
                        @error('finding')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="grade"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Grade</label>
                        <select wire:model="grade" id="grade" name="grade" class="form-select w-full">
                            <option value="level1">Level I</option>
                            <option value="level2">Level II</option>
                            <option value="level3">Level III</option>
                        </select>
                        @error('grade')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Correction: completed by(date) --}}
                <p class="text-sm text-gray-500 mt-4 dark:text-gray-300">Correction</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                    <div>
                        <label for="completed_by"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Completed
                            By</label>
                        <input type="date" wire:model="completedBy" id="completed_by" name="completed_by"
                            class="form-input w-full" placeholder="Completed By">
                        @error('completedBy')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end px-6 gap-3 py-4 bg-gray-100 dark:bg-gray-800">
            <button wire:click="closeActionPlanModal"
                class="btn bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</button>
            <button wire:click="saveActionPlan" wire:loading.attr="disabled"
                class="btn bg-orange-600 flex items-center gap-2 text-white hover:bg-orange-700">Save
                <div wire:loading wire:target="saveActionPlan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                        <circle cx="18" cy="12" r="0" fill="#ffff">
                            <animate attributeName="r" begin=".67" calcMode="spline" dur="1.5s"
                                keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                                values="0;2;0;0" />
                        </circle>
                        <circle cx="12" cy="12" r="0" fill="#ffff">
                            <animate attributeName="r" begin=".33" calcMode="spline" dur="1.5s"
                                keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                                values="0;2;0;0" />
                        </circle>
                        <circle cx="6" cy="12" r="0" fill="#ffff">
                            <animate attributeName="r" begin="0" calcMode="spline" dur="1.5s"
                                keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite"
                                values="0;2;0;0" />
                        </circle>
                    </svg>
                </div>
            </button>
        </div>
    </x-modal>
    {{-- Action plan Modal with tabs: Details, Report --}}
    <x-modal wire:model="showActionPlanDetailsModal" id="ActionPlanDetailsModal" maxWidth="4xl">
        <div class="p-6" x-data="{ tab: 0 }">
            {{-- tabs for details, attachments, report --}}
            <div class="flex items
                -center gap-4">
                <button @click="tab = 0"
                    :class="{
                        'bg-orange-600 text-white': tab ===
                            0,
                        'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600': tab !==
                            0
                    }"
                    class="btn">Details</button>
                <button @click="tab = 1"
                    :class="{
                        'bg-orange-600 text-white': tab ===
                            1,
                        'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600': tab !==
                            1
                    }"
                    class="btn">Attachments</button>
                <button @click="tab = 2"
                    :class="{
                        'bg-orange-600 text-white': tab ===
                            2,
                        'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600': tab !==
                            2
                    }"
                    class="btn">Report</button>
            </div>
            <div class="mt-4 flex flex-col gap-4" x-show="tab === 0">
                <div
                    class="bg-white dark:bg-gray-800 cursor-pointer shadow overflow-hidden rounded-md sm:rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-300">File Details</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                        <div>
                            <label for="action_plan_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Action
                                Plan ID</label>
                            <input type="text" wire:model="actionPlan.CAPName" id="action_plan_id"
                                name="action_plan_id" class="form-input w-full" placeholder="Action Plan ID"
                                disabled>
                        </div>
                        <div>
                            <label for="status"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                            <select wire:model="actionPlan.CAPStatusId" id="status" name="status"
                                class="form-select w-full" disabled>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div>
                            <label for="assigned_to"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Assigned To</label>
                            <select wire:model="actionPlan.ResponsiblePersonId" id="assigned_to" name="assigned_to"
                                class="form-select w-full" disabled>
                                @foreach ($users as $user)
                                    <option value={{ $user->id }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="source"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Source</label>
                            <input type="text" wire:model="actionPlan.ReportSource" id="source" name="source"
                                class="form-input w-full" placeholder="Source" disabled>
                        </div>
                        <div class="col-span-2" wire:ignore>
                            <label for="cc"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">CC</label>
                            <select multiple wire:model="cc" name="cc" class="cc" disabled
                                style="width: 100%">
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}" wire:key="cc-{{ $user['id'] }}">
                                        {{ $user['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 cursor-pointer shadow overflow-hidden rounded-md sm:rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-300">Nonconformity</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="finding"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Finding</label>
                            <input type="text" wire:model="actionPlan.Finding" id="finding" name="finding"
                                class="form-input w-full" placeholder="Finding" disabled>
                        </div>
                        <div>
                            <label for="grade"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Grade</label>
                            <div class="flex items-center gap-2">
                                <select wire:model="actionPlan.FindingGradeId" id="grade" name="grade"
                                    class="form-select w-full" disabled>
                                    <option value="level1">Level I</option>
                                    <option value="level2">Level II</option>
                                    <option value="level3">Level III</option>
                                </select>
                                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em"
                                    viewBox="0 0 24 24">
                                    <path
                                        fill="{{ // level 1: yellow, level 2: orange, level 3: red
                                            $reportGrade === 'level1' ? 'yellow' : ($reportGrade === 'level2' ? 'orange' : 'red') }}"
                                        d="M12.003 21q-1.866 0-3.51-.708q-1.643-.709-2.859-1.924t-1.925-2.856T3 12.003t.709-3.51Q4.417 6.85 5.63 5.634t2.857-1.925T11.997 3t3.51.709q1.643.708 2.859 1.922t1.925 2.857t.709 3.509t-.708 3.51t-1.924 2.859t-2.856 1.925t-3.509.709" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 cursor-pointer shadow overflow-hidden rounded-md sm:rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-300">Correction</p>
                    <div class="grid grid-cols-1 gap-4 ">
                        <div>
                            <label for="correction"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Correction</label>
                            <input type="text" wire:model="correction" id="correction" name="correction"
                                class="form-input w-full" placeholder="Correction" disabled>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                            <div>
                                <label for="completed_by"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">Complete
                                    By</label>
                                <input type="date" wire:model="completedBy" id="completed_by" name="completed_by"
                                    class="form-input w-full" placeholder="Completed By" disabled>
                            </div>
                            <div>
                                <label for="completed_by"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">Completed
                                    On</label>
                                <input type="date" wire:model="completedBy" id="completed_by" name="completed_by"
                                    class="form-input w-full" placeholder="Completed By" disabled>
                            </div>
                        </div>
                        <div class="flex justify-between items-start">
                            {{-- planned, completed buttons --}}
                            <div class="flex items-center gap-2">
                                <button
                                    class="btn bg-green-100 text-green-800 hover:bg-green-200 dark:hover:bg-green-700">Planned</button>
                                <button
                                    class="btn bg-green-100 text-green-800 hover:bg-green-200 dark:hover:bg-green-700">Completed</button>
                            </div>
                            {{-- root cause, CA check boxes --}}
                            <div class="flex items-center gap-2">
                                <label for="root_cause"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">Root
                                    Cause</label>
                                <input type="checkbox" wire:model="isRootCause" id="root_cause" name="root_cause"
                                    class="form-checkbox w-6 h-6 text-green-500" disabled>
                                <label for="ca"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">CA</label>
                                <input type="checkbox" wire:model="isCA" id="ca" name="ca"
                                    class="form-checkbox w-6 h-6 text-green-500" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Root Cause Analysis --}}
                @if ($isRootCause)
                <div
                class="bg-white dark:bg-gray-800 cursor-pointer shadow overflow-hidden rounded-md sm:rounded-lg p-4">
                <p class="text-sm text-gray-500 dark:text-gray-300">Root Cause Analysis</p>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="root_cause"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Analysis</label>
                        <input type="textarea" wire:model="actionPlan.rootCauseAnalysis" id="root_cause" name="root_cause"
                            class="form-input w-full" placeholder="Root Cause Analysis" disabled>
                    </div>
                </div>
            </div>
                @endif
                {{-- Corrective Action --}}
               @if ($isCA)
               <div
               class="bg-white dark:bg-gray-800 cursor-pointer shadow overflow-hidden rounded-md sm:rounded-lg p-4">
               <p class="text-sm text-gray-500 dark:text-gray-300">Corrective Action</p>
               <div class="grid grid-cols-1 gap-4">
                   <div>
                       <label for="corrective_action"
                           class="block text-sm font-medium text-gray-700 dark:text-gray-200"> Action</label>
                       <input type="textarea" wire:model="correctiveAction" id="corrective_action"
                           name="corrective_action" class="form-input w-full" placeholder="Corrective Action"
                           disabled>
                   </div>
                   {{-- complete by, completed on --}}
                   <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                       <div>
                           <label for="complete_by"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-200">Complete
                               By</label>
                           <input type="date" wire:model="completeBy" id="complete_by" name="complete_by"
                               class="form-input w-full" placeholder="Complete By" disabled>
                       </div>
                       <div>
                           <label for="completed_on"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-200">Completed
                               On</label>
                           <input type="date" wire:model="completedOn" id="completed_on" name="completed_on"
                               class="form-input w-full" placeholder="Completed On" disabled>
                       </div>
                   </div>
               </div>
           </div>
               @endif
            </div>
            <div class="mt-4 flex flex-col gap-4" x-show="tab === 1">
                <div
                    class="bg-white dark:bg-gray-800 cursor-pointer shadow overflow-hidden rounded-md sm:rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-300 mb-3">Attachments</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="uploadFile1"
                                class="bg-white text-gray-500 font-semibold text-base rounded max-w-md h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto font-[sans-serif]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500"
                                    viewBox="0 0 32 32">
                                    <path
                                        d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                        data-original="#000000" />
                                    <path
                                        d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                        data-original="#000000" />
                                </svg>
                                Upload file

                                <input type="file" id='uploadFile1' class="hidden" />
                                <p class="text-xs font-medium text-gray-400 mt-2">or drag and drop</p>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex flex-col gap-4" x-show="tab === 2">
                {{-- print and download icons buttons --}}
                <div class="flex justify-end gap-4">
                    <button onclick="printReport()"
                        class="btn bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.8em" viewBox="0 0 24 24">
                            <g fill="none">
                                <path fill="#f06305"
                                    d="M4 10c0-1.886 0-2.828.586-3.414S6.114 6 8 6h8c1.886 0 2.828 0 3.414.586S20 8.114 20 10v2c0 .943 0 1.414-.293 1.707S18.943 14 18 14h-.7c-.141 0-.212 0-.256-.044S17 13.841 17 13.7V13c0-.943 0-1.414-.293-1.707S15.943 11 15 11H9c-.943 0-1.414 0-1.707.293S7 12.057 7 13v.7c0 .141 0 .212-.044.256S6.841 14 6.7 14H5c-.471 0-.707 0-.854-.146C4 13.707 4 13.47 4 13z" />
                                <path fill="#f06305" fill-opacity="0.25"
                                    d="M7 20.262V13c0-.943 0-1.414.293-1.707S8.057 11 9 11h6c.943 0 1.414 0 1.707.293S17 12.057 17 13v7.262c0 .334 0 .501-.11.576s-.265.012-.576-.112l-1.628-.652a.5.5 0 0 0-.186-.055a.5.5 0 0 0-.186.055l-2.128.852a.5.5 0 0 1-.186.055a.5.5 0 0 1-.186-.055l-2.128-.852a.5.5 0 0 0-.186-.055a.5.5 0 0 0-.186.055l-1.628.652c-.311.124-.466.186-.576.112c-.11-.075-.11-.242-.11-.576" />
                                <path stroke="#f06305" stroke-linecap="round" d="M9.5 14.5h4m-4 3h5" />
                                <path fill="#f06305"
                                    d="M7 4.74c0-.693 0-1.039.164-1.288a1 1 0 0 1 .288-.288C7.702 3 8.047 3 8.739 3h6.522c.692 0 1.038 0 1.288.164a1 1 0 0 1 .287.288c.164.25.164.595.164 1.287c0 .104 0 .156-.025.193a.2.2 0 0 1-.043.043C16.895 5 16.842 5 16.74 5H7.261c-.104 0-.156 0-.193-.025a.2.2 0 0 1-.043-.043C7 4.895 7 4.842 7 4.74" />
                            </g>
                        </svg>
                    </button>
                    <button onclick="downloadPDF('#report','{{ $actionPlan->CAPName }}')"
                        class="btn bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.8em" viewBox="0 0 24 24">
                            <path fill="#f06305"
                                d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z" />
                        </svg>
                    </button>
                </div>
                <div id='report'
                    class="bg-white dark:bg-gray-800 cursor-pointer shadow overflow-hidden rounded-md sm:rounded-lg p-4 flex flex-col gap-3">
                    <table class="table-auto w-full border border-gray-200 dark:border-gray-700 rounded-md">
                        <thead>
                            <tr>
                                <th class="bg-orange-600 uppercase p-3 text-start text-white" colspan="2">Action
                                    Plan
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td colspan="2" class="bg-orange-300 p-2 text-white">File Details</td>
                            </tr>
                            <tr>
                                <td width="50%" class="p-3">
                                    <table class="border-collapse">
                                        <tbody>
                                            <tr>
                                                <td width="150">
                                                    <p class="lbl">Action Plan Id</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{ $reportPlanId }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="lbl">Assigned By</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{ $reportCreatedBy }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="lbl">Assigned To</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{ $reportAssignedTo }}
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="50%">
                                    <table class="summarytable ovr">
                                        <tbody>
                                            <tr>
                                                <td width="150">
                                                    <p class="lbl">Status</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{ $reportStatus }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="lbl">Source</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{ $reportSource }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="lbl">Date Created</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{ $reportDateCreated }}
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table-auto w-full border border-gray-200 dark:border-gray-700 rounded-md">
                        <tbody>
                            <tr>
                                <td class="bg-orange-300 p-2 text-white" colspan="2">Nonconformity</td>
                            </tr>
                            <tr>
                                <td class="p-3" width="150">Finding</td>
                                <td class="flex p-3 gap-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                        viewBox="0 0 24 24">
                                        <path
                                            fill="{{ // level 1: yellow, level 2: orange, level 3: red
                                                $reportGrade == 'level1' ? 'yellow' : ($reportGrade == 'level2' ? 'orange' : 'red') }}"
                                            d="M12.003 21q-1.866 0-3.51-.708q-1.643-.709-2.859-1.924t-1.925-2.856T3 12.003t.709-3.51Q4.417 6.85 5.63 5.634t2.857-1.925T11.997 3t3.51.709q1.643.708 2.859 1.922t1.925 2.857t.709 3.509t-.708 3.51t-1.924 2.859t-2.856 1.925t-3.509.709" />
                                    </svg>
                                    @if ($reportGrade == 'level1')
                                        <span class="text-yellow-500">Level I</span>
                                    @endif
                                    @if ($reportGrade == 'level2')
                                        <span class="text-orange-600">Level II</span>
                                    @endif
                                    @if ($reportGrade == 'level3')
                                        <span class="text-red-800">Level III</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="p-3">
                                    <p>
                                        {{ $reportFinding }}
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table-auto w-full border border-gray-200 dark:border-gray-700 rounded-md">
                        <tbody>
                            <tr>
                                <td class="bg-orange-300 p-2 text-white" colspan="2">Correction</td>
                            </tr>
                            <tr>
                                <td class="p-3" width="150">Correction</td>
                                <td class="p-3">
                                    {{ $reportCorrection }}
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">Completed By</td>
                                <td class="p-3">
                                    {{ $reportDateCompleteBy }}
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3" width="150">Root Cause</td>
                                <td class="p-3">
                                    {{ $reportRootCause }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex justify-end px-6 gap-3 py-4 bg-gray-100 dark:bg-gray-800">
            <button wire:click="closeActionPlanDetailsModal"
                class="btn bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">Close</button>
        </div>
    </x-modal>
    <script>
        $(document).ready(function() {
            $('.cc').select2({
                allowClear: true,
                dropdownParent: $('#ActionPlanDetailsModal')
            });
            $('#cc').on('change', function(e) {
                var data = $(this).select2("val");
                @this.set('cc', data, false);
            });
            $('#source').on('change', function(e) {
                var data = $(this).select2("val");
                @this.set('source', data, false);
            });
        });

        function printReport() {
            var printContents = document.getElementById('report').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

        function downloadPDF(divId, capName) {
            const element = document.querySelector(divId);

            const formattedCapName = capName.replace(/[^a-zA-Z0-9_-]/g, ''); // Remove unsafe characters

            const options = {
                margin: 0.5,
                filename: `${formattedCapName}_CAP_REPORT.pdf`, // Include CAPName in the filename
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            html2pdf().set(options).from(element).save();
        }
    </script>
</div>
