@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <x-other.title target="addModal">
                <x-slot name="title">الالقاب </x-slot>
            </x-other.title>
            <x-alert.success />
            <x-alert.error />
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="table_attentions">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th>اللقب </th>
                            <th>اللغة</th>

                            <th><input type="checkbox" /></th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($surnames as $item)
                            <tr class="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>

                                <td>{{ getStatusLang($item->lang) }}</td>
                                <td> <input type="checkbox"></td>
                                <td>
                                    <x-buttons.edit target="modal_edit_surname" :id="$item->id" :url="route('surnames.edit', $item->id)"
                                        modal="editSurname" />
                                    <x-buttons.delete target="deleteModal" :url="route('surnames.destroy', $item->id)" />
                                </td>
                            </tr>
                        @empty
                        @endforelse


                    </tbody>
                </table>
                <x-paginate :items='$surnames' />
            </div>
        </div>
    </div>


    <!-- Modal -->
    @include('modals.new_surname')
    @include('modals.edit_surname')
    @include('modals.delete_invo')
@endsection
