<!DOCTYPE html>
<html lang="en">
<x-headerlogin />

<body>



    <div class="login">
        <form action="" id="loginForm">

            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                <input type="text" class="form-control" aria-label="Sizing example input" name="username"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                <input type="password" class="form-control" aria-label="Sizing example input" name="password"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            <button class=" tbn" style="width:100%">Submit</button>

        </form>




    </div>





    <x-footer />
</body>

</html>