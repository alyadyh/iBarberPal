@extends('admin.layout')

@section('content')
<div class="page-header">
  <div class="row align-items-end">
      <div class="col-lg-8">
          <div class="page-header-title">
              <i class="ik ik-inbox bg-blue"></i>
              <div class="d-inline">
                  <h5>Hairstyles</h5>
                  <span>List of hairstyles recommendation in iBarberPal</span>
              </div>
          </div>
      </div>
      <div class="col-lg-4">
          <nav class="breadcrumb-container" aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                      <a href="{{ route('admin.dashboard.index') }}"><i class="ik ik-home"></i></a>
                  </li>
                  <li class="breadcrumb-item">
                      <a href="#">Business</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Hairstyles</li>
              </ol>
          </nav>
      </div>
  </div>
</div>


<div class="page-header">
    <div class="row align-items-end flex-column col-lg-12">
        <a href="{{ route('admin.hairstyles.create') }}">
            <button type="button" class="btn btn-info"><i class="ik ik-plus"></i>Add Hairstyle</button>
        </a>
    </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-block">
          <h3>Hairstyle Data</h3>
      </div>
      <div class="card-body">
          <div class="dt-responsive">
              <table id="simpletable"
                     class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($hairstyles as $hairstyle)
                        <tr>
                            <td>{{ $hairstyle->category->name }}</td>
                            <td>{{ $hairstyle->name }}</td>
                            <td>{!! nl2br(e(wordwrap($hairstyle->description, 50, "\n", true))) !!}</td>
                            <td class="col-md-3">
                                @if ($hairstyle->image)
                                    <img src="{{ asset('storage/images/hairstyles/'.$hairstyle->image) }}" style="height: 100px; width: 95px;">                                    
                                @else
                                    <span>No image found!</span>
                                @endif
                            </td>
                            <td class="col-md-1">
                                <div class="table-actions d-flex justify-content-around">
                                    <a href='{{ route('admin.hairstyles.edit', $hairstyle->id) }}'>
                                        <button type="button" class="btn btn-icon btn-warning"><i class="ik ik-edit-2"></i></button>
                                    </a>
                                    <form id="delete-hairstyle-{{ $hairstyle->id }}" onsubmit="return confirm('You want to delete this data?')" 
                                        action="{{ route('admin.hairstyles.destroy', $hairstyle->id)  }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name='submit' class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                                      </form>
                                </div>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  </tfoot>
              </table>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection