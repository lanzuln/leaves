<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Employee Sign Up</h4>
                    <hr />
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">

                            <div class="col-md-4 p-2">
                                <label>Name</label>
                                <input id="Name" placeholder="Name" class="form-control" type="text" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="User Email" class="form-control" type="email" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Department</label>
                                <input id="department" placeholder="User department" class="form-control"
                                    type="text" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control"
                                    type="password" />
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  btn-primary">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function onRegistration() {
        let Name = document.getElementById('Name').value;
        let department = document.getElementById('department').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (Name.length == 0) {
            errorToast('Name required')
        } else if (email.length == 0) {
            errorToast('Email required')
        } else if (department.length == 0) {
            errorToast('Department required')
        } else if (password.length == 0) {
            errorToast('Password required')
        } else {
            showLoader();
            let res = await axios.post("/employee-registration", {
                name: Name,
                email: email,
                departmant: department,
                password: password
            });
            hideLoader();
            if(res.status==200) {
                successToast('Registration successfully');
                window.location.href = "/login";
            } else {

            }
        }

    }
</script>
