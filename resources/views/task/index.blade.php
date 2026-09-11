@extends('layouts.app')


@section('content')


<div class="min-h-screen bg-[#F8F7F7] p-6">


<h1 class="text-3xl font-bold text-[#47201B] mb-6">

    Task Board

</h1>



<div class="grid md:grid-cols-3 gap-6">


<!-- TODO -->

<div class="bg-[#E1D3C4] rounded-2xl p-5">


<h2 class="font-bold text-[#47201B] mb-4">

Todo

</h2>



@foreach($tasks->where('status','todo') as $task)


<div class="bg-white rounded-xl p-4 mb-3 shadow">


<h3 class="font-semibold text-[#47201B]">

{{ $task->title }}

</h3>


<span class="text-sm text-[#CA734D]">

{{ strtoupper($task->priority) }}

</span>


<p class="text-sm mt-2">

Deadline:
{{ $task->deadline }}

</p>


</div>


@endforeach


</div>






<!-- DOING -->

<div class="bg-[#E3DFE8] rounded-2xl p-5">


<h2 class="font-bold text-[#511E1D] mb-4">

Doing

</h2>



@foreach($tasks->where('status','doing') as $task)


<div class="bg-white rounded-xl p-4 mb-3 shadow">

<h3 class="font-semibold">

{{ $task->title }}

</h3>


</div>


@endforeach


</div>






<!-- DONE -->

<div class="bg-[#996561] rounded-2xl p-5">


<h2 class="font-bold text-white mb-4">

Done

</h2>



@foreach($tasks->where('status','done') as $task)


<div class="bg-white rounded-xl p-4 mb-3 shadow">


<h3 class="font-semibold text-[#47201B]">

{{ $task->title }}

</h3>


</div>


@endforeach


</div>



</div>



</div>


@endsection