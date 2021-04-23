<hr class="_hrdgr">

        <div class="">
            <div class="">
              <h4 class="_owlhd">Other Compound</h4>
            </div>
            <div class="card-body _owlcb">
              <div class="owl-carousel owl-theme" id="users-carousel">


                @foreach ($posts as $post)
                    <div>
                        <article class="article article-style-b">
                            <a href="{{ $post->slug }}">
                                <div class="article-header">
                                <div class="article-image" data-background="{{ url('') }}{{ $post->image_thumb }}">
                                    <img class="lazy" data-src="{{ url('') }}{{ $post->image_thumb }}" style="height: 100%" alt="{{ $post->title }}">
                                </div>
                                <div class="article-badge">
                                    {{-- <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div> --}}
                                </div>
                                </div>
                                <div class="article-details">
                                <div class="article-title">
                                    <h2 style="font-size: 14px;font-weight: 500 !important;">{{ $post->title }}</h2>
                                    <p style="font-size: 12px;     margin-top: -15px;">IDR {{ $post->adult_price }} /Person</p>
                                </div>

                                </div>
                            </a>
                        </article>
                    </div>
                @endforeach



                </div>
              </div>
            </div>
          </div>
        </div>
