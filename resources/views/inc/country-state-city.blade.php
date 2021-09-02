<div class="form-group">
<label for="country">Country</label>
<select class="form-control" id="country-dropdown">
<option value="">Select Country</option>
@foreach ($countries as $country) 
<option value="{{$country->id}}">
{{$country->name}}
</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="state">State</label>
<select class="form-control" id="state-dropdown">
</select>
</div>                        
<div class="form-group">
<label for="city">City</label>
<select class="form-control" id="city-dropdown">
</select>
</div>


<script>
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$("#state-dropdown").html('');
$.ajax({
url:"{{url('get-states-by-country')}}",
type: "POST",
data: {
country_id: country_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#state-dropdown').html('<option value="">Select State</option>'); 
$.each(result.states,function(key,value){
$("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
});
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$("#city-dropdown").html('');
$.ajax({
url:"{{url('get-cities-by-state')}}",
type: "POST",
data: {
state_id: state_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#city-dropdown').html('<option value="">Select City</option>'); 
$.each(result.cities,function(key,value){
$("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
});
}
});
});
});
</script>