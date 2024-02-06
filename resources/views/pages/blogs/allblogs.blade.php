@extends('includes.layout')

@section('content')
        <!-- start blog -->
        <section class="section" id="blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">Our Latest <span class="text-primary">News</span></h1>
                            <p class="text-muted mb-4">We thrive when coming up with innovative ideas but also understand that a smart concept should be supported with faucibus sapien odio measurable results.</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

       
                    
               

                <div class="row">
                    @foreach ($data as $d)
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/small/img-8.jpg" alt="" class="img-fluid rounded" />
                            </div>
                            <div class="card-body">
                                <ul class="list-inline fs-14 text-muted">
                                    <li class="list-inline-item">
                                        <i class="ri-calendar-line align-bottom me-1"></i> {{ $d->updated_at }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ri-message-2-line align-bottom me-1"></i> 364 Comment
                                    </li>
                                </ul>
                                <a href="javascript:void(0);">
                                    <h5>{{ $d->title }}</h5>
                                </a>
                                <p class="text-muted fs-14">One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others.</p>
                                
                                <div>
                                    <a href="{{ url('/blogs/'.$d->id) }}" class="link-success"> More <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  

                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- end blog -->
@endsection