<tbody id="sortable">
    @foreach($data['settings'] as $setting)
    <tr id="item-{{$setting->id}}">
        <td>{{$setting->id}}</td>
        <td class="sortable">{{$setting->settings_description}}</td>
        <td>{{$setting->settings_key}}</td>
        <td>{{$setting->settings_value}}</td>
        <td>{{$setting->settings_type}}</td>
        <td>{{$setting->settings_must}}</td>
        <td>{{$setting->settings_status}}</td>
        <td>
            <a href="/admin/setting/update/{{$setting->id}}">
                <i class="fa fa-pencil-square"></i>
            </a>
        </td>
        <td>
            <a href="/admin/setting/delete/{{$setting->id}}">
                <i class="fa fa-trash-o"></i>
            </a>
        </td>
    </tr>
    @endforeach
</tbody>


<script type="text/javascript">

    $(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        //

        $('#sortable').sortable({
            revert:true,
            handle:'.sortable',
            stop: function(event, ui){
                var data = $(this).sortable('serialize');
                $.ajax({
                    type: 'POST',
                    data:data,
                    url:'/admin/setting/sort',
                    success:function(msg){
                        if(msg){
                            alertify.success('success', 1);
                        }else{
                            alertify.error('error', 1);
                        }
                    }
                })
            }
        });

        $('#sortable').disableSelection();
    });

</script>