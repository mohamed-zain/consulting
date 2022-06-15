
    <option>---إختر اسم المستند----</option>
    @foreach($Data as $dct)
        <option value="{{ $dct->id }}">{{ $dct->DocTypeName }}</option>
    @endforeach

