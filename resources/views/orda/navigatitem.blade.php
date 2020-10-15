<ul class="menu">
  @foreach($items as $item)

    <li>
        <a style="color:{{
            URL::current() == UrlReplace::get($item->url()) ||
                URL::current()  == strpos(URL::current(), UrlReplace::get($item->url()).'-item')
            ? '#B77F04' : ''}}"
            href="{{ UrlReplace::get($item->url())}}">
          {{$item->title}}
        </a>
        @if($item->hasChildren())
          <ul class="children__block">
            @foreach($item->children() as $k=>$child)
              <li>
                <a href="{{UrlReplace::get($child->url())}}">
                  {{$child->title}}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
    </li>

  @endforeach
</ul>