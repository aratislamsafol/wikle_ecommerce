<div class="row">
    <div class="col-md-12 col-sm-12 table-responsive">
        <table id="view_details" class="table table-bordered table-hover">
            <tbody>
                <thead>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Brand</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </thead>

                <tr>
                    <td>{{$product->product_name }}</td>
                    <td>{{$product->category_id }}</td>
                    <td>{{$product->brand_id }}</td>
                    <td>{{$product->product_quantity }}</td>
                    <td> <img src="{{ asset($product->image_one) }}" frameborder="0" width="100%" height="70%"> </td>
                    <td>{{($product->price) }}</td>
                    <td>{{($product->status) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
