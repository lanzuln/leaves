<div class="summary_section">
    <div class="container">
        <div class="row">
            {{-- total  --}}
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                <div class="card card-plain h-100 bg-white total_border">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                <div>
                                    <h3 class="mb-0 text-capitalize font-weight-bold" id="total_app"></h3>
                                    <p class="mb-0 text-sm" >Total Application</p>
                                </div>
                            </div>
                            <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                <div class="card_icon total">
                                    <i class="fas fa-scroll"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- pending  --}}
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                <div class="card card-plain h-100 bg-white approve_border">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                <div>
                                    <h3 class="mb-0 text-capitalize font-weight-bold" id="pending_app"></h3>
                                    <p class="mb-0 text-sm">Pending Application</p>
                                </div>
                            </div>
                            <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                <div class="card_icon approve">
                                    <i class="fas fa-frown"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- accepted --}}
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                <div class="card card-plain h-100 bg-white approve_border">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                <div>
                                    <h3 class="mb-0 text-capitalize font-weight-bold">02</h3>
                                    <p class="mb-0 text-sm">Approved Application</p>
                                </div>
                            </div>
                            <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                <div class="card_icon rejected">
                                    <i class="far fa-thumbs-up"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- rejected --}}
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                <div class="card card-plain h-100 bg-white rejected_border">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                <div>
                                    <h3 class="mb-0 text-capitalize font-weight-bold">02</h3>
                                    <p class="mb-0 text-sm">Rejected Leaves</p>
                                </div>
                            </div>
                            <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                <div class="card_icon rejected">
                                    <i class="far fa-thumbs-down"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    totalApp();
    async function totalApp() {
            showLoader();
            let res = await axios.get("/total-appication");
            hideLoader();
            document.getElementById('total_app').innerHTML=res.data;
    }


    pendingAppication();
    async function pendingAppication() {
            showLoader();
            let res = await axios.get("/pending-appication");
            hideLoader();
            document.getElementById('pending_app').innerHTML=res.data;
    }

</script>
