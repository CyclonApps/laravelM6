@extends('layouts.app')

@section("content")

<div class="container mt-5">

        <table class="table table-bordered mb-5 mt-5">
            <thead>
                <tr class="table-success">
                    <th>{{ __("Id") }}</th>
                    <th>{{ __("Nom") }}</th>
                    <th>{{ __("Alçada") }}</th>
                    <th>{{ __("Alçada") }}</th>
                    <th>{{ __("Color Cabell") }}</th>
                    <th>{{ __("Color Pell") }}</th>
                    <th>{{ __("Color Ulls") }}</th>
                    <th>{{ __("Any Naixement") }}</th>
                    <th>{{ __("Genere") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($people as $character)
                <tr>
                    <th scope="row">{{ $character->id }}</th>
                    <td>{{ $character->nom }}</td>
                    <td>{{ $character->alcada }}</td>
                    <td>{{ $character->pes }}</td>
                    <td>{{ $character->colorCabell }}</td>
                    <td>{{ $character->colorPell }}</td>
                    <td>{{ $character->colorUlls }}</td>
                    <td>{{ $character->anyNaixement }}</td>
                    <td>{{ $character->genere }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
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
