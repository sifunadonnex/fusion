<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Action Plan</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <!-- new action plan -->
                <a href="#" class="btn bg-orange-600 text-white hover:bg-orange-700">
                    <i class="fas fa-plus-circle mr-1"></i> New Action Plan
                </a>

                <!-- Datepicker built with flatpickr -->
                <x-datepicker />
                
            </div>

        </div>
        
        <!-- Cards -->
        <div class="grid grid-cols-2 md:grid-cols-12 gap-8">

            <!-- Line chart (Acme Plus) -->
            <x-action-plan.dashboard-card-01 />
        </div>

    </div>
</x-app-layout>
