@include('layouts.header')
@include('layouts.navbar')

<div class="main-content" style="min-height: 874px;">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Panitia Kurban</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Daftar panitia</div>
            </div>
        </div>
        <div class="section-body">
         <button class="btn btn-primary mt-3"  data-toggle="modal" id="togglemodal" data-target="#modalTambah">Tambah Panitia</button>
            <div class="table-responsive mt-3">
                    <table class="table table-striped" id="table-1">
                      <thead>                                 
                        <tr>
                          <th class="text-center">
                            #
                          </th>
                          <th>Nama</th>
                          <th>Nomor seluler</th>
                          <th>Posisi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody> 
                        @foreach ($list as $item)                                                        
                        <tr>
                          <td>
                        {{$loop->iteration}}
                          </td>
                          <td>{{$item->nama}}</td>
                          <td>
                                {{$item->telp}}
                          </td>
                          <td>
                                {{$item->jabatan}}
                          </td>
                          <td>                                                       
                               
                                <div class="btn-group mb-3" role="group" aria-label="Basic example" style="padding-left: 20px;">
                                <a href="#" class="open-edit btn btn-icon btn-sm btn-warning" data-toggle="modal" data-id="{{ $item->id }}" data-target="#editModal{{$item->id}}"><i class="fas fa-edit"></i></i> Edit</a>
                                        <button class="btn btn-icon btn-sm btn-danger"  data-toggle="modal"  data-target="#hapusModal{{$item->id}}"><i class="fas fa-trash"></i> Hapus</button>                                          
                                </div>                                
                          </td>
                        </tr>
                        @endforeach  
                      </tbody>
                    </table>
                  </div>
            

        </div>
    </section>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Menambahkan Panitia Kurban</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{route('tambahpanitia')}}">
                        @method('patch')
                        @csrf  
                    <div class="form-group">
                            <label>Nama Panitia</label>
                            <select name="anggota"  class="form-control select2" style="margin-bottom:10px; width:100%;">
                                @foreach ($seluruhtakmir as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                                    
                            </select>
                    </div>
                    <div class="form-group">
                            <label>Posisi</label>                          
                            <select name="idJabatan" class="form-control select2" style="margin-bottom:10px; width:100%;">
                                @foreach ($jabatan as $item) 
                                @if($isketuapanitia && $item->id_jabatan == 10 )
                                <?php continue; ?>
                                @endif                            
                            <option  value="{{$item->id_jabatan}}">{{$item->jabatan}}</option>                          
                                @endforeach    
                            </select>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
          </div>
    </div>
</div>

@include('layouts.footer')
{{-- <script>
       var id =  $('#toggle-modal-1').data("id");
        $('#toggle-modal-1').fireModal({
          title: 'My Modal',
          body: id ,
          buttons: [
            {
              text: 'Close',
              class: 'btn btn-secondary',
              handler: function(current_modal) {
              $.destroyModal(current_modal);
              }
            },
            {
              submit: true ,
              text: 'Hapus',
              class: 'btn btn-primary',
            }
          ]
        });
      </script> --}}
                                    
      
      @foreach ($list as $item) 
      {{-- Hapus modal --}}
                                <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal{{$item->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title">Hapus {{$item->nama}} dari panitia?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                        <form method="POST" action="{{route('hapuspanitia')}}">
                                                                @csrf  
                                                        <input type="hidden" name="idAnggota" value="{{$item->id}}">
                                                            
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                </div>
                                                        </form>
                                                
                                            </div>
                                        </div>
                                </div>
    {{-- END Hapus modal --}}
      {{-- Edit modal --}}
      <div class="modal fade" tabindex="-1" role="dialog" id="editModal{{$item->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Ubah Panitia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                            <form method="POST" action="{{route('hapuspanitia')}}">
                                    @csrf  
                                    <div class="form-group">
                                            <label>Nama Panitia</label>
                                            <p style="margin-bottom:10px; width:100%;">{{$item->nama}}</p>                                                 
                                    </div>
                                    <div class="form-group">
                                            <label>Posisi</label>    
                                            <select name="idJabatan" class="form-control select2" style="margin-bottom:10px; width:100%;">
                                                @foreach ($jabatan as $item)                                              
                                            <option  value="{{$item->id_jabatan}}">{{$item->jabatan}}</option>
                                               
                                                @endforeach    
                                            </select>
                                    </div>        
                                    <input type="hidden" name="idAnggota" value="{{$item->id}}">
                                
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                            </form>
                    
                </div>
            </div>
    </div>
{{-- END edit modal --}}
    @endforeach