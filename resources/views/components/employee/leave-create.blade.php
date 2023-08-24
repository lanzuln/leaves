<div class="modal" id="leave-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
            </div>
            <div class="modal-body">
                <form id="create-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <div class="col-12 p-1">
                                    <label class="form-label">Reason</label>
                                    <input type="text" class="form-control" id="reason">
                                </div>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Message</label>
                                <textarea class="form-control"  name="" cols="30" rows="10" id="message"></textarea>
                            </div>
                            <div class="col-6 p-1">
                                <label class="form-label">Start date</label>
                                <input type="date" class="form-control" id="start_date">
                            </div>
                            <div class="col-6 p-1">
                                <label class="form-label">End date</label>
                                <input type="date" class="form-control" id="end_date">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="create()" id="save-btn" class="btn btn-sm  btn-success">Create</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function create() {

        let reason = document.getElementById('reason').value;
        let subject = document.getElementById('subject').value;
        let message = document.getElementById('message').value;
        let start_date = document.getElementById('start_date').value;
        let end_date = document.getElementById('end_date').value;

        if (reason.length === 0) {
            errorToast("reason Required !")
        } else if (subject.length === 0) {
            errorToast("subject Required !")
        } else if (message.length === 0) {
            errorToast("message Required !")
        } else if (start_date.length === 0) {
            errorToast("Start date Required !")
        }
        else if (end_date.length === 0) {
            errorToast("End date Required !")
        } else {

            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/create-leaves", {
                reason: reason,
                subject: subject,
                message: message,
                start_date: start_date,
                end_date: end_date,
            })
            hideLoader();

            if (res.status === 201){

                successToast('Request completed');

                document.getElementById("create-form").reset();

                await getList();
            } else {
                errorToast("Request fail !")
            }
        }
    }
</script>
