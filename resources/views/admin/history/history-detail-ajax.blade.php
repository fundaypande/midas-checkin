<form action="" method="post">
    <div class="form-group col-md-12">
        <label>Time</label>
        <input required name="name" type="text" class="form-control" value="{{ $history->created_at }}" disabled>
    </div>

    <div class="form-group col-md-12">
        <label>Type Action</label>
        <input required name="name" type="text" class="form-control" value="{{ $history->action }}" disabled>
    </div>

    <div class="form-group col-md-12">
        <label>Feature ID</label>
        <input required name="name" type="text" class="form-control" value="{{ $history->feature_id }}" disabled>
    </div>

    <div class="form-group col-md-12">
        <label>User ID</label>
        <input required name="name" type="text" class="form-control" value="{{ $history->user_id }}" disabled>
    </div>

    <div class="form-group col-md-12">
        <label>Old User Name</label>
        <input required name="name" type="text" class="form-control" value="{{ $history->old_user_name }}" disabled>
    </div>

    <div class="form-group col-md-12">
        <label>Table Name</label>
        <input required name="name" type="text" class="form-control" value="{{ $history->table_name }}" disabled>
    </div>

    <div class="form-group col-md-12">
        <label>Description</label>
        <input required name="name" type="text" class="form-control" value="{{ $history->description }}" disabled>
    </div>

    <div class="form-group col-md-12">
        <label>Old Data</label>
        <textarea name="" style="height: 150px" class="form-control" id="" cols="30" rows="30" disabled>{{ $history->old_data }}</textarea>
    </div>
</form>
