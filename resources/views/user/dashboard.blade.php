@extends('layouts.auth')
@section('title','Dashboard')

@section('styles')
<link rel="stylesheet" href="{{'assets/auth/vendor/owl-carousel/css/owl.carousel.min.css'}}">
<link rel="stylesheet" href="{{'assets/auth/vendor/owl-carousel/css/owl.theme.default.min.css'}}">
<link href="{{'assets/auth/vendor/jqvmap/css/jqvmap.min.css'}}" rel="stylesheet">
<link href="{{'assets/auth/cssbar/style.css'}}" rel="stylesheet">
@endsection

@section('content')

  <div class="content-wrapper">
    <div class="content">                
            <!-- Top Statistics -->
            <div class="row">
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card" style="height: 160px">
                  <div class="card-header">
                    <h2>{{$PostsCount}}</h2>
                    
                    <div class="sub-title">
                      <span class="mr-1">Post</span> <i class="fa-regular fa-address-card"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Posts Overview</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
       
        <!-- Stock Modal -->
        <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <form action="#">
              <div class="modal-content">
                <div class="modal-header align-items-center p3 p-md-5">
                  <h2 class="modal-title" id="exampleModalGridTitle">Add Stock</h2>
                  <div>
                    <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                    <button type="submit" class="btn btn-primary  btn-pill" data-dismiss="modal"> save </button>
                  </div>

                </div>
                <div class="modal-body p3 p-md-5">
                  <div class="row">
                    <div class="col-lg-8">
                      <h3 class="h5 mb-5">Product Information</h3>
                      <div class="form-group mb-5">
                        <label for="new-product">Product Title</label>
                        <input type="text" class="form-control" id="new-product" placeholder="Add Product">
                      </div>
                      <div class="form-row mb-4">
                        <div class="col">
                          <label for="price">Price</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="text" class="form-control" id="price" placeholder="Price" aria-label="Price"
                              aria-describedby="basic-addon1">
                          </div>
                        </div>
                        <div class="col">
                          <label for="sale-price">Sale Price</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="text" class="form-control" id="sale-price" placeholder="Sale Price" aria-label="SalePrice"
                              aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div>

                      <div class="product-type mb-3 ">
                        <label class="d-block" for="sale-price">Product Type <i class="mdi mdi-help-circle-outline"></i> </label>
                        <div>

                          <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="customRadio1">Physical Good</label>
                          </div>

                          <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Digital Good</label>
                          </div>

                          <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio3">Service</label>
                          </div>

                        </div>
                      </div>

                      <div class="editor">
                        <label class="d-block" for="sale-price">Description <i class="mdi mdi-help-circle-outline"></i></label>
                        <div id="standalone">
                          <div id="toolbar">
                            <span class="ql-formats">
                              <select class="ql-font"></select>
                              <select class="ql-size"></select>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-bold"></button>
                              <button class="ql-italic"></button>
                              <button class="ql-underline"></button>
                            </span>
                            <span class="ql-formats">
                              <select class="ql-color"></select>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-blockquote"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-list" value="ordered"></button>
                              <button class="ql-list" value="bullet"></button>
                              <button class="ql-indent" value="-1"></button>
                              <button class="ql-indent" value="+1"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-direction" value="rtl"></button>
                              <select class="ql-align"></select>
                            </span>
                          </div>
                        </div>
                        <div id="editor"></div>

                        <div class="custom-control custom-checkbox d-inline-block mt-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck2">
                          <label class="custom-control-label" for="customCheck2">Hide product from published site</label>
                        </div>

                      </div>

                    </div>
                    <div class="col-lg-4">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" placeholder="please imgae here">
                        <span class="upload-image">Click here to <span class="text-primary">add product image.</span> </span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </form>
          </div>
        </div>
</div>
@endsection

@section('scripts')
     <!-- Required vendors -->
     <script src="./js/quixnav-init.js"></script>
     <script src="./js/custom.min.js"></script>
 
 
     <!-- Vectormap -->
     <script src="{{'assets/auth/vendor/raphael/raphael.min.js'}}"></script>
     <script src="{{'assets/auth/vendor/morris/morris.min.js'}}"></script>
 
 
     <script src="{{'assets/auth/vendor/circle-progress/circle-progress.min.js'}}"></script>
     <script src="{{'assets/auth/vendor/chart.js/Chart.bundle.min.js'}}"></script>
 
     <script src="{{'assets/auth/vendor/gaugeJS/dist/gauge.min.js'}}"></script>
 
     <!--  flot-chart js -->
     <script src="{{'assets/auth/vendor/flot/jquery.flot.js'}}"></script>
     <script src="{{'assets/auth/vendor/flot/jquery.flot.resize.js'}}"></script>
 
     <!-- Owl Carousel -->
     <script src="{{'assets/auth/vendor/owl-carousel/js/owl.carousel.min.js'}}"></script>
 
     <!-- Counter Up -->
     <script src="{{'assets/auth/vendor/jqvmap/js/jquery.vmap.min.js'}}"></script>
     <script src="{{'assets/auth/vendor/jqvmap/js/jquery.vmap.usa.js'}}"></script>
     <script src="{{'assets/auth/vendor/jquery.counterup/jquery.counterup.min.js'}}"></script>
 
 
     <script src="{{'assets/auth/jsbar/dashboard/dashboard-1.js'}}"></script>
@endsection