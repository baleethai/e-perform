@extends('layouts.app')

@section('content')
    <div class="container p-4 mx-auto">
        <h1 class="mb-4 text-3xl font-bold">Contact Us</h1>
        <form action="{{ '/' }}" method="POST" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Name:</label>
                <input type="text" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" name="name" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-bold text-gray-700">Email:</label>
                <input type="email" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block mb-2 text-sm font-bold text-gray-700">Message:</label>
                <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>
@endsection
