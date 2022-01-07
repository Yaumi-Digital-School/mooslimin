@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container mt-5">
      <div class="row mt-5 pt-5">
        <div class="col-lg-10 mx-auto">
          <div class="d-flex justify-content-center align-items-center">
            <img src="{{Auth::user()->get_img_avatar()}}" class="rounded-circle mr-3" style="width: 50px; height: 50px;" alt="">
            <div class="">
                <div class="">
                    <b style="font-size: 1.2rem">{{Auth::user()->name}}</b>
                </div>
                <div><button type="button" data-toggle="modal" data-target="#profil" class="btn btn-sm btn-outline-success rounded-1">Edit Profil</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
              <img src="{{$forum->user->get_img_avatar()}}" class="rounded-circle mr-3" style="width: 50px; height: 50px;" alt="">
              <div class="">
                  <div class="">
                      <b style="font-size: 1.2rem">{{$forum->user->name}}</b>
                  </div>
                  <div>{{Carbon\Carbon::parse($forum->created_at)->IsoFormat('d MMMM YYYY, LT ')}}</div>
              </div>
            </div>
            <div class="d-flex align-items-center">

              <div class="">
                <form action="{{route('forum.vote')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" id="forum_id" name="forum_id" value="{{$forum->id}}">
                  <input type="hidden" id="type" name="type" value="upvote">
                  <input type="hidden" id="value" name="value" value="1">
                  <button type="submit" class="btn btn-link" style="text-decoration: none;">
                    <a href="" class="">
                      <span><i class="fas fa-arrow-circle-up" style="font-size: 1.4rem; color: #868E96;"></i> 
                        {{$forum->vote()->where('type','upvote')->sum('value') != 0 ? $forum->vote()->where('type','upvote')->sum('value') : ''}}
                      </span>
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
                      <span style="display: inline"><i class="fas fa-arrow-circle-down" style="font-size: 1.4rem; color: #868E96;"></i> 
                        {{$forum->vote()->where('type','downvote')->sum('value') != 0 ? $forum->vote()->where('type','downvote')->sum('value') : ''}}
                      </span>
                    </a>
                  </button>
                </form>
              </div>

            </div>
          </div>
          <div class="py-3">
            <article>
              {!!$forum->desc!!}
            </article>
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
              @if (Auth::check())
              <img src="{{Auth::user()->get_img_avatar()}}" class="rounded-circle mr-3 d-flex align-self-baseline" style="width: 30px; height: 30px;" alt="">
              @endif`
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
              <img src="{{$komentar->user->get_img_avatar()}}" class="rounded-circle mr-3 d-flex align-self-baseline" style="width: 30px; height: 30px;" alt="">
              <div class="w-100">
                <div class="d-flex justify-content-between">
                  <div>
                    <span><b>{{$komentar->user->name}}</b><span style="color: gray"> . {{Carbon\Carbon::parse($komentar->created_at)->IsoFormat('d MMMM YYYY')}}</span></span>
                  </div>

                  <div>
                    @auth
                      @if ($komentar->user->id == Auth::user()->id)
                      <div class="dropdown">
                        <div style="cursor: pointer" role="button" id="komentar" data-toggle="dropdown" aria-expanded="false">
                          <img src="{{asset('img/umum/3point-horizontal.svg')}}" alt="">   
                        </div>

                        <div class="dropdown-menu" aria-labelledby="komentar">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#komentarmodal{{$komentar->id}}">Hapus</a>
                        </div>

                        <!-- Modal Hapus Komentar -->
                        <div class="modal fade" id="komentarmodal{{$komentar->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-body">
                                <p class="font-weight-bold">Apakah Anda ingin menghapus komentar Anda?</p>
                                <p style="color: #4F5E71">Tindakan ini tidak dapat diubah, setelah Anda menghapus komentar, komentar tersebut menghilang.</p>
                                <div class="float-right">
                                  <form action="{{route('forum.delete.comment',$komentar->id)}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif                     
                    @endauth
                  </div>
                </div>
                <div class="">
                  <p>
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
                          <span><i class="fas fa-arrow-circle-up" style="font-size: 1.4rem; color: #868E96;"></i> </span>
                        </a>
                      </button>
                    </form>
                    <span style="color: gray">Dukung Naik . 
                      {{$komentar->vote()->where('type','upvote')->sum('value') != 0 ? $komentar->vote()->where('type','upvote')->sum('value') : ''}}
                    </span>
                    <form action="{{route('komentar.vote')}}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" id="komentar_forum_id" name="komentar_forum_id" value="{{$komentar->id}}">
                      <input type="hidden" id="type" name="type" value="downvote">
                      <input type="hidden" id="value" name="value" value="1">
                      <button type="submit" class="btn btn-link" style="text-decoration: none;">
                        <a href="" class="">
                          <span><i class="fas fa-arrow-circle-down" style="font-size: 1.4rem; color: #868E96;"></i> </span>
                        </a>
                      </button>
                    </form>
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
                  <div class="d-flex justify-content-between">
                    <div>
                      <span><b>{{$komentar->user->name}}</b><span style="color: gray"> . {{Carbon\Carbon::parse($komentar->created_at)->IsoFormat('dddd MMMM YYYY, LT A')}}</span></span>
                    </div>
                    <div>
                      @auth
                        @if ($komentar->user->id == Auth::user()->id)
                        <div class="dropdown">
                          <div style="cursor: pointer" role="button" id="komentar" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('img/umum/3point-horizontal.svg')}}" alt="">   
                          </div>

                          <div class="dropdown-menu" aria-labelledby="komentar">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#komentarmodal{{$komentar->id}}">Hapus</a>
                          </div>

                          <!-- Modal Hapus Komentar -->
                          <div class="modal fade" id="komentarmodal{{$komentar->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <p class="font-weight-bold">Apakah Anda ingin menghapus komentar Anda?</p>
                                  <p style="color: #4F5E71">Tindakan ini tidak dapat diubah, setelah Anda menghapus komentar, komentar tersebut menghilang.</p>
                                  <div class="float-right">
                                    <form action="{{route('forum.delete.comment',$komentar->id)}}" method="POST" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif                     
                      @endauth
                    </div>
                  </div>
                  <div class="">
                    <p>
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
                            <span><i class="fas fa-arrow-circle-up" style="font-size: 1.4rem; color: #868E96;"></i> </span>
                          </a>
                        </button>
                      </form>
                      <span style="color: gray">Dukung Naik . 
                        {{$komentar->vote()->where('type','upvote')->sum('value') != 0 ? $komentar->vote()->where('type','upvote')->sum('value') : ''}}
                      </span>
                      <form action="{{route('komentar.vote')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="forum_id" name="komentar_forum_id" value="{{$komentar->id}}">
                        <input type="hidden" id="type" name="type" value="downvote">
                        <input type="hidden" id="value" name="value" value="1">
                        <button type="submit" class="btn btn-link" style="text-decoration: none;">
                          <a href="" class="">
                            <span><i class="fas fa-arrow-circle-down" style="font-size: 1.4rem; color: #868E96;"></i> </span>
                          </a>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>                  
              @endforeach
            </div>

            <div>
              <button style="color: black" class="btn btn-link btn-block text-center collapsible-link" type="button" data-toggle="collapse" data-target="#collapse-{{$forum->id}}" aria-expanded="false" aria-controls="collapseOne">
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
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="d-flex align-items-center">
              <img src="{{Auth::user()->get_img_avatar()}}" class="rounded-circle mr-3" style="width: 7%" alt="">
              <div class="">
                  <div>{{Auth::user()->name}} Memposting</div>
              </div>
            </div>
            <div class="mt-3">
              <form action="{{route('forum.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <textarea name="desc" id="desc" cols="30" rows="7" class="form-control"></textarea>
                <div class="mt-3 input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                  <input id="upload" name="image" type="file" class="form-control border-0">
                  {{-- <label id="upload-label" for="upload" class="font-weight-light text-muted">Pilih Gambar</label>
                  <div class="input-group-append">
                      <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                  </div> --}}
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-success w-100">Posting</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Profil -->
    <div class="modal fade" id="profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div>
            <div class=" d-flex align-items-center justify-content-center">
              <h5 class="modal-title mt-2" id="exampleModalLabel">Edit Profile</h5>
              <div class="d-block justify-content-end">
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="d-flex justify-content-center align-items-center">
              <img src="{{Auth::user()->get_img_avatar()}}" class="rounded-circle" style="width: 14%" alt="">
            </div>
            <div class="mt-3 text-center">Edit Profile</div>

            <div class="w-75 mx-auto">
              <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- Upload image input-->
                <input id="oldimg" name="oldimg" type="text" class="form-control d-none" value="{{Auth::user()->avatar}}">
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                  <input id="upload" name="profile" type="file" class="form-control border-0">
                  {{-- <input id="upload" name="profile" type="file" onchange="readProfile(this);" class="form-control border-0"> --}}
                  {{-- <label id="profile-label" for="profile" class="font-weight-light text-muted">Pilih Gambar</label>
                  <div class="input-group-append">
                      <label for="profile" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                  </div> --}}
                </div>
                <div>
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control text-muted" name="name" id="name" value="{{Auth::user()->name}}">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-success w-100">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('js')
  {{-- <script src="{{asset('js/upload-image.js')}}"></script>
  <script src="{{asset('js/upload-image-profile.js')}}"></script> --}}
  @include('js/forum-alert')
  @include('js/magic-reload')
  @include('js/ckeditor-desc')
@endsection