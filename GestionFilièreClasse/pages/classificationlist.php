<form id="myform">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <p class="h2 text-center text-dark text-uppercase font-weight-bold">Classes par filière</p>
                </div>
            </div>
            <div class="content-body">
              <!-- Basic Tables start -->
                <!-- Basic Tables end -->
                <!-- Striped rows start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-sm-6 mb-2">
                                            <label for="IdFilere">Choisissez la filiere :</label>
                                            <input class="form-control" type="text" id="codefil" name="codefil" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" name="submit" value="Chercher" />
                                        </div>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                              <th scope="col">Id</th>
                                              <th scope="col">Code</th>
                                              <th scope="col">CodeFiliere</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-content">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                    </div>
                </div>
</form>
<script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
                <!-- BEGIN VENDOR JS-->
                <!-- BEGIN PAGE VENDOR JS-->
                <!-- END PAGE VENDOR JS-->
                <!-- BEGIN CHAMELEON  JS-->
                <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
                <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>

<script src="script/classificationparlist.js" type="text/javascript"></script>