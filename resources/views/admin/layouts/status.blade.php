<script type="text/javascript">
    $(document).ready(function () {
        
        $("body").on('click', '.userstatus', function () {
            
            var obj = $(this);
            var id = obj.attr('data-id');
            var status = obj.attr('data-status');
            var status_update = 1;
            if(status == 1){
            status_update = 0;    
            }
            $.ajax({
                type: "POST",
                url: "{{ URL::route('admin.userstatus') }}", // URL 
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: id,
                    status: status
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data !== "") {
                        if(data == true){
                         if(status_update == 1){
                            obj.removeClass('btn-success fa-check'); 
                            obj.addClass('btn-danger fa-remove');
                            obj.attr('data-status', status_update);
                         }else{
                            obj.removeClass('btn-danger fa-remove'); 
                            obj.addClass('btn-success fa-check');
                            obj.attr('data-status', status_update);
                         }  
                        }
                    }
                },
                complete: function (data) {
                    
                }});
            return false;
        });
       
    });
</script>
