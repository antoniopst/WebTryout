@extends('layouts.app')

@section('content')
<h1>Daftar Tryout</h1>
@foreach($tests as $test)
    <div>
        <h2>{{ $test->title }}</h2>
        <p>{{ $test->description }}</p>
        <a href="{{ route('tryout.show', $test->id) }}">Mulai</a>
    </div>
@endforeach
@endsection
