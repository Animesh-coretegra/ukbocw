<?php echo $this->extend('layout/frontend_masterLayout');
echo  $this->section('body-frontend-content'); ?>
<!-- page banner start -->
<div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/page-banner.jpg);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-8">
        <div class="breadcrumb-inner text-center">
          <h2 class="page-title">Blog Clasic</h2>
          <ul class="page-list">
            <li><a href="index.html">Home</a></li>
            <li>Blog Clasic</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- page banner end -->


<!-- Blog Clasic area start -->
<div class="blog-clasic-area py-120">
  <div class="container">
    <div class="row gap-60">
      <div class="col-lg-8">
        <div class="blog-item blog-item--clasic">
          <div class="blog-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/blog/blog-clasic1.jpg" alt="Blog Clasic">
            <div class="post-date">
              <b>13</b>
              <span>dec</span>
            </div>
          </div>
          <div class="blog-item__content">
            <ul class="blog-meta">
              <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
              <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
            </ul>
            <h4><a href="blog-details.html">Katie Stewart Your charity may be net zero </a></h4>
            <p>A Bedfordshire-based charity for older people has announced it will be closing, after the
              Covid-19 pandemic led to a drop in funding and an enduring decline in service users.
              Does this mean getting lots of sleep would have the reverse effect? Would one become the
              best person to ever have lived.</p>
            <a href="blog-details.html" class="read-more">Read More</a>
          </div>
        </div>
        <div class="blog-item blog-item--clasic">
          <div class="blog-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/blog/blog-clasic2.jpg" alt="Blog Clasic">
            <div class="post-date">
              <b>15</b>
              <span>dec</span>
            </div>
          </div>
          <div class="blog-item__content">
            <ul class="blog-meta">
              <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
              <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
            </ul>
            <h4><a href="blog-details.html">Charity to close after 60 years due to pandemic</a></h4>
            <p>A Bedfordshire-based charity for older people has announced it will be closing, after the
              Covid-19 pandemic led to a drop in funding and an enduring decline in service users.
              Does this mean getting lots of sleep would have the reverse effect? Would one become the
              best person to ever have lived.</p>
            <a href="blog-details.html" class="read-more">Read More</a>
          </div>
        </div>
        <div class="blog-item blog-item--clasic">
          <div class="blog-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/blog/blog-clasic3.jpg" alt="Blog Clasic">
            <div class="post-date">
              <b>18</b>
              <span>dec</span>
            </div>
          </div>
          <div class="blog-item__content">
            <ul class="blog-meta">
              <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
              <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
            </ul>
            <h4><a href="blog-details.html">Hedgehogs in charity bags and offensive sculptures</a></h4>
            <p>A Bedfordshire-based charity for older people has announced it will be closing, after the
              Covid-19 pandemic led to a drop in funding and an enduring decline in service users.
              Does this mean getting lots of sleep would have the reverse effect? Would one become the
              best person to ever have lived.</p>
            <a href="blog-details.html" class="read-more">Read More</a>
          </div>
        </div>
        <div class="blog-item blog-item--clasic">
          <div class="blog-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/blog/blog-clasic1.jpg" alt="Blog Clasic">
            <div class="post-date">
              <b>20</b>
              <span>dec</span>
            </div>
          </div>
          <div class="blog-item__content">
            <ul class="blog-meta">
              <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
              <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
            </ul>
            <h4><a href="blog-details.html">Katie Stewart Your charity may be net zero </a></h4>
            <p>A Bedfordshire-based charity for older people has announced it will be closing, after the
              Covid-19 pandemic led to a drop in funding and an enduring decline in service users.
              Does this mean getting lots of sleep would have the reverse effect? Would one become the
              best person to ever have lived.</p>
            <a href="blog-details.html" class="read-more">Read More</a>
          </div>
        </div>
        <div class="pagination">
          <a class="prev page-numbers" href="#"><i class="flaticon-left-chevron"></i></a>
          <a class="page-numbers" href="#">1</a>
          <span class="page-numbers current">2</span>
          <a class="page-numbers" href="#">3</a>
          <a class="page-numbers" href="#">4</a>
          <span class="page-numbers"><i class="fa fa-ellipsis-h"></i></span>
          <a class="next page-numbers" href="#"><i class="flaticon-chevron"></i></a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="main-sidebar rmt-75">
          <div class="widget widget_search">
            <h5 class="widget-title">Search Causes</h5>
            <form class="search-form">
              <div class="form-group">
                <input type="text" placeholder="Search key word" required>
              </div>
              <button class="submit-btn" type="submit"><i class="flaticon-magnifying-glass"></i></button>
            </form>
          </div>
          <div class="widget widget_catagory">
            <h5 class="widget-title">News Categories</h5>
            <ul class="catagory-items">
              <li><a href="blog.html">Foods for homeless Child</a></li>
              <li><a href="blog.html">African People</a></li>
              <li><a href="blog.html">Education all poor child</a></li>
              <li><a href="blog.html">Upcoming news about event</a></li>
              <li><a href="blog.html">Downation for help</a></li>
            </ul>
          </div>
          <div class="widget widget-recent-post">
            <h4 class="widget-title">Recent News</h4>
            <ul>
              <li>
                <div class="media">
                  <div class="media-left">
                    <img src="<?= base_url(); ?>assets/frontend/assets/img/widgets/post1.jpg" alt="Post">
                  </div>
                  <div class="media-body">
                    <h6 class="title"><a href="blog-details.html">Desktop publishing sotware
                        like aldus page</a></h6>
                    <ul class="post-info">
                      <li><i class="flaticon-time"></i> <a href="#">12 Dec, 2022</a></li>
                      <li><i class="fas fa-user"></i> <a href="#">Robert Fox</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li>
                <div class="media">
                  <div class="media-left">
                    <img src="<?= base_url(); ?>assets/frontend/assets/img/widgets/post2.jpg" alt="Post">
                  </div>
                  <div class="media-body">
                    <h6 class="title"><a href="blog-details.html">Desktop publishing sotware
                        like aldus page</a></h6>
                    <ul class="post-info">
                      <li><i class="flaticon-time"></i> <a href="#">12 Dec, 2022</a></li>
                      <li><i class="fas fa-user"></i> <a href="#">Robert Fox</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li>
                <div class="media">
                  <div class="media-left">
                    <img src="<?= base_url(); ?>assets/frontend/assets/img/widgets/post3.jpg" alt="Post">
                  </div>
                  <div class="media-body">
                    <h6 class="title"><a href="blog-details.html">Desktop publishing sotware
                        like aldus page</a></h6>
                    <ul class="post-info">
                      <li><i class="flaticon-time"></i> <a href="#">12 Dec, 2022</a></li>
                      <li><i class="fas fa-user"></i> <a href="#">Robert Fox</a></li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="widget widget_tag_cloud">
            <h5 class="widget-title">Tags</h5>
            <div class="tagcloud">
              <a href="#">Charity</a>
              <a href="#">African people</a>
              <a href="#">Community</a>
              <a href="#">Food</a>
              <a href="#">Clean Water</a>
              <a href="#">Education</a>
              <a href="#">Health</a>
              <a href="#">Volunteers</a>
              <a href="#">Homeless child</a>
            </div>
          </div>
          <div class="widget widget_cta">
            <div class="cta-widget-inner" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/widgets/cta-bg.jpg);">
              <h5>We have provided financial help to 5 million people</h5>
              <a class="btn ml-5" href="donate.html">Donate Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog Clasic area end -->
<?= $this->endSection(); ?>