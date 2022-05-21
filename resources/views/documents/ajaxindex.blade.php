<?php $Data = DB::table('documents')->latest();
?>
@foreach($Data as $Single)
                <tr>
                  <td>{{ $Single->DocID }}</td>
                  <td>{{ $Single->DocName }}</td>
                  <td>{{ $Single->Docdetails }}</td>
                  <td><a href="{{ url('ReadeTask') }}/{{ $Single->TID }}">{{Str::limit($Single->Docdetails, 50)}}</a></td>
                  <td><a href="{{ url('ReadeTask') }}/{{ $Single->TID }}">{{$Single->Docs}}</a></td>
                  <td>{{ $Single->created_at }}</td>
                </tr>
                @endforeach
