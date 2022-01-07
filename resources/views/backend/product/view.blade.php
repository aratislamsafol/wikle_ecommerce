<div class="row">
    <div class="col-md-12 col-sm-12 table-responsive">
        <table id="view_details" class="table table-bordered table-hover">
            <tbody>
                <thead>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Brand Status</th>
                    <th scope="col">Brand Image</th>

                </thead>
                <tr >
                    <td> {{($tougallery->brand_name) }}</td>
                    <td>{{($tougallery->status) }}</td>
                    <td> <img src="{{ asset($tougallery->brand_image) }}" frameborder="0" width="100%" height="70%"> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
