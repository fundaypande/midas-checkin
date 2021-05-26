<form action="{{ route('room.update', ['id' => $data->id]) }}" method="post">
    @csrf
    <div class="custom-switches-stacked mt-2">
        <label class="custom-switch">
          <input type="radio" name="tipe_reservation" value="Reservation" class="custom-switch-input" checked="">
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">Reservation</span>
        </label>
        <label class="custom-switch">
          <input type="radio" name="tipe_reservation" value="Amendemant" class="custom-switch-input">
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">Amendemant</span>
        </label>
        <label class="custom-switch">
          <input type="radio" name="tipe_reservation" value="Cancellation" class="custom-switch-input">
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">Cancellation</span>
        </label>
        <label class="custom-switch">
            <input type="radio" name="tipe_reservation" value="Waiting" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description">Waiting</span>
          </label>
      </div>



    <div class="form-group col-md-12">
        <label>Mr./Mrs./Ms First Name *</label>
        <input type="text" name="nama_depan" class="form-control" id="" required>
    </div>

    <div class="form-group col-md-12">
        <label>Last Name *</label>
        <input type="text" name="nama_belakang" class="form-control" id="" required>
    </div>

    <div class="form-group col-md-12">
        <label>Company Name *</label>
        <input type="text" name="company_name" class="form-control" id="" required>
    </div>

    <div class="form-group col-md-12">
        <label>Email Address *</label>
        <input type="text" name="email" class="form-control" id="" required>
    </div>

    <div class="form-group col-md-12">
        <label>Phone Number *</label>
        <input type="text" name="phone_number" class="form-control" id="" required>
    </div>

    <div class="form-group col-md-12">
        <label>Telephone Number</label>
        <input type="text" name="telephone_num" class="form-control" id="">
    </div>


    <div class="col-md-2">
        <div class="form-group">
            <label>Check in</label>
        <input id="from_id" name="tanggal_chekcin" type="text" data-provide="datepicker" value="{{ date('Y-m-d',strtotime("-1 month")) }}" class="form-control datepicker">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Check out</label>
            <input id="end_id" name="tanggal_checkout" type="text" data-provide="datepicker" value="{{ date('Y-m-d', strtotime("+1 days")) }}" class="form-control datepicker">
          </div>
    </div>



    <div class="form-group col-md-12">
        <label>Room Description</label>
        <textarea name="room_desc" class="form-control" style="height: 50px" id="" cols="30" rows="10">{{ $data->room_desc }}</textarea>
    </div>

    <div class="form-group col-md-12">
        <label>Room Rate (Rp) *</label>
        <input type="number" name="room_rate" class="form-control" id="" required value="{{ $data->room_rate }}">
    </div>

    <input type="hidden" name="user_id" class="form-control" id="" value="{{ auth()->user()->id }}">


<div class="modal-footer bg-whitesmoke br">
<button class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
