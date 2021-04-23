<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-user">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tambah Bank Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('bank.store') }}" method="post">
                @csrf
                    <div class="form-group col-md-12">
                    <label>Pertanyaan</label>
                    <textarea required name="question" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Jawaban</label>
                        <select required name="correct_answare" class="form-control" id="">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
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
                                    <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" class="form-control" value="B" disabled>
                                </div>
                                <div class="col-md-10">
                                    <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <input required type="text" class="form-control" value="C" disabled>
                                </div>
                                <div class="col-md-10">
                                    <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <input required type="text" class="form-control" value="D" disabled>
                                </div>
                                <div class="col-md-10">
                                    <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" class="form-control" value="E" disabled>
                                </div>
                                <div class="col-md-10">
                                    <textarea required name="point[]" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Pembahasan</label>
                        <textarea name="completion" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                    </div>


            <div class="modal-footer bg-whitesmoke br">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </form>
    </div>
    </div>
</div>
</div>
