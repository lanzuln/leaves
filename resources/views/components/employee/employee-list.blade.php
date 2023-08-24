<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#leave-create"
                            class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-dark " />
                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Application Date</th>
                            <th>Reason</th>
                            <th>leave start</th>
                            <th>leave end</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">
                        {{-- Table Data --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    getList();


    async function getList() {

        showLoader();
        let res = await axios.get("/list-leaves");
        hideLoader();


        let tableData = $('#tableData');
        let tableList = $('#tableList');

        tableData.DataTable().destroy();
        tableList.empty();


        res.data.forEach(function(item, index) {
            let createdAt = new Date(item.created_at);

            let hours = createdAt.getHours();
            let minutes = createdAt.getMinutes();
            let ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;

            let formattedCreatedAt =
                `${createdAt.getDate()}-${createdAt.getMonth() + 1}-${createdAt.getFullYear()}  &nbsp ${hours}:${minutes.toLocaleString('en-US', { minimumIntegerDigits: 2 })} ${ampm}`;

            let row = `<tr>
        <td>${index + 1}</td>
        <td>${formattedCreatedAt}</td>
        <td>${item.reason}</td>
        <td>${item.start_date}</td>
        <td>${item.end_date}</td>
        <td>${item.status}</td>
    </tr>`;
            tableList.append(row);
        });

        tableData.DataTable({
            order: [
                [0, 'DESC']
            ],
            lengthMenu: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←'
                }
            }
        });
    }
</script>
