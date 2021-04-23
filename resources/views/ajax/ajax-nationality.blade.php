<option value="">-- Select Natinality</option>
@foreach($datas as $data)
    @if($userNationality == $data->en_short_name)
        <option value="{{ $data->en_short_name }}" selected>{{ $data->en_short_name }}</option>
    @else 
        <option value="{{ $data->en_short_name }}">{{ $data->en_short_name }}</option>
    @endif
@endforeach