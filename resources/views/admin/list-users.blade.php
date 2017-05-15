@extends('admin.dashboard')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Matric Number</th>
                    <th>Email</th>
                    <th>User Role</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->matricNo }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->userRole }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>

                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection