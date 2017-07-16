<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<amp-carousel id="home-slider" width="auto" height="675" layout="fixed-height" type="slides" loop>
    <div class="carousel-item">
        <div class="container">
            <div class="caption">
                <h2>An Impactful Investment</h2>
                <p>A profitable investment, as well as an impact on society and the environment</p>
            </div>
        </div>
        <amp-img srcset="https://igrow.asia/api/public/images/home/banner_mobile.jpg 1000w,
                         https://igrow.asia/api/public/images/home/banner-2-white-masking.jpg 1620w,
                         https://igrow.asia/api/public/images/home/banner-2-white-masking-hd.jpg 2200w" width="auto" height="650" layout="fixed-height" alt="a sample image"></amp-img>
    </div>
    <div class="carousel-item">
        <div class="container">
            <div class="caption">
                <h2>Everyone Can Plant</h2>
                <p>iGrow provides everything from planting, supervising, harvesting, selling the crops until you get the profit sharing</p>
            </div>
        </div>
        <amp-img srcset="https://igrow.asia/api/public/images/home/banner_mobile_01.jpg 1000w,
                     https://igrow.asia/api/public/images/home/banner_home_01.jpg 1620w,
                     https://igrow.asia/api/public/images/home/banner_home_01-hd.jpg 2200w" width="auto" height="650" layout="fixed-height" alt="a sample image"></amp-img>
    </div>
    <div class="carousel-item">
        <div class="container">
            <div class="caption white align-center">
                <amp-img width="150" height="150" class="wide-40" src="https://igrow.asia/api/public/images/home/igrow-world.png"></amp-img>
                <br><br>
                <a target="_blank" href="http://bit.ly/2cMHiM3">
                    <amp-img width="150" height="50" src="https://igrow.asia/api/public/images/home/buttons/logo-android.png"></amp-img>
                </a>
                &nbsp; 
                <a target="_blank" href="http://apple.co/2cMGXch">
                    <amp-img width="150" height="50" src="https://igrow.asia/api/public/images/home/buttons/logo-iphone.png"></amp-img>
                </a>
            </div>
        </div>

        <amp-img srcset="https://igrow.asia/api/public/images/home/banner_mobile_03.jpg 1000w,
                         https://igrow.asia/api/public/images/home/banner-4.jpg 1620w,
                         https://igrow.asia/api/public/images/home/banner-4-hd.jpg 2200w" width="auto" height="650" layout="fixed-height" alt="a sample image"></amp-img>   
    </div>
</amp-carousel>

<section>
    <h1 class="align-center">Why Join Us?</h1>
    <div class="container">
        <div class="row align-center">
            <div class="col-md-3">
                <amp-img  width="200" height="200" layout="responsive" src="<?=REALPATH.ASSETS_DIR;?>/images/early-invest-logo.png"></amp-img>
                <h2><a>We Invest Early</a></h2>
                <p>Investors could benefit from revenue sharing between 13-24% of the investments per year</p>
            </div>
            <div class="col-md-3">
                <amp-img  width="200" height="200" layout="responsive" src="<?=REALPATH.ASSETS_DIR;?>/images/fearless-icon.png"></amp-img>
                <h2><a>Fearless but Educated Investments</a></h2>
                <p>Farmers can have a job and optimizing land thereby increasing revenue</p>
            </div>
            <div class="col-md-3">
                <amp-img  width="200" height="200" layout="responsive" src="<?=REALPATH.ASSETS_DIR;?>/images/xperience-icon.png"></amp-img>
                <h2><a>More Than 30 Years Experience</a></h2>
                <p>Communities feel the impact of greening and increased food production</p>
            </div>
            <div class="col-md-3">
                <amp-img  width="200" height="200" layout="responsive" src="<?=REALPATH.ASSETS_DIR;?>/images/leaders-icon.png"></amp-img>
                <h2><a>Leaders in Startup Investments</a></h2>
                <p>The investors participate in planting to increase domestic food production, creating farmers jobs, and greening of idle agricultural lands, in the same time!</p>
            </div>
        </div>
    </div>
</section>

