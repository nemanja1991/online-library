@if ($message = Session::get('success'))

<div
    x-data="{ isVisible: true }"
    x-init="
        setTimeout(() => {
            isVisible = false
        }, 5000)
    "
    x-show.transition.duration.1000ms="isVisible"
>
    <div id="alert-message" class="p-4 mb-4 border border-blue-300 rounded-lg bg-blue-50 dark:bg-blue-300"
        role="alert">
        <div class="flex items-center">
            <h3 class="text-lg font-medium text-blue-900 text-center">{{ session('success') }}</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-blue-900">
        </div>
    </div>
</div>

@endif