<form action="{{ route('bank.update', ['id' => $data->id]) }}" method="post">
    @csrf
    <div class="form-group col-md-12">
        <label>Pertanyaan</label>
    <textarea required name="question" class="form-control" style="height: 50px" id="" cols="30" rows="10">{{ $data->question }}</textarea>
        </div>

        <div class="form-group col-md-12">
            <label>Jawaban</label>
            <select required name="correct_answare" class="form-control" id="">
                <option {{ $data->correct_answare == 'A' ? 'selected' : '' }} value="A">A</option>
                <option {{ $data->correct_answare == 'B' ? 'selected' : '' }} value="B">B</option>
                <option {{ $data->correct_answare == 'C' ? 'selected' : '' }} value="C">C</option>
                <option {{ $data->correct_answare == 'D' ? 'selected' : '' }} value="D">D</option>
                <option {{ $data->correct_answare == 'E' ? 'selected' : '' }} value="E">E</option>
            </select>
        </div>

        <div>
            <div class="form-group col-md-12">
                <label>Optional</label>
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" value="A" disabled>
                    </div>
                    <div class="col-md-10">
                        <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10">
                            @php
                                $point = $opsi->where('point', 'A')->first();
                                echo $point->point_description
                            @endphp
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" value="B" disabled>
                    </div>
                    <div class="col-md-10">
                        <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10">
                        @php
                            $point = $opsi->where('point', 'B')->first();
                            echo $point->point_description
                        @endphp
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <input required type="text" class="form-control" value="C" disabled>
                    </div>
                    <div class="col-md-10">
                        <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10">
                            @php
                                $point = $opsi->where('point', 'C')->first();
                                echo $point->point_description
                            @endphp
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <input required type="text" class="form-control" value="D" disabled>
                    </div>
                    <div class="col-md-10">
                        <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10">
                            @php
                                $point = $opsi->where('point', 'D')->first();
                                echo $point->point_description
                            @endphp
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" value="E" disabled>
                    </div>
                    <div class="col-md-10">
                        <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10">
                        @php
                            $point = $opsi->where('point', 'E')->first();
                            echo $point->point_description
                        @endphp
                        </textarea>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group col-md-12">
            <label>Pembahasan</label>
        <textarea name="completion" class="form-control" style="height: 50px" id="" cols="30" rows="10">{{ $data->completion }}</textarea>
        </div>


<div class="modal-footer bg-whitesmoke br">
<button class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
