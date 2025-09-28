<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make a Note ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-button icon="arrow-left" class="mb-12" href="{{route('notes.index')}}">All Notes</x-button>

            <livewire:notes.create-notes />

        </div>
    </div>
    </div>
</x-app-layout>
