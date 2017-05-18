@extends('pages.mainPage')


@section('content')
    <select>
        @for ($i = 1910; $i < 2000; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    {{ formatDate() }}

    @php
        echo date('d.m.Y');
    @endphp

    @if ($isAdmin)
        Я админ
    @endif

    @unless($isAdmin)
        Я НЕ админ
    @endunless
<ul>
    @forelse ($users as $user)
        <li>{{ $user->name }}</li>
    @empty
        <p>No users</p>
    @endforelse
</ul>
@endsection

