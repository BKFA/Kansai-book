<aside class="col-md-3 blog-sidebar">
    <div class="p-3 mb-3 rounded alert rounded box-shadow" style="background: #f7f0e6 !important; font-size: 14px; margin-top: 10px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Kansaibook</strong> la mot website ho tro hoc tieng nhat so mot Viet Nam!!!
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Hot Post</h6>
        <ol class="hot-post">
            @foreach($topPost as $tp)
                <li><a href="#">{{ $tp->title }}</a></li>
            @endforeach
        </ol>
    </div>
    
    <div class="p-3 bg-white rounded box-shadow">
        <h4 class="border-bottom border-gray pb-2 mb-0">Tag</h4>
        <ul class="footer_labels">
            <li><a class="btn btn-outline-secondary btn-sm" href="#">PHP</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">MySQL</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">Laravel</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">MongoDB</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">NodeJS</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">ASP.NET MVC</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">VueJS</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">NoSQL</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">Java</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">C / C++</a></li>
            <li><a class="btn btn-outline-secondary btn-sm" href="#">PyThon</a></li>
        </ul>
    </div>
</aside>