@extends('layouts.main')

@section('content')

@livewire('counter')

{{auth()->user()->username}}
{{auth()->user()->role_id == 1 ? 'admin' : 'user'}}

@endsection