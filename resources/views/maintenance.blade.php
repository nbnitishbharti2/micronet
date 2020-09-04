@extends('Layout.app')
@section('content')


<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
<!-- <div class="breadcrumbs-wrap style-2 margin-200">
    <div class="container">
        <h1 class="page-title">Maintenance Programs</h1>
        <ul class="breadcrumbs">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Maintenance Programs</li>
        </ul>
    </div>
</div> -->

@section('page_title')
@parent
<h1 class="page-title">Maintenance Programs</h1>
    @section('breadcrumb')
    @parent
    <li>Maintenance Programs</li>
    @endsection
@endsection

<!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->

<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
<div id="content" class="page-content-wrap">
    <div class="container">
        <div class="content-element3">
            <div class="row flex-row">
                <main id="main" class="col-md-12 col-sm-12 sbr">
                    <p class="content-element3">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. </p>
                    <div class="blockquote-holder" data-bg="images/750x192_bg1.jpg">
                        <blockquote>
                            <p>Do you know that over 80% of mechanical failures are eliminated by regular maintenance?</p>
                        </blockquote>
                    </div>
                    <p>Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. </p>
                </main>
            </div>
        </div>

        <h2 class="section-title">Our Protections Plans</h2>
        <div class="pt-section">
            <div class="container">
                <div class="tabs tabs-section vertical clearfix">
                    <!--tabs navigation-->                  
                    <ul class="tabs-nav clearfix">
                        <li>
                            <a href="#tab-1"><span class="cicon-heating"></span>Heating System </a>
                        </li>
                        <li>
                            <a href="#tab-2"><span class="cicon-air-quality"></span>Air Conditioning System</a>
                        </li>
                        <li>
                            <a href="#tab-3"><span class="cicon-plumbing"></span>Plumbing System </a>
                        </li>
                    </ul>
                    <!--tabs content-->
                    <div class="tabs-content">
                        <div id="tab-1">
                            <div class="pricing-tables-holder cols-3">
                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table">
                                        <header class="pt-header"><div class="pt-type">Standard</div>                                
                                            <div class="pt-price">$159</div>                               
                                            <div class="pt-period">per year</div>                                
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer>
                                        <!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->
        
                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table selected">
                                        <div class="label">Popular</div>
                                        <header class="pt-header">
                                            <div class="pt-type">Basic</div>
                                            <div class="pt-price">$199</div>
                                            <div class="pt-period">per year</div>
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">24/7 Emergency Services</div></li>
                                            <li><div class="wrapper">25% Discount on Non-warranted Parts</div></li>
                                            <li><div class="wrapper">25% Discount on Labour</div></li>
                                            <li><div class="wrapper">No Overtime Premiums</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer>
                                        <!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->
        
                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table">
                                        <header class="pt-header">
                                            <div class="pt-type">Deluxe</div>
                                            <div class="pt-price">$279</div>
                                            <div class="pt-period">per Year</div>
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">24/7 Emergency Services</div></li>
                                            <li><div class="wrapper">100% Labour on manufacturer&rsquo;s Warranted Parts</div></li>
                                            <li><div class="wrapper">25% discount on non-warranted Parts &amp; Service</div></li>
                                            <li><div class="wrapper">No Overtime Premiums</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                            <li><div class="wrapper">50% Anti-corrosion Discount</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer><!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->
                            </div>
                        </div>
                        <div id="tab-2">
                            <div class="pricing-tables-holder cols-3">
                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table">
                                        <header class="pt-header">
                                            <div class="pt-type">Standard</div>
                                            <div class="pt-price">$159</div>
                                            <div class="pt-period">per year</div>
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer><!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->

                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table selected">       
                                        <div class="label">Popular</div>                     
                                        <header class="pt-header">
                                            <div class="pt-type">Basic</div>                      
                                            <div class="pt-price">$199</div>                     
                                            <div class="pt-period">per year</div>                      
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">24/7 Emergency Services</div></li>
                                            <li><div class="wrapper">25% Discount on Non-warranted Parts</div></li>
                                            <li><div class="wrapper">25% Discount on Labour</div></li>
                                            <li><div class="wrapper">No Overtime Premiums</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer>
                                        <!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->
        
                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table">
                                        <header class="pt-header">
                                            <div class="pt-type">Deluxe</div>
                                            <div class="pt-price">$279</div>
                                            <div class="pt-period">per Year</div>
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">24/7 Emergency Services</div></li>
                                            <li><div class="wrapper">100% Labour on manufacturer&rsquo;s Warranted Parts</div></li>
                                            <li><div class="wrapper">25% discount on non-warranted Parts &amp; Service</div></li>
                                            <li><div class="wrapper">No Overtime Premiums</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                            <li><div class="wrapper">50% Anti-corrosion Discount</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer>
                                        <!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->
                            </div>
                        </div>
                        <div id="tab-3">
                            <div class="pricing-tables-holder cols-3">
                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table">
                                        <header class="pt-header"><div class="pt-type">Standard</div>
                                        <div class="pt-price">$159</div>
                                        <div class="pt-period">per year</div>
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer>
                                        <!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->
        
                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table selected">
                                        <div class="label">Popular</div>
                                        <header class="pt-header">
                                            <div class="pt-type">Basic</div>
                                            <div class="pt-price">$199</div>
                                            <div class="pt-period">per year</div>
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">24/7 Emergency Services</div></li>
                                            <li><div class="wrapper">25% Discount on Non-warranted Parts</div></li>
                                            <li><div class="wrapper">25% Discount on Labour</div></li>
                                            <li><div class="wrapper">No Overtime Premiums</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer><!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->
        
                                <!-- - - - - - - - - - - - - - Pricing Table - - - - - - - - - - - - - - - - -->
                                <div class="pricing-col">
                                    <div class="pricing-table">
                                        <header class="pt-header">
                                            <div class="pt-type">Deluxe</div>
                                            <div class="pt-price">$279</div>
                                            <div class="pt-period">per Year</div>
                                        </header>
                                        <!--/ .pt-header -->
                                        <ul class="custom-list var2 type-1 pt-features-list">
                                            <li><div class="wrapper">Yearly Inspection &amp; Maintenance</div></li>
                                            <li><div class="wrapper">24/7 Emergency Services</div></li>
                                            <li><div class="wrapper">100% Labour on manufacturer&rsquo;s Warranted Parts</div></li>
                                            <li><div class="wrapper">25% discount on non-warranted Parts &amp; Service</div></li>
                                            <li><div class="wrapper">No Overtime Premiums</div></li>
                                            <li><div class="wrapper">Automatic Service Reminders</div></li>
                                            <li><div class="wrapper">50% Anti-corrosion Discount</div></li>
                                        </ul>
                                        <!--/ .features-list -->
                                        <footer class="pt-footer">
                                            <a href="#" class="btn btn-style-5 btn-small">Order Now</a>
                                        </footer><!--/ .pt-footer -->
                                    </div>
                                </div>
                                <!-- - - - - - - - - - - - - - End of Pricing Tables - - - - - - - - - - - - - - - - -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
@endsection