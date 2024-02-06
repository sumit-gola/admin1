@extends('includes.layout')
@section('title', 'Blog')
@section('content')
    <!-- start hero section -->
    
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
        
                        {{ $d->slug }}
                    
                        {!! html_entity_decode($d->content) !!}
                        @endforeach

                    </div>
                </div>
                <!-- end container -->
            </section>
            <!-- end blog -->
    
@endsection