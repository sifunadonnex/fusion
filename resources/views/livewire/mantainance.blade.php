<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <!-- Dashboard actions -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0 flex gap-2 items-center justify-between">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold lg:mr-10">Maintenance</h1>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <!-- Aircraft Tooltip -->
                <a href="{{ route('maintenance') }}"
                    class="relative group text-sm bg-gray-200 text-gray-800 dark:text-gray-100 font-semibold p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M14 8.947L22 14v2l-8-2.526v5.36l3 1.666V22l-4.5-1L8 22v-1.5l3-1.667v-5.36L3 16v-2l8-5.053V3.5a1.5 1.5 0 0 1 3 0z" />
                    </svg>
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-[0.7rem] transition bg-gray-800 text-white text-xs rounded-md px-2 py-1 shadow-lg">
                        Aircraft
                    </div>
                </a>

                <!-- Quarantine Tooltip -->
                <a href="{{ route('maintenance') }}"
                    class="relative group text-sm bg-gray-200 text-gray-800 dark:text-gray-100 font-semibold p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5.697M18 12V7a2 2 0 0 0-2-2h-2" />
                            <path
                                d="M8 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2m0 6h4m-4 4h3m3 2.5a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0-5 0m4.5 2L21 22" />
                        </g>
                    </svg>
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-[0.7rem] transition bg-gray-800 text-white text-xs rounded-md px-2 py-1 shadow-lg">
                        Quarantine
                    </div>
                </a>

                <!-- Archived Tooltip -->
                <a href="{{ route('maintenance') }}"
                    class="relative group text-sm bg-gray-200 text-gray-800 dark:text-gray-100 font-semibold p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m12 18l4-4l-1.4-1.4l-1.6 1.6V10h-2v4.2l-1.6-1.6L8 14zM5 8v11h14V8zm0 13q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25zm6.6 7.5" />
                    </svg>
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-[0.7rem] transition bg-gray-800 text-white text-xs rounded-md px-2 py-1 shadow-lg">
                        Archived
                    </div>
                </a>
                {{-- program --}}
                <a href="{{ route('maintenance') }}"
                    class="relative group text-sm bg-gray-200 text-gray-800 dark:text-gray-100 font-semibold p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" color="currentColor">
                            <path
                                d="M11.53 22h-1.06c-3.992 0-5.989 0-7.23-1.172C2 19.657 2 17.771 2 14v-4c0-3.771 0-5.657 1.24-6.828C4.481 2 6.478 2 10.47 2h1.06c3.993 0 5.989 0 7.23 1.172C20 4.343 20 6.229 20 10v.5M7 7h8m-8 5h5" />
                            <path
                                d="M18 20.714V22m0-1.286a3.36 3.36 0 0 1-2.774-1.43M18 20.713a3.36 3.36 0 0 0 2.774-1.43M18 14.285c1.157 0 2.176.568 2.774 1.43M18 14.287a3.36 3.36 0 0 0-2.774 1.43M18 14.287V13m4 1.929l-1.226.788M14 20.07l1.226-.788M14 14.93l1.226.788M22 20.07l-1.226-.788m0-3.566a3.12 3.12 0 0 1 0 3.566m-5.548-3.566a3.12 3.12 0 0 0 0 3.566" />
                        </g></svg>
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-[0.7rem] transition bg-gray-800 text-white text-xs rounded-md px-2 py-1 shadow-lg">
                            Program
                        </div>
                </a>
            </div>

        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <!-- New Action Plan Button -->
            <button wire:click="createActionPlan" class="btn bg-orange-600 text-white hover:bg-orange-700">
                <i class="fas fa-plus-circle mr-1"></i> New Aircraft
            </button>

            <!-- Datepicker built with flatpickr -->
            <x-datepicker />
        </div>

    </div>
</div>
