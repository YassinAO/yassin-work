<section id="services">
<div class="container">
    <div class="title-block" data-aos="fade-up">
        <div class="section-title">
            <h2 class="white">Services</h2>
        </div>
    </div>

    <div class="services-container whitespace">

        @foreach($services->take(4) as $service)
        <div class="services-block" data-aos="fade-up">
            <div class="icon"><i class="{{$service->icon}}"></i></div>
            <div class="content">
                <h3>{{$service->title}}</h3>
                <p>{{$service->description}}</p>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
</section>