<x-app-layout>

<div class="min-h-screen bg-[#F8F7F7] p-6">

    <div class="max-w-6xl mx-auto">


        {{-- Header Project --}}

        <div class="flex justify-between items-start mb-8">

            <div>

                <h1 class="text-3xl font-bold text-[#47201B]">
                    {{ $project->name }}
                </h1>

                <p class="text-[#996561] mt-2">
                    {{ $project->description ?: 'Tidak ada deskripsi.' }}
                </p>

            </div>


            <div class="flex gap-2">

                <a
                    href="{{ route('projects.edit', $project) }}"
                    class="px-4 py-2 bg-[#E1D3C4] rounded-xl"
                >
                    Edit
                </a>


                <form
                    method="POST"
                    action="{{ route('projects.destroy', $project) }}"
                    onsubmit="return confirm('Yakin ingin menghapus project ini?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-xl"
                    >
                        Hapus
                    </button>

                </form>

            </div>

        </div>


        {{-- Pesan sukses --}}

        @if (session('success'))

            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

                {{ session('success') }}

            </div>

        @endif


        {{-- Task Header --}}

        <div class="flex justify-between items-center mb-5">

            <h2 class="text-2xl font-bold text-[#47201B]">
                Tasks
            </h2>


            <a
                href="{{ route('tasks.create', $project) }}"
                class="bg-[#511E1D] text-white px-5 py-3 rounded-xl"
            >
                + Task Baru
            </a>

        </div>


        {{-- Task List --}}

        @forelse ($project->tasks as $task)

            <div class="bg-white rounded-2xl shadow-md p-5 mb-4">

                <div class="flex justify-between">

                    <div>

                        <h3 class="text-lg font-bold text-[#47201B]">
                            {{ $task->title }}
                        </h3>

                        @if ($task->description)

                            <p class="text-gray-600 mt-2">
                                {{ $task->description }}
                            </p>

                        @endif

                    </div>


                    <div class="text-right">

                        <span class="inline-block px-3 py-1 rounded-full text-sm bg-[#E1D3C4]">

                            {{ strtoupper($task->priority) }}

                        </span>

                        <p class="text-sm mt-2">

                            {{ strtoupper($task->status) }}

                        </p>

                    </div>

                </div>


                <div class="mt-4 text-sm text-gray-500">

                    Deadline:

                    {{ $task->deadline ? $task->deadline->format('d M Y') : '-' }}

                </div>


                <div class="flex gap-2 mt-4">

                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="px-4 py-2 bg-gray-200 rounded-xl"
                    >
                        Edit
                    </a>


                    <form
                        method="POST"
                        action="{{ route('tasks.destroy', $task) }}"
                        onsubmit="return confirm('Yakin ingin menghapus task ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-xl"
                        >
                            Hapus
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-2xl p-8 text-center">

                <p class="text-gray-500">
                    Belum ada task di project ini.
                </p>

            </div>

        @endforelse

    </div>

</div>

</x-app-layout>