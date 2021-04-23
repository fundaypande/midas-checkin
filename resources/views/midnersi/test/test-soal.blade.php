@extends('layouts.admin.master-admin')

@section('title', 'Group Test - Pilih Soal')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Pilih Soal</h2>
        <p class="section-lead">
            Pilih soal dari Bank Soal untuk Group Test {{ $data->test_name }}
        </p>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <p>{{ $error }}</p>
            </div>
        </div>
        @endforeach
    @endif
@endsection

@section('head')
    <link rel="stylesheet" href="{{ url('/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="counter_class">Pilih Soal</h4>
                    {{-- <div class="text-right"><a onclick="openModalAdd()" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Tambah Group Test</a></div> --}}
                  </div>
                  <div class="card-body">

                    <div class="table-responsive">
                        <form action="{{ route('test.store.soal') }}" method="post">
                            <input type="hidden" id="total_id" name="total" value="0">
                            @csrf
                            <table class="table table-striped" id="users-table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="question_select_all" name="" value=""></th>
                                        <th>ID Soal</th>
                                        <th>Pertanyaan</th>
                                    </tr>
                                </thead>
                                <input type="hidden" name="test_id" value="{{ $data->id }}">
                                <tbody>

                                    @foreach ($soal as $item)
                                    @php
                                        $testSoalCheck = $testSoal->where('question_id', $item->id)->first();
                                        $checked = '';
                                        if($testSoalCheck){
                                            $checked = 'checked';
                                        }
                                    @endphp
                                    <tr>
                                        <td><input {{$checked}} type="checkbox" class="check_class" id="question_id_{{ $item->id }}" name="question_id[]" value="{{ $item->id }}"></td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->question }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="modal-footer bg-whitesmoke br">
                            <h4 class="counter_class">Pilih Soal</h4>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>

                  </div>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>

        $(document).ready(function () {
            counter = $('input[name="question_id[]"]:checked').length;;
            $('input[name="question_id[]"]').on('click', function () {
                counter = $('input[name="question_id[]"]:checked').length;
                setCounter(counter);
            });

            $('#question_select_all').on('click', function () {
                counter = $('input[name="question_id[]"]:checked').length;
                setCounter(counter);
            });

            setCounter(counter);
        });

        function setCounter(counter) {
            $('.counter_class').text('Pilih Soal - ' + counter + ' Soal Dipilih')
            $('#total_id').val(counter)
        }

        $(function() {
            $('#users-table').DataTable({
                paging: false
            });
        });

        $("#question_select_all").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });








    </script>

@endsection
