<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Cards Lists</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Cards Lists</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div>
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Cards/add_cards"><button type="button" class="btn btn-success waves-effect waves-light">Add Cards</button></a>
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
                                <th>Sl No.</th>
                                <th>Sub Category Name</th>
                                <th>Card Name</th>
                                <th>Card Banner Image</th>
                                <th>Type Of Card</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>
                                  <button type="button" class="btn btn-primary waves-effect waves-light">Active</button>
                                  <button type="button" class="btn btn-warning waves-effect waves-light">Inactive</button>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-success waves-effect waves-light">View</button>
                                  <button type="button" class="btn btn-success waves-effect waves-light">Edit</button>
                                </td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>
                                  <button type="button" class="btn btn-primary waves-effect waves-light">Active</button>
                                  <button type="button" class="btn btn-warning waves-effect waves-light">Inactive</button>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-success waves-effect waves-light">View</button>
                                  <button type="button" class="btn btn-success waves-effect waves-light">Edit</button>
                                </td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>
                                  <button type="button" class="btn btn-primary waves-effect waves-light">Active</button>
                                  <button type="button" class="btn btn-warning waves-effect waves-light">Inactive</button>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-success waves-effect waves-light">View</button>
                                  <button type="button" class="btn btn-success waves-effect waves-light">Edit</button>
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