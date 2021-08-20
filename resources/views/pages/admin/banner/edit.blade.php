@extends('layouts.admin')

@section('title')
    Banner
@endsection

@section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">banner</h2>
                <p class="dashboard-subtitle">
                   Edit Banner
                </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-md-12">
                    {{-- error message--}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('banner.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" value=" {{ $item->title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" name="description" class="form-control" value=" {{ $item->description }}" required>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status" class="">Status</label>
                                            <select name="status" required class="form-control">
                                                <option value="active">Active</option>
                                                <option value="inactive">InActive</option>
                                            </select>
                                            {{-- <select name="status" required class="form-control">
                                            <option value="active" {{(($item->status=='active') ? 'selected' : '')}}>Active</option>
                                            <option value="inactive" {{(($item->status=='inactive') ? 'selected' : '')}}>Inactive</option>
                                            </select> --}}
                                        </div>
                                      </div>

                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label>status</label>
                                            <select name="status" required class="form-control">
                                                <option value="active">Active</option>
                                                <option value="inactive">InActive</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>  
              
            </div>
        </div>
			
	</div>
@endsection