@extends('layouts.site')

@section('title', 'Single Blog')

@section('content')

    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">News details</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">News details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($blog)
        <section class="section blog-wrap bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12 mb-5">
                                <div class="single-blog-item">
                                    <img loading="lazy" src="{{ $blog->gallery->image }}" alt="blog"
                                        class="img-fluid rounded">
                                    <div class="blog-item-content bg-white p-5">
                                        <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>
                                                {{ date('d-M-y', strtotime($blog->created_at)) }}</span>
                                            <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>{{count($comments)}}
                                                Comments</span>
                                        </div>
                                        <h2 class="mt-3 mb-4">{{ $blog->title }}</h2>
                                        <p class="lead mb-4">{{ $blog->description }}</p>

                                        <div
                                            class="tag-option mt-5 d-block d-md-flex justify-content-between align-items-center">
                                            <ul class="list-inline">
                                                <li>Tags:</li>
                                                @foreach ($blog->tags as $tag)
                                                    <li class="list-inline-item"><a href="#"
                                                            rel="tag">{{ $tag->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="col-lg-12 mb-5">
                            @if (Session::has('alert-success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{Session::get('alert-success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                            

                                <form method="post" action="{{ route('comments.store', $blog->id) }}">
                                    @csrf
                                    <div class="contact-form bg-white rounded p-5" id="comment-form">
                                        <h4 class="mb-4">Write a comment</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="name" id="name"
                                                        placeholder="Name:">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="email" id="mail"
                                                        placeholder="Email:">
                                                </div>
                                            </div>
                                        </div>
                                        <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>

                                        <button class="btn btn-main btn-round-full" type="submit"
                                            id="submit_contact">Comment</button>
                                </form>
                            </div>

                        </div>
                      
                        @if (count($comments)>0)
                        <div class="col-lg-12 mb-5">
                            <div class="comment-area card border-0 p-5">
                                <h4 class="mb-4">{{count($comments)}} Comments</h4>
                                <ul class="comment-tree list-unstyled">
                                   @foreach ($comments as $comment)
                                   <li class="mb-5">
                                    <div class="comment-area-box">

                                        <h5 class="mb-1">{{$comment->user ? $comment->user->name: ''}}</h5>
                                        <span>{{$comment->user ? $comment->user->email: ''}}</span>

                                        <div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                                            <a class="reply-btn" href="javascript:void(0)"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>
                                            <span class="date-comm">Posted {{$comment->user ? date('d M y', strtotime($comment->user->created_at)):''}}</span>
                                        </div>

                                        <div class="comment-content mt-3">
                                            <p>{{$comment ? $comment->comment: ''}}</p>
                                        </div>
                                    </div>

                                    <div class="ml-5">
                                        @if ($comment->commentReplies)
                                            @foreach ($comment->commentReplies as $reply)
                                                {{-- <p>{{$reply->comment}}</p>
                                                 --}}

                                                 <div class="comment-area-box">
                                                    <h5 class="mb-1">{{ $reply->user ? $reply->user->name : 'Anonymous' }}</h5>
                                                    <span>{{ $reply->user ? $reply->user->email : '' }}</span>
                                                    <div class="comment-content mt-3">
                                                        <p>{{ $reply->comment }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="form-group comment-reply">
                                        <form action="{{route('comments.reply', $comment->id)}}" method="POST">
                                            @csrf
                                         
                                            <textarea name="comment" id="comment" class="form-control" cols="20" rows="2"></textarea>
                                        <button type="submit"
                                            class=" mt-2 float-right btn btn-main btn btn-sm">Reply</button>
                                        </form>
                                    </div>
                                </li>
                                   @endforeach
                                </ul>
                            </div>
                        </div>
                            
                        @endif
                     
                        
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <input type="text" class="form-control" placeholder="search">
                            <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                        </div>

                        @if (count($latestPosts)>0)
                        <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                            <h5>Latest Posts</h5>

                            @foreach ($latestPosts as $latestPost)
                            <div class="media border-bottom py-3">
                                <a href="#"><img loading="lazy" class="mr-4" src="{{$latestPost->gallery->image}}" style="width:60px"
                                        alt="blog"></a>
                                <div class="media-body">
                                    <h6 class="my-2"><a href="#">{{$latestPost->title}}</a></h6>
                                    <span class="text-sm text-muted">{{date('d M Y', strtotime($latestPost->created_at))}}</span>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        @endif

                        <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                            <h5 class="mb-4">Tags</h5>
                            <a href="#">Web</a>
                            <a href="#">agency</a>
                            <a href="#">company</a>
                            <a href="#">creative</a>
                            <a href="#">html</a>
                            <a href="#">Marketing</a>
                            <a href="#">Social Media</a>
                            <a href="#">Branding</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    @else
        <h3 class="text-danger text-center mt-5">Unable to locate the blog, please go back and try again.</h3>
    @endif
@endsection

@section('scripts')
<script>
   $(document).ready(function() {
       $('.comment-reply').hide();
                        
       $('.reply-btn').click(function() {
           $(this).closest('li').find('.comment-reply').toggle();
       });
   });


</script>
@endsection

