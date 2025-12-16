@extends('super_admin.app')
@section('title', 'admin')
@section('content')
    @include('venue_provider.layouts.header')
    @include('components.toast')
    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card form-card">
                    <div class="form-header nbg">
                        Footer setting
                    </div>
                    <div class="form-body card-body">
                        <form action="{{route('ad.footer.submit')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="text" class="form-label">Instagram</label>
                                <input type="text" name="ins" id="text" class="form-control" value="{{old('ins',$footer['ins']??null)}}">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Facebook</label>
                                <input type="text" name="fb" id="text" class="form-control"  value="{{old('fb',$footer['fb']??null)}}">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Vimeo</label>
                                <input type="text" name="vimeo" id="text" class="form-control"  value="{{old('vimeo',$footer['vimeo']??null)}}">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Youtube</label>
                                <input type="text" name="yt" id="text" class="form-control" value="{{old('yt',$footer['yt']??null)}}">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">x</label>
                                <input type="text" name="x" id="text" class="form-control" value="{{old('x',$footer['x']??null)}}">
                            </div>
                            <div class="form-end">
                                <button type="submit" class="btn form-submit-btn">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
