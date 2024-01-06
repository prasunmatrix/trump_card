<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Sports</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Sports</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="<?=base_url()?>Sports"><button type="button" class="btn btn-success waves-effect waves-light">Sports Lists</button></a>
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
                                <input type="text" class="form-control" required placeholder="Sports Name"/>
                            </div>
                            <div class="form-group">
                                <label>Sports Image</label>
                                <input type="file" class="filestyle">
                                <p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                        Add Sports
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