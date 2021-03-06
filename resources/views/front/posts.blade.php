
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ general('title') }}</title>
    <link rel="shortcut icon" href="{{asset('uploads/'.general('logo'))}}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.min.js"
        integrity="sha512-JxJpoAvmomz0MbIgw9mx+zZJLEvC6hIgQ6NcpFhVmbK1Uh5WynnRTTSGv3BTZMNBpPbocmdSJfldgV5lVnPtIw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet"
        href="{{ asset('new_style/icons/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0-web/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('new_style/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('new_style/jquery-nice-select-1.1.0/jquery-nice-select-1.1.0/css/nice-select.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="{{ asset('new_style/css/style2.css') }}">
    <script src="{{ asset('new_style/js/jquery.min.js') }}"></script>
    <script src="{{ asset('new_style/js/popper.js') }}"></script>
    <script src="{{ asset('new_style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('new_style/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('new_style/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('new_style/jquery-nice-select-1.1.0/jquery-nice-select-1.1.0/js/jquery.nice-select.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#">{{ general('title') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">posts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">featured posts</a>
                    </li>


                </ul>


                <li class="nav-item dropdown d-flex align-items-center">
                    <img src="images/user.png" class="" style="width: 30px;height: 30px; background-color: #d8d8d8; border-radius: 50%;;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        mohamed ali
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.html">Profile</a>
                        <a class="dropdown-item" href="#">logOut</a>
                    </div>
                </li>
            </div>
        </div>
    </nav>

    <div class="container">
        <form class="form-inline search my-2 my-lg-0"> 
            @csrf
            <select id="ads_info" name="ads_info" class="select rounded-0 s-select">
                    <option data-display="Ads info">Ads info</option>
                    <option value="title">Ads title</option>
                    <option value="page_name">Advertiser</option>
                    <option value="landanig_page">Landing page</option>    
            </select>
            <input class="form-control mr-sm-2 rounded-0 search-input" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0 rounded-0 search-btn" type="button">Search</button>
        </form>

    </div>
    <div class="container">
        <div class="panel rounded table-responsive-sm">

            <div class="row">
                <form class="">

                    <div class="block-1 ">
                        <h3 class="title">basic:</h3>


                        <select class="select">
                            <option data-display="Networks">Networks</option>
                            <option value="Facebook" selected>Facebook</option>
                        </select>
                        <select class="country" name="country">
                            <option data-display="country">country</option>

                        </select>

                        <div  class="content countries rounded unc_path">
                            <h3 class="border-bottom text-left">country</h3>
                            <div class="row1">
                                <span class="d-block text-primary">All country</span>
                                <span>Algeria</span>
                                <span>Angola</span>
                                <span>Argentina</span>
                                <span>Austria</span>
                                <span>Azerbaijan</span>
                                <span>Bahrain</span>
                                <span>Belgium</span>
                                <span>Brazil</span>
                                <span>Canada</span>
                                <span>Chile</span>
                                <span>Colombia</span>
                                <span>Egypt</span>
                                <span>Emirates</span>
                                <span>Europe</span>
                                <span>France</span>
                                <span>Germany</span>
                                <span>Greece</span>
                                <span>HK/MO/TW</span>
                                <span>Hong Kong</span>
                                <span>India</span>
                                <span>Indonesia</span>
                                <span>Ireland</span>
                                <span>Israel</span>
                                <span>Italy</span>



                            </div>

                            <div class="row1">
                                <span>Japan</span>
                                <span>Japan Korea</span>
                                <span>Kenya</span>
                                <span>Korea</span>
                                <span>Kuwait</span>
                                <span>Lebanon</span>
                                <span>Luxembourg</span>
                                <span>Macau</span>
                                <span>Malaysia</span>
                                <span>Mexico</span>
                                <span>Middle East</span>
                                <span>Netherlands</span>
                                <span>New Zealand</span>
                                <span>Nigeria</span>
                                <span>North America</span>
                                <span>Norway</span>
                                <span>Oceania</span>
                                <span>Oman</span>
                                <span>Pakistan</span>
                                <span>Panama</span>
                                <span>Paraguay</span>
                                <span>Peru</span>
                                <span>Philippines</span>
                                <span>Poland</span>
                                <span>Portugal</span>

                            </div>



                            <div class="row1">
                                <span>Qatar</span>
                                <span>Romania</span>
                                <span>Russia</span>
                                <span>Saudi Arabia</span>
                                <span>Singapore</span>
                                <span>South Africa</span>
                                <span>South America</span>
                                <span>Southeast Asia</span>
                                <span>Southern Asia</span>
                                <span>Spain</span>
                                <span>Sweden</span>
                                <span>Switzerland</span>
                                <span>Thailand</span>
                                <span>Turkey</span>
                                <span>Ukraine</span>
                                <span>United Kingdom</span>
                                <span>United States</span>
                                <span>Venezuela</span>
                                <span>Vietnam</span>

                            </div>

                            <div class="text-center border-top pt-2">
                                <button class="btn btn-primary">ok</button>
                                <button class="btn btn-light cancel">cancel</button>
                            </div>
                        </div>


                   
                        <select id="post_type">
                            <option disabled   data-display="Post type">Post type</option>
                            <option value="all" selected>ALL</option>
                            <option value="video">Video</option>
                            <option value="image">Image</option>

                        </select>
                        @php
                               $cat = App\Post::get();
        $array = [];
        foreach($cat as $post){
            $cats = explode(',',$post->category);
            foreach($cats as $pot){
                array_push($array,$pot);
            }
        }
        $category = collect($array)->unique();
                        @endphp
                        <select id="category">
                            <option data-display="Category">Category</option>
                            <option value="All">All</option>
                      @foreach ($category as $item)
                      <option value="{{ $item }}">{{ $item }}</option>

                      @endforeach

                        </select>



                    </div>





                    <div class="block-1">

                        <h3 class="title">Advanced:</h3>

                        <select class="lang">
                            <option data-display="Language">Language</option>
                        </select>

                        <div class="langs content">
                            <div class="row1">
                                <span id="en">English</span>
                                <span id="ja">Japanese</span>
                                <span id="ko">Korean</span>
                                <span id="ar">Arabic</span>
                                <span id="zh">Chinese (Traditi...)</span>
                                <span id="th">Thai</span>
                                <span id="pl">Polish</span>


                            </div>

                            <div class="row1">
                                <span id="de">German</span>
                                <span id="es">Spanish</span>
                                <span id="fr">French</span>
                                <span id="hi">Hindi</span>
                                <span id="it">Italian</span>
                                <span id="ms">Malay</span>
                                <span id="nl">Dutch</span>
                                <span id="tr">Turkish</span>

                            </div>

                            <div class="row1">
                                <span id="pt">Portuguese</span>
                                <span id="ru">Russian</span>
                                <span id="vi">Vietnamese</span>
                                <span id="id">Indonesian</span>
                                <span id="he">Hebrew</span>
                                <span id="fil">Filipino</span>
                                <span id="no">Norwegian</span>
                            </div>


                           

                      


                            {{-- <div class="text-center border-top pt-2">
                                <input class="btn btn-primary ok" value="ok" type="button">
                                <button class="btn btn-primary ok">ok</button>
                                <button class="btn btn-light cancel">cancel</button>
                            </div> --}}

                        </div>



                        <select class="Engagement">
                            <option data-display="Engagement">Engagement</option>
                        </select>

                        <div class="Engagements content">
                            <div class="row1" id="like">
                                <span>like:</span>
                                <span>1~100</span>
                                <span>101~1000</span>
                                <span>>1000</span>
                        
                                <input type="number" class="min form-control d-inline-block" style="width: 80px;" placeholder="min"> ~
                                <input type="number" class="max form-control d-inline-block" style="width: 80px;" placeholder="max">

                            </div>

                            <div class="row1" id="comment">
                                <span>comment:</span>
                                <span>1~100</span>
                                <span>101~1000</span>
                                <span>>1000</span>
                                <input type="number" class="min form-control d-inline-block ok" style="width: 80px;" placeholder="min"> ~
                                <input type="number" class="max form-control d-inline-block" style="width: 80px;" placeholder="max">

                            </div>

                            <div class="row1" id="share">
                                <span>share:</span>
                                <span>1~100</span>
                                <span>101~1000</span>
                                <span>>1000</span>
                                <input type="number" class="min form-control d-inline-block ok" style="width: 80px;" placeholder="min"> ~
                                <input type="number" class="max form-control d-inline-block" style="width: 80px;" placeholder="max">
                            </div>


                            <div class="text-center border-top pt-2">
                                <button class="btn btn-primary OK">ok</button>
                                <button class="btn btn-light cancel">cancel</button>
                            </div>

                        </div>



                        <select class="objective">
                            <option data-display="objective/ cta">objective/ cta</option>

                        </select>


                        <div class="content objectives rounded">
                            <h3 class="border-bottom text-left"> Type/Format/HD</h3>
                            <div class="row1">
                                <h3 class="text-dark">Shopping</h3>
                                <span>Buy Now</span>
                                <span>Order Now</span>
                                <span>Sell Now</span>
                                <span>Shop Now</span>
                                <span>Start Order</span>
                                <span>Add to Cart</span>



                            </div>

                            <div class="row1">
                                <h3 class="text-dark">Conversion / Leads</h3>
                                <span>Contact Us</span>
                                <span>Learn More</span>
                                <span>Get Offer</span>
                                <span>Get Showtimes</span>
                                <span>Request Time</span>
                                <span>See Menu</span>
                                <span>SubScribe</span>
                                <span>Apply Now</span>
                                <span>Book Now</span>
                                <span>Buy Now</span>
                                <span>Buy Tickets</span>
                                <span>Get Offer View</span>
                                <span>Sign Up</span>



                            </div>

                            <div class="row1">
                                <h3 class="text-dark">Message</h3>
                                <span>Get Quote</span>
                                <span>Send Message</span>
                                <span>Send WhatsApp Me</span>
                                <span>WhatsApp Message</span>
                                <span>Message Page</span>


                            </div>

                            <div class="row1">
                                <h3 class="text-dark">Video Views</h3>
                                <span>Watch Video</span>
                                <span>Watch More</span>
                                <span>Listen Music</span>
                                <span>Listen Now</span>


                            </div>

                            <div class="row1">
                                <h3 class="text-dark">Engagement</h3>
                                <span>Like Page</span>
                                <span>Get Quote</span>
                                <span>Call Now</span>
                                <span>Get Offer View</span>
                                <span>Message Page</span>
                                <span>View Instagram </span>


                            </div>

                            <div class="row1">
                                <h3 class="text-dark">Other</h3>
                                <span>Email Now</span>
                                <span>Get Tickets</span>
                                <span>Get Directions</span>
                                <span>Open Link</span>
                                <span>Save</span>
                                <span>Search</span>
                                <span>Try It</span>
                                <span>Donate</span>
                                <span>Donate Now</span>
                                <span>Go live</span>
                                <span>Link Card</span>
                                <span>Event RSVP</span>




                            </div>



                            <div class="text-center border-top pt-2">
                                <button class="btn btn-primary">ok</button>
                                <button class="btn btn-light cancel">cancel</button>
                            </div>
                        </div>




                    </div>

                    <div class="block-1  d">
                        <h3 class="title">Date:</h3>
                        <ul>
                            <li>
                                <div id="aBtnGroup" class="btn-group">
                                    <button type="button" value="7" class="btn btn-default ">7 days</button>
                                    <button type="button" value="30" class="btn btn-default">30 days</button>
                                    <button type="button" value="90" class="btn btn-default">90 days</button>
                                    <button type="button" value="360" class="btn btn-default ">1 year</button>
                                    <button type="button" value="all" class="btn btn-default active">all</button>

                                  </div>
                            </li>

                            {{-- <li>
                                <input type="text" id="daterange" class="form-control" name="daterange"
                                    value="01/01/2021 - 01/15/2021" />

                            </li> --}}

                            <li>
                                <button class="btn btn-light date">By Carted Time</button>
                            </li>
                        </ul>
                    </div>

                    <div class="block-1 pb-0 mb-0 ">
                        <span class="mr-2">Sort By:</span>
                        <select class="select" id="sort_by">
                            <option value="last_seen" data-display="Last Seen">Last Seen</option>
                            <option value="post_create">Created Time</option>
                            <option value="like">Like</option>
                            <option value="comment">Comments</option>
                            <option value="share">Share</option>


                        </select>
                    </div>
                    <button type="button" class="btn btn-outline-info clear">Clear</button>
                                </form>
            </div>
        </div>
    </div>
    <div class="result">
        <div class="container" >
            <div class="row tests boxList  "id="post-data">
 


  
            @include('data')
            
  
        </div>
    
    </div>
    <div id="disblyarea" style="display: none" >
        <div class="container">
            <p style="text-align: center;font-size: 30px">No results available.</p>
        </div>
        </div>
    </div>
  

    






 



 

  


    </div>
    <div class="footer">
        <div class="container">
            <p>Copyright companyName 2021 &copy; all rights received</p>
        </div>
    </div>


    <script type="text/javascript">
    

$('.clear').click(function() {
        $('.current').each(function() {
            let defVal = $(this).text();
            $('.current').text("Select ...");
            loadMoreData();
        })
    
    })
        // var page = 1;
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height()+1 >= $(document).height()) {
                                // page++;
                loadMoreData();
            }
        });
        var val3 = {};

    function getInput(min, max, src) {

        if (min !== "" || max !== "") {

            $('.Engagement .current').text(parseInt(min) + "~" + parseInt(max))
            val3.one = min
            val3.two = max
            val3.three = $(src).parent().attr('id');



        }
    }


    $('.OK').click(function() {
        getInput($('#like .min').val(), $('#like .max').val(), $('#like .max'))
        getInput($('#comment .min').val(), $('#comment .max').val(), $('#comment .max'))
        getInput($('#share .min').val(), $('#share .max').val(), $('#share .max'))

    })
        var val2 = {};
        function getTypeId(src1) {
            $(src1).click(function() {
                val2.one = $(this).parent().attr('id');
                val2.two = $(this).text()
            })
        }

        var val = {};

        function getdataIDPro(src1) {
            $(src1).click(function() {
                val.one = $(this).attr("id");

            })
        }
        $('.clear').click(function() {
        $('.current').each(function() {
            let defVal = $(this).text();
            $('.current').text("Select ...");
            location.reload();
        })

    })

    getdataIDPro('.langs span');
    getTypeId('.Engagements span');
        var offset = 1 ;
        var page = 3 ;
        function loadMoreData(){
            // let post_type = $('#post_type :selected').val();
            let lang = val.one;
            let country = $('.country .current').text();
            let obj = $('.objective .current').text();
            let enng = val2.one + " " + val2.two;
            let post_type = $('#post_type :selected').val();
            let sort_by = $('#sort_by :selected').val();
            var radioValue = $(".btn-default.active").val();
            var daterange = $("#daterange").val();
            let min_max = val3.three + " " + val3.one + "~" + val3.two;
            let category = $('#category :selected').val();

          $.ajax(
                {
                    url: '?page='+page+'&offset='+offset,
                    type: "get",
                    data: {  
                        'enng': enng, 
                        'country': country, 
                        'lang': lang, 
                        "obj": obj, 
                        'post_type': post_type, 
                        "sort_by": sort_by, 
                        'radioValue': radioValue, 
                        'min_max': min_max,
                        'category': category,
                        "daterange": daterange 
                    },

                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    if(data.count == 0){
                        $('#disblyarea').css("display", "block");
                    }
                    $('.ajax-load').hide();
                  
                    $("#post-data").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                      alert('server not responding...');
                });
                offset++;
        }
    </script>
      {{-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script>     --}}

    
    <script src="{{ asset('new_style/js/main.js') }}"></script>
  

</body>

</html>