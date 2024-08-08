@extends('layouts.site')

@section('content')
    
  <section class="slider">
      <div class="container">
          <div class="row">
              <div class="col-lg-9 col-md-10">
                  <div class="block">
                      <span class="d-block mb-3 text-white text-capitalize">Welcome to Ansev</span>
                      <h1 class="animated fadeInUp mb-5">where imagination  <br>meets <br> inspiration! </h1>
                      <a href="{{route('post.create')}}"  class="btn btn-main animated fadeInUp btn-round-full" aria-label="Get started">Get started<i class="btn-icon fa fa-angle-right ml-2"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Section Intro Start -->
  
  <section class="section intro">
      <div class="container">
          <div class="row ">
              <div class="col-lg-8">
                  <div class="section-title">
                      <span class="h6 text-color ">We are creative & expert people</span>
                      <h2 class="mt-3 content-title">We work with bloggers to provide solutions for their content and growth
                      </h2>
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 col-12">
                  <div class="intro-item mb-5 mb-lg-0">
                      <i class="ti-desktop color-one"></i>
                      <h4 class="mt-4 mb-3">Modern & Responsive design</h4>
                      <p>Design beautiful, responsive blog layouts that captivate your audience and enhance readability. Our designs ensure your content shines on any device.</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="intro-item mb-5 mb-lg-0">
                      <i class="ti-medall color-one"></i>
                      <h4 class="mt-4 mb-3">Award-Winning Expertise</h4>
                      <p>Leverage the experience and insights of an award-winning team. We’ve been recognized for our exceptional work in the blogging and content creation industry.</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-12">
                  <div class="intro-item">
                      <i class="ti-layers-alt color-one"></i>
                      <h4 class="mt-4 mb-3">Professional Blogging Services</h4>
                      <p>From SEO optimization to engaging content creation, we provide comprehensive services to elevate your blog. Build your online presence with expert support and grow your readership professionally.</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  <!-- Section Intro END -->
  <!-- Section About Start -->
  
  <section class="section about position-relative">
      <div class="bg-about"></div>
      <div class="container">
          <div class="row">
              <div class="col-lg-6 offset-lg-6 offset-md-0">
                  <div class="about-item ">
                      <span class="h6 text-color">What we are</span>
                      <h2 class="mt-3 mb-4 position-relative content-title">We are dynamic team of creative people</h2>
                      <div class="about-content">
                          <h4 class="mb-3 position-relative">We are Perfect Solution</h4>
                          <p class="mb-5">We provide comprehensive support in the world of blogging, helping writers and content creators reach their highest potential. From content strategy to SEO optimization, we streamline your blogging journey, making it easier and more effective.</p>
  
                          <a href="{{route('post.create')}}" class="btn btn-main btn-round-full">Get started</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  <!-- Section About End -->
  <!-- section Counter Start -->
  <section class="section counter">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="counter-item text-center mb-5 mb-lg-0">
                      <h3 class="mb-0"><span class="counter-stat font-weight-bold">1730</span> +</h3>
                      <p class="text-muted">Project Done</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="counter-item text-center mb-5 mb-lg-0">
                      <h3 class="mb-0"><span class="counter-stat font-weight-bold">125 </span>M </h3>
                      <p class="text-muted">User Worldwide</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="counter-item text-center mb-5 mb-lg-0">
                      <h3 class="mb-0"><span class="counter-stat font-weight-bold">39</span></h3>
                      <p class="text-muted">Availble Country</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="counter-item text-center">
                      <h3 class="mb-0"><span class="counter-stat font-weight-bold">14</span></h3>
                      <p class="text-muted">Award Winner </p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- section Counter End  -->
  <!--  Section Services Start -->
  <section class="section service border-top">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-7 text-center">
                  <div class="section-title">
                      <span class="h6 text-color">Our Services</span>
                      <h2 class="mt-3 content-title ">We provide a wide range of creative services </h2>
                  </div>
              </div>
          </div>
  
          <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="service-item mb-5">
                      <i class="ti-desktop"></i>
                      <h4 class="mb-3">Content Creation</h4>
                      <p>We offer high-quality, engaging content tailored to your audience. Our team of experienced writers can help you create blog posts, articles, and other written materials that resonate with your readers and keep them coming back for more.</p>
                  </div>
              </div>
  
              <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="service-item mb-5">
                      <i class="ti-layers"></i>
                      <h4 class="mb-3">SEO Optimization</h4>
                      <p>Improve your blog's visibility on search engines with our SEO services. We use the latest techniques and strategies to ensure your content ranks higher and attracts more organic traffic.</p>
                  </div>
              </div>
  
              <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="service-item mb-5">
                      <i class="ti-bar-chart"></i>
                      <h4 class="mb-3">Social Media Management</h4>
                      <p>Expand your reach and engage with your audience on social media platforms. We manage your social media accounts, create engaging posts, and interact with your followers to build a strong online presence.</p>
                  </div>
              </div>
  
              <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="service-item mb-5 mb-lg-0">
                      <i class="ti-vector"></i>
                      <h4 class="mb-3">Graphic Design</h4>
                      <p>Make your blog visually appealing with our graphic design services. From custom graphics and infographics to blog headers and social media images, we create visually stunning content that captures attention.</p>
                  </div>
              </div>
  
              <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="service-item mb-5 mb-lg-0">
                      <i class="ti-android"></i>
                      <h4 class="mb-3">Content Strategy</h4>
                      <p>Develop a comprehensive content strategy that aligns with your goals. We help you plan your content calendar, brainstorm topics, and create a cohesive strategy to grow your blog and engage your audience.</p>
                  </div>
              </div>
  
              <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="service-item mb-5 mb-lg-0">
                      <i class="ti-pencil-alt"></i>
                      <h4 class="mb-3">Analytics and Reporting</h4>
                      <p>Track your blog's performance with our analytics and reporting services. We provide detailed reports on your blog's traffic, audience engagement, and other key metrics to help you make informed decisions.</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--  Section Services End -->
  
  <!-- Section Cta Start -->
  <section class="section cta">
      <div class="container">
          <div class="row">
              <div class="col-xl-5 col-lg-6">
                  <div class="cta-item  bg-white p-5 rounded">
                      <span class="h6 text-color">We create for you</span>
                      <h2 class="mt-2 mb-4">Entrust Your Project to Our Best Team of Professionals</h2>
                      <p class="lead mb-4">Have any project on mind? For immidiate support :</p>
                      <h3><i class="ti-mobile mr-3 text-color"></i>+23 876 65 455</h3>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--  Section Cta End-->
  <!-- Section Testimonial Start -->
  <section class="section testimonial">
      <div class="container">
          <div class="row">
              <div class="col-lg-7 ">
                  <div class="section-title">
                      <span class="h6 text-color">Clients testimonial</span>
                      <h2 class="mt-3 content-title">Check what's our clients say about us</h2>
                  </div>
              </div>
          </div>
      </div>
  
      <div class="container">
          <div class="row testimonial-wrap">
              <div class="testimonial-item position-relative">
                  <i class="ti-quote-left text-color"></i>
  
                  <div class="testimonial-item-content">
                      <p class="testimonial-text">Quam maiores perspiciatis temporibus odio reiciendis error alias debitis atque
                          consequuntur natus iusto recusandae numquam corrupti facilis blanditiis.</p>
  
                      <div class="testimonial-author">
                          <h5 class="mb-0 text-capitalize">Thomas Johnson</h5>
                          <p>Excutive Director,themefisher</p>
                      </div>
                  </div>
              </div>
              <div class="testimonial-item position-relative">
                  <i class="ti-quote-left text-color"></i>
  
                  <div class="testimonial-item-content">
                      <p class="testimonial-text">Consectetur adipisicing elit. Quam maiores perspiciatis temporibus odio reiciendis
                          error alias debitis atque consequuntur natus iusto recusandae .</p>
  
                      <div class="testimonial-author">
                          <h5 class="mb-0 text-capitalize">Mickel hussy</h5>
                          <p>Excutive Director,themefisher</p>
                      </div>
                  </div>
              </div>
              <div class="testimonial-item position-relative">
                  <i class="ti-quote-left text-color"></i>
  
                  <div class="testimonial-item-content">
                      <p class="testimonial-text">Quam maiores perspiciatis temporibus odio reiciendis error alias debitis atque
                          consequuntur natus iusto recusandae numquam corrupti.</p>
  
                      <div class="testimonial-author">
                          <h5 class="mb-0 text-capitalize">James Watson</h5>
                          <p>Excutive Director,themefisher</p>
                      </div>
                  </div>
              </div>
              <div class="testimonial-item position-relative">
                  <i class="ti-quote-left text-color"></i>
  
                  <div class="testimonial-item-content">
                      <p class="testimonial-text">Consectetur adipisicing elit. Quam maiores perspiciatis temporibus odio reiciendis
                          error alias debitis atque consequuntur natus iusto recusandae .</p>
  
                      <div class="testimonial-author">
                          <h5 class="mb-0 text-capitalize">Mickel hussy</h5>
                          <p>Excutive Director,themefisher</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Section Testimonial End -->
  <section class="section latest-blog bg-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                @if (count($latestPosts) > 0)
                <div class="section-title">
                    <span class="h6 text-color">Latest Blog</span>
                    <h2 class="mt-3 content-title text-white">Latest Blogs to enrich knowledge</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($latestPosts as $latestPost)
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card bg-transparent border-0">
                    <img loading="lazy" src="{{$latestPost->gallery->image}}" style="height: 15rem" alt="blog" class="img-fluid rounded">
                    <div class="card-body mt-2">
                       

                        <h3 class="mt-3 mb-5 lh-36"><a href="{{route('singleblog', $latestPost->id)}}" class="text-white">{{Str::limit($latestPost->title,20)}}</a></h3>

                        <a href="{{route('singleblog', $latestPost->id)}}" class="btn btn-small btn-solid-border btn-round-full text-white">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
                @endif
    </div>
</section>

  
  <section class="mt-70 position-relative">
      <div class="container">
          <div class="cta-block-2 bg-gray p-5 rounded border-1">
              <div class="row justify-content-center align-items-center ">
                  <div class="col-lg-7">
                      <span class="text-color">For Every type business</span>
                      <h2 class="mt-2 mb-4 mb-lg-0">Entrust Your Project to Our Best Team of Professionals</h2>
                  </div>
                  <div class="col-lg-4">
                      <a href="#" class="btn btn-main btn-round-full float-lg-right ">Contact Us</a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  @endsection
