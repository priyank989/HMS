<tr class="item-row">
    <td></td>
    <td class="description">
        <select name  = "service[{{$count}}][category]" id = "category_{{$count}}" >
            <option> Select Category </option>
@foreach($category as $key => $val)
        <option value = {{$key}}> {{$val}} </option>
        @endforeach
        </select>
        
    </td>
    
    <td>
        <select name  = "service[{{$count}}][service]" id ="service_{{ $count }}">
            <option> Select Service </option>

        </select>
        <!-- <input required type="number" class="form-control reg_rate" name="service[{{$count}}][rate]"> -->
    </td>
    
    <td>
        <input id = "quant_{{$count}}" required type="number" class="form-control reg_unit" name="service[{{$count}}][unit]">
    </td>

    <td>
        <input id = "amount_{{$count}}" required type="text" class="form-control reg_amount" name="service[{{$count}}][amount]"></td>
        
        
        <td>
            
         <button type="button" class="delete btn btn-sm btn-danger">Remove</button>
      
        </td>
    
    </tr>

    <script>
        var count = <?php echo $count; ?>;
        var services_{{$count}} = <?php echo json_encode($service)  ?>;
        
        var selectedService;


 $('#category_'+count).on('change', function() {
    var categoryService = services_{{$count}}.filter(ser => ser.category_id == this.value );

        if ( categoryService ) {
            $.each(categoryService,function(_, {id, name}){
              $('#service_'+<?php echo $count; ?>).html('<option >Select Service</option><option value="'+id+'">'+name+'</option>');
            });
        }
        $("#quant_"+count).val('');
        $("#amount_"+count).val('');
});

$('#service_'+count).on('change', function() {
     selectedService = services_{{$count}}.find(ser => ser.id == this.value);
    var {price} = selectedService;
    $("#quant_"+<?php echo $count; ?>).val(1);
    $("#amount_"+<?php echo $count; ?>).val(price);
});


$(`#quant_${count}`).on('change', function () {
    var quantValue = this.value *  selectedService.price;

$("#amount_"+count).val(quantValue);
});

$(".delete").on('click',function(){
                $(this).parents('.item-row').remove();
                // if ($(".delete").length < 2) 
                // $(".delete").hide();
            });


</script>