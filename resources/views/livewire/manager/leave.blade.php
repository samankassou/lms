@section('title', __('Dashboard'))
<div class="w-full overflow-hidden rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-3 dark:bg-gray-700">
        <div class="flex items-center gap-1">
            {{-- Search bar --}}
            <div class="py-4 px-3">
                <div class="relative text-left">
                    <input
                        class="appearance-none w-full bg-white border-gray-300 hover:border-gray-500 px-3 py-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 focus:border-2 border"
                        type="text" placeholder="@lang('Search')" autocomplete="off" wire:model="search">
                    @if ($search)
                        <div class="absolute right-0 top-0 mt-3 mr-4 text-purple-lighter">
                            <a wire:click.prevent="$set('search', '')" href="#"
                                class="text-gray-400 hover:text-yellow-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </div>
        {{-- create button --}}
        <div class="py-4 px-3" wire:click="$emit('openModal', 'manager.leaves.create')">
            <button type="button"
                class="flex justify-center gap-2 items-center w-full px-3 py-1 text-sm font-medium text-white bg-yellow-600 border border-transparent rounded-md hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:ring-yellow active:bg-yellow-700 transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                @lang("New")
            </button>
        </div>
    </div>
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <x-table-header :direction="$orderDirection" name="code" :field="$orderField">@lang("Employee")
                    </x-table-header>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($leaves as $leave)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            @if ($leave->user)
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ optional($leave->user)->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ optional($leave->user)->email }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td class="text-center text-gray-500 py-3 px-4" colspan="7">@lang("No item")</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="py-4 px-3">
        {{ $leaves->links() }}
    </div>
</div>
