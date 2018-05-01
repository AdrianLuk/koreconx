@extends ('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Purchase Shares</h1>
        <form action="/shares" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="form-control-label text-uppercase font-weight-bold">Company Name <span class="text-danger">*</span></label>
                <input name="company_name" type="text" class="form-control" id="name" placeholder="Company Name" value="{{Request::old('company_name')}}">
                @if ($errors->has('company_name'))
                    <span class="form-text text-danger">{{$errors->first('company_name')}}</span>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="share_class" class="form-control-label text-uppercase font-weight-bold">Share Class <span class="text-danger">*</span></label>
                    <select name="share_instrument_name" class="custom-select form-control" id="share_class">
                        <option value="">Select class of share</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="Preferred A">Preferred A</option>
                        <option value="Preferred B">Preferred B</option>
                    </select>
                    @if ($errors->has('share_instrument_name'))
                    <span class="form-text text-danger">The share class field is required.</span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label for="price" class="form-control-label text-uppercase font-weight-bold">Price <span class="text-capitalize">(up to 10 decimals)</span> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="price" id="price" step="0.0000000001" oninput=calculate()>
                    @if ($errors->has('price'))
                    <span class="form-text text-danger">{{$errors->first('price')}}</span>
                    @endif
                </div>
                <div class="form-group col-md-2">
                    <label for="quantity" class="form-control-label text-uppercase font-weight-bold">Quantity <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" min="1" name="quantity" id="quantity" oninput=calculate()>
                    @if ($errors->has('quantity'))
                    <span class="form-text text-danger">{{$errors->first('quantity')}}</span>
                    @endif
                </div>
                <div class="form-group col-md-2">
                    <label for="total_investment" class="form-control-label text-uppercase font-weight-bold">Total Investment($)</label>
                    <input id="total_investment" name="total_investment" class="form-control text-center" type="text" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="certificate_number" class="form-control-label text-uppercase font-weight-bold">Certificate Number</label>
                <input type="text" maxlength="10" id="certificate_number" class="form-control" name="certificate_number" placeholder="Certificate Number">
                    @if ($errors->has('certificate_number'))
                        <span class="form-text text-danger">{{$errors->first('certificate_number')}}</span>
                    @endif
            </div>
            <button type="submit" class="btn btn-success">Purchase</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>

    <script>
        function calculate(){
            const price = document.getElementById('price').value;
            const quantity = document.getElementById('quantity').value;
            let total = document.getElementById('total_investment');
            total.value = (price * quantity).toFixed(2);
            // console.log(total.value);
        }
    </script>
@endsection
