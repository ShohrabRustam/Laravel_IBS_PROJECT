@extends('SuperAdmin.master')
@section('title')
Users List
@endsection

@section('section')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id </th>
                <th>Name </th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['mobile'] }}</td>
                <td style="margin-left:5px">
                    <a href="/updateUser/{{ $user['id'] }}"><i class="fas fa fa-edit fa-x"
                            style="margin-left: 25px"></i></a>

                    <a href="/deleteUser/{{ $user['id']}}"><i class="fa fa-trash" style="margin-left: 25px"></i></a>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>
</div>
<script>
    $(document).ready(function() {
$('#example').DataTable();
} );
</script>

@endsection
