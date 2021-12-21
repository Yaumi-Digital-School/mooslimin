@extends('layouts.app')
@section('title')
    Forum
@endsection
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')

    <div class="container py-5">
      <div class="row py-5">
        <div class="col-lg-10 mx-auto">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Buat Postingan
          </button>


        </div>
        <div class="col-lg-10 mx-auto py-4">
          {{-- postingan / forum --}}
          @foreach ($forums as $forum)
              
          
          <hr>
          <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
              <img src="{{$forum->user->get_img_avatar()}}" class="rounded-circle mr-3" style="width: 9%" alt="">
              <div class="">
                  <div class="">
                      <b style="font-size: 1.2rem">{{$forum->user->name}}</b>
                  </div>
                  <div>{{Carbon\Carbon::parse($forum->created_at)->IsoFormat('d MMMM YYYY, LT ')}}</div>
              </div>
            </div>
            <div class="d-flex  align-items-center">

              <div class="">
                <form action="{{route('forum.vote')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" id="forum_id" name="forum_id" value="{{$forum->id}}">
                  <input type="hidden" id="type" name="type" value="upvote">
                  <input type="hidden" id="value" name="value" value="1">
                  <button type="submit" class="btn btn-link" style="text-decoration: none;">
                    <a href="" class="">
                      <span><i class="fas fa-arrow-circle-up" style="font-size: 1.4rem"></i> {{$forum->vote()->where('type','upvote')->sum('value')}}</span>
                    </a>
                  </button>
                </form>
              </div>
              <div class="">
                |
              </div>
              <div>
                <form action="{{route('forum.vote')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" id="forum_id" name="forum_id" value="{{$forum->id}}">
                  <input type="hidden" id="type" name="type" value="downvote">
                  <input type="hidden" id="value" name="value" value="1">
                  <button type="submit" class="btn btn-link" style="text-decoration: none;">
                    <a href="" class="">
                      <span><i class="fas fa-arrow-circle-down" style="font-size: 1.4rem"></i> {{$forum->vote()->where('type','downvote')->sum('value')}}</span>
                    </a>
                  </button>
                </form>
              </div>

            </div>
          </div>
          <div class="py-3">
            <p class="font-weight-bold">
              {{$forum->desc}}
            </p>
            <div>
              @if ($forum->image != null)
              <img src="{{$forum->get_img_forum()}}" class="" style="width: 25%" alt="">
              @endif
            </div>
            <div class="mt-3">
              <span href="" class="">Lihat {{$forum->komentar()->where('parent',0)->count()}} Komentar</span>
            </div>
          </div>
          <div class="card-body rounded-lg" style="background-color: #FAFAFA">
            <div class="d-flex justify-content-between align-items-center align-self-center">
              <img src="{{asset('bootstrap/assets/img/user-2.jpg')}}" class="rounded-circle mr-3" style="width: 4%" alt="">
              <form class="w-100" action="{{route('forum.add.comment')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group ">
                  <input type="hidden" id="forum_id" name="forum_id" value="{{$forum->id}}">
                  <input type="hidden" id="parent" name="parent" value="0">
                  <input id="desc_comment" name="desc_comment" type="text" class="form-control rounded-lg mr-3" placeholder="Tambahkan komentar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-success rounded-lg" type="submit" id="button-addon2">Tambah Komentar</button>
                  </div>
                </div>
              </form>
            </div>

            {{--------------------- komentar -----------------------------------------}}
            @foreach ($forum->komentar()->where('parent',0)->orderBy('created_at','desc')->limit(1)->get() as $komentar)
            <div class="d-flex align-items-center py-3">
              <img src="{{$komentar->user->get_img_avatar()}}" class="rounded-circle mr-3 d-flex align-self-baseline" style="width: 4%" alt="">
              <div class="w-100">
                <div class="">
                  <span><b>{{$komentar->user->name}}</b><span style="color: gray"> . {{Carbon\Carbon::parse($komentar->created_at)->IsoFormat('dddd MMMM YYYY, LT A')}}</span></span>
                </div>
                <div class="">
                  <p class="font-weight-bold">
                    {{$komentar->desc_comment}}
                  </p>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="d-flex justify-content-start align-items-center">
                    <form action="{{route('komentar.vote')}}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" id="komentar_forum_id" name="komentar_forum_id" value="{{$komentar->id}}">
                      <input type="hidden" id="type" name="type" value="upvote">
                      <input type="hidden" id="value" name="value" value="1">
                      <button type="submit" class="btn btn-link" style="text-decoration: none;">
                        <a href="" class="">
                          <span><i class="fas fa-arrow-circle-up" style="font-size: 1.4rem"></i> </span>
                        </a>
                      </button>
                    </form>
                    <span style="color: gray">Dukung Naik . {{$komentar->vote()->where('type','upvote')->sum('value')}}</span>
                  </div>

                  <div class="d-flex align-items-center">
                    <form action="{{route('komentar.vote')}}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" id="komentar_forum_id" name="komentar_forum_id" value="{{$komentar->id}}">
                      <input type="hidden" id="type" name="type" value="downvote">
                      <input type="hidden" id="value" name="value" value="1">
                      <button type="submit" class="btn btn-link" style="text-decoration: none;">
                        <a href="" class="">
                          <span><i class="fas fa-arrow-circle-down" style="font-size: 1.4rem"></i> </span>
                        </a>
                      </button>
                    </form>
                    {{-- <a href="">
                      <span class="material-icons" style="color: gray">
                        outlined_flag
                      </span>
                    </a> --}}
                  </div>
                </div>
              </div>
            </div> 
            @endforeach
            <div id="collapse-{{$forum->id}}" class="collapse">
              @foreach ($forum->komentar()->where('parent',0)->orderBy('created_at','desc')->skip(1)->take(3)->get() as $komentar)
              <div class="d-flex align-items-center py-3">
                <img src="{{$komentar->user->get_img_avatar()}}" class="rounded-circle mr-3 d-flex align-self-baseline" style="width: 4%" alt="">
                <div class="w-100">
                  <div class="">
                    <span><b>{{$komentar->user->name}}</b><span style="color: gray"> . {{Carbon\Carbon::parse($komentar->created_at)->IsoFormat('dddd MMMM YYYY, LT A')}}</span></span>
                  </div>
                  <div class="">
                    <p class="font-weight-bold">
                      {{$komentar->desc_comment}}
                    </p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <form action="{{route('komentar.vote')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="forum_id" name="komentar_forum_id" value="{{$komentar->id}}">
                        <input type="hidden" id="type" name="type" value="upvote">
                        <input type="hidden" id="value" name="value" value="1">
                        <button type="submit" class="btn btn-link" style="text-decoration: none;">
                          <a href="" class="">
                            <span><i class="fas fa-arrow-circle-up" style="font-size: 1.4rem"></i> </span>
                          </a>
                        </button>
                      </form>
                      <span style="color: gray">Dukung Naik . {{$komentar->vote()->where('type','upvote')->sum('value')}}</span>
                    </div>
  
                    <div class="d-flex align-items-center">
                      <form action="{{route('komentar.vote')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="forum_id" name="komentar_forum_id" value="{{$komentar->id}}">
                        <input type="hidden" id="type" name="type" value="downvote">
                        <input type="hidden" id="value" name="value" value="1">
                        <button type="submit" class="btn btn-link" style="text-decoration: none;">
                          <a href="" class="">
                            <span><i class="fas fa-arrow-circle-down" style="font-size: 1.4rem"></i> </span>
                          </a>
                        </button>
                      </form>
                      {{-- <a href="">
                        <span class="material-icons" style="color: gray">
                          outlined_flag
                        </span>
                      </a> --}}
                    </div>
                  </div>
                </div>
              </div>                  
              @endforeach
            </div>

            <div>
              <button class="btn btn-link btn-block text-center collapsible-link" type="button" data-toggle="collapse" data-target="#collapse-{{$forum->id}}" aria-expanded="false" aria-controls="collapseOne">
                Lihat Semua Komentar
              </button>
            </div>

          </div>
          @endforeach

        </div>

      </div>
    </div>








    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div>
            <div class=" d-flex align-items-center justify-content-center">
              <h5 class="modal-title mt-2" id="exampleModalLabel">Buat Postingan</h5>
              <div class="d-block justify-content-end">
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> --}}
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="d-flex align-items-center">
              @auth
                <img src="{{Auth::user()->get_img_avatar()}}" class="rounded-circle mr-3" style="width: 7%" alt="">
                <div class="">
                    <div>{{Auth::user()->name}} Memposting</div>
                </div>              
              @else
                <img src="{{asset('img/umum/avatar.png')}}" class="rounded-circle mr-3" style="width: 7%" alt="">
                <div class="">
                    <div>Anda Memposting</div>
                </div>
              @endauth
            </div>
            <div class="mt-3">
              <form action="{{route('forum.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <textarea name="desc" id="desc" cols="30" rows="7" class="form-control"></textarea>
                <div class="mt-3 input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                  <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0">
                  <label id="upload-label" for="upload" class="font-weight-light text-muted">Pilih Gambar</label>
                  <div class="input-group-append">
                      <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary w-100">Posting</button>
                </div>
              </form>
            </div>
          </div>
          {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> --}}
        </div>
      </div>
    </div>
@endsection
@section('js')
  <script src="{{asset('js/upload-image.js')}}"></script>
  @include('js/forum-alert')
@endsection