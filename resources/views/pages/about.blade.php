@extends('layouts.website_layout')

@section('content')
    <!--about-us-->
    <section class="section pt-50">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h5>About us</h5>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-12 mt-30">
                    <div class="about-us">
                        <div class="about-us-image">
                            {{-- <img src="{{url($aboutDetails->image)}}" alt=""> --}}
                        </div>
                        <div class="description">
                            <h6 style="text-align: center;">About Us .</h6>

                            <div class="quote">
                                <div>
                                    <i class="icon_quotations_alt"></i>
                                </div>
                                <p>

                                    {!!$aboutDetails->details!!}
                                </p>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

