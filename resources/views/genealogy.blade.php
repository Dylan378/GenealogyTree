@extends('layouts.app')

@section('title', 'Genealogy tree')

@section('content')

<div class="flex flex-col items-center p-6 bg-slate-800 min-h-screen relative">

    @if($parent->distributor_id)
        <div class="w-full flex justify-start mb-4 mt-12">
            <a href="{{ route('genealogy.show', ['parent_id' => $parent->distributor_id]) }}" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
                ← Previous
            </a>
        </div>
    @endif

    <div class="relative mb-8 flex flex-col items-center group z-10">

        <div class="w-24 h-24 bg-gradient-to-br from-indigo-600 to-blue-500 text-white rounded-full flex items-center justify-center text-lg font-semibold relative shadow-lg hover:scale-105 transition-transform duration-300 parent-circle">
            <i class="fas fa-user"></i>
            <div class="absolute left-1/2 transform -translate-x-1/2 mt-24 hidden parent-tooltip bg-white shadow-xl p-4 rounded-lg text-xs text-gray-800 w-48 z-50">
                <p class="z-10"><strong>{{ $parent->full_name }}</strong></p> 
                <p>Username: {{ $parent->username }}</p>
                <p>Status: {{ $parent->status }}</p>
                <p>Product: {{ $parent->product_name }}</p>
                <p>Category: {{ $parent->category_name }}</p>
            </div>
        </div>
        <div class="mt-2 text-center text-lg text-white font-medium z-30">{{ $parent->full_name }}</div>
    </div>

    <div class="flex flex-wrap justify-center gap-12 relative">
        @foreach ($parent->children as $child)
            <div class="flex flex-col items-center group relative mb-8">
                <a href="{{ route('genealogy.show', ['parent_id' => $child->id]) }}">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-400 to-blue-400 text-white rounded-full flex items-center justify-center text-lg font-semibold relative shadow-lg hover:scale-105 transition-transform duration-300 child-circle">
                        <i class="fas fa-user"></i> 
                        <div class="absolute left-1/2 transform -translate-x-1/2 mt-20 hidden child-tooltip bg-white shadow-xl p-4 rounded-lg text-xs text-gray-800 w-48">
                            <p><strong>{{ $child->full_name }}</strong></p> 
                            <p>Username: {{ $child->username }}</p>
                            <p>Status: {{ $child->status }}</p>
                            <p>Product: {{ $child->product_name }}</p>
                            <p>Category: {{ $child->category_name }}</p>
                        </div>
                    </div>
                </a>
                <div class="mt-2 text-center text-sm text-white">{{ $child->full_name }}</div>

                @if($child->children->isNotEmpty())
                    <div class="flex flex-wrap justify-center gap-8 mt-6">
                        @foreach ($child->children as $grandchild)
                            <div class="flex flex-col items-center group relative">
                                <a href="{{ route('genealogy.show', ['parent_id' => $grandchild->id]) }}">
                                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-300 to-blue-300 text-white rounded-full flex items-center justify-center text-md font-semibold relative shadow-lg hover:scale-105 transition-transform duration-300 grandchild-circle">
                                        <i class="fas fa-user"></i>
                                        
                                        <div class="absolute left-1/2 transform -translate-x-1/2 mt-20 hidden grandchild-tooltip bg-white shadow-xl p-4 rounded-lg text-xs text-gray-800 w-48">
                                            <p><strong>{{ $grandchild->full_name }}</strong></p> <!-- Full Name -->
                                            <p>Username: {{ $grandchild->username }}</p>
                                            <p>Status: {{ $grandchild->status }}</p>
                                            <p>Product: {{ $grandchild->product_name }}</p>
                                            <p>Category: {{ $grandchild->category_name }}</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="mt-2 text-center text-xs text-white">{{ $grandchild->full_name }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <p class="font-bold text-xl text-slate-400 mt-18 text-center">To see the children of an user just click on it's icon</p>
</div>

<style>
    .parent-circle:hover .parent-tooltip,
    .child-circle:hover .child-tooltip,
    .grandchild-circle:hover .grandchild-tooltip {
        display: block;
    }
</style>

@endsection
