<div class="col-md-12">
              <div class="card">
                  <div class="content table-responsive table-full-width">
                      <table class="table table-hover">
                          <thead>
                            <th>Sl No</th>
                            <th>Catagory Name</th>
                            <th>Catagory Title</th>
                            <th>Status</th>
                          </thead>
                          <tbody>
                            @foreach($catagory as $key=>$catagory_data_value)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$catagory_data_value->catagory_name}}</td>
                                <td>{{$catagory_data_value->catagory_title}}</td>
                                <td>
                              @if($catagory_data_value->catagory_status=='Active')
                                 <span style="color:green;">
                                  <i class="fa fa-circle" aria-hidden="true"></i> {{$catagory_data_value->catagory_status}}
                                 </span>
                              @else
                               <span style="color:red;">
                                  <i class="fa fa-circle" aria-hidden="true"></i> {{$catagory_data_value->catagory_status}}
                                 </span>
                              @endif


                                 </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
         </div>