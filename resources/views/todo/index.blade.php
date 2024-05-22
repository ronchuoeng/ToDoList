@extends('layouts.app')

@section('contents')
    <div class="pt-4">
        <div>
            @include('todo.table')
        </div>
        <div class="pt-4 create-container">
            @include('todo.create')
        </div>
    </div>
@endsection
