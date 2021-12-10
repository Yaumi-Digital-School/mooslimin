@extends('layouts.app')
@section('title')
    Forum
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
            <div class="rounded-pill border border-secondary d-inline-flex align-self-end">

                <a href="" class="">
                  <span class="material-icons px-2">
                    arrow_circle_up
                  </span>
                </a>
                |
                <a href="">
                  <span class="material-icons px-2">
                    arrow_circle_down
                  </span>
                </a>

            </div>
          </div>
          <div class="py-3">
            <p class="font-weight-bold">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic ducimus porro 
              soluta, dolores cumque natus facere voluptatem et ad non quidem aperiam voluptate incidunt 
              laboriosam. Officiis deleniti voluptate laborum adipisci.
            </p>
          </div>
          <div>
            <div class="d-flex justify-content-between align-items-center align-self-center">
              <img src="{{asset('bootstrap/assets/img/user-2.jpg')}}" class="rounded-circle mr-3" style="width: 4%" alt="">
              <div class="input-group ">
                <input type="text" class="form-control rounded-pill mr-3" placeholder="Tambahkan komentar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-success rounded-pill" type="button" id="button-addon2">Tambah Komentar</button>
                </div>
              </div>
            </div>

            {{-- reply komentar --}}
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
                    <a href="">
                      <span class="material-icons" style="color: gray">
                        outlined_flag
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>

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
            <div class="rounded-pill border border-secondary d-inline-flex align-self-center">

              <a href="" class="">
                <span class="material-icons px-2">
                  arrow_circle_up
                </span>
              </a>
              |
              <a href="">
                <span class="material-icons px-2">
                  arrow_circle_down
                </span>
              </a>

            </div>
          </div>
          <div class="py-3">
            <p class="font-weight-bold">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic ducimus porro 
              soluta, dolores cumque natus facere voluptatem et ad non quidem aperiam voluptate incidunt 
              laboriosam. Officiis deleniti voluptate laborum adipisci.
            </p>
          </div>
          <div class="d-flex justify-content-between align-items-center align-self-center">
            <img src="{{asset('bootstrap/assets/img/user-2.jpg')}}" class="rounded-circle mr-3" style="width: 4%" alt="">
            <div class="input-group ">
              <input type="text" class="form-control rounded-pill mr-3" placeholder="Tambahkan komentar..." aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-success rounded-pill" type="button" id="button-addon2">Tambah Komentar</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>








    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
@endsection