@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold color-gray me-2 mb-0"> Disscussion</div>
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">></div>
                    </div>
                    <h2 class="mb-8">{{ $discussions->title}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-disscusions">
                        <div class="row">
                            <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                <a id="discussion-like" href="javascript:;" data-liked="{{ $discussions->liked() }}">
                                    <img src="{{ $discussions->liked() ? $likedImage : $notLikedImage }}"
                                     alt="Like" id="discussion-like-icon" class="like-icon mb-1">
                                </a>
                                <span id="discussion-like-count" class="fs-4 color-gray mb-0">{{ $discussions->likeCount }}</span>
                            </div>
                            <div class="col-11">
                                <p>
                                    {!! $discussions->content !!}
                                </p>
                                <div class="mb-3">
                                    <a href="{{ route('discussions.categories.show', $discussions->category->slug)}}">
                                        <span class="badge rounded-pill text-bg-light">{{ $discussions->category->name}}</span></a>
                                </div>
                                <div class="row align-items-start justify-content-between">
                                    <div class="col">
                                        <span>
                                            <a href="javascript:;" id="share-disscusions"><small>Share</small></a>
                                            <input type="text" value="{{ route('discussions.show', $discussions->slug)}}" id="current-url" class="d-none">
                                        </span>
                                    </div>
                                    <div class="col-5 col-lg-3 d-flex">
                                        <a href="" class="card-disscusions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                            <img src="{{ filter_var($discussions->user->picture, FILTER_VALIDATE_URL)
                                                ? $discussions->user->picture : Storage::url($discussions->user->picture) }}" alt="" class="avatar rounded-circle">
                                        </a>
                                        <div class="fs-12px lh-1">
                                            <span class="text-primary">
                                                <a href="" class="fw-bold d-flex align-items-start text-break mb-1">
                                                    {{ $discussions->user->username}}
                                                </a>
                                            </span>
                                            <span class="color-gray">{{ $discussions->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-5">2 Answers</h3>
                    <div class="mb-5">
                        <div class="card card-disscusions">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a href="">
                                        <img src="{{ url('assets/images/like.png')}}" alt="like" class="like-icon mb-1">
                                    </a>
                                    <span class="fs-4 color-gray mb-1">11</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        lorem ipsum dolor sit amet contecstur lorem ipsum dolor sit amet contecsturlorem ipsum
                                         dolor sit amet contecsturlorem ipsum dolor sit amet contecstur
                                    </p>
                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-5 col-lg-3 d-flex">
                                            <a href="" class="card-disscusions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{ url('assets/images/avatar.png')}}" alt="">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-primary">
                                                    <a href="" class="fw-bold d-flex align-items-start text-break mb-1">
                                                        adjiedwisandy
                                                    </a>
                                                </span>
                                                <span class="color-gray">7 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-disscusions">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a href="">
                                        <img src="{{ url('assets/images/like.png')}}" alt="like" class="like-icon mb-1">
                                    </a>
                                    <span class="fs-4 color-gray mb-1">11</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        lorem ipsum dolor sit amet contecstur lorem ipsum dolor sit amet contecsturlorem ipsum
                                         dolor sit amet contecsturlorem ipsum dolor sit amet contecstur
                                    </p>
                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-5 col-lg-3 d-flex">
                                            <a href="" class="card-disscusions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{ url('assets/images/avatar.png')}}" alt="">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-primary">
                                                    <a href="" class="fw-bold d-flex align-items-start text-break mb-1">
                                                        adjiedwisandy
                                                    </a>
                                                </span>
                                                <span class="color-gray">7 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                    </div>
                    @guest
                    <div class="fw-bold text-center">Please 
                        <a href="{{ route('login')}}" class="text-underline fw-bold text-purple">sign in</a> 
                            or
                         <a href="{{ route('auth.sign-up')}}" class="text-underline fw-bold text-purple">create an account</a> 
                         to participate in this discussion. 
                        </div>
                    @endguest
                    
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <h3>All Categories</h3>
                        <div>
                            @foreach ($categories as $category)
                            <a href="{{ route('discussions.categories.show', $category->slug)}}">
                                <span class="badge rounded-pill text-bg-light">{{ $category->name}}</span></a>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $(document).ready(function() {
            $('#share-disscusions').click(function() {
                var copyText = $('#current-url');

                copyText[0].select();
                copyText[0].setSelectionRange(0, 9999);
                navigator.clipboard.writeText(copyText.val());

                var alert = $('#alert');
                alert.removeClass('d-none');

                var alertContainer = alert.find('.container');
                alertContainer.first().text('Link to this disscusions copied successfully');
            });

            $('#discussion-like').click(function() {


                // dapatkan data apakah discussion ini sudah pernah di like oleh user
                var isLiked = $(this).data('liked');
                // tetukan route like ajax, berdasarkan dengan apakah ini sudah di like atau belum
                var likeRoute = isLiked ? '{{ route("discussions.like.unlike", $discussions->slug) }}'
                : '{{route("discussions.like.like", $discussions->slug) }}';
                // lakukan proses ajax
                // jika ajax berhasil maka dapatkan status jsonnya
                $.ajax({
                    method: 'POST',
                    url: likeRoute,
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                })
                    .done(function(res) {
                        // jika statusnya success maka isi counter like dengan data counter like dari jsonnya
                        if (res.status === 'success') {
                            $('#discussion-like-count').text(res.data.likeCount);

                            if (isLiked) {
                                $('#discussion-like-icon').attr('src', '{{ $notLikedImage }}');
                            }
                            else {
                                $('#discussion-like-icon').attr('src', '{{ $likedImage }}');
                            }

                            $('#discussion-like').data('liked', !isLiked);
                        }
                    
                })
            })

        });
    </script>
@endsection