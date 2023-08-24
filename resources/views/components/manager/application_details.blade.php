<div class="modal" id="view_app_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="app_details">
                   <div class="row">
                    <div class="col-6">
                        <h4 class="e_name" id="name"><span class="narrow">Name :</span> </h4>
                        <h5 class="e_email" id="email"><span class="narrow">Email :</span> </h5>
                        <p class="department" id="department"> </p>

                    </div>
                    <div class="col-6 text-end">
                        <p class="e_date" id="created_date"><span class="narrow">Date:</span>22-08-2023</p>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-12">
                        <h4 class="e_subject" id="subject"></h4>
                        <p class="e_message" id="message"></p>

                        <div class="div botton_date" style="margin-top:30px; margin-bottom:30px">
                            <span class="e_date" id="start_date" style="margin-right:20px"><span class="narrow">Start Date :</span>22-08-2023</span>
                        <span class="e_date" id="end_date"><span class="narrow">End Date :</span>22-08-2023</span>
                        </div>
                    </div>
                   </div>
                   <input type="text" class="d-none" name="" id="leave_id">
                   <div class="modal-footer app_details">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                        <button id="modal-reject" class="btn btn-sm btn-danger">Reject</button>
                    <button onclick="approve()" id="save-btn" class="btn btn-sm  btn-success">Approve</button>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    async function FillUpUpdateForm(id) {
        document.getElementById('leave_id').value= id;

        showLoader();
        let res= await axios.post('/manager_employe_list_id',{
            leave_id:id
        });
        hideLoader();

        document.getElementById('name').innerText = res.data.employee.name;
        document.getElementById('email').innerHTML = res.data.employee.email;
        document.getElementById('department').innerHTML = res.data.employee.department;
        document.getElementById('created_date').innerHTML = res.data.created_at;
        document.getElementById('subject').innerHTML = res.data['subject'];
        document.getElementById('message').innerHTML = res.data['message'];
        document.getElementById('start_date').innerHTML = res.data['start_date'];
        document.getElementById('end_date').innerHTML = res.data['end_date'];


    }

</script>