<!-- <section class="bg-grey">
    <h1 class="align-center">What We Do?</h1>
    <div class="container">
        <amp-list width="auto" height="800" layout="flex-item" src="https://igrow.asia/api/public/en/v1/sponsor/seed/list">
            <template type="amp-mustache" id="seed-list">
                <article class="col-md-3 col-sm-4 isotopeItem webdesign">
                    
                    <amp-img width="120" height="120" class="sold-out" src="https://igrow.asia/asset/img/icon/coming-soon.png"></amp-img>
            
                
                    <div class="portfolio-item">
                        <div>
                            <amp-img width="270" height="270" layout="responsive" src="{{image}}" alt="welcome" ></amp-img>
                            <div class="pad-10-15 bg-white align-center">
                                <b class="font-md">{{name}}</b><br>
                                <span>{{price_formatted}}</span><br>
                                <b class="font-sm">Return : {{return}}</b>

                            </div>
                        </div>

                        <div class="portfolio-desc align-center">
                            <div class="folio-info">

                                <h3><a>{{name}}</a></h3>

                                <a href="{{url}}" class="btn btn-success">
                                    Invest Now                  </a>

                                </div>                                         
                        </div>

                    </div>
                </article>
            </template>     
        </amp-list>
    </div>
</section> -->

<section>
    <h1 class="align-center">Current Stats</h1>
    <div class="container"> 
        <div class="row">
            <div class="col-md-4 align-center">
                <amp-img width="150" height="150" src="https://igrow.asia/api/public/images/home/ic_bibit.png"></amp-img>
                <br>
                <h2>1,247 Hectares<br>Lands</h2>
            </div>
            <div class="col-md-4 align-center" >
                <amp-img width="150" height="150" src="https://igrow.asia/api/public/images/home/img_lahan.png"></amp-img>
                <br>
                <h2>3 <br>Projects</h2>
            </div>
            <div class="col-md-4 align-center" >
                <amp-img width="150" height="150" src="https://igrow.asia/api/public/images/home/img_sponsor.png"></amp-img>
                <br>
                <h2>21,562 <br>Members</h2>
            </div>
            <!-- <div class="col-md-5ths align-center" >
                <amp-img width="150" height="150" src="https://igrow.asia/api/public/images/home/img_operator.png"></amp-img>
                <br>
                <h2>2,300<br>Farmers</h2>
            </div> -->
            <!-- <div class="col-md-5ths align-center" >
                <amp-img width="150" height="150" src="https://igrow.asia/api/public/images/home/ic_emisi.png"></amp-img>
                <br>
                <h2>358,877 kg CO<sub>2</sub>Absorbed</h2>
            </div> -->
        </div>  
    </div>
</section>

<!-- <section class="bg-testi text-white">
    <h1 class="align-center">What Do They Say?</h1>
    <amp-carousel id="home-slider" width="auto" height="320" layout="fixed-height" type="slides" loop>
        <div class="carousel-item">
            <div class="container container-small">
                
                <h4><i class='fa fa-quote-left' ></i> The iGrow concept was very useful for connecting among land owners, farmers, and investors for effectuating the agriculture program. Last year, my colleagues and I bought 1 hectare of peanuts for a 6-
