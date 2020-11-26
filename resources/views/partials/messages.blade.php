@if(( isset($errors) && $errors->any()) || Session::has('error') || isset($error) || Session::has('message') || isset($message))
   <div class="xrow">


        @if($errors->any())

           <div class="col-xl-12 col-md-12 mb-4">
               <div class="card border-left-danger shadow h-100 py-2">
                   <div class="card-body text-danger">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-uppercase mb-1">{{ trans('core.validation_error_title') }}</div>
                               <div class="text-xs mb-0 font-weight-bold ">
                                   <ul>
                                       @foreach($errors->all() as $error)
                                           <li>{!! $error !!}</li>
                                       @endforeach
                                   </ul>
                               </div>
                           </div>
                           <div class="col-auto">
                               <i class="fa fa-times-circle fa-2x text-gray-300"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>


        @endif

        @if(isset($message) || Session::has('message'))

                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body text-info">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">{{ trans('core.info') }}</div>
                                    <div class="text-xs mb-0 font-weight-bold ">
                                        <p>
                                            {!! isset($message) ? $message : Session::get('message') !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-check-circle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <!--div class="alert alert-close alert-info">
                <a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a>
                <div class="bg-info alert-icon">
                    <i class="fa {{ (isset($icon)) ? $icon : (Session::has('icon') ? Session::get('icon') : 'fa-info-circle') }} fa-2x text-info"></i>
                </div>
                <div class="alert-content">
                    <h4 class="alert-title">{{ trans('core.info') }}</h4>
                    <p>
                        {!! isset($message) ? $message : Session::get('message') !!}
                    </p>
                </div>
            </div-->


        @endif
        
    </div>

@endif

@if(isset($success) || Session::has('success'))
    @section('js')
        @parent
        <script>
            $(document).ready(function() {


                Swal.fire({
                    title: '',
                    text: {!! json_encode(isset($success) ? $success : Session::get('success')) !!},
                    type: 'success',
                    confirmButtonText: {!! json_encode(trans('core.ok')) !!}
                });
            });
        </script>
    @stop
@endif


@if(isset($quantityerror) || Session::has('quantityerror'))
    @section('js')
        @parent
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: '',
                    text: {!! json_encode(isset($quantityerror) ? $quantityerror : Session::get('quantityerror')) !!},
                    type: 'warning',
                })
                .then(() => {
                  window.location.href = '{{route("sell.index")}}';
                });
            });
        </script>
    @stop
@endif

@if(isset($warning) || Session::has('warning'))
    @section('js')
        @parent
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: '',
                    text: {!! json_encode(isset($warning) ? $warning : Session::get('warning')) !!},
                    type: 'warning',
                    confirmButtonText: {!! json_encode(trans('core.ok')) !!}
                });
            });
        </script>
    @stop
@endif