<section class="topics-detail-section section-padding" id="topics-detail">
    <div class="container">
        <div class="row">
            @foreach ($topics as $topic)
                <div class="col-lg-8 col-12 m-auto">
                    <h3 class="mb-4">{{ Str::limit($topic['title'], 20, '.....') }}</h3>

                    <p>{{ ($topic['content']) }}.</p>
//, 20, '.....'
//Str::limit
                    <p><strong>There are so many ways to make money online</strong>. Below are several platforms you can
                        use
                        to find success. Keep in mind that there is no one path everyone can take. If that were the
                        case,
                        everyone would have a million dollars.</p>


                    <p>So how can you stand out, do something unique and interesting, build an online business, and get
                        paid
                        enough to change life. Please visit TemplateMo website to download free website templates.</p>

                    <p><strong>There are so many ways to make money online</strong>. Below are several platforms you can
                        use
                        to find success. Keep in mind that there is no one path everyone can take. If that were the
                        case,
                        everyone would have a million dollars.</p>

                    <p>Most people start with freelancing skills they already have as a side hustle to build up income.
                        This
                        extra cash can be used for a vacation, to boost up savings, investing, build business.</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
