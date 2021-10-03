<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <span><img src="{{ asset('uploads/'.general('logo')) }}" width="300" height="200" alt=""></span>
                {!! general('dec') !!}
            </div>
            <div class="col">
                <h2>links</h2>
                <div class="col">
                    <ul class="list-unstyled">
                        <li>about</li>
                        <li>price</li>
                        <li>privacy</li>
                        <li>blog</li>

                    </ul>
                </div>
            </div>

            <div class="col">
                <h2>contact us</h2>
                <p class="address"> {!! general('palestine') !!}</p>
                <p class="phone">phone :  <a href="tel:{!! general('phone') !!}">{!! general('phone') !!}</a></p>
                <p class="email">email <a href = "{!! general('email') !!}">{!! general('email') !!}</a></p>
            </div>

        </div>
    </div>
</div>
