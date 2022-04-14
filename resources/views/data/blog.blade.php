@if($items->count() != 0)
    @foreach($items as $r)
        <li class="col-md-6 blog-post clearfix">
            <div class="post-media">
                <a href="{{$r->route()}}" class="post-img">
                    <img src="{{$r->img()}}" alt="{{$r->name()}}">
                </a>
            </div><!-- .post-media end -->

            <div class="post-date">
                <p class="day">{{$r->date('d')}}</p>
                <p class="month">{{$r->date('M')}}</p>
            </div><!-- .post-date end -->

            <div class="post-body">
                <a href="{{$r->route()}}">
                    <h3>{{$r->name()}}</h3>
                </a>
                <p>
                    {{$r->tags()}}
                </p>

                <a href="{{$r->route()}}" class="read-more">
                                    <span>
                                        {{lang_name('Read_More')}}
                                        <i class="fa fa-chevron-right"></i>
                                    </span>
                </a>
            </div><!-- .post-body end -->
        </li>
    @endforeach
@else
    <li class="pagination clearfix">
        {{$lang->Empty}}
    </li>
@endif


<div class="col-md-12 col-xs-12 col-sm-12 text-center ">
    {{$items->render()}}
</div>
