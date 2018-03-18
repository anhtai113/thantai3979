@extends('home')
@section('contentpage')

<!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i>Danh sách các thành viên</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>Mark</th>
              <th>Balance</th>
              
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>Mark</th>
              <th>Balance date</th>
              
            </tr>
          </tfoot>
          <tbody>
        @if(isset($data))
		@foreach($data as $item)

			<tr>
              <td>{{$item->id}}</td>
              <td>{{$item->username}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->mark}}</td>
              <td>{{$item->balance}}</td>
            </tr>
		
		@endforeach
		@endif
            
            
          </tbody>
        </table>
      </div>
  	</div>
</div>
@endsection