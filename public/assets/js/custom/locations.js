$(document).ready(function() {
    //locations dropdowns
    $('#country').on('change',function(){
        alert();
        var country_id = this.value;
        $.ajax({
            url: "/api/states_by_country",
            type:"post",
            cache: false,
            data:{
                country_id: country_id,
                _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $("#state-dropdown").empty().append('');
                $("#bs-select-1 ul").empty().append('');
                var stateCount = result.states.length;
                $('#state-dropdown').html('<option value="">Select State</option>'); 
                $.each(result.states,function(key,value){
                    $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            }
        });
    });

    $('#state-dropdown').on('change',function(){
        var state_id = this.value;
        $.ajax({
            url: "{{ route('city_by_states') }}",
            type:"post",
            cache: false,
            data:{
                state_id: state_id,
                _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $("#city-dropdown").empty().append('');
                $('#city-dropdown').html('<option value="">Select City</option>'); 
                $.each(result.cities,function(key,value){
                    $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
                
            }
        });
    });
    //locations dropdowns
});