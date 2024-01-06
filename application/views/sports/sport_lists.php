<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Sports Lists</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Sports Lists</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="<?=base_url()?>Sports/add_sports"><button type="button" class="btn btn-success waves-effect waves-light">Add Sports</button></a>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Photo</th>
                                <th>Sports Name</th>
                                <th>View Details</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td><button type="button" class="btn btn-success waves-effect waves-light">View</button></td>
                                    <td><button type="button" class="btn btn-primary waves-effect waves-light">Active</button></td>
                                    <td>
                                        <button type="button" class="btn btn-success waves-effect waves-light">Edit</button>
                                        <button type="button" class="btn btn-info waves-effect waves-light">Active</button>
                                        <button type="button" class="btn btn-warning waves-effect waves-light">Inactive</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td><button type="button" class="btn btn-success waves-effect waves-light">View</button></td>
                                    <td><button type="button" class="btn btn-primary waves-effect waves-light">Active</button></td>
                                    <td>
                                        <button type="button" class="btn btn-success waves-effect waves-light">Edit</button>
                                        <button type="button" class="btn btn-info waves-effect waves-light">Active</button>
                                        <button type="button" class="btn btn-warning waves-effect waves-light">Inactive</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td><button type="button" class="btn btn-success waves-effect waves-light">View</button></td>
                                    <td><button type="button" class="btn btn-primary waves-effect waves-light">Active</button></td>
                                    <td>                                            
                                        <button type="button" class="btn btn-success waves-effect waves-light">Edit</button>
                                        <button type="button" class="btn btn-info waves-effect waves-light">Active</button>
                                        <button type="button" class="btn btn-warning waves-effect waves-light">Inactive</button>
                                    </td>
                                </tr>                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>            

    </div>
</div>