
<section class="home-section home-full-height" id="home">
   <div class="hero-slider">
      <ul class="slides">
         @foreach(\App\Entity\SubPost::showSubPost('slider', 10) as $id => $slide)
         <li class="bg-dark-30 restaurant-page-header bg-dark" style="background-image:url( {{ isset($slide['image']) ? $slide['image'] : '' }});">
            <div class="titan-caption">
               <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-1"> {{ isset($slide['title']) ? $slide['title'] : '' }}</div>
                  <div class="font-alt mb-40 titan-title-size-4">{{ isset($slide['description']) ? $slide['description'] : '' }}</div>
                  <a class="section-scroll btn btn-border-w btn-round" href="#menu">{{ isset($slide['tieu-de-button']) ? $slide['tieu-de-button'] : '' }}</a>
               </div>
            </div>
         </li>
         @endforeach
      </ul>
   </div>
</section>
