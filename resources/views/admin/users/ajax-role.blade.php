
<option value="">-- Select Role</option>
@foreach ($allRole as $item)
    <option value="{{ $item->id }}" {{ $item->id == $role ? 'selected' : '' }}>{{ $item->role_name }}</option>
@endforeach
