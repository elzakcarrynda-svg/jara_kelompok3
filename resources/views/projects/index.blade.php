<x-app-layout>

<div class="min-h-screen bg-[#F7F5F3]">

    <div class="max-w-7xl mx-auto px-8 py-10">


        {{-- Header --}}
        <div class="flex items-center justify-between mb-10">

            <div>
                <h1 class="text-3xl font-semibold text-[#3E1F1A]">
                    My Projects
                </h1>

                <p class="mt-2 text-sm text-[#8C6B63]">
                    Kelola daftar tugas pribadi maupun kolaborasi dalam JARA.
                </p>
            </div>


            <a href="{{ route('projects.create') }}"
               class="inline-flex items-center gap-2
                      bg-[#5A2420]
                      hover:bg-[#451B18]
                      text-white
                      px-5 py-3
                      rounded-xl
                      text-sm font-medium
                      shadow-sm
                      transition">

                <span class="text-lg leading-none">
                    +
                </span>

                Project Baru

            </a>

        </div>

        {{-- Project Grid --}}
        @if($projects->count())


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


            @foreach($projects as $project)


            <div class="
                bg-white
                border border-[#E9DFD8]
                rounded-2xl
                p-6
                hover:-translate-y-1
                hover:shadow-lg
                transition duration-200
            ">
                {{-- Card Header --}}
                <div class="flex justify-between items-start">


                    <div class="
                        w-11 h-11
                        rounded-xl
                        bg-[#F0E5DF]
                        flex items-center justify-center
                    ">

                        <svg 
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-[#5A2420]"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path 
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 7h5l2 3h11v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>

                        </svg>
                    </div>
                </div>

                {{-- Project Info --}}
                <div class="mt-6">
                    <h2 class="
                        text-xl
                        font-semibold
                        text-[#3E1F1A]
                        truncate
                    ">
                        {{ $project->name }}
                    </h2>

                    <p class="
                        mt-2
                        text-sm
                        text-gray-500
                        leading-relaxed
                        line-clamp-2
                    ">
                        {{ $project->description ?: 'Tidak ada deskripsi project.' }}
                    </p>
                </div>
                {{-- Metadata --}}

                <div class="
                    mt-6
                    pt-5
                    border-t border-[#EFE7E2]
                    flex
                    justify-between
                    text-sm
                    text-gray-500
                ">
                    <div>
                        <span class="block text-xs text-gray-400">
                            Tasks
                        </span>

                        <span class="font-medium text-[#3E1F1A]">
                            {{ $project->tasks->count() }}
                        </span>

                    </div>


                    <div class="text-right">
                        <span class="block text-xs text-gray-400">
                            Created
                        </span>
                        <span class="font-medium text-[#3E1F1A]">
                            {{ $project->created_at->format('d M Y') }}
                        </span>
                    </div>
                </div>


                {{-- Action --}}
                <a href="{{ route('projects.show',$project) }}"
                   class="
                    block
                    mt-6
                    text-center
                    py-2.5
                    rounded-xl
                    border
                    border-[#5A2420]
                    text-[#5A2420]
                    text-sm
                    font-medium
                    hover:bg-[#5A2420]
                    hover:text-white
                    transition
                   ">

                    Lihat Detail
                </a>
            </div>

            @endforeach

        </div>

        @else

        {{-- Empty State --}}
        <div class="
            bg-white
            border border-[#E9DFD8]
            rounded-2xl
            p-12
            text-center
        ">

            <h3 class="
                text-lg
                font-semibold
                text-[#3E1F1A]
            ">
                Belum ada project
            </h3>


            <p class="
                mt-2
                text-sm
                text-gray-500
            ">

                Buat project pertama untuk mulai mengatur tugas kamu.
            </p>

            <a href="{{ route('projects.create') }}"
               class="
                inline-block
                mt-5
                bg-[#5A2420]
                text-white
                px-5
                py-3
                rounded-xl
                text-sm
               ">

                Buat Project

            </a>
        </div>
        @endif

    </div>
</div>
</x-app-layout>