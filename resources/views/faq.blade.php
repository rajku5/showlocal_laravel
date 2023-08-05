@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>faq</h2>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">faq</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="faq-section section-big-py-space b-g-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingone">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone"  >
                How can I downgrade to an earlier version of Dummy Content?
              </button>
            </h2>
            <div id="collapseone" class="accordion-collapse collapse show" aria-labelledby="headingone" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingtwo">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo"  >
                How can I upgrade from Shopify 2.5 to shopify 3?
              </button>
            </h2>
            <div id="collapsetwo" class="accordion-collapse collapse " aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures</p>
              </div>
            </div>
          </div>   
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingthree">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree"  >
                How can I downgrade to an earlier version of Dummy Content?
              </button>
            </h2>
            <div id="collapsethree" class="accordion-collapse collapse " aria-labelledby="headingthree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures</p>
              </div>
            </div>
          </div>     
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingfour">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour"  >
                Under what license are Regular Labs extensions released?
              </button>
            </h2>
            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingfive">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive"  >
                What is the Regular Labs Library?
              </button>
            </h2>
            <div id="collapsefive" class="accordion-collapse collapse " aria-labelledby="headingfive" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures</p>
              </div>
            </div>
          </div>   
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingsix">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" >
                Can I turn on/off some blocks on the page?
              </button>
            </h2>
            <div id="collapsesix" class="accordion-collapse collapse " aria-labelledby="headingsix" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures</p>
              </div>
            </div>
          </div>  
        </div>      
      </div>
    </div>
  </div>
</section>
<!-- section end -->
@endSection