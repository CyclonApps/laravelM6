@extends('layouts.app')

@section("content")

<div class="container mt-5">
    <div class="text-center">
        <a href="http://localhost:8000/" class="btn btn-primary">
            {{ __("Tornar") }}
        </a>
    </div>
    <table class="table table-bordered mb-5 mt-5">
        <thead>
            <tr class="table-success">
                <th>{{ __("Nom") }}</th>
                <th>{{ __("Alçada") }}</th>
                <th>{{ __("Alçada") }}</th>
                <th>{{ __("Color Cabell") }}</th>
                <th>{{ __("Color Pell") }}</th>
                <th>{{ __("Color Ulls") }}</th>
                <th>{{ __("Any Naixement") }}</th>
                <th>{{ __("Genere") }}</th>
                <th>{{ __("Planeta") }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($people as $character)
            <tr>
                <td scope="row">{{ $character['name'] }}</td>
                <td>{{ $character['height'] }}</td>
                <td>{{ $character['mass'] }}</td>
                <td>{{ $character['hair_color'] }}</td>
                <td>{{ $character['skin_color'] }}</td>
                <td>{{ $character['eye_color'] }}</td>
                <td>{{ $character['birth_year'] }}</td>
                <td>{{ $character['gender'] }}</td>
                <td>{{ $character['homeworld'] }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9">
                    <div class="text-center" role="alert">
                        <p><strong class="font-bold">{{ __("No hi ha alumnes") }}</strong></p>
                        <span>{{ __("No hi ha cap dada a mostrar") }}</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $people->links() !!}
    </div>
</div>

@endsection
