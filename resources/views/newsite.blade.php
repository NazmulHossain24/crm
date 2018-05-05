@extends('layouts.master')

@section('title')
    New Site
@endsection

@section('page')
    New Site
@endsection


@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('shared.sidebar')
        </div>

            <div class="tab-content col-md-8 col-xs-12">

                <div class="tab-pane active" id="tab_a">
                    @include('site.site_details')
                </div>
                <div class="tab-pane" id="tab_b">
                    @include('site.electricity')
                </div>
                <div class="tab-pane" id="tab_c">
                    @include('site.gas')
                </div>
                <div class="tab-pane" id="tab_d">
                    @include('site.water')
                </div>
                <div class="tab-pane" id="tab_e">
                    @include('site.land_line')
                </div>
                <div class="tab-pane" id="tab_f">
                    @include('site.broad_band')
                </div>
                <div class="tab-pane" id="tab_g">
                    @include('site.insurance')
                </div>
                <div class="tab-pane" id="tab_h">
                    @include('site.e_pos')
                </div>
                <div class="tab-pane" id="tab_i">
                    @include('site.company')
                </div>
                <div class="tab-pane" id="tab_j">
                    @include('site.billing')
                </div>
                <div class="tab-pane" id="tab_k">
                    @include('site.payment')
                </div>

            </div><!-- tab content -->

    </div>
@endsection



