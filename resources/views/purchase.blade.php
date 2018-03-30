@extends ('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Purchase Shares</h1>
        <form action="/shares" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label text-uppercase font-weight-bold">Company Name <span class="text-danger">*</span></label>
                <input name="company_name" type="text" class="form-control" id="name" placeholder="Company Name" value="{{Request::old('company_name')}}">
                @if ($errors->has('company_name'))
                    <p class="form-text text-danger">{{$errors->first('company_name')}}</p>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="share_class" class="form-control-label text-uppercase font-weight-bold">Share Class <span class="text-danger">*</span></label>
                    <select class="custom-select form-control" name="share_instrument_name" id="share_class">
                        <option value="">Select class of share</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="Preferred A">Preferred A</option>
                        <option value="Preferred B">Preferred B</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="price" class="form-control-label text-uppercase font-weight-bold">Price <span class="text-capitalize">(up to 10 decimals)</span> <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price" id="price" step="0.00000000001">
                </div>
                <div class="form-group col-md-2">
                    <label for="quantity" class="form-control-label text-uppercase font-weight-bold">Quantity <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" min="1" name="quantity" id="quantity">
                </div>
                <div class="form-group col-md-2">
                    <label for="total_investment" class="form-control-label text-uppercase font-weight-bold">Total Investment($)</label>
                    <input id="total_investment" name="total_investment" class="form-control text-center" type="text" readonly value="35">
                </div>
            </div>
            <div class="form-group">
                <label for="certificate_number" class="form-control-label text-uppercase font-weight-bold">Certificate Number</label>
                <input type="text" id="certificate_number" class="form-control" name="certificate_number" placeholder="Certificate Number">
            </div>
            <button type="submit" class="btn btn-success">Purchase</button>
        </form>
    </div>
@endsection