month project. We got 12% profit approximately, thanks to God.. <i class='fa fa-quote-right' ></i></h4>
                <br><br>
                <div class="pull-left pad-r-20 pad-b-20">
                    <amp-img width="80" height="80" class="img-round" src="https://igrow.asia/asset/img/testimonials/thumbs/heri.jpg"></amp-img>
                </div>

                <p class="mt-10"><b>Heri Gunawan</b><br>Professional of Multinational Company</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container container-small">
                
                <h4><i class='fa fa-quote-left' ></i> iGrow is suitable for people who do not have land but would like to plant trees like me.  Besides the profit, the other thing that made me happy was the amount of CO2 that could be absorbed. It was so special for me because I felt i was helping other people to breathe easier.. <i class='fa fa-quote-right' ></i></h4>
                <br><br>
                <div class="pull-left pad-r-20 pad-b-20">
                    <amp-img width="80" height="80" class="img-round" src="https://igrow.asia/asset/img/testimonials/thumbs/umi.jpg"></amp-img>
                </div>

                <p class="mt-10"><b>Umi Rohimah</b><br>Housewife</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container container-small">
                
                <h4><i class='fa fa-quote-left' ></i> Apparently after six months, the result of iGrow investment was trusted. I believed that iGrow was managed professionally, was trustworthy and profitable. Keep it moving, iGrow.. <i class='fa fa-quote-right' ></i></h4>
                <br><br>
                <div class="pull-left pad-r-20 pad-b-20">
                    <amp-img width="80" height="80" class="img-round" src="https://igrow.asia/asset/img/testimonials/thumbs/setyo.jpg"></amp-img>
                </div>

                <p class="mt-10"><b>Setyo Utomo</b><br>Kospin Finance Manager</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container container-small">
                
                <h4><i class='fa fa-quote-left' ></i> Differently from certain people who provide words only, iGrow facilitated all. In the future, iGrow could continue to improve and to scale up the service to become a prototype that could answer all of the challenging questions in the present and future.. <i class='fa fa-quote-right' ></i></h4>
                <br><br>
                <div class="pull-left pad-r-20 pad-b-20">
                    <amp-img width="80" height="80" class="img-round" src="https://igrow.asia/asset/img/testimonials/thumbs/rakhmad.jpg"></amp-img>
                </div>

                <p class="mt-10"><b>Rakhmad Mahendra</b><br>Culinary Businessman</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container container-small">
                
                <h4><i class='fa fa-quote-left' ></i> iGrow was like playing a game, but nuts and fruits were edible! This is the solution for urbanites who care for the environment, as well as the farmers.. <i class='fa fa-quote-right' ></i></h4>
                <br><br>
                <div class="pull-left pad-r-20 pad-b-20">
                    <amp-img width="80" height="80" class="img-round" src="https://igrow.asia/asset/img/testimonials/thumbs/asri.jpg"></amp-img>
                </div>

                <p class="mt-10"><b>Nur Asri</b><br>Doctor</p>
            </div>
        </div>
    </amp-carousel>
</section> -->

