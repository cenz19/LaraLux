<form action="{{route('hotel.update', $data->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Hotel Name</label>
        <input type="text" class="form-control" id="hotel_name" name="form_hotel_name"
               aria-describedby="nameHelp" placeholder="Enter your Hotel Name" value="{{$data->hotel_name}}">
        <br>
        <label for="price">Address</label>
        <input type="text" class="form-control" id="address" name="form_address"
               aria-describedby="nameHelp" placeholder="Enter your Address" value="{{$data->address}}">
        <br>
        <label for="available_room">Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="form_phone_number"
               aria-describedby="nameHelp" placeholder="Enter your Phone Number" value="{{$data->phone_number}}">
        <br>
        <label for="images">Email</label>
        <input type="email" class="form-control" id="email" name="form_email"
               aria-describedby="nameHelp" placeholder="Enter your Email" value="{{$data->email}}">
        <br>
        <label for="hotel_id">Hotel Type</label>
        <select name="form_hotel_type_id" id="hotel_type" class="form-control">
            @foreach ($hotel_type_controller as $d)
                <option value="{{ $d->id }}" {{ $d->id == $data->hotel_type_id ? 'selected' : '' }}>{{ $d->hotel_type_name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

