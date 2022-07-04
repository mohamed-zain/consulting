@foreach($cities as $city)
    <option value="{{ $city->id }}">{{ $city->CName }}</option>
@endforeach