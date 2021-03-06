
@extends('app')
@section('content')
      <div class="page-content" style="background-color: #FDEFE0">
        <div class="container-fluid">
          <!-- Page-Title -->
          <div class="row">
            <div class="col-sm-12">
              <div class="page-title-box">
                <div class="row">
                  <div class="col">
                    <h4 class="page-title">Welcome {{Auth::user()->username}} </h4>
                  </div>
                  <!--end col-->
                  <div class="col-auto align-self-center">
                   
                   
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->
              </div>
              <!--end page-title-box-->
            </div>
            <!--end col-->
          </div>
          <!--end row-->
          <!-- end page title end breadcrumb -->
          <div class="row">
            <div class="col-lg-12">
              <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3">
                  <div class="card report-card">
                    <div class="card-body">
                      <div class="row d-flex justify-content-center">
                        <div class="col">
                          <p class="text-dark mb-0 fw-semibold">Total Patient</p>
                          <h3 class="m-0">{{$pasien}}</h3>
                         
                        </div>
                        <div class="col-auto align-self-center">
                          <div class="report-main-icon bg-light-alt">
                              <img src="assets/images/examination.png" class="img-fluid" alt="">

                          </div>
                        </div>
                      </div>
                    </div>
                    <!--end card-body-->
                  </div>
                  <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-6 col-lg-3">
                  <div class="card report-card">
                    <div class="card-body">
                      <div class="row d-flex justify-content-center">
                        <div class="col">
                          <p class="text-dark mb-0 fw-semibold">Total Doctor</p>
                          <h3 class="m-0">{{$dokter}}</h3>
                          
                        </div>
                        <div class="col-auto align-self-center">
                          <div class="report-main-icon bg-light-alt">
                              <img src="assets/images/doctor.png" class="img-fluid" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--end card-body-->
                  </div>
                  <!--end card-->
                </div>
                 <div class="col-md-6 col-lg-3">
                  <div class="card report-card">
                    <div class="card-body">
                      <div class="row d-flex justify-content-center">
                        <div class="col">
                          <p class="text-dark mb-0 fw-semibold">Total Poly</p>
                          <h3 class="m-0">{{$poliklinik}}</h3>
                        </div>
                        <div class="col-auto align-self-center">
                          <div class="report-main-icon bg-light-alt">
                              <img src="assets/images/clinic.png" class="img-fluid" alt="">

                          </div>
                        </div>
                      </div>
                    </div>
                    <!--end card-body-->
                  </div>
                  <!--end card-->
                </div>
                <!--end col-->
                
                <!--end col-->
                <div class="col-md-6 col-lg-3">
                  <div class="card report-card">
                    <div class="card-body">
                      <div class="row d-flex justify-content-center">
                        <div class="col">
                          <p class="text-dark mb-0 fw-semibold">Total Medical Record</p>
                          <h3 class="m-0">{{$rm_count}}</h3>
                        </div>
                        <div class="col-auto align-self-center">
                          <div class="report-main-icon bg-light-alt">
                              <img src="assets/images/medical-file.png" class="img-fluid" alt="">

                          </div>
                        </div>
                      </div>
                    </div>
                    <!--end card-body-->
                  </div>
                  <!--end card-->
                </div>
                <!--end col-->
              </div>
              <!--end row-->
            
              <!--end card-->
            </div>
            <!--end col-->
          
            <!--end col-->
          </div>
          <!--end row-->

        
          <!--end row-->
          
          <!--end row-->
        </div>
        <!-- container -->

    

@endsection
      <!-- Page Content-->
    