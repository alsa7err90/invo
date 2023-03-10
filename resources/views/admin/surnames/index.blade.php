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
                                    <th>اللقب </th>
                                    <th>اللغة</th>

                                    <th><input type="checkbox" /></th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($surnames as $name)
                                    <tr>
                                        <td>{{ $name->id }}</td>
                                        <td>{{ $name->title }}</td>

                                        <td>{{ getStatusLang($name->lang) }}</td>
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
                        data-action="{{ route('surnames.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <p> اللقب</p>
                                <input class="form-control" name="title" type="text"
                                    aria-label="default input example">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>اللغة</p>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" value="1" class="btn-check" name="lang" id="lang"
                                        autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="lang">عربي</label>

                                    <input type="radio" value="0" class="btn-check" name="lang" id="lang2"
                                        autocomplete="off">
                                    <label class="btn btn-outline-success" for="lang2">انكليزي</label>
                                </div>
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
