


@foreach ( $posts as $item )
    

<div class="post col-sm-12 col-md-6 col-lg-4 rounded">
    <div class="header">
        <div class="headerTop">
            <img class="icon"  onerror="this.onerror=null;this.src='{{ asset('uploads/defult.jpg') }}';"
            src="{{ asset('uploads/'.@$item->resorese->first()->page_logo) }}" alt="">            <div class="block">
                <p class="name ">{{ @$item->page_name }}</p>
                <p>@if(@$item->post_create != false)<span>{{ @$item->post_create }} </span>@endif - @if(@$item->last_seen != false)<span>{{ @$item->last_seen }}</span> @endif <span class="" style="font-size: 12px; color: gray;"><i class="fal fa-clock " style="font-size: 12px; color: gray;"></i> {{ $item->count_date() }}</span></p>
            </div>
            <!-- 
            <div class="dropdown">
                <i class="fas fa-ellipsis-v" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"></i>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Save <i
                            class="fas fa-save d-block float-right"></i></a>

                </div>
            </div> -->

            <i class="far fa-heart"></i>
            <div class="clearfix"></div>
        </div>
        <p class="post-title">{{ @$item->title }}</p>

    </div>
    <div class="post-body  position-relative">
        <div class="img-view ">
            {!! @$item->data_post() !!}        </div>
        <ul class="list-unstyled ">
            <li><i class="fas fa-thumbs-up"></i><span>{{ @$item->like_k() }}</span></li>
            <li><i class="fas fa-comment"></i><span>{{ @$item->comment_k() == null ? '0' : @$item->comment_k()  }}</span></li>
            <li><i class="fas fa-share"></i><span>{{@$item->share_k()}}</span></li>
        </ul>

        <a href="{{ $item->page_link_first() }}" class="link">{{ $item->page_link_test() }}</a>
        <a href="{{ $item->landanig_page }}" class="btn btn-outline-info btn-sm ml-3 shop">{{ $item->button }}</a>
        <p>{{ @$item->dec() }}</p>

        <div class="btn-block">
            <a href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&view_all_page_id={{ $item->page_id }}&search_type=page&media_type=all" class="btn">add library</a>
           <a href="{{ @$item->post_link }}"><i class="fab fa-facebook"></i></a> 
            <a href="#" class="btn" data-toggle="modal" data-target="#staticBackdrop{{ @$item->_id }}">show analytic</a>

        </div>

        <div class="modal fase" id="staticBackdrop{{ @$item->_id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Facebook Ad Analytic</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="post-media co col-md-4 col-lg-4 ">
        
                                    <div class="img-view-popup post rounded">
                                        <div class="header">
                                            <div class="headerTop">
                                                <img class="icon"  onerror="this.onerror=null;this.src='{{ asset('uploads/defult.jpg') }}';"
                                                src="{{ asset('uploads/'.@$item->resorese->first()->page_logo) }}" alt="">            <div class="block">
                                                    <p class="name ">{{ @$item->page_name }}</p>
                                                    <p>@if(@$item->post_create != false)<span>{{ @$item->post_create }} </span>@endif - @if(@$item->last_seen != false)<span>{{ @$item->last_seen }}</span> @endif <span class="" style="font-size: 12px; color: gray;"></span></p>
                                                </div>
        
                                            
                                                <div class="clearfix"></div>
                                            </div>
        
                                            <p class="post-title">{{ @$item->title }}
                                            </p>
        
                                        </div>
                                        <div class="post-body">
                                            <div class="img-view">
                                                {!! @$item->data_post() !!}   
        
                                            </div>
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-thumbs-up"></i><span>{{ @$item->like_k() }}</span></li>
                                                <li><i class="fas fa-comment"></i><span>{{ @$item->comment_k() == null ? '0' : @$item->comment  }}</span></li>
                                                <li><i class="fas fa-share"></i><span>{{@$item->share_k()}}</span></li>
                                            </ul>
                                            <a href="{{ $item->page_link_first() }}" class="link">{{ $item->page_link_test() }}</a>
                                            <a href="{{ $item->page_link_first() }}" class="btn btn-outline-info btn-sm ml-3 shop">{{ $item->button }}</a>
                                            <p>{{ @$item->dec() }}</p>
        
                                        </div>
                                    </div>
        
                                    <div class="list-item ">
                                        <ul class="list-unstyled dis_block">
                                            <li class="rounded"> <a href="{{ $item->post_link }}"><i class="fab fa-facebook"></i>Visit Facebook Post </a></li>
                                            <li class="rounded"><a href="{{ $item->page_link }}"><img src="{{ asset('uploads/'.@$item->resorese->first()->page_logo) }}"
                                                    style="width: 20px; height: 20px; border-radius: 50%;"> Visit Facebook
                                                page</a></li>
                                            <li  class="rounded"><a href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&view_all_page_id={{ $item->page_id }}&search_type=page&media_type=all"><img src="{{ asset('new_style/images/facebook ad icon3.jpg') }}"></i>Visit Facebook
                                                Ad Library</a></li>
                                            <li class="rounded">
                                                <a href="{{ $item->landanig_page }}">
                                                <img  src="{{ asset('new_style/images/landing-icon.png') }}"></i>Visit Landing Page
                                            </a>
                                            </li>
                                            <li class="rounded"><a href="{{ route('dawnload.post',$item->id) }}"><img src="{{ asset('new_style/images/icons8-web-design-48.png') }}"></i>Download   <span class="capitalize">{{ $item->ad_format }} Post </a></span>
                                            </li>
                                        </ul>
                                    </div>
        
                                </div>
        
                                <div class="contentDetails  col-md-8 col-lg-8 ">
                                    <div class="row">
                                        <div class="contentStatistics mb-2 col-lg-12 col-md-12 col-sm-12 rounded">
                                            <div class="row">
                                                <div class="column col-lg-4 col-md-4">
                                                    <h4>Post Created <i class="fas fa-calendar-alt"></i> </h4>
                                                    <span>{{ $item->post_create }}</span>
                                                </div>
        
                                                <div class="column col-lg-4 col-md-4">
                                                    <h4>last seen <i class="fas fa-calendar-alt"></i></h4>
                                                    <span>{{ $item->last_seen }}</span>
                                                </div>
        
                                                <div class="column col-lg-4 col-md-4">
                                                    <h4>duration <i class="fas fa-stopwatch"></i></h4>
                                                    <span>   {!! $item->count_date() !!}</span>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="chart col-sm-12 col-lg-12 col-md-12 table-responsive rounded">
        
                                            <h5>Real trend chart</h5>
                                            <canvas id="myChart{{ $item->id }}" class="mychart"></canvas>
                                            
                                        </div>
                                    </div>
                                    <script>
                                    (function($) {
            
                                        "use strict";
                                        
                                        $('#id_0').datetimepicker({
                                            allowInputToggle: true,
                                            showClose: true,
                                            showClear: true,
                                            showTodayButton: true,
                                            format: "MM/DD/YYYY hh:mm:ss A",
                                            icons: {
                                                time: 'fa fa-clock-o',
                                        
                                                date: 'fa fa-calendar-o',
                                        
                                                up: 'fa fa-chevron-up',
                                        
                                                down: 'fa fa-chevron-down',
                                        
                                                previous: 'fa fa-chevron-left',
                                        
                                                next: 'fa fa-chevron-right',
                                        
                                                today: 'fa fa-chevron-up',
                                        
                                                clear: 'fa fa-trash',
                                        
                                                close: 'fa fa-close'
                                            },
                                        
                                        });
                                        
                                        
                                        
                                        var figure = $(".video").hover(hoverVideo, hideVideo);
                                        
                                        function hoverVideo(e) { $('video', this).get(0).play(); }
                                        
                                        function hideVideo(e) { $('video', this).get(0).pause(); }
                                        
                                        
                                        
                                        var ctx = document.getElementById('myChart{{ $item->id }}').getContext('2d');
                                        
                                        var like_array ={{ json_encode($item->array_like_post() )}};
                                        var comment_array ={{ json_encode($item->array_like_comment() )}};
                                        var share_array ={{ json_encode($item->array_like_share() )}};
                                        
                                        
                                        
                                        var myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels:{!! $item->dates() !!} ,
                                                datasets: [{
                                                        label: 'likes',
                                                        data: like_array ,
                                                        backgroundColor: [
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255, 99, 132, 1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1,
                                                        fontSize: 12,
                                                        fill: true
                                                    },
                                                    {
                                        
                                                        label: 'comments',
                                                        data: comment_array,
                                                        backgroundColor: [
                                                            'rgba(54, 162, 235, 0.2)'
                                        
                                                        ],
                                                        borderColor: [
                                        
                                                            'rgba(255, 206, 86, 1)'
                                        
                                                        ],
                                                        borderWidth: 1,
                                                        fill: true
                                        
                                                    }
                                        
                                                    ,
                                                    {
                                        
                                                        label: 'shares',
                                                        data: share_array,
                                                        backgroundColor: [
                                                            'rgba(75, 192, 192, 0.2)'
                                        
                                                        ],
                                                        borderColor: [
                                        
                                                            'rgba(153, 102, 255, 1)'
                                                        ],
                                                        borderWidth: 1,
                                                        fill: true
                                        
                                                    }
                                        
                                        
                                        
                                                ]
                                        
                                        
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                        
                                        
                                            }
                                        
                                        
                                        });
                                        
                                        
                                        
                                        
                                        $('select').niceSelect();
                                        
                                        
                                        })(jQuery);
                                                                </script>      
        
                                    <div class="tables-data rounded">
                                        <h5>Facebook Targeting</h5>
        
                                        <div class="row">
                                            <table class="table col-lg-6">
                                                <thead>
                                                    <tr class="table-secondary">
                                                        <th scope="col">Ad details</th>
                                                        <th scope="col">Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td>Otto</td>
                                                    </tr>
                                                    {{-- @if($item->t_lang !=null) --}}
            
                                                    <tr>
                                                        <td>Ad Language</td>
                                                        <td>{{ $item->t_lang }}</td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                    {{-- @if($item->country_see_in !=null) --}}
                                                    <tr>
                                                        <td>Country Seen in</td>
                                                        <td>{{ $item->country_see_in }}</td>
                                                    </tr>
                                                    {{-- @endif --}}
            
                                                </tbody>
                                            </table>
        
        
        
                                            <table class="table col-lg-6">
                                                <thead>
                                                    <tr class="table-secondary">
                                                        <th scope="col">Facebook Targeting</th>
                                                        <th scope="col">Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @if($item->interested != null) --}}
                                                    <tr>
                                                        <td>Target interests</td>
                                                        <td>{{ $item->interested }}</td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                    {{-- @if($item->country != null) --}}
            
                                                    <tr>
                                                        <td>Target Countries</td>
                                                        <td>{{ $item->country }}</td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                    {{-- @if($item->age != null) --}}
            
                                                    <tr>
                                                        <td>Target Age</td>
                                                        <td>{{ $item->age }}</td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                    {{-- @if($item->gender != null) --}}
            
                                                    <tr>
                                                        <td>Target Gender</td>
                                                        <td  style="font-size:13px">{{ $item->gender }}</td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                    {{-- @if($item->lang != null) --}}
            
                                                    <tr>
                                                        <td>Target languages</td>
                                                        <td>{{ $item->lang }}</td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
        
                                </div>
        
        
        
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn ok">Ok</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- Modal -->

    <div class="modal modal-2  fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel2">Login or SignUp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="sign-box col-lg-6 ">
                            <div class="img-box text-center rounded-circle">
                                <img src="images/contract.png" style="width: 35px;">
                            </div>

                            <h3 class="text-center mb-4 text-secondary font-weight-bold">Login</h3>
                        <form action="">
                            <input type="email" class="form-control mb-2" placeholder="Email">
                        
                                <input type="password" class="form-control mb-2" placeholder="Password">
                                                            
                            <input type="submit" class="send btn btn-info mt-4 m-b2" value="Send">


                        </form>

                                </div>

                                <div class="sign-box col-lg-6">
                                    <div class="img-box text-center rounded-circle">
                                        <img src="images/add-user.png" style="width: 35px;">
                                    </div>

                                    <h3 class="text-center mb-4 text-secondary font-weight-bold" >SingUp</h3>

                                <form action="">
                                    <input type="text" class="form-control mb-2"   placeholder="Name">
                                    <input type="email" class="form-control mb-2" placeholder="Email">
                                
                                <!-- <input type="number" class="form-control mb-2" placeholder="Phone"> -->
                            
                                    <select class="select s-Country mb-2">
                                        <option data-display="Country">Country</option>
                                        <option>Algeria</option>
                                        <option>Angola</option>
                                        <option>Argentina</option>
                                        <option>Austria</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahrain</option>
                                        <option>Belgium</option>
                                        <option>Brazil</option>
                                        <option>Canada</option>
                                        <option>Chile</option>
                                        <option>Colombia</option>
                                        <option>Egypt</option>
                                        <option>Emirates</option>
                                        <option>Europe</option>
                                        <option>France</option>
                                        <option>Germany</option>
                                        <option>Greece</option>
                                        <option>HK/MO/TW</option>
                                        <option>Hong Kong</option>
                                        <option>India</option>
                                        <option>Indonesia</option>
                                        <option>Ireland</option>
                                        <option>Israel</option>
                                        <option>Italy</option>                               
                                    
                                    </select>

                                        <input type="password" class="form-control mb-2" placeholder="Password">
                                        <input type="password" class="form-control mb-2" placeholder="Confirm Password">
                                    <input type="submit" class="send btn btn-info mt-4 m-b2" value="Send">


                                </form>

                                </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info">ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End Modal -->
</div>




@endforeach

