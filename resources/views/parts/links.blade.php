
@foreach($site_links as $link)
    <li class='nav-item  rounded-top bg-dark text-light mr-1 p-1'>
        <a href="{{$link['href']}}">{{$link['name']}}</a>
    </li>
@endforeach
    
