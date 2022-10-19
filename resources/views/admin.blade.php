<!DOCTYPE html>
<html lang="en">
<x-header />

<body>



    <div class="container-fluid">

        <div class="row admincontainer">
            <div class="col-md-2 sidebar">
                <div class="m-1 sidebarcontainer">
                    <i class="fa-sharp fa-solid fa-user"></i>
                    <p>{{session()->get('fullname')}}</p>
                    <hr>
                    <ul>
                        <li id="dashbtn"><i class="fa fa-square"></i>Dashboard</li>
                        <li id="addadmin"><i class="fa fa-plus-square"></i>Add Admin</li>
                        <li id="logoutbtn"><i class="fa fa-sign-out-alt"></i>Logout</li>
                    </ul>

                </div>


            </div>
            <div class="col-md-10" id="adminlist">
                <div class="card my-3">
                    <div class="card-header">
                        <p class="title">ADMIN LIST</p>
                    </div>
                </div>
                <div class="m-1">
                    <table id="admin" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Full name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $a)
                            <tr>
                                <td>{{$a->username}}</td>
                                <td>{{substr($a->password,0,10)}}</td>
                                <td>{{$a->full_name}}</td>
                                <td>{{$a->contact_number}}</td>
                                <td>{{$a->email}}</td>
                                <td>

                                    <button class="tbns up" name="{{$a->id}}">Update</button>
                                    <button class="tbns del" name="{{$a->id}}">Delete</button>

                                </td>
                            </tr>
                            @endforeach

                    </table>
                </div>


            </div>
            <div class="col-md-10" id="createadmin">
                <div class="card my-3">
                    <div class="card-header">
                        <p class="title" id="title">CREATE ADMIN</p>
                    </div>
                    <div class="card-body">
                        <form action="" id="createForm">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    name="username" aria-describedby="inputGroup-sizing-sm">
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Full Name</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    name="full_name" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Contact Number</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    name="contact_number" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" name="email"
                                    aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                                <input type="password" class="form-control" aria-label="Sizing example input"
                                    name="password" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Confirm Password</span>
                                <input type="password" class="form-control" aria-label="Sizing example input"
                                    name="confirm" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">

                                <input type="hidden" class="form-control" aria-label="Sizing example input" name="id"
                                    aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <button class="tbns" type="submit"><span id="formbtn">Create</span></button>
                        </form>
                    </div>
                </div>



            </div>
        </div>


    </div>





    <x-footer />
</body>

</html>