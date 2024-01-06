<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?=base_url()?>" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Member Management</span>
                    </a>
                    <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-registered"></i>
                        <span>Registration</span>
                      </a>                      
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="<?=base_url()?>Members/since_seven_days"><i class="fa fa-bars"></i> Since 7 Days</a></li>
                          <li><a href="<?=base_url()?>Members/since_thirty_days"><i class="fa fa-bars"></i> Since 30 Days</a></li>
                          <li><a href="<?=base_url()?>Members/all_members"><i class="fa fa-bars"></i> All Members</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-registered"></i>
                        <span>Statistics</span>
                      </a>                      
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="<?=base_url()?>Members/view_statistics"><i class="fa fa-bars"></i>View Statistics</a></li>
                      </ul>
                    </li>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Master Data</span>
                    </a>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ti-receipt"></i>
                      <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url()?>Category/add_category"><i class="fa fa-bars"></i>Add Category</a></li>
                      <li><a href="<?=base_url()?>Category"><i class="fa fa-bars"></i>View Category</a></li>
                      <!-- <li><a href="<?=base_url()?>Criteria"><i class="fa fa-bars"></i> Criteria & Points</a></li>
                      <li><a href="<?=base_url()?>Players"><i class="fa fa-bars"></i> Players</a></li>
                      <li><a href="<?=base_url()?>Tournaments"><i class="fa fa-bars"></i> Tournaments</a></li> -->
                    </ul>
                  </li>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ti-receipt"></i>
                      <span>Sub Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url()?>Subcategory/add_subcategory"><i class="fa fa-bars"></i>Add Sub Category</a></li>
                      <li><a href="<?=base_url()?>Subcategory"><i class="fa fa-bars"></i>View Sub Category</a></li>
                    </ul>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ti-receipt"></i>
                          <span>Players</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="<?=base_url()?>Players/add_player"><i class="fa fa-bars"></i>Add Players</a></li>
                          <li><a href="<?=base_url()?>Players"><i class="fa fa-bars"></i>View Players</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ti-receipt"></i>
                          <span>Attributes & Points</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="<?=base_url()?>Attribute/add_attribute"><i class="fa fa-bars"></i>Add Attribute</a></li>
                          <li><a href="<?=base_url()?>Attribute"><i class="fa fa-bars"></i>View Attribute</a></li>
                      </ul>
                  </li>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ti-receipt"></i>
                      <span>Game Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url()?>Gametype/add_gametype"><i class="fa fa-bars"></i>Add Game Type</a></li>
                      <li><a href="<?=base_url()?>Gametype"><i class="fa fa-bars"></i>View Game Type</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-receipt"></i>
                        <span>Tournaments</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?=base_url()?>Tournaments/add_tournament"><i class="fa fa-bars"></i>Add Tournament</a></li>
                        <li><a href="<?=base_url()?>Tournaments"><i class="fa fa-bars"></i>View Tournament</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ti-receipt"></i>
                      <span>Special Point</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url()?>Point/add_point"><i class="fa fa-bars"></i>Add Point</a></li>
                      <li><a href="<?=base_url()?>Point"><i class="fa fa-bars"></i>View Point</a></li>
                    </ul>
                  </li>
                  <!-- <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ti-receipt"></i>
                          <span>Redeem History</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="<?=base_url()?>Players"><i class="fa fa-bars"></i>View Redeem</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ti-receipt"></i>
                          <span>Advertisement Management</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="<?=base_url()?>Advertisement/add_advertisement"><i class="fa fa-bars"></i>Add Advertisement</a></li>
                          <li><a href="<?=base_url()?>Advertisement"><i class="fa fa-bars"></i>View Advertisement</a></li>
                      </ul>
                  </li> -->
                </li>  
            </ul>
        </div>
    </div>
</div>

<div class="main-content">