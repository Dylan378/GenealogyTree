@extends('layouts.app')

@section('title', 'Genealogy tree')

@section('content')

<div class="min-h-screen mt-16 flex items-center justify-center bg-slate-800">
    <a href="{{ route('genealogy.show') }}" class="font-bold text-4xl text-blue-400">
        Genealogy Tree
    </a>
</div>

@endsection