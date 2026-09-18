<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#47201B] leading-tight">
            Profile
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-[#F8F7F7] overflow-hidden shadow-sm rounded-2xl border border-[#E1D3C4] p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-[#F8F7F7] overflow-hidden shadow-sm rounded-2xl border border-[#E1D3C4] p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-[#F8F7F7] overflow-hidden shadow-sm rounded-2xl border border-[#E1D3C4] p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
