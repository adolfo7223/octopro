<style>
                    ul {
                        list-style: none; /* Remove bullets */
                        padding: 0; /* Remove default padding */
                        margin: 0; /* Remove default margin */
                    }

                    .card {
                        background-color: #ffffff;
                        color: #0d0d0d;
                        border-style: solid;
                        border-width: 1px 1px;
                        border-radius: 0px 0px 0px 0px;
                    }

                    .card-title {
                      font-size: 12px;
                    }

                    .card .rounded {
                      height: 660px !important;
                    }
                </style>
                
                <main id="main">
                    <section id="about" class="about">


                      <div class="container">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                              <div class="mr-2">
                                From: 
                              </div>
                              <div>
                                <input type="datetime" class="form-control flatpickr w-20" id="sales_from_left" readonly>
                              </div>
                              <div class="flex-grow-1">
                              </div>
                              <div class="mr-2">
                                To: 
                              </div>
                              <div>
                                <input type="datetime" class="form-control flatpickr w-20 ml-auto" id="sales_to_left" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                              <div class="mr-2">
                                From: 
                              </div>
                              <div>
                                <input type="datetime" class="form-control flatpickr w-20" id="sales_from_right" readonly>
                              </div>
                              <div class="flex-grow-1">
                              </div>
                              <div class="mr-2">
                                To: 
                              </div>
                              <div>
                                <input type="datetime" class="form-control flatpickr w-20 ml-auto" id="sales_to_right" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <style>
                        /* Add this to your custom CSS file or within a <style> tag in your HTML */

                        /* Style the sidebar container */
                        .d-flex-custom {
                          background-color: #f8f9fa; /* Background color */
                          padding: 20px;
                          border-radius: 10px; /* Optional: Add border-radius for rounded corners */
                        }

                        /* Style the vertical nav-pills */
                        .nav-pills-custom {
                          width: 150px; /* Set a fixed width for the sidebar */
                        }

                        /* Style the nav-link buttons */
                        .nav-link-custom {
                          color: #495057; /* Text color */
                          background-color: #dee2e6; /* Button background color */
                          margin-bottom: 10px; /* Optional: Add margin between buttons */
                          border-radius: 5px; /* Optional: Add border-radius for rounded buttons */
                        }

                        /* Style active nav-link button */
                        .nav-link-custom.active {
                          background-color: #007bff; /* Active button background color */
                          color: #fff; /* Active button text color */
                        }

                        /* Style the tab-content */
                        .tab-content-custom {
                          margin-left: 20px; /* Optional: Add margin to separate content from the sidebar */
                          width: 1050px;
                        }

                        /* Style individual tab-pane content */
                        .tab-pane-custom {
                          padding: 20px; /* Optional: Add padding to content */
                          border: 1px solid #dee2e6; /* Optional: Add a border around content */
                          border-radius: 5px; /* Optional: Add border-radius for rounded corners */
                        }
                      </style>
                    
                      <div class="container mt-1">
                        <ul class="nav nav-tabs" id="myTabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#sales">Sales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#operation">Operations</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-2">
                          <div class="tab-pane fade show active" id="sales">
                            <div class="d-flex d-flex-custom align-items-start">
                              <div class="nav flex-column nav-pills nav-pills-custom me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link nav-link-custom active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#sales_tab" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Sales</button>
                                <button class="nav-link nav-link-custom" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#sales_8x8_tab" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Sales 8x8</button>
                                <button class="nav-link nav-link-custom" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#lead_source_tab" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Lead Source</button>
                                <button class="nav-link nav-link-custom" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#lead_stage_tab" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Lead Stage</button>
                              </div>
                              <div class="tab-content tab-content-custom" id="v-pills-tabContent">
                                <div class="tab-pane tab-pane-custom fade show active" id="sales_tab" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="card rounded">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Sales
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12" id="sales_chart_left_container">
                                              <canvas id="sales_chart_left" width="400" height="400"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="card rounded">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Sales
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12" id="sales_chart_right_container">
                                              <canvas id="sales_chart_right" width="400" height="400"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane tab-pane-custom fade" id="sales_8x8_tab" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                  <div class="row mt-3 mb-2">
                                    <div class="col-md-6" id="from_section">
                                      <div class="p-2 border bg-cyan rounded">
                                        <div class="row">
                                          <div class="col-md-3">
                                            <div class="card mb-5 rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Min Estimated Value
                                                </div>
                                              </div>
                                              <div class="card-body total_min_est">

                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card mb-5 rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Max Estimated Value
                                                </div>
                                              </div>
                                              <div class="card-body total_max_est">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card mb-5 rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Amount of Sales
                                                </div>
                                              </div>
                                              <div class="card-body total_amount_sales">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card mb-5 rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Commission Amount
                                                </div>
                                              </div>
                                              <div class="card-body total_commission_amount">

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-3">
                                            <div class="card rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total # of Leads
                                                </div>
                                              </div>
                                              <div class="card-body total_number_of_client">

                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Number of Est Sched
                                                </div>
                                              </div>
                                              <div class="card-body est_sched">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Number of On Hold Deals
                                                </div>
                                              </div>
                                              <div class="card-body on_hold">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Number of Closed Deals
                                                </div>
                                              </div>
                                              <div class="card-body closed">
                                                
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-6" id="from_section_1">
                                      <div class="p-2 border bg-cyan rounded">
                                        <div class="row">
                                          <div class="col-md-3">
                                            <div class="card mb-5 rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Min Estimated Value
                                                </div>
                                              </div>
                                              <div class="card-body total_min_est">

                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card mb-5 rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Max Estimated Value
                                                </div>
                                              </div>
                                              <div class="card-body total_max_est">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card mb-5 rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Amount of Sales
                                                </div>
                                              </div>
                                              <div class="card-body total_amount_sales">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card mb-5 rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Commission Amount
                                                </div>
                                              </div>
                                              <div class="card-body total_commission_amount">

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-3">
                                            <div class="card rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total # of Leads
                                                </div>
                                              </div>
                                              <div class="card-body total_number_of_client">

                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Number of Est Sched
                                                </div>
                                              </div>
                                              <div class="card-body est_sched">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Number of On Hold Deals
                                                </div>
                                              </div>
                                              <div class="card-body on_hold">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="card rounded" style="height: 150px">
                                              <div class="card-header">
                                                <div class="card-title text-center">
                                                  Total Number of Closed Deals
                                                </div>
                                              </div>
                                              <div class="card-body closed">
                                                
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane tab-pane-custom fade" id="lead_source_tab" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="card rounded">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Lead Source
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <!-- <div class="col-md-3">
                                              <div class="card">
                                                <div class="card-header">
                                                  <div class="card-title">
                                                    Filter
                                                  </div>
                                                </div>
                                                <div class="card-body">
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="form-group" id="email_form">
                                                              <label for="" class="form-label">Module</label>
                                                              <select name="filter" id="filter" class="select2-show-search form-control" data-placeholder="Filter By">
                                                                <option></option>
                                                                <option value="email_client">Email/Client</option>
                                                                <option value="email_client">Referrals</option>
                                                              </select>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                          <div class="form-group" id="email_form">
                                                              <label for="" class="form-label">Date</label>
                                                              <input type="text" name="date" id="date" class="form-control">
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div> -->
                                            <div class="col-md-12">
                                              <canvas id="lead_source" width="400" height="400"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane tab-pane-custom fade" id="lead_stage_tab" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                  <div class="col-md-12">
                                    <div class="card rounded">
                                      <div class="card-header">
                                        <div class="card-title text-center">
                                          Lead Stage
                                        </div>
                                      </div>
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <canvas id="lead_stage" width="400" height="400"></canvas>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            
                            
                          </div>
                          <div class="tab-pane tab-pane-custom fade" id="operation">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card rounded text-white" style="background-color: #009CAD;">
                                    <div class="d-flex align-self-center">
                                      <div class="flex-grow-1">

                                      </div>
                                      <div>
                                        <label class="h2">Year To Date Revenue:</label>
                                      </div>
                                      <div>
                                        <label id="total_revenue" class="h2"></label>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="d-flex d-flex-custom align-items-start">
                              <div class="nav flex-column nav-pills nav-pills-custom me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link nav-link-custom active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#revenue_per_service_tab" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Revenue Per Service</button>
                                <button class="nav-link nav-link-custom" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#revenue_per_truck_tab" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Revenue Per Truck</button>
                                <button class="nav-link nav-link-custom" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#tech_hour_and_cost_labor_tab" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tech Hour and Cost Labor</button>
                                <button class="nav-link nav-link-custom" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#tech_productivity_tab" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tech Productivity</button>
                                <button class="nav-link nav-link-custom" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#tech_general_concerns_tab" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">TECH GENERAL CONCERNS</button>
                              </div>
                              <div class="tab-content tab-content-custom" id="v-pills-tabContent">
                                <div class="tab-pane tab-pane-custom fade show active" id="revenue_per_service_tab" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="input-group" style="width: 80%">
                                        <input type="datetime" class="form-control flatpickr-range" placeholder="Filter Date Range" id="revenue_per_service_filter" readonly>
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Preset</button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Date Preset</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Maximum</a>
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 days</a>
                                            <a class="dropdown-item" href="#">Last 14 days</a>
                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                            <a class="dropdown-item" href="#">This week</a>
                                            <a class="dropdown-item" href="#">Last week</a>
                                            <a class="dropdown-item" href="#">This month</a>
                                            <a class="dropdown-item" href="#">last month</a>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="input-group float-right" style="width: 80%">
                                        <input type="datetime" class="form-control flatpickr-range" placeholder="Filter Date Range" id="revenue_per_service_filter2" readonly>
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Preset</button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Date Preset</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Maximum</a>
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 days</a>
                                            <a class="dropdown-item" href="#">Last 14 days</a>
                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                            <a class="dropdown-item" href="#">This week</a>
                                            <a class="dropdown-item" href="#">Last week</a>
                                            <a class="dropdown-item" href="#">This month</a>
                                            <a class="dropdown-item" href="#">last month</a>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row mt-3">
                                    <div class="col-md-12">
                                      <div class="card rounded">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Revenue Per Service
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12" id="operation_revenue_chart_left_container">
                                              <canvas id="revenue_per_service_left" width="400" height="600"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="card rounded">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Revenue Per Service
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12" id="operation_revenue_chart_right_container">
                                              <canvas id="revenue_per_service_right" width="400" height="600"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane tab-pane-custom fade" id="revenue_per_truck_tab" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="input-group" style="width: 80%">
                                        <input type="datetime" class="form-control flatpickr-range" placeholder="Filter Date Range" id="revenue_per_truck_filter" readonly>
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Preset</button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Date Preset</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Maximum</a>
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 days</a>
                                            <a class="dropdown-item" href="#">Last 14 days</a>
                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                            <a class="dropdown-item" href="#">This week</a>
                                            <a class="dropdown-item" href="#">Last week</a>
                                            <a class="dropdown-item" href="#">This month</a>
                                            <a class="dropdown-item" href="#">last month</a>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="input-group float-right" style="width: 80%">
                                        <input type="datetime" class="form-control flatpickr-range" placeholder="Filter Date Range" id="revenue_per_truck_filter2" readonly>
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Preset</button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Date Preset</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Maximum</a>
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 days</a>
                                            <a class="dropdown-item" href="#">Last 14 days</a>
                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                            <a class="dropdown-item" href="#">This week</a>
                                            <a class="dropdown-item" href="#">Last week</a>
                                            <a class="dropdown-item" href="#">This month</a>
                                            <a class="dropdown-item" href="#">last month</a>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="card rounded mt-3">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Revenue Per Truck
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12" id="operation_revenue_truck_chart_left_container">
                                              <canvas id="revenue_per_truck_left" width="400" height="600"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="card rounded mt-3">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Revenue Per Truck
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12" id="operation_revenue_truck_chart_right_container">
                                              <canvas id="revenue_per_truck_right" width="400" height="600"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane tab-pane-custom fade" id="tech_hour_and_cost_labor_tab" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="card rounded text-white" style="background-color: #009CAD;">
                                          <div class="d-flex align-self-center">
                                            <div class="flex-grow-1">

                                            </div>
                                            <div>
                                              <label class="h2">Labor Percentage:</label>
                                            </div>
                                            <div>
                                              <label id="total_labor_percentage" class="h2"></label>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card rounded mt-3">
                                    <div class="card-header">
                                      <div class="card-title text-center">
                                        Tech Hour and Cost Labor
                                      </div>
                                    </div>
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="table-responsive">
                                            <table id="example" class="table table-hover text-wrap key-buttons">
                                              <thead>
                                                <tr>
                                                  <th class="w-25">Sum of regular Hours</th>
                                                  <th class="w-25">Sum of 1.5x</th>
                                                  <th class="w-25">Sum of 2x</th>
                                                  <th class="w-25">Sum of Total Hours</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr id="hours">

                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                          <div class="table-responsive">
                                            <table id="example1" class="table table-hover text-wrap key-buttons">
                                              <thead>
                                                <tr>
                                                  <th class="w-25">Sum of Net Pay</th>
                                                  <th class="w-25">Sum of Employee Taxes</th>
                                                  <th class="w-25">Sum of Employer Taxes</th>
                                                  <th class="w-25">Total</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr id="taxes">

                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane tab-pane-custom fade" id="tech_productivity_tab" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="input-group" style="width: 80%">
                                        <input type="datetime" class="form-control flatpickr-range" placeholder="Filter Date Range" id="tech_productivity_filter" readonly>
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Preset</button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Date Preset</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Maximum</a>
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 days</a>
                                            <a class="dropdown-item" href="#">Last 14 days</a>
                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                            <a class="dropdown-item" href="#">This week</a>
                                            <a class="dropdown-item" href="#">Last week</a>
                                            <a class="dropdown-item" href="#">This month</a>
                                            <a class="dropdown-item" href="#">last month</a>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="input-group float-right" style="width: 80%">
                                        <input type="datetime" class="form-control flatpickr-range" placeholder="Filter Date Range" id="tech_productivity_filter2" readonly>
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Preset</button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Date Preset</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Maximum</a>
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 days</a>
                                            <a class="dropdown-item" href="#">Last 14 days</a>
                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                            <a class="dropdown-item" href="#">This week</a>
                                            <a class="dropdown-item" href="#">Last week</a>
                                            <a class="dropdown-item" href="#">This month</a>
                                            <a class="dropdown-item" href="#">last month</a>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="card rounded mt-3">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Tech Productivity
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12" id="tech_productivity_left_container">
                                              <canvas id="tech_productivity_left" width="400" height="600"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="card rounded mt-3">
                                        <div class="card-header">
                                          <div class="card-title text-center">
                                            Tech Productivity
                                          </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12" id="tech_productivity_right_container">
                                              <canvas id="tech_productivity_right" width="400" height="600"></canvas>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane tab-pane-custom fade" id="tech_general_concerns_tab" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                  <div class="card rounded mt-3">
                                    <div class="card-header">
                                      <div class="card-title text-center">
                                        TECH GENERAL CONCERNS
                                      </div>
                                    </div>
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12">
                                        <canvas id="tech_general_concerns" width="400" height="600"></canvas>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                </main>
            
    

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('public/theme/onepage/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/aos/aos.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/php-email-form/validate.js'); ?>"></script>

    <!-- Select2 js -->
    <script src="<?php echo base_url('public/plugin/select2/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/select2.js'); ?>"></script>

    <!-- Data tables -->
    <script src="<?php echo base_url('public/plugin/datatable/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/datatables.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('public/theme/onepage/js/main.js'); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://apis.google.com/js/api.js"></script>

    <script src="<?php echo base_url('public/js/chart_computation/sales.js'); ?>"></script>

    <script src="<?php echo base_url('public/js/chart_computation/operations.js'); ?>"></script>
    
    <script src="<?php echo base_url('public/js/chart_computation/tech_productivity.js'); ?>"></script>

    <script src="<?php echo base_url('public/js/chart_computation/tech_general_concerns.js'); ?>"></script>

    <script>
      $(document).ready(function() {
        $(".flatpickr").flatpickr({
          // defaultDate: "today",
          dateFormat: "j-M-Y",
        });
      })
    </script>

    <script>
      $(document).ready(function() {
        $(".flatpickr-range").flatpickr({
          mode: "range",
          dateFormat: "j-M-Y",
          // disable: [
          //     function(date) {
          //         // disable every multiple of 8
          //         return !(date.getDate() % 8);
          //     }
          // ]
        });
      })
    </script>

    <script>
      $("#operation_from").change(function() {
        // console.log($(this).val())
        // console.log(Math.floor(new Date($(this).val()).getTime() / 1000))

        gapi.load('client', initClientOperation);
      })
    </script>

    <script>
      // Replace with your Google Sheets API JSON key file and your Google Sheets ID
      const API_KEY_FILE = 'AIzaSyDtujPq1tuIBxIya1y7r87YU-C0YH_WHYk';
      const SPREADSHEET_ID = '1XGR68cqITGHUM1d4Rs157KCQkltuTnuagcfP7VZ5M2E';

      // Load the Google Sheets API
      gapi.load('client', initClient);

      function initClient() {
        gapi.client.init({
          apiKey: 'AIzaSyDtujPq1tuIBxIya1y7r87YU-C0YH_WHYk',
          discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
        }).then(function () {
          // After the API is loaded, you can use it to fetch data
          fetchGoogleSheetData();
        });
      }

      function fetchGoogleSheetData() {
        gapi.client.sheets.spreadsheets.values.get({
          spreadsheetId: SPREADSHEET_ID,
          range: 'A2:AD', // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
          const values = response.result.values;
          charts(values);
          // console.log('Google Sheet Values:', values);
        }, function (error) {
          console.error('Error fetching Google Sheet data:', error);
        });
      }
    </script>

    <script>
      // const OPERATION_SPREADSHEET_ID = '1saEuR1hGKCHGEpALSQBCdGHud8wWYaglCBSlRSM24tA';

      // Load the Google Sheets API
      // gapi.load('client', initClientOperation);

      // function initClientOperation() {
      //   gapi.client.init({
      //     apiKey: 'AIzaSyDtujPq1tuIBxIya1y7r87YU-C0YH_WHYk',
      //     discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
      //   }).then(function () {
      //     fetchGoogleSheetDataOperation();
      //   });
      // }

      // function fetchGoogleSheetDataOperation() {
      //   gapi.client.sheets.spreadsheets.values.get({
      //     spreadsheetId: OPERATION_SPREADSHEET_ID,
      //     range: `'Transaction List'!A2:K`,
      //   }).then(function (response) {
      //     const values = response.result.values;
      //     create_charts_service_revenue(values);
      //     create_charts_truck_revenue(values);
      //   }, function (error) {
      //     console.error('Error fetching Google Sheet data:', error);
      //   });
      // }
    </script>

    <script>
      function charts(values) {
        create_charts_lead_source(values);
        create_charts_lead_stage(values);
        filterable_records(values);
      }

      function roundToDecimalPlaces(number, decimalPlaces) {
          const factor = 10 ** decimalPlaces;
          return Math.round(number * factor) / factor;
      }

      function filterable_records(records) {
        var date_submitted = records.map((value, key) => {  return value[0]; });
        var total_min_estimate = records.map((value, key) => {  return value[28]; });
        var total_max_estimate = records.map((value, key) => {  return value[29]; });
        var total_amount_sales = records.map((value, key) => {  return value[16]; });
        var total_commission_amount = records.map((value, key) => {  return value[19]; });
        var email = records.map((value, key) => {  return value[6]; });
        var lead_stage = records.map((value, key) => {  return value[1]; });

        $("#sales_from_left").change(function() {
          var from_filter = $(this).val();
          var to_filter = $("#sales_to_left").val();

          if (from_filter && to_filter) {
            $.ajax({
              url: 'page/chart_filter',
              method: 'POST',
              data: {
                from: from_filter,
                to: to_filter,
                date_submitted: date_submitted,
                total_min_est: total_min_estimate,
                total_max_est: total_max_estimate,
                total_amount_sales: total_amount_sales,
                total_commission_amount: total_commission_amount,
                email: email,
                lead_stage: lead_stage
              },
              dataType: 'json',
              success: function (response) {
                $("#from_section .total_min_est").text('$ '+roundToDecimalPlaces(response.total_min_est, 2).toFixed(2))
                $("#from_section .total_max_est").text('$ '+roundToDecimalPlaces(response.total_max_est, 2).toFixed(2))
                $("#from_section .total_amount_sales").text('$ '+roundToDecimalPlaces(response.total_amount_sales, 2).toFixed(2))
                $("#from_section .total_commission_amount").text('$ '+roundToDecimalPlaces(response.total_commission_amount, 2).toFixed(2))
                $("#from_section .total_number_of_client").text(roundToDecimalPlaces(response.total_number_of_clients, 2))

                $("#from_section .est_sched").text(response.estimate_scheduled)
                $("#from_section .on_hold").text(response.on_hold)
                $("#from_section .closed").text(response.job_completed)

              }
            })
          }
        })

        $("#sales_from_right").change(function() {
          var from_filter = $(this).val();
          var to_filter = $("#sales_to_right").val();

          if (from_filter && to_filter) {
            $.ajax({
              url: 'page/chart_filter',
              method: 'POST',
              data: {
                from: from_filter,
                to: to_filter,
                date_submitted: date_submitted,
                total_min_est: total_min_estimate,
                total_max_est: total_max_estimate,
                total_amount_sales: total_amount_sales,
                total_commission_amount: total_commission_amount,
                email: email,
                lead_stage: lead_stage
              },
              dataType: 'json',
              success: function (response) {
                $("#from_section_1 .total_min_est").text('$ '+roundToDecimalPlaces(response.total_min_est, 2).toFixed(2))
                $("#from_section_1 .total_max_est").text('$ '+roundToDecimalPlaces(response.total_max_est, 2).toFixed(2))
                $("#from_section_1 .total_amount_sales").text('$ '+roundToDecimalPlaces(response.total_amount_sales, 2).toFixed(2))
                $("#from_section_1 .total_commission_amount").text('$ '+roundToDecimalPlaces(response.total_commission_amount, 2).toFixed(2))
                $("#from_section_1 .total_number_of_client").text(roundToDecimalPlaces(response.total_number_of_clients, 2))

                $("#from_section_1 .est_sched").text(response.estimate_scheduled)
                $("#from_section_1 .on_hold").text(response.on_hold)
                $("#from_section_1 .closed").text(response.job_completed)

              }
            })
          }
        })

        $("#sales_to_left").change(function() {
          var from_filter = $("#sales_from_left").val();
          var to_filter = $(this).val();

          if (from_filter && to_filter) {
            $.ajax({
              url: 'page/chart_filter',
              method: 'POST',
              data: {
                from: from_filter,
                to: to_filter,
                date_submitted: date_submitted,
                total_min_est: total_min_estimate,
                total_max_est: total_max_estimate,
                total_amount_sales: total_amount_sales,
                total_commission_amount: total_commission_amount,
                email: email,
                lead_stage: lead_stage
              },
              dataType: 'json',
              success: function (response) {
                $("#from_section .total_min_est").text('$ '+roundToDecimalPlaces(response.total_min_est, 2).toFixed(2))
                $("#from_section .total_max_est").text('$ '+roundToDecimalPlaces(response.total_max_est, 2).toFixed(2))
                $("#from_section .total_amount_sales").text('$ '+roundToDecimalPlaces(response.total_amount_sales, 2).toFixed(2))
                $("#from_section .total_commission_amount").text('$ '+roundToDecimalPlaces(response.total_commission_amount, 2).toFixed(2))
                $("#from_section .total_number_of_client").text(roundToDecimalPlaces(response.total_number_of_clients, 2))

                $("#from_section .est_sched").text(response.estimate_scheduled)
                $("#from_section .on_hold").text(response.on_hold)
                $("#from_section .closed").text(response.job_completed)
              }
            })
          }

        })

        $("#sales_to_right").change(function() {
          var from_filter = $("#sales_from_right").val();
          var to_filter = $(this).val();

          if (from_filter && to_filter) {
            $.ajax({
              url: 'page/chart_filter',
              method: 'POST',
              data: {
                from: from_filter,
                to: to_filter,
                date_submitted: date_submitted,
                total_min_est: total_min_estimate,
                total_max_est: total_max_estimate,
                total_amount_sales: total_amount_sales,
                total_commission_amount: total_commission_amount,
                email: email,
                lead_stage: lead_stage
              },
              dataType: 'json',
              success: function (response) {
                $("#from_section_1 .total_min_est").text('$ '+roundToDecimalPlaces(response.total_min_est, 2).toFixed(2))
                $("#from_section_1 .total_max_est").text('$ '+roundToDecimalPlaces(response.total_max_est, 2).toFixed(2))
                $("#from_section_1 .total_amount_sales").text('$ '+roundToDecimalPlaces(response.total_amount_sales, 2).toFixed(2))
                $("#from_section_1 .total_commission_amount").text('$ '+roundToDecimalPlaces(response.total_commission_amount, 2).toFixed(2))
                $("#from_section_1 .total_number_of_client").text(roundToDecimalPlaces(response.total_number_of_clients, 2))

                $("#from_section_1 .est_sched").text(response.estimate_scheduled)
                $("#from_section_1 .on_hold").text(response.on_hold)
                $("#from_section_1 .closed").text(response.job_completed)
              }
            })
          }

        })
      }

      // function create_charts_service_revenue(records) {
      //   var lead_source = records.map((value, key) => {  return value[7]; });
      //   var service_price = records.map((value, key) => {  return value[10]; });
      //   var operation_date_from = Math.floor(new Date($("#operation_from").val()).getTime() / 1000);

      //   var new_records = [];
      //   var total_service_revenue = 0;
      //   $.each(records, function(key, value) {
      //     var service_revenue_date = Math.floor(new Date(value[0]).getTime() / 1000);
      //     if (value[10]) {
      //       var total_service_revenue_split = value[10].split('$');
      //       total_service_revenue += parseFloat(total_service_revenue_split.toString().replace(/,/g, ''))
      //     } else {
      //       total_service_revenue += 0;
      //     }

      //     if (operation_date_from == service_revenue_date) {
      //       new_records[key] = value[7];
      //     }
      //   })

      //   new_records = [...new Set(records.map(x => x[7]?x[7]:'unknown'))];

      //   var service_revenue = [];
      //   $.each(new_records, function(key, value) {
      //       var revenue = 0;
      //       $.each(records, function(records_key, records_value) {
      //         if (value == records_value[7]) {
      //           if (records_value[10]) {
      //             var record_value_amount = records_value[10];
      //             record_value_amount = record_value_amount.split('$')
      //             var record_value_amount_converted = parseFloat(record_value_amount.toString().replace(/,/g, ''));

      //             if (Number.isFinite(record_value_amount_converted)) {
      //               record_value_amount_converted = record_value_amount_converted;
      //             } else {
      //               record_value_amount_converted = 0;
      //             }

      //           } else {
      //             var record_value_amount = 0;
      //             var record_value_amount_converted = record_value_amount;
      //           }
      //           revenue += record_value_amount_converted;
      //         }
      //       })
      //       service_revenue[key] = (revenue / total_service_revenue) * 100;
      //   })


      //   const leadSource = {};

      //   for (const item of lead_source) {
      //     if (leadSource[item]) {
      //       leadSource[item] += 1;
      //     } else {
      //       leadSource[item] = 1;
      //     }
      //   }

      //   const lead_source_duplicates = [];

      //   for (const key in leadSource) {
      //     lead_source_duplicates.push({ item: key, count: leadSource[key] });
      //   }


      //   const lead_source_item = lead_source_duplicates.map(itemObject => itemObject.item);
      //   const lead_source_count = lead_source_duplicates.map(itemObject => itemObject.count);

      //   var ctx = document.getElementById('revenue_per_service').getContext('2d');

      //   var data = {
      //       labels: new_records,
      //       datasets: [{
      //           data: service_revenue,
      //       }]
      //   };

      //   var options = {
      //       responsive: true,
      //       maintainAspectRatio: false,
      //       cutoutPercentage: 50,
      //       legend: {
      //           display: false,
      //       },
      //       plugins: {
      //           legend: {
      //               display: true,
      //               position: 'bottom',
      //               align: 'center',
      //               labels: {
      //                   boxWidth: 15,
      //                   padding: 15
      //               }
      //           },
      //           tooltip: {
      //               callbacks: {
      //                   label: function (context) {
      //                       var label = context.label || '';

      //                       if (label) {
      //                           label += ': ';
      //                       }

      //                       label += parseFloat(context.formattedValue).toFixed(2) + '%';

      //                       return label;
      //                   }
      //               }
      //           }
      //       }
      //   };

      //   // Create the doughnut chart
      //   var myDoughnutChart = new Chart(ctx, {
      //       type: 'doughnut',
      //       data: data,
      //       options: options
      //   });
      // }

      function create_charts_truck_revenue(records) {
        var lead_source = records.map((value, key) => {  return value[3]; });
        var service_price = records.map((value, key) => {  return value[10]; });

        var new_records = [];
        $.each(records, function(key, value) {
          new_records[key] = value[7];
        })

        new_records = [...new Set(records.map(x => x[3]?x[3]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            $.each(records, function(records_key, records_value) {
              if (value == records_value[3]) {
                // console.log(records_value[10])
                if (records_value[10]) {
                  var record_value_amount = records_value[10];
                  record_value_amount = record_value_amount.split('$')
                  var record_value_amount_converted = parseFloat(record_value_amount.toString().replace(/,/g, ''));

                  if (Number.isFinite(record_value_amount_converted)) {
                    record_value_amount_converted = record_value_amount_converted;
                  } else {
                    record_value_amount_converted = 0;
                  }

                } else {
                  var record_value_amount = 0;
                  var record_value_amount_converted = record_value_amount;
                }
                revenue += record_value_amount_converted;
              }
            })
            service_revenue[key] = revenue;
        })

        // console.log('Service Revenue')
        // console.log(new_records)

        const leadSource = {};

        for (const item of lead_source) {
          if (leadSource[item]) {
            // If the item is already in the countMap, increment the count
            leadSource[item] += 1;
          } else {
            // If the item is not in the countMap, initialize the count to 1
            leadSource[item] = 1;
          }
        }

        // Create an array to store the results
        const lead_source_duplicates = [];

        // Iterate through the countMap and push duplicates to the result array
        for (const key in leadSource) {
          lead_source_duplicates.push({ item: key, count: leadSource[key] });
        }

        // console.log(lead_source)
        // console.log(lead_source_duplicates)

        const lead_source_item = lead_source_duplicates.map(itemObject => itemObject.item);
        const lead_source_count = lead_source_duplicates.map(itemObject => itemObject.count);

        var ctx = document.getElementById('revenue_per_truck').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                label: 'Revenue Per Truck',
                data: service_revenue, // Replace with your data values
                backgroundColor: "rgba(0, 156, 173)"
            }]
        };

        // // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return '$ ' + parseFloat(value).toFixed(2); // Append '$' to the tick value
                        }
                    }
                }
            },
            legend: {
                display: false,  // Hide the default legend
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        boxWidth: 15,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';

                            if (label) {
                                label += ': ';
                            }

                            label += '$' + context.formattedValue;

                            return label;
                        }
                    }
                }
            }
        };

        // // Create the doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
      }

      function create_charts_lead_source(records) {
        var lead_source = records.map((value, key) => {  return value[12]; });
        var lead_stage = records.map((value, key) => {  return value[1]; });
        const leadSource = {};

        for (const item of lead_source) {
          if (leadSource[item]) {
            // If the item is already in the countMap, increment the count
            leadSource[item] += 1;
          } else {
            // If the item is not in the countMap, initialize the count to 1
            leadSource[item] = 1;
          }
        }

        // Create an array to store the results
        const lead_source_duplicates = [];

        // Iterate through the countMap and push duplicates to the result array
        for (const key in leadSource) {
          lead_source_duplicates.push({ item: key, count: leadSource[key] });
        }

        // console.log(lead_source)
        // console.log(lead_source_duplicates)

        const lead_source_item = lead_source_duplicates.map(itemObject => itemObject.item);
        const lead_source_count = lead_source_duplicates.map(itemObject => itemObject.count);

        var ctx = document.getElementById('lead_source').getContext('2d');

        // Define the data for the chart
        var data = {
            labels: lead_source_item,
            datasets: [{
                data: lead_source_count, // Replace with your data values
            }]
        };

        // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
        };

        // Create the doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
      }

      function create_charts_lead_stage(records) {
        var lead_source = records.map((value, key) => {  return value[12]; });
        var lead_stage = records.map((value, key) => {  return value[1]; });
        const leadStage = {};

        for (const item of lead_stage) {
          if (leadStage[item]) {
            // If the item is already in the countMap, increment the count
            leadStage[item] += 1;
          } else {
            // If the item is not in the countMap, initialize the count to 1
            leadStage[item] = 1;
          }
        }

        // Create an array to store the results
        const lead_stage_duplicates = [];

        // Iterate through the countMap and push duplicates to the result array
        for (const key in leadStage) {
          lead_stage_duplicates.push({ item: key, count: leadStage[key] });
        }

        // console.log(lead_source)
        // console.log(lead_stage_duplicates)

        const lead_stage_item = lead_stage_duplicates.map(itemObject => itemObject.item);
        const lead_stage_count = lead_stage_duplicates.map(itemObject => itemObject.count);

        var ctx = document.getElementById('lead_stage').getContext('2d');

        // Define the data for the chart
        var data = {
            labels: lead_stage_item,
            datasets: [{
                data: lead_stage_count, // Replace with your data values
            }]
        };

        // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
        };

        // Create the doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
      }
    </script>

    <script>
      // Replace with your Google Sheets API JSON key file and your Google Sheets ID
      // const API_KEY_FILE = 'AIzaSyDtujPq1tuIBxIya1y7r87YU-C0YH_WHYk';
      const TECH_HOUR_SPREADSHEET_ID = '1VpWS5RmJZBRdBqVRUPwySGLetVPO3iqVYR8JVg5aYUo';

      // Load the Google Sheets API
      gapi.load('client', initClientTechHour);

      function initClientTechHour() {
        gapi.client.init({
          apiKey: 'AIzaSyBzOvEQGONKm2a3VoC9g6zN4gFh0cfp9Sk',
          discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
        }).then(function () {
          // After the API is loaded, you can use it to fetch data
          fetchGoogleSheetDataTechHour();
          fetchGoogleSheetDataNetPay();
        });
      }

      function fetchGoogleSheetDataTechHour() {
        gapi.client.sheets.spreadsheets.values.get({
          spreadsheetId: TECH_HOUR_SPREADSHEET_ID,
          range: `'Tech Hours'!A725:S`, // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
          const values = response.result.values;
          // console.log('Google Sheet Values Operation:', values);
          create_table_for_tech_hour(values);
        }, function (error) {
          console.error('Error fetching Google Sheet data:', error);
        });
      }

      function create_table_for_tech_hour(records) {

        var regular_total_hours = 0;
        var regular_total_minutes = 0;
        var regular_total_seconds = 0;

        $.each(records, function(key, value) {
            // Assuming value[13] is the time string in the format "HH:mm:ss"
            var timeString = value[13];
            
            // Split the time string into hours, minutes, and seconds
            var timeComponents = timeString.split(":");
            
            // Add the hours, minutes, and seconds to the totals
            regular_total_hours += parseInt(timeComponents[0], 10);
            regular_total_minutes += parseInt(timeComponents[1], 10);
            regular_total_seconds += parseInt(timeComponents[2], 10);
        });

        // Adjust total minutes and seconds
        regular_total_hours += Math.floor(regular_total_minutes / 60);
        regular_total_minutes %= 60;
        regular_total_minutes += Math.floor(regular_total_seconds / 60);
        regular_total_seconds %= 60;

        // Format the result
        var total_regular_hours = regular_total_hours.toString().padStart(2, '0') + ":" +
                          regular_total_minutes.toString().padStart(2, '0') + ":" +
                          regular_total_seconds.toString().padStart(2, '0');

        
        var one_half_x_regular_total_hours = 0;
        var one_half_x_regular_total_minutes = 0;
        var one_half_x_regular_total_seconds = 0;

        $.each(records, function(key, value) {
          if (value[14]) {
            // Assuming value[13] is the time string in the format "HH:mm:ss"
            var timeString = value[14];
            
            // Split the time string into hours, minutes, and seconds
            var timeComponents = timeString.split(":");
            
            // Add the hours, minutes, and seconds to the totals
            one_half_x_regular_total_hours += parseInt(timeComponents[0], 10);
            regular_total_minutes += parseInt(timeComponents[1], 10);
            one_half_x_regular_total_seconds += parseInt(timeComponents[2], 10);
          }
        });

        // Adjust total minutes and seconds
        one_half_x_regular_total_hours += Math.floor(one_half_x_regular_total_minutes / 60);
        one_half_x_regular_total_minutes %= 60;
        one_half_x_regular_total_minutes += Math.floor(one_half_x_regular_total_seconds / 60);
        one_half_x_regular_total_seconds %= 60;

        // Format the result
        var one_half_x_total_regular_hours = one_half_x_regular_total_hours.toString().padStart(2, '0') + ":" +
                          one_half_x_regular_total_minutes.toString().padStart(2, '0') + ":" +
                          one_half_x_regular_total_seconds.toString().padStart(2, '0');

        var two_x_regular_total_hours = 0;
        var two_x_regular_total_minutes = 0;
        var two_x_regular_total_seconds = 0;

        $.each(records, function(key, value) {
          if (value[15]) {
            // Assuming value[13] is the time string in the format "HH:mm:ss"
            var timeString = value[15];
            
            // Split the time string into hours, minutes, and seconds
            var timeComponents = timeString.split(":");
            
            // Add the hours, minutes, and seconds to the totals
            two_x_regular_total_hours += parseInt(timeComponents[0], 10);
            two_x_regular_total_minutes += parseInt(timeComponents[1], 10);
            two_x_regular_total_seconds += parseInt(timeComponents[2], 10);
          }
        });

        // Adjust total minutes and seconds
        two_x_regular_total_hours += Math.floor(two_x_regular_total_minutes / 60);
        two_x_regular_total_minutes %= 60;
        two_x_regular_total_minutes += Math.floor(two_x_regular_total_seconds / 60);
        two_x_regular_total_seconds %= 60;

        // Format the result
        var two_x_total_regular_hours = two_x_regular_total_hours.toString().padStart(2, '0') + ":" +
                          two_x_regular_total_minutes.toString().padStart(2, '0') + ":" +
                          two_x_regular_total_seconds.toString().padStart(2, '0');

        var total_hours = 0;
        var total_minutes = 0;
        var total_seconds = 0;

        $.each(records, function(key, value) {
          if (value[12]) {
            // Assuming value[13] is the time string in the format "HH:mm:ss"
            var timeString = value[12];
            
            // Split the time string into hours, minutes, and seconds
            var timeComponents = timeString.split(":");
            
            // Add the hours, minutes, and seconds to the totals
            total_hours += parseInt(timeComponents[0], 10);
            total_minutes += parseInt(timeComponents[1], 10);
            total_seconds += parseInt(timeComponents[2], 10);
          }
        });

        // Adjust total minutes and seconds
        total_hours += Math.floor(total_minutes / 60);
        total_minutes %= 60;
        total_minutes += Math.floor(total_seconds / 60);
        total_seconds %= 60;

        // Format the result
        var total_hours = total_hours.toString().padStart(2, '0') + ":" +
                          total_minutes.toString().padStart(2, '0') + ":" +
                          total_seconds.toString().padStart(2, '0');

        // TR Result
        // console.log(total_regular_hours)
        // console.log(one_half_x_total_regular_hours)
        // console.log(two_x_total_regular_hours)
        // console.log(total_hours)

        $("#hours").html(`
          <td>Hours: `+total_regular_hours+`</td>
          <td>Hours: `+one_half_x_total_regular_hours+`</td>
          <td>Hours: `+two_x_total_regular_hours+`</td>
          <td>Hours: `+total_hours+`</td>
          `);
      }

      function fetchGoogleSheetDataNetPay() {
        gapi.client.sheets.spreadsheets.values.get({
          spreadsheetId: TECH_HOUR_SPREADSHEET_ID,
          range: `'Payroll Summary'!A2:H`, // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
          const values = response.result.values;
          // console.log('Google Sheet Values Operation:', values);
          create_table_for_net_pay(values);
        }, function (error) {
          console.error('Error fetching Google Sheet data:', error);
        });
      }

      function create_table_for_net_pay(records) {
        var net_pay_amount = 0;
        var employee_taxes_amount = 0;
        var employer_taxes_amount = 0;
        var total_amount = 0;
        $.each(records, function(key, value) {

          //Net Pay
          var net_pay_raw = value[4];

          var net_pay_raw_split = net_pay_raw.split('$')
          net_pay_amount += parseFloat(net_pay_raw_split.toString().replace(/,/g, ''));

          //Employee Taxes
          var employee_taxes_raw = value[5];
          if (employee_taxes_raw) {
            var employee_taxes_raw_split = employee_taxes_raw.split('$')
          } else {
            var employee_taxes_raw_split = 0;
          }
          employee_taxes_amount_converted =  parseFloat(employee_taxes_raw_split.toString().replace(/,/g, ''));

          if (Number.isFinite(employee_taxes_amount_converted)) {
            employee_taxes_amount += employee_taxes_amount_converted;
          } else {
            employee_taxes_amount += 0;
          }

          //Employer Taxes
          var employer_taxes_raw = value[6];
          
          // console.log(employer_taxes_raw)
          if (!isEmpty(employer_taxes_raw)) {
            var employer_taxes_raw_split = employer_taxes_raw.split('$')
          } else {
            var employer_taxes_raw_split = 0.00;
          }

          // console.log(employer_taxes_raw)
          employer_taxes_amount_converted = parseFloat(employer_taxes_raw_split.toString().replace(/,/g, ''));

          if (Number.isFinite(employer_taxes_amount_converted)) {
            employer_taxes_amount += employer_taxes_amount_converted;
          } else {
            employer_taxes_amount += 0;
          }

          //Total
          if (value[7]) {
            var total_raw = value[7];
            var total_raw_split = total_raw.split('$')
            total_amount += parseFloat(total_raw_split.toString().replace(/,/g, ''));
          } else {
            total_amount += 0;
          }
        })

        // console.log("Net Pay: "+net_pay_amount.toFixed(2))
        // console.log("Employee Taxes: "+employee_taxes_amount.toFixed(2))
        // console.log("Employer Taxes: "+employer_taxes_amount.toFixed(2))
        // console.log("Total Amount: "+total_amount.toFixed(2))

        // console.log("net pay amount: "+net_pay_amount)

        $("#taxes").html(`
          <td>$`+net_pay_amount.toFixed(2)+`</td>
          <td>$`+employee_taxes_amount.toFixed(2)+`</td>
          <td>$`+employer_taxes_amount.toFixed(2)+`</td>
          <td>$`+total_amount.toFixed(2)+`</td>
          `);
      }
    </script>

    <script>
        function isEmpty(value) {
            return value === "" || value === null || value === undefined;
        }
    </script>

    <script>
      // Replace with your Google Sheets API JSON key file and your Google Sheets ID
      // const API_KEY_FILE = 'AIzaSyDtujPq1tuIBxIya1y7r87YU-C0YH_WHYk';
      // const TECH_PRODUCTIVITY_SPREADSHEET_ID = '1saEuR1hGKCHGEpALSQBCdGHud8wWYaglCBSlRSM24tA';

      // Load the Google Sheets API
      // gapi.load('client', initTechProductivity);

      // function initTechProductivity() {
      //   gapi.client.init({
      //     apiKey: 'AIzaSyDtujPq1tuIBxIya1y7r87YU-C0YH_WHYk',
      //     discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
      //   }).then(function () {
      //     fetchGoogleSheetDataTechProductivity();
      //   });
      // }

      // function fetchGoogleSheetDataTechProductivity() {
      //   gapi.client.sheets.spreadsheets.values.get({
      //     spreadsheetId: TECH_PRODUCTIVITY_SPREADSHEET_ID,
      //     range: `'Tech Hours'!A679:S`,
      //   }).then(function (response) {
      //     const values = response.result.values;
      //     create_charts_tech_productivity(values);
      //   }, function (error) {
      //     console.error('Error fetching Google Sheet data:', error);
      //   });
      // }

      // function create_charts_tech_productivity(records) {
        // var lead_source = records.map((value, key) => {  return value[3]; });
        // var service_price = records.map((value, key) => {  return value[10]; });

        // var new_records = [];
        // $.each(records, function(key, value) {
        //   new_records[key] = value[7];
        // })

        // new_records = [...new Set(records.map(x => x[2]?x[2]:'unknown'))];

        // var service_revenue = [];
        // $.each(new_records, function(key, value) {
        //     var revenue = 0;
        //     var count_retries = 0;
        //     $.each(records, function(records_key, records_value) {
        //       if (value == records_value[2]) {
        //         if (records_value[17]) {
        //           count_retries += 1;
        //           var record_value_amount = records_value[17];
        //           record_value_amount = record_value_amount.split('%')
        //           var record_value_amount_converted = parseFloat(record_value_amount);
        //           if (Number.isFinite(record_value_amount_converted)) {
        //             record_value_amount_converted = record_value_amount_converted;
        //           } else {
        //             record_value_amount_converted = 0;
        //           }
        //         } else {
        //           var record_value_amount = 0;
        //           var record_value_amount_converted = record_value_amount;
        //         }
        //         revenue += record_value_amount_converted;
        //         // revenue += 1;
        //       }
        //     })
        //     // console.log(revenue)
        //     // console.log(count_retries)
        //     service_revenue[key] = revenue / count_retries;

        //     // alert(count_retries)
        // })

        // const leadSource = {};

        // for (const item of lead_source) {
        //   if (leadSource[item]) {
        //     // If the item is already in the countMap, increment the count
        //     leadSource[item] += 1;
        //   } else {
        //     // If the item is not in the countMap, initialize the count to 1
        //     leadSource[item] = 1;
        //   }
        // }

        // Create an array to store the results
        // const lead_source_duplicates = [];

        // Iterate through the countMap and push duplicates to the result array
        // for (const key in leadSource) {
        //   lead_source_duplicates.push({ item: key, count: leadSource[key] });
        // }

        // console.log(lead_source)
        // console.log(lead_source_duplicates)

        // const lead_source_item = lead_source_duplicates.map(itemObject => itemObject.item);
        // const lead_source_count = lead_source_duplicates.map(itemObject => itemObject.count);

        // var ctx = document.getElementById('tech_productivity').getContext('2d');

        // // Define the data for the chart
        // var data = {
        //     labels: new_records,
        //     datasets: [{
        //         label: 'Tech Productivity',
        //         data: service_revenue, // Replace with your data values
        //         backgroundColor: "rgba(0, 156, 173)"
        //     }]
        // };

        // // Define the options for the chart
        // var options = {
        //     indexAxis: 'y',
        //     elements: {
        //       bar: {
        //         borderWidth: 2,
        //       }
        //     },
        //     responsive: true,
        //     maintainAspectRatio: false,
        //     cutoutPercentage: 50, // Adjust the size of the hole (0-100)
        //     scales: {
        //         x: {
        //             beginAtZero: true,
        //             ticks: {
        //                 callback: function (value, index, values) {
        //                     return value + '%'; // Append '$' to the tick value
        //                 }
        //             }
        //         }
        //     },
        //     legend: {
        //         display: false,  // Hide the default legend
        //     },
        //     plugins: {
        //         legend: {
        //             display: true,
        //             position: 'bottom',
        //         },
        //         title: {
        //           display: true,
        //           text: 'Tech',
        //           position: 'left'
        //         },
        //         tooltip: {
        //             callbacks: {
        //                 label: function (context) {
        //                     var label = context.dataset.label || '';

        //                     if (label) {
        //                         label += ': ';
        //                     }

        //                     label += parseFloat(context.formattedValue).toFixed(2) + '%';

        //                     return label;
        //                 }
        //             }
        //         }
        //     }
        // };

        // // Create the doughnut chart
        // var myDoughnutChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: data,
        //     options: options
        // });
      // }
    </script>

    <!-- Tech General Concerns -->
    <script>
      // Replace with your Google Sheets API JSON key file and your Google Sheets ID
      // const API_KEY_FILE = 'AIzaSyDtujPq1tuIBxIya1y7r87YU-C0YH_WHYk';
      const TECH_GENERAL_CONCERN_SPREADSHEET_ID = '1saEuR1hGKCHGEpALSQBCdGHud8wWYaglCBSlRSM24tA';

      // Load the Google Sheets API
      gapi.load('client', initTechGeneralConcern);

      function initTechGeneralConcern() {
        gapi.client.init({
          apiKey: 'AIzaSyAb2_dZsJBfpeDkvhn80M1rgkrhlCQDv6k',
          discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
        }).then(function () {
          // After the API is loaded, you can use it to fetch data
          fetchGoogleSheetDataTechGeneralConcern();
        });
      }

      function fetchGoogleSheetDataTechGeneralConcern() {
        gapi.client.sheets.spreadsheets.values.get({
          spreadsheetId: TECH_GENERAL_CONCERN_SPREADSHEET_ID,
          range: `'Tech Hours'!A679:S`, // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
          const values = response.result.values;
          // console.log('Google Sheet Values Operation:', values);
          create_charts_tech_general_concern(values);
        }, function (error) {
          console.error('Error fetching Google Sheet data:', error);
        });
      }

      function create_charts_tech_general_concern(records) {
        // var lead_source = records.map((value, key) => {  return value[3]; });
        // var service_price = records.map((value, key) => {  return value[10]; });

        // var new_records = [];
        // $.each(records, function(key, value) {
        //   new_records[key] = value[7];
        // })

        // new_records = [...new Set(records.map(x => x[2]?x[2]:'unknown'))];

        // var service_revenue = [];
        // $.each(new_records, function(key, value) {
        //     var revenue = 0;
        //     var count_retries = 0;
        //     $.each(records, function(records_key, records_value) {
        //       if (value == records_value[2]) {
        //         if (records_value[17]) {
        //           count_retries += 1;
        //           var record_value_amount = records_value[17];
        //           record_value_amount = record_value_amount.split('%')
        //           var record_value_amount_converted = parseFloat(record_value_amount);
        //           if (Number.isFinite(record_value_amount_converted)) {
        //             record_value_amount_converted = record_value_amount_converted;
        //           } else {
        //             record_value_amount_converted = 0;
        //           }
        //         } else {
        //           var record_value_amount = 0;
        //           var record_value_amount_converted = record_value_amount;
        //         }
        //         revenue += record_value_amount_converted;
        //       }
        //     })
        //     service_revenue[key] = revenue / count_retries;

        // })

        // const leadSource = {};

        // for (const item of lead_source) {
        //   if (leadSource[item]) {
        //     leadSource[item] += 1;
        //   } else {
        //     leadSource[item] = 1;
        //   }
        // }

        // Create an array to store the results
        // const lead_source_duplicates = [];

        // Iterate through the countMap and push duplicates to the result array
        // for (const key in leadSource) {
        //   lead_source_duplicates.push({ item: key, count: leadSource[key] });
        // }

        // console.log(lead_source)
        // console.log(lead_source_duplicates)

        // const lead_source_item = lead_source_duplicates.map(itemObject => itemObject.item);
        // const lead_source_count = lead_source_duplicates.map(itemObject => itemObject.count);

        // var ctx = document.getElementById('tech_general_concerns').getContext('2d');

        // // Define the data for the chart
        // var data = {
        //     labels: ['January', 'February', 'March', 'April', 'May'], // Name
        //     datasets: [
        //         {
        //             label: 'Dataset 1', // Item label
        //             backgroundColor: 'rgba(75, 192, 192, 0.5)',
        //             data: [12, 19, 3, 5, 2] // Item Value
        //         },
        //         {
        //             label: 'Dataset 2',
        //             backgroundColor: 'rgba(255, 99, 132, 0.5)',
        //             data: [5, 7, 15, 8, 3]
        //         },
        //         {
        //             label: 'Dataset 3',
        //             backgroundColor: 'rgba(255, 206, 86, 0.5)',
        //             data: [8, 4, 9, 11, 6]
        //         }
        //     ]
        // };

        // Chart options
        // var options = {
        //     scales: {
        //         x: {
        //             stacked: true
        //         },
        //         y: {
        //             stacked: true
        //         }
        //     }
        // };

        //Create the stacked bar chart
        // var myStackedBarChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: data,
        //     options: options
        // });
      }
    </script>

    <script>
      $(document).ready(function() {
        $("#filter").select2({
          placeholder: "Filter Via",
          allowClear: true
        });

        $("#date").flatpickr();
      })
    </script>

</body>
</html>