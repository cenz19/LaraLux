<form action="{{route('facility.update', $data->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Facility Name</label>
        <input type="text" class="form-control" id="name" name="form_facility_name"
               aria-describedby="nameHelp" placeholder="Enter your Facility Name" value="{{$data->facility_name}}">
        <br>
        <label for="available_room">Description</label>
        <textarea class="form-control" id="available_room" name="form_description" aria-describedby="nameHelp" placeholder="Enter your description">{{$data->description}}</textarea>
        <br>

        <label for="hotel_id">Owned by</label>
        <select name="form_product_id" id="hotel_id" class="form-control">
            @foreach ($product_id as $d)
                <option value="{{$d->id}}" {{ $d->id == $data->product_id ? 'selected' : '' }}>{{$d->product_name}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