<!-- <section>
    <div class="container"> 
        <h1 class="align-center">Our Recognition</h1>

        <div class="row">
            <div class="col-md-2 align-center mb-40">
                <a target="_blank" href="http://bit.ly/2nuPwMW">
                    <amp-img width="120" height="50" src="https://igrow.asia/asset/home/img/wsa.png"></amp-img>
                    <br>
                    <h4>Top 2</h4>  
                </a>
            </div>
            <div class="col-md-2 align-center mb-40">
                <a target="_blank" href="https://www.linkedin.com/pulse/review-mobile-money-digital-payments-asia-2015-zehra-j-chudry">
                    <amp-img width="120" height="50" src="https://igrow.asia/asset/home/img/logo_dragonsden-grayscale.png"></amp-img>
                    <br>
                    <h4>1st Winner</h4> 
                </a>
            </div>
            <div class="col-md-2 align-center mb-40">
                <a target="_blank" href="https://www.techinasia.com/igrow-startup-arena-jakarta-2014-startup-asia-jakarta">
                    <amp-img width="150" class="mg-10-0" height="30" src="https://igrow.asia/asset/home/img/techinasia-grayscale.png"></amp-img>
                    <br>
                    <h4>1st Winner</h4> 
                </a>
            </div>
            <div class="col-md-2 align-center mb-40">
                <a target="_blank" href="http://disrupt100.com/#disrupt100">
                    <amp-img width="80" height="50" src="https://igrow.asia/asset/home/img/disrupt.png"></amp-img>
                    <br>
                    <h4>21st Best</h4>  
                </a>
            </div>
            <div class="col-md-2 align-center mb-40">
                <a target="_blank" href="http://bit.ly/28LS1Dz">
                    <amp-img width="100" height="50" src="https://igrow.asia/asset/home/img/ummahwide.png"></amp-img>
                    <br>
                    <h4>5th Best</h4>   
                </a>
            </div>
            <div class="col-md-2 align-center mb-40">
                <a target="_blank" href="http://g-startup.com/g-startup-worldwide-2016-jakarta-winner-announced/">
                    <amp-img width="60" height="50" src="https://igrow.asia/asset/home/img/g-startup.png"></amp-img>
                    <br>
                    <h4>1st Winner</h4> 
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://bit.ly/2h7NoVN">
                    <amp-img width="200" class="mg-10-0" height="30" src="https://igrow.asia/asset/home/img/startupistanbul-grayscale.png"></amp-img>
                    <br>
                    <h4>2nd Winner</h4> 
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://bit.ly/2dDgOfd">
                    <amp-img width="80" height="50" src="https://igrow.asia/asset/home/img/australia-awards.png"></amp-img>
                    <br>
                    <h4>Top 25</h4> 
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://bit.ly/2fOwaes">
                    <amp-img width="150" height="50" src="https://igrow.asia/asset/home/img/aseanimpact.png"></amp-img>
                    <br>
                    <h4>Top 20</h4> 
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://bit.ly/2dwPalM">
                    <amp-img width="80" height="50" src="https://igrow.asia/asset/home/img/innovation.jpg"></amp-img>
                    <br>
                    <h4>Top 5</h4>  
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://bit.ly/2ddprcY">
                    <amp-img width="200" height="50" src="https://igrow.asia/asset/home/img/k-startup.gif"></amp-img>
                    <br>
                    <h4>Top 40</h4> 
                </a>
            </div>
        </div>  

        <h1 class="align-center">Featured In</h1>

        
        <div class="row">
            <div class="col-md-2 mb-40 align-center">
                <a target="_blank" href="http://bit.ly/2fK4QgQ">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/googledev.png"></amp-img>
                </a>
            </div>
            <div class="col-md-2 mb-40 align-center">
                <a target="_blank" href="http://bit.ly/2q1rgPO">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/e27.png"></amp-img>
                </a>
            </div>
            <div class="col-md-2 mb-40 align-center">
                <a target="_blank" href="http://bit.ly/2cRS7XT">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/tedex.png"></amp-img>
                </a>
            </div>
            <div class="col-md-2 mb-40 align-center">
                <a target="_blank" href="http://bit.ly/1XjD7FQ">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/mattermark.png"></amp-img>
                </a>
            </div>
            <div class="col-md-2 mb-40 align-center">
                <a target="_blank" href="http://bit.ly/23Wdrzg">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/bizjournal.png"></amp-img>
                </a>
            </div>
            <div class="col-md-2 mb-40 align-center">
                <a target="_blank" href="http://bit.ly/1XmrrCe">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/snapmunk.png"></amp-img>
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://bit.ly/1OJDCr2">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/fastcoexist.png"></amp-img>
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="https://www.techinasia.com/igrow-startup-arena-jakarta-2014-startup-asia-jakarta">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/techinasia-grayscale.png"></amp-img>
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://500.co/announcing-batch-16/">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/500startup.png"></amp-img>
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://www.forbes.com/sites/federicoguerrini/2015/10/30/indonesian-farmville-for-real-life-startup-igrow-wants-to-go-global/#1ff1fe4ff1c0">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/forbes-grayscale.png"></amp-img>
                </a>
            </div>
            <div class="col-md-5ths align-center">
                <a target="_blank" href="http://techcrunch.com/gallery/our-favorite-companies-from-500startups-16th-demo-day/">
                    <amp-img width="150" height="40" src="https://igrow.asia/asset/home/img/techcrunch-grayscale.png"></amp-img>
                </a>
            </div>
        </div>  
    </div>
</section> -->

    
<div class="container">
    <div id="content">
    </div>
</div> <!-- /container -->

<!-- <div class="bg-grey pad-40-0 align-center">
    <div class="container">
        <h4>Payment Method</h4><br>
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/1.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/2.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/3.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/4.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/5.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/6.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/7.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/8.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/9.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/10.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/11.png"></amp-img> &nbsp; 
        <amp-img height="45" width="80" src="https://igrow.asia/api/public/images/payment/12.png"></amp-img> &nbsp; 
    </div>
</div> -->