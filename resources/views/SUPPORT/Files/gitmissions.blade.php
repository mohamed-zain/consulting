
    @foreach($Data as $item)
        <option value="{{ $item->ServiceCode }}">{{ $item->ServiceCode }} - {{ $item->ServiceID }}</option>
    @endforeach
