<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                    </div>
                </div>
                <hr class="bg-dark " />
                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Application Date</th>
                            <th>Emlpoyee Name</th>
                            <th>Department</th>
                            <th>Reason</th>
                            <th>leave start</th>
                            <th>leave end</th>
                            <th>Status</th>
                            <th>Action</th>

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
        let res = await axios.get("/manager_employe_list");
        hideLoader();


        let tableData = $('#tableData');
        let tableList = $('#tableList');

        tableData.DataTable().destroy();
        tableList.empty();


        res.data.forEach(function (item, index) {
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
        <td>${item.employee.name}</td>
        <td>${item.employee.departmant}</td>
        <td>${item.reason}</td>
        <td>${item.start_date}</td>
        <td>${item.end_date}</td>
        <td>${item.status}</td>
        <td>
            <button data-id="${item['id']}" class="btn view btn-sm btn-outline-success">View</button>
        </td>
        </tr>`;
            tableList.append(row);
        });

        $('.view').on('click', async function() {
        let id = $(this).data('id');
        await FillUpUpdateForm(id);
        $("#view_app_modal").modal('show');
    })

        tableData.DataTable({
            lengthMenu: [ 10, 15, 20, 25, 30, 35, 40, 45, 50],
            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←'
                }
            }
        });
    }
</script>
