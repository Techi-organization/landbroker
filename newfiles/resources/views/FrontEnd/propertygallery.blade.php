
<html>
<body>
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr><th>#</th>
            <th>Picture</th>
        </tr>
        </thead>
        <tbody>
            @foreach($data as $image)
           <tr><td>{{$image->name}}</td>
               <td>
                <?php foreach (json_decode($image->property_images)as $picture) { ?>
                    <img src="{{ asset('/img/'.$picture) }}" style="height:150px; width:250px"/>
                   <?php } ?>
               </td>
          </tr>
            @endforeach
        </tbody>
       </table>

</body>
</html>

