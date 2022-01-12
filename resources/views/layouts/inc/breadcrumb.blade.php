<ul class="breadcrumbs mt-5 px-0">
    <?php $segments = ''; $allSegments= Request::segments(); $numSegments = count($allSegments); ?>
    @for ($i = 0; $i < $numSegments; $i++)
    <?php
          $segment = $allSegments[$i];
          $segments .= '/'.$segment; 
          
          ?>
        <li class="breadcrumbs-item"> / 
            @if ($i==$numSegments-1)
            <a class="fw-bolder active" > {{$segment}}</a>
            @else
            <a class="fw-bold" href="{{ $segments }}"> {{$segment}}</a>                    
            @endif
        </li>
        @endfor
        
</ul>