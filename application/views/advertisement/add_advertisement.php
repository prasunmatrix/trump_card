<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Add Player</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Add Player</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <button type="button" data-toggle="modal" data-target="#player" class="btn btn-success waves-effect waves-light">Upload Excel</button>
                </div>
                <div class="float-right d-none d-md-block mr-2">
                    <a href="<?=base_url()?>Advertisement"><button type="button" class="btn btn-success waves-effect waves-light">Advertisement Lists</button></a>
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
                                <label>Player Name</label>
                                <input type="text" class="form-control" required placeholder="Criteria Name"/>
                            </div>  

                            <div class="form-group">
                                <label>Criteria</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox1">Custom Checkbox</label>
                                </div>       
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox2">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox3">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox4">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox5">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox6">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox7">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox8">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox9">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox10">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox11">Custom Checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox12" value="option1">
                                    <label class="form-check-label mr-1" for="inlineCheckbox12">Custom Checkbox</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Player Image</label>
                                <input type="file" class="filestyle">
                                <p class="note">NOTE : Image size maximum 2MB and dimentions ( 100 X 100 ) PX</p>
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