<section id="projects">
<div class="container">
    <div class="title-block" data-aos="fade-up">
        <div class="section-title">
            <h2>My Cases</h2>
        </div>
    </div>

    <div class="cases-container whitespace">

        @php $counter = 1; @endphp

        @foreach($projects->take(4) as $project)
            @if($counter % 3 == 0)
                <div class="divider-container whitespace" data-aos="fade-up">
                    <div class="divider-block">
                        <div class="divider-layer">
                            <h3>Work with <span class="typer changing" id="first-typer" data-colors="2C83D1" data-words="Passion,Integrity,Goals" data-delay="100" data-deleteDelay="1000"></span>
                            <span class="cursor" data-owner="first-typer"></span>
                            </h3>
                        </div>
                    </div>
                </div>
            @endif

            <div class="cases-block big-case" data-aos="fade-up">
                <div class="cases-thumb">
                    <a href="/projects/{{$project->id}}"><figure><img src="/storage/cover_images/projects/{{$project->cover_image}}" alt="" width="100%"></figure></a>
                    <a href="cases" class="view-btn nav-link"><span>View case</span></a>
                </div>
                <div class="cases-desc">
                    <h5>{{$project->title}}</h5>
                    <span>{{$project->description}}</span>
                </div>
            </div>


            @php $counter++; @endphp
        @endforeach



    </div>
</div>
</section>
    