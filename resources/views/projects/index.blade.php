<x-app-layout>

<div class="min-h-screen bg-[#F8F7F7] p-6">


    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-[#47201B]">
                My Projects
            </h1>

            <p class="text-[#996561]">
                Kelola project dan tugas kamu
            </p>

        </div>


        <a href="{{ route('projects.create') }}"
           class="bg-[#511E1D] text-white px-5 py-3 rounded-xl">

            + Project Baru

        </a>


    </div>



    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">


        @foreach($projects as $project)


        <div class="bg-white rounded-2xl shadow-md p-6">


            <h2 class="text-xl font-bold text-[#47201B]">

                {{ $project->name }}

            </h2>


            <p class="mt-3">

                {{ $project->description }}

            </p>


            <a href="{{ route('projects.show',$project->id) }}"
               class="block mt-5 bg-[#47201B] text-white text-center py-2 rounded-xl">

                Lihat Detail

            </a>


        </div>


        @endforeach


    </div>


</div>


</x-app-layout>