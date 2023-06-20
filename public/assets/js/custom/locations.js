$(document).ready(function() {
    //locations dropdowns
    $('#country').on('change',function(){
        alert();
        var countryId = this.value;
        getStates(countryId, countryId);
    });
    function getStates(country, stateid=null){
        $.ajax({
            url: statesByCountryUrl,
            type:"post",
            cache: false,
            data:{
                country_id: country,
                _token: token 
            },
            dataType : 'json',
            success: function(result){
                $("#state-dropdown").empty().append('');
                $("#bs-select-1 ul").empty().append('');
                var stateCount = result.states.length;
                $('#state-dropdown').html('<option value="">Select State</option>'); 
                $.each(result.states,function(key,value){
                    if( stateid == value.id){
                        $("#state-dropdown").append('<option selected value="'+value.id+'">'+value.name+'</option>');
                    }else{
                        $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    }
                });
            }
        });
    }
    $('#state-dropdown').on('change',function(){
        var state_id = this.value;
        getCity(state_id, cityId);
    });
    function getCity(state_id, cityId = null){
        $.ajax({
            url: cityByStatesUrl,
            type:"post",
            cache: false,
            data:{
                state_id: state_id,
                _token: token 
            },
            dataType : 'json',
            success: function(result){
                $("#city-dropdown").empty().append('');
                $('#city-dropdown').html('<option value="">Select City</option>'); 
                $.each(result.cities,function(key,value){
                    if(cityId == value.id){
                        $("#city-dropdown").append('<option selected value="'+value.id+'">'+value.name+'</option>');
                    } else{
                        $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    }
                });
                
            }
        });
    }
    if(countryId != 0){
        getStates(countryId, stateId);
    }
    if(stateId != 0){
        getCity(stateId, cityId);
    }
    //locations dropdowns
});