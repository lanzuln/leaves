<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    <h4>SIGN IN</h4>
                    <br />
                    <input id="email" placeholder="User Email" class="form-control" type="email" />
                    <br />
                    <input id="password" placeholder="User Password" class="form-control" type="password" />
                    <br />
                    <button onclick="SubmitLogin()" class="btn w-100 btn-primary">Next</button>
                    <hr />
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="{{route('manager-registration')}}">Signup Manager</a>
                            <span class="ms-1">|</span>
                            <a class="text-center ms-3 h6" href="{{route('employee-registration')}}">Signup Employee</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
async function SubmitLogin() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    if (email.length === 0) {
        errorToast('Email Required !')
    } else if (password.length === 0) {
        errorToast('Password Required !')
    } else {
        showLoader();
        let res = await axios.post("/login", {
            email: email,
            password: password,
        })
        hideLoader();
        if (res.data['status'] === 'success' && res.data['role']==="manager"){
            successToast("Manager Login Successful");
            setTimeout(() => {
                window.location.href = "/manager-dashboard";
            }, 1000);

        }
        else if (res.data['status'] === 'success' && res.data['role']==="Employee") {
            successToast("Employee Login Successful");
            setTimeout(() => {
                window.location.href = "/employee-dashboard";
            }, 1000);

        } else {
            errorToast(res.data['message']);
        }
    }

}

</script>
