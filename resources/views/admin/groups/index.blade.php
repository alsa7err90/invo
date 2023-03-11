@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper"> 
                        <x-other.title target="addModal">
                            <x-slot name="title">الفئات </x-slot>
                        </x-other.title>
                        <x-alert.success />
                        <x-alert.error />
                        <table class="table table-striped table-hover" id="table_attentions">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>اللون</th>
                                    <th>الفئة </th>

                                    <th><input type="checkbox" /></th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($groups as $item)
                                    <tr class="{{ $item->id }}">
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <div style="width:15px;height:15px;background-color:{{ $item->color }}"></div>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td> <input type="checkbox"></td>
                                        <td>
                                            <x-buttons.edit target="modal_edit_group" :id="$item->id" :url="route('groups.edit', $item->id)"  modal="editGroup" />
                                            <x-buttons.delete target="deleteModal" :url="route('groups.destroy', $item->id)" />


                                        </td>
                                    </tr>
                                @empty
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->


    @include('modals.new_group')
    @include('modals.edit_group')
    @include('modals.delete_group')
@endsection
