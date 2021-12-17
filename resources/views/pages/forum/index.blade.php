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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Buat Postingan
          </button>

        </div>
        <div class="col-lg-10 mx-auto py-4">
          {{-- komentar --}}
          <hr>
          <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
              <img src="{{asset('bootstrap/assets/img/user.jpg')}}" class="rounded-circle mr-3" style="width: 9%" alt="">
              <div class="">
                  <div class="">
                      <b style="font-size: 1.2rem">Nama User</b>
                  </div>
                  <div>date buat postingan</div>
              </div>
            </div>
            <div class="d-flex rounded-pill border border-secondary align-self-center align-content-center">

              <div>
                <a href="" class="">
                  <span class="material-icons px-2">
                    arrow_circle_up
                  </span>
                </a>
              </div>
              <div class="">
                |
              </div>
              <div>
                <a href="">
                  <span class="material-icons px-2">
                    arrow_circle_down
                  </span>
                </a>
              </div>

            </div>
          </div>
          <div class="py-3">
            <p class="font-weight-bold">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic ducimus porro 
              soluta, dolores cumque natus facere voluptatem et ad non quidem aperiam voluptate incidunt 
              laboriosam. Officiis deleniti voluptate laborum adipisci.
            </p>
            <div>
              <img src="{{asset('bootstrap/assets/img/user-2.jpg')}}" class="" style="width: 25%" alt="">
            </div>
            <div class="mt-3">
              <a href="" class="">Lihat 5 Komentar</a>
            </div>
          </div>
          <div class="card-body rounded-lg" style="background-color: #FAFAFA">
            <div class="d-flex justify-content-between align-items-center align-self-center">
              <img src="{{asset('bootstrap/assets/img/user-2.jpg')}}" class="rounded-circle mr-3" style="width: 4%" alt="">
              <div class="input-group ">
                <input type="text" class="form-control rounded-lg mr-3" placeholder="Tambahkan komentar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-success rounded-lg" type="button" id="button-addon2">Tambah Komentar</button>
                </div>
              </div>
            </div>

            {{-- reply komentar --}}
            <div id="collapseOne" class="collapse">
              <div class="d-flex align-items-center py-3">
                <img src="{{asset('bootstrap/assets/img/user.jpg')}}" class="rounded-circle mr-3 d-flex align-self-baseline" style="width: 4%" alt="">
                <div class="">
                  <div class="">
                    <span><b>Nama User</b><span style="color: gray"> . date</span></span>
                  </div>
                  <div>
                    <p class="font-weight-bold">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos commodi a, 
                      obcaecati iure facere dolorem. Ipsum nemo debitis reprehenderit unde nam? 
                      Aut necessitatibus et consequatur totam voluptatem similique inventore 
                      reiciendis.
                    </p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <a href="">
                        <span class="material-icons mr-2">
                          arrow_circle_up
                        </span>
                      </a>
                      <span style="color: gray">Dukung Naik . 7</span>
                    </div>
  
                    <div class="d-flex align-items-center">
                      <a href="">
                        <span class="material-icons mr-2" style="color: gray">
                          arrow_circle_down
                        </span>
                      </a>
                      {{-- <a href="">
                        <span class="material-icons" style="color: gray">
                          outlined_flag
                        </span>
                      </a> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div>
              <button class="btn btn-link btn-block text-center collapsible-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Lihat Semua Komentar
              </button>
            </div>

          </div>

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
              <img src="{{asset('bootstrap/assets/img/user.jpg')}}" class="rounded-circle mr-3" style="width: 7%" alt="">
              <div class="">
                  <div>"Nama" Memposting</div>
              </div>
            </div>
            <div class="mt-3">
              <form action="">
                <textarea name="" id="" cols="30" rows="7" class="form-control"></textarea>
                <input type="file" class="form-control-file mt-3">
                <div class="mt-3">
                  <button type="button" class="btn btn-primary w-100">Posting</button>
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