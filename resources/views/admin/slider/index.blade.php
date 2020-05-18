 @extends('layouts.app')


 @section('title','Slider')

 @push('css')
   
    
 @endpush

 @section('content')
 <div class="content">
     <div class="container-fluid"> 
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header card-header-primary">
                         <h4 class="card-title ">All Slider</h4>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table id="table" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                                 <thead class=" text-primary">
                                     <th>ID</th>
                                     <th>Title</th>
                                     <th>Sub Title</th>
                                     <th>Image</th>
                                     <th>Created At</th>
                                     <th>Updated At</th>
                                 </thead>
                                 <tbody>
                                     @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->sub_title }}</td>
                                            <td>{{ $slider->image }}</td>
                                            <td>{{ $slider->created_at }}</td>
                                            <td>{{ $slider->updated_at }}</td>
                                        </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
 @endsection

 @push('scripts')
 <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" >
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script> -->


<script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#table').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>
<!-- <script>
    $(document).ready(function() {
    $('#table').DataTable();
} );
</script> -->
 @endpush