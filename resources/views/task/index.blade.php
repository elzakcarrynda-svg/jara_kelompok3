<x-app-layout>

<div class="min-h-screen bg-[#F8F7F7] p-6">


    <div class="max-w-7xl mx-auto">


        {{-- Header --}}

        <div class="flex justify-between items-center mb-8">


            <div>

                <h1 class="text-3xl font-bold text-[#47201B]">
                    Task Board
                </h1>


                <p class="text-[#996561] mt-2">
                    Project: {{ $project->name }}
                </p>

            </div>


            <a
                href="{{ route('projects.tasks.create', $project) }}"
                class="bg-[#511E1D] text-white px-5 py-3 rounded-xl"
            >
                + Tambah Task
            </a>


        </div>




        @if(session('success'))

            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

                {{ session('success') }}

            </div>

        @endif





        <div class="grid md:grid-cols-3 gap-6">



            {{-- TODO --}}

            <div class="bg-[#E1D3C4] rounded-2xl p-5">


                <h2 class="font-bold text-[#47201B] mb-4 text-xl">
                    Todo
                </h2>


                @forelse($tasks->where('status','todo') as $task)


                    <div class="bg-white rounded-xl p-4 mb-3 shadow">


                        <h3 class="font-semibold text-[#47201B]">
                            {{ $task->title }}
                        </h3>


                        <span class="text-sm text-[#CA734D]">
                            {{ strtoupper($task->priority) }}
                        </span>


                        <p class="text-sm mt-2">
                            Deadline:
                            {{ $task->deadline ?? '-' }}
                        </p>


                        <div class="flex gap-2 mt-4">


                            <a
                                href="{{ route('projects.tasks.edit', [$project, $task]) }}"
                                class="px-3 py-2 bg-gray-200 rounded-lg text-sm"
                            >
                                Edit
                            </a>


                            <form
                                method="POST"
                                action="{{ route('projects.tasks.destroy', [$project, $task]) }}"
                            >

                                @csrf
                                @method('DELETE')


                                <button
                                    class="px-3 py-2 bg-red-600 text-white rounded-lg text-sm"
                                >
                                    Hapus
                                </button>


                            </form>


                        </div>


                    </div>


                @empty

                    <p class="text-sm text-gray-600">
                        Tidak ada task.
                    </p>

                @endforelse


            </div>






            {{-- DOING --}}

            <div class="bg-[#E3DFE8] rounded-2xl p-5">


                <h2 class="font-bold text-[#511E1D] mb-4 text-xl">
                    Doing
                </h2>


                @forelse($tasks->where('status','doing') as $task)


                    <div class="bg-white rounded-xl p-4 mb-3 shadow">


                        <h3 class="font-semibold text-[#47201B]">
                            {{ $task->title }}
                        </h3>


                        <span class="text-sm text-[#CA734D]">
                            {{ strtoupper($task->priority) }}
                        </span>


                        <div class="flex gap-2 mt-4">


                            <a
                                href="{{ route('projects.tasks.edit', [$project, $task]) }}"
                                class="px-3 py-2 bg-gray-200 rounded-lg text-sm"
                            >
                                Edit
                            </a>


                        </div>


                    </div>


                @empty

                    <p class="text-sm text-gray-600">
                        Tidak ada task.
                    </p>

                @endforelse


            </div>






            {{-- DONE --}}

            <div class="bg-[#996561] rounded-2xl p-5">


                <h2 class="font-bold text-white mb-4 text-xl">
                    Done
                </h2>


                @forelse($tasks->where('status','done') as $task)


                    <div class="bg-white rounded-xl p-4 mb-3 shadow">


                        <h3 class="font-semibold text-[#47201B]">
                            {{ $task->title }}
                        </h3>


                        <span class="text-sm text-green-600">
                            Selesai
                        </span>


                        <div class="flex gap-2 mt-4">


                            <a
                                href="{{ route('projects.tasks.edit', [$project, $task]) }}"
                                class="px-3 py-2 bg-gray-200 rounded-lg text-sm"
                            >
                                Edit
                            </a>


                        </div>


                    </div>


                @empty

                    <p class="text-sm text-white">
                        Tidak ada task.
                    </p>

                @endforelse


            </div>



        </div>


    </div>


</div>


</x-app-layout>