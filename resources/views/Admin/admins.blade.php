@extends('SuperAdmin.master')
@section('title')
Admins List
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
    <a href="{{ URL::to('/adminSignup') }}" class="float-left"><i class="fas fa fa-plus fa-x" style="margin-bottom: 50px"></i>Add Admin</a>

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
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin['id'] }}</td>
                <td>{{ $admin['name'] }}</td>
                <td>{{ $admin['email'] }}</td>
                <td>{{ $admin['mobile'] }}</td>
                <td style="margin-left:5px">
                    <a href="/updateAdmin/{{ $admin['id'] }}"><i class="fas fa fa-edit fa-x" style="margin-left: 25px"></i></a>

                    <a href="/deleteAdmin/{{ $admin['id']}}"><i class="fa fa-trash" style="margin-left: 25px"></i></a>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>

@endsection
