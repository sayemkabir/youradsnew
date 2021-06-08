<center><h1>Your Account Was Created Successfully!!!</h1>
<h3>Please click on the link below to verify Your email!!!</h3>

    <a href="{{route('user.email.validation.message',encrypt($userRegistration->email))}}" class="btn btn-success">Click Here</a>

</center>
