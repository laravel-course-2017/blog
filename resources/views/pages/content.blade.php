@php
    $i = 0;
@endphp
@extends('pages.posts')

@section('content')
    <h1>{{ $mainContent or '' }}</h1>
<select>
    @for ($i = 1910; $i < 2000; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>
    @forelse ($users as $user)
        <li>{{ $user->name }}</li>
    @empty
        <p>No users</p>
    @endforelse

    @if ($a == 1)
    @endif

    {{-- This comment will not be present in the rendered HTML --}}
    <!-- Regular HTML comment -->



@endsection