@section('script')
    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('public/plugins/jquery.inputmask.extensions.js')}}"></script>

    <script type="text/javascript">

        $(function () {

            $('#tab_a2').click(function () {
                $( '[href="#tab_a"]' ).trigger( "click" );
            });

            $('#tab_b1').click(function () {
                siteDetailsForm();
            });

            $('#tab_b2').click(function () {
                $( '[href="#tab_b"]' ).trigger( "click" );
            });

            $('#tab_c1').click(function () {
                $( '[href="#tab_c"]' ).trigger( "click" );
            });

            $('#tab_c2').click(function () {
                $( '[href="#tab_c"]' ).trigger( "click" );
            });

            $('#tab_d1').click(function () {
                $( '[href="#tab_d"]' ).trigger( "click" );
            });

            $('#tab_d2').click(function () {
                $( '[href="#tab_d"]' ).trigger( "click" );
            });

            $('#tab_e1').click(function () {
                $( '[href="#tab_e"]' ).trigger( "click" );
            });

            $('#tab_e2').click(function () {
                $( '[href="#tab_e"]' ).trigger( "click" );
            });

            $('#tab_f1').click(function () {
                $('#landLineFrom').submit();
            });

            $('#tab_f2').click(function () {
                $( '[href="#tab_f"]' ).trigger( "click" );
            });

            $('#tab_g1').click(function () {
                $('#broadBandFrom').submit();
            });

            $('#tab_g2').click(function () {
                $( '[href="#tab_g"]' ).trigger( "click" );
            });

            $('#tab_h1').click(function () {
                $('#insuranceFrom').submit();
            });

            $('#tab_h2').click(function () {
                $( '[href="#tab_h"]' ).trigger( "click" );
            });

            $('#tab_i1').click(function () {
                $('#posFrom').submit();
            });

            $('#tab_i2').click(function () {
                $( '[href="#tab_i"]' ).trigger( "click" );
            });

            $('#tab_j1').click(function () {
                $('#companyDetailsFrom').submit();
            });

            $('#tab_j2').click(function () {
                $( '[href="#tab_j"]' ).trigger( "click" );
            });

            $('#tab_k1').click(function () {
                $('#billingFrom').submit();
            });

        });



        /**
         * Site Details
         */

        $(function () {
            $('#siteDetailsForm').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');

                var postCode_a = $('#postCode_a').val();
                var landLine_a = $('#landLine_a').val();
                var mobileNumber_a = $('#mobileNumber_a').val();
                var email_a = $('#email_a').val();

                if(postCode_a.length > 0 && landLine_a.length > 0 && mobileNumber_a.length && email_a.length){
                    $.ajax({
                        url: submitUrl,
                        type: methods,
                        dataType: 'json',
                        data: $(this).serialize(),
                        success:function(result){
                            if(result.success == 1){
                                $( '[href="#tab_b"]' ).trigger( "click" );
                                set_siteID(result.id);
                            }
                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            alert('Some Erro. Try Again');
                        }
                    });
                }else{
                    alert('Post Code, Land Line, Mobile Number, Email must required!!')
                }


            });
        });

        function siteDetailsForm() {
            $('#siteDetailsForm').submit();
        }


        $(function () {
            $('#postCode_a').change(function () {
                var postcode = $(this).val();
                var submitUrl = $(this).data('suburl');
                var show_res = '';

                if(postcode.length >= 4){
                    $.ajax({
                        url: submitUrl,
                        type: 'get',
                        dataType: 'json',
                        data: {'postCode':postcode},
                        success:function(result){
                            if(result.success == 1){
                                $('#showPostCode').modal('show');
                                var all = result.data;
                                $.each(all, function(i, v) {
                                    show_res += '<tr>'
                                                    +'<td>'+moment(all[i].created_at, 'YYYY-MM-DD').format('DD/MM/YYYY')+'</td>'
                                                    +'<td>'+all[i].siteID+'</td>'
                                                    +'<td>'+all[i].companyName+'</td>'
                                                    +'<td>'+all[i].buildingName+', '+all[i].street+', '+all[i].city+', '+all[i].country+', '+all[i].postCode+'</td>'
                                                    +'<td><div style="white-space:nowrap;" role="group">'
                                                            +'<a class="btn btn-flat btn-xs btn-info" title="Preview" href="{{url('my/show')}}/'+all[i].siteID+'"><i class="fa fa-eye" aria-hidden="true"></i></a>'
                                                            +'<a class="btn btn-flat btn-xs btn-success" title="Edit" href="{{url('new/edi')}}/'+all[i].siteID+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'
                                                        +'</div>'
                                                    +'</td>'
                                                +'<tr>';
                                });

                                $('#show_postCode_result').html(show_res);
                            }
                        }
                    });

                    //$('#showPostCode').modal('show')

                }

            });
        });

        /**
         * Site Details
         */


        /**
         * Electricity Supply
         */

        $(function () {
            $('#electricityFrom1').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                var topline = $('#topLine_b').val();
                if(topline.length == 8){
                    $.ajax({
                        url: submitUrl,
                        type: methods,
                        dataType: 'json',
                        data: $(this).serialize(),
                        success:function(result){
                            if(result.success == 1){
                                set_siteID(result.id);
                                $('.electricitySupplyID1').val(result.electricitySupplyID);
                                $('#electiricMeter1').modal('hide');
                            }else{
                                alert('Site Details Information Not Found.');
                            }
                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            alert('Some Erro. Try Again');
                        }
                    });
                }else{
                    alert('Topline Value Invalid!!');
                }

            });
        });

        $(function () {
            $('#electricityFrom2').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                var topline = $('#topLine_b1').val();
                if(topline.length == 8){
                    $.ajax({
                        url: submitUrl,
                        type: methods,
                        dataType: 'json',
                        data: $(this).serialize(),
                        success:function(result){
                            if(result.success == 1){
                                set_siteID(result.id);
                                $('.electricitySupplyID2').val(result.electricitySupplyID);
                                $('#electiricMeter2').modal('hide');
                            }else{
                                alert('Site Details Information Not Found.');
                            }
                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            alert('Some Erro. Try Again');
                        }
                    });
                }else{
                    alert('Topline Value Invalid!!');
                }
            });
        });

        $(function () {
            $('#electricityFrom3').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                var topline = $('#topLine_b2').val();
                if(topline.length == 8){
                    $.ajax({
                        url: submitUrl,
                        type: methods,
                        dataType: 'json',
                        data: $(this).serialize(),
                        success:function(result){
                            if(result.success == 1){
                                set_siteID(result.id);
                                $('.electricitySupplyID3').val(result.electricitySupplyID);
                                $('#electiricMeter3').modal('hide');
                            }else{
                                alert('Site Details Information Not Found.');
                            }
                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            alert('Some Erro. Try Again');
                        }
                    });
                }else{
                    alert('Topline Value Invalid!!');
                }
            });
        });

        /**
         * Electricity Supply
         */


        /**
         * Gas Supply
         */
        $(function () {
            $('#gasFrom1').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.gasSupplyID1').val(result.gasSupplyID);
                            $('#gasMeter1').modal('hide');
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });
        });

        $(function () {
            $('#gasFrom2').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.gasSupplyID2').val(result.gasSupplyID);
                            $('#gasMeter2').modal('hide');
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });
        });

        $(function () {
            $('#gasFrom3').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.gasSupplyID3').val(result.gasSupplyID);
                            $('#gasMeter3').modal('hide');
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });
        });

        /**
         * Gas Supply
         */




        /**
         * Water Supply
         */
        $(function () {
            $('#waterFrom1').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.waterSupplyID1').val(result.waterSupplyID);
                            $('#waterMeter1').modal('hide');
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });
        });

        $(function () {
            $('#waterFrom2').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.waterSupplyID2').val(result.waterSupplyID);
                            $('#waterMeter2').modal('hide');
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });
        });


        $(function () {
            $('#waterFrom3').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.waterSupplyID3').val(result.waterSupplyID);
                            $('#waterMeter3').modal('hide');
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });
        });

        /**
         * Water Supply
         */


        /**
         * Land Line
         */

        $(function () {

            $('#landLineFrom').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.landLineID').val(result.landLineID);
                            $( '[href="#tab_f"]' ).trigger( "click" );
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });

        });

        /**
         * Land Line
         */


        /**
         * Broadband
         */

        $(function () {

            $('#broadBandFrom').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.broadBandID').val(result.broadBandID);
                            $( '[href="#tab_g"]' ).trigger( "click" );
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });

        });

        /**
         * Broadband
         */


        /**
         * Insurance
         */

        $(function () {

            $('#insuranceFrom').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.insuranceID').val(result.insuranceID);
                            $( '[href="#tab_h"]' ).trigger( "click" );
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });

        });

        /**
         * Insurance
         */


        /**
         * E-POS
         */

        $(function () {

            $('#posFrom').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.posID').val(result.posID);
                            $( '[href="#tab_i"]' ).trigger( "click" );
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });

        });

        /**
         * E-POS
         */




        /**
         * Company Details
         */

        $(function () {

            $('#copyAddress_e').click(function () {
                var address = $('#buildingName_a').val();
                var street = $('#street_a').val();
                var town = $('#city_a').val();
                var postCode = $('#postCode_a').val();

                $('#address_e').val(address);
                $('#street_e').val(street);
                $('#town_e').val(town);
                $('#postCode_e').val(postCode);
            });



            var company_status1 = $('#companyStatus_e').val();

            switch (company_status1) {
                case 'Sole Trader':
                    sole_trader();
                    break;
                case 'Partnership':
                    partnership()
                    break;
                default:
                    general();
            }


            $('#companyStatus_e').change(function () {
                var company_status = $(this).val();

                switch (company_status) {
                    case 'Sole Trader':
                        sole_trader();
                        break;
                    case 'Partnership':
                        partnership()
                        break;
                    default:
                        general();
                }

            });



            $('#companyDetailsFrom').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.companyDetailsID').val(result.companyDetailsID);
                            $( '[href="#tab_j"]' ).trigger( "click" );
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });
        });
        
        
        function general() {
            $('#general').show();
            $('#sole_trader').hide();
            $('#partnership').hide();

           /* $('#general input').prop('disabled', false);
            $('#partnership input').prop('disabled', true);
            $('#sole_trader input').prop('disabled', true);*/
        }

        function partnership() {
            $('#general').hide();
            $('#sole_trader').hide();
            $('#partnership').show();

            /*$('#general input').prop('disabled', true);
            $('#partnership input').prop('disabled', false);
            $('#sole_trader input').prop('disabled', true);*/
        }

        function sole_trader() {
            $('#general').hide();
            $('#sole_trader').show();
            $('#partnership').hide();

            /*$('#general input').prop('disabled', true);
            $('#partnership input').prop('disabled', true);
            $('#sole_trader input').prop('disabled', false);*/
        }
        
        
        

        /**
         * Company Details
         */






        /**
         * Billing Details
         */

        $(function () {
            $('#copyAddress_f').click(function () {
                var buildingNumber = $('#buildingName_a').val();
                var street = $('#street_a').val();
                var town = $('#city_a').val();
                var postCode = $('#postCode_a').val();
                var country = $('#country_a').val();

                $('#buildingNumber_f').val(buildingNumber);
                $('#street_f').val(street);
                $('#town_f').val(town);
                $('#country_f').val(country);
                $('#postCode_f').val(postCode);

            });


            $('#billingFrom').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.billingID').val(result.billingID);
                            $( '[href="#tab_g"]' ).trigger( "click" );
                            $( '[href="#tab_k"]' ).trigger( "click" );
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });
        });


        /**
         * Billing Details
         */


        /**
         * Payment Details
         */

        $(function () {

            $('#paymentFrom').on('submit', function(e){
                e.preventDefault();
                var submitUrl = $(this).attr('action');
                var methods = $(this).attr('method');
                var re_url = $(this).data('url');
                $.ajax({
                    url: submitUrl,
                    type: methods,
                    dataType: 'json',
                    data: $(this).serialize(),
                    success:function(result){
                        if(result.success == 1){
                            set_siteID(result.id);
                            $('.paymentID').val(result.paymentID);
                            window.location = re_url;
                        }else{
                            alert('Site Details Information Not Found.');
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert('Some Erro. Try Again');
                    }
                });
            });

        });

        /**
         * Payment Details
         */

        function set_siteID(id) {
            $('.siteID').val(id);
        }

        $(function () {
            $("[data-mask]").inputmask();
        });



    </script>
@endsection
