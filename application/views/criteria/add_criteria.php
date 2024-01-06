<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Criteria & Points</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Criteria & Points</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#points" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div>
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Criteria"><button type="button" class="btn btn-success waves-effect waves-light">Criteria Lists</button></a>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" action="#">
                            <div class="form-group">
                                <label>Sports Name</label>
                                <select required class="form-control">
                                    <option value="">Select Sports</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Player Type</label>
                                <select class="form-control" required>
                                    <option value="">Select Type</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Criteria Name</label>
                                <input type="text" class="form-control" required placeholder="Criteria Name"/>
                            </div>                            
                            <div class="form-group">
                                <label>Points</label>
                                <input type="text" class="form-control" required placeholder="Points"/>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                        Add Details
                                    </button>
                                    <button type="reset" class="btn btn-danger waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>             

    </div>
</div>