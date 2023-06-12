@extends('layout')

@section('content')
<!-- Start Team Area -->
<section class="htc__team__area ptb--50 bg__white">
    <div class="htc__team__container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form id="contact-form" action="#" method="post">
                        <div class="single-contact-inner">
                            <div class="single-contact-form select">
                                <div class="contact-box name">
                                    <select name="" id="">
                                        <option value="">Boating and water sports</option>
                                        <option value="">Boating and water sports</option>
                                        <option value="">Boating and water sports</option>
                                    </select>
                                </div>
                            </div>
                            <div class="single-contact-form input-search">
                                <div class="contact-box name">
                                    <input type="text" name="search" placeholder="Search" style="border: 1px solid #3c7fb6;">
                                </div>
                            </div>
                            <div class="single-contact-form" style="padding: 0 0px; width: 25%;">
                                <div class="contact-btn" style="margin-top: 0px;">
                                    <button type="submit" style="width: 80px;" class="htc__btn btn--theme"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                
            <div class="row">
                <div class="htc__team__wrap clearfix pilot-list">
                    <!-- Start Single Team -->
                    
                    <!-- End Single Team -->
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Team Area -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        getPilots();
        function calculateAverage(array) {
            var total = 0;
            var count = 0;

            array.forEach(function(item, index) {
                total = (total + parseInt(item));
                count++;
            });

            return total / count;
        }
        function getPilots(){
            $.ajax({
                type: "GET",
                url: "{{ url('api/pilots')}}",
                success: function(data) {
                    var pilots = data.data;
                    var html = '';
                    $('#job-total').append(pilots.length + " open job available");
                    $.each(pilots, function(key, val){
                        if(val.pilot_detail.packages){
                            var packages = JSON.parse(val.pilot_detail.packages);
                            console.log(packages);
                            const pilotPrice = [];
                            $.each(packages, function(pkey, pval){
                                pilotPrice.push(pval.price);
                            });
                            var price = calculateAverage(pilotPrice);

                        }else{
                            price = 0;
                        }
                        
                        var html = `<div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                        <div class="team foo">
                                            <div class="team__inner">
                                                <div class="team__thumb">
                                                    <img src="images/drone-bg/5.jpg" alt="team image">
                                                </div>
                                                <div class="team__hover__info">
                                                    <ul class="team__social__link">
                                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>

                                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>

                                                        <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="padding: 30px;" class="bg__gray">
                                                <h6>`+ val.first_name +` ` + val.last_name + `</h6>
                                                <div >
                                                    <img src="images/logo/Adventure_UAV_logo.png" height="50" width="50" style="border-radius: 50%;" alt="">
                                                    <span>Adventure UAV</span>
                                                </div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span> (22)
                                                <p style="color:black;"> <i style="margin-right: 5px;" class="zmdi zmdi-pin"></i>Stock Building, 125 Main Street</p>
                                                <p style="color:black;"> <i style="margin-right: 5px;" class="fa fa-shield"></i><strong>insurance Coverage: </strong>Not specified</p>
                                                <p style="color:black;"> <i style="margin-right: 5px;" class="fa fa-check-square-o"></i><strong>License Category: </strong>`+val.pilot_detail.license_category+`</p>
                                                <p style="color:black;"> <i style="margin-right: 5px;" class="fa fa-usd"></i><strong>Avg. Rate: $`+price+`/hr </strong></p>
                                                <hr>
                                                <div>
                                                    <strong>CINEMATOGRAPHY</strong>
                                                    <strong style="float: right;">OTHER</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                        $('.pilot-list').append(html);
                    });
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
        
    });
</script>
@endsection