<div class="timeline-container whitespace">
    <div class="timeline-block">

        <div class="timeline">
            <ul>
                @foreach($careers as $career)
                <li>
                    <div class="content" data-aos="fade-up">
                        <img src="/storage/cover_images/careers/{{$career->cover_image}}" alt="" width="100%">
                        <div class="description">
                            <h3>{{$career->title}}</h3>
                            <p>{{$career->description}}</p>
                        </div>
                    </div>
                    <div class="time">
                        <h4>January 2019</h4>
                    </div>
                </li>
                @endforeach
            </ul>
            <div style="clear: both;"></div>
        </div>

    </div>
</div>

