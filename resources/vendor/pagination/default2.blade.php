@if ($paginator->hasPages())
	

<div class="bottom-nav">
        @foreach ($elements as $element)
                @foreach ($element as $page => $url)
				
				  @if ($page == $paginator->currentPage())
					  <a href="#" class="nav-number-a">
                       <div class="nav-number nav-number-active">
					     {{$page}}
                      </div>
                      </a>
		         @else
                      <a href="{{ $url }}" class="nav-number-a">
                       <div class="nav-number">
                          {{$page}}

                       </div>
                      </a>
		  
                    @endif
					
                @endforeach

       @endforeach
          
        </div>
		
@endif