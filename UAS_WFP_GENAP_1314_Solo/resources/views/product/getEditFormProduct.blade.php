<form action="{{route('product.update', $data->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" id="name" name="form_product_name"
               aria-describedby="nameHelp" placeholder="Enter your Product Name" value="{{$data->product_name}}">
        <br>
        <label for="hotel_id">Product Type</label>
        <select name="form_product_type_id" id="hotel_id" class="form-control">
            @foreach ($product_type_controller as $d)
                <option value="{{ $d->id }}" {{ $d->id == $data->product_type_id ? 'selected' : '' }}>{{$d->product_type_name}}</option>
            @endforeach
        </select>
        <br>
        <label for="available_room">Price</label>
        <input type="number" min="100" step="10" class="form-control" id="available_room" name="form_price"
               aria-describedby="nameHelp" placeholder="Enter your Price" value="{{$data->price}}">
        <br>
        <label for="hotel_id">Owned by</label>
        <select name="form_hotel_id" id="hotel_id" class="form-control">
            @foreach ($product_hotel_id_controller as $da)
                <option value="{{$da->id}}" {{ $da->id == $data->hotel_id ? 'selected' : '' }}>{{$da->hotel_name}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

