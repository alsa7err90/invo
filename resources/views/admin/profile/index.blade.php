@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <x-other.title target="addModal">
                            <x-slot name="title">الموظفين</x-slot>
                        </x-other.title>

                        <x-alert.success />
                        <x-alert.error />

                        <table class="table table-striped table-hover" id="table_attentions">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني </th>

                                    <th><input type="checkbox" /></th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($users as $item)
                                    <tr class="{{ $item->id }}">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nickname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td> <input type="checkbox"></td>
                                        <td>

                                            <x-buttons.edit target="modal_edit_user" :id="$item->id" :url="route('users.edit', $item->id)"
                                                modal="editUser" />
                                            <x-buttons.delete target="deleteModal" :url="route('users.destroy', $item->id)" />
                                            <x-buttons.permission target="addModalPermission" :id="$item->id" :url="route('users.permissions', $item->id)"  modal="editPermission"  />


                                        </td>
                                    </tr>
                                @empty
                                @endforelse


                            </tbody>
                        </table>
                        <x-paginate :items='$users' /> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->



    @include('modals.new_user')
    @include('modals.edit_user')
    @include('modals.delete_invo')
    @include('modals.new_permission')
    
@endsection
