@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-7">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        اضافة
                                    </button>
                                </div>
                            </div>
                        </div>

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
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <div style="width:15px;height:15px;background-color:{{ $item->color }}"></div>
                                        </td>
                                        <td>{{ $item->name }}</td>


                                        <td> <input type="checkbox"></td>
                                        <td>
                                            <a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i
                                                    class="material-icons">&#xe3c9;</i></a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE5C9;</i></a>

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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form_ajax_post" class="fabrikForm"
                        data-action="{{ route('groups.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <p> اللون</p>

                                <input type="text" name="color" class="coloris instance1" data-coloris
                                    value="rgb(255, 0, 0)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p> الاسم</p>
                                <input class="form-control" name="name" type="text"
                                    aria-label="default input example">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary button _">
                            ارسال</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
