
   @if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-error">:message</div>')) !!}
   @endif
   
   @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
	<form method="post" action="{{ route('test') }}">
	 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
      <div>
	  Pickup Date: <input type="date" name="pickup_date" value="{{ old('pickup_date') }}"/> 
	  Pickup Time: <select name="pickup_time" >
	  <option value ="9.00" {{ old('pickup_time') == '9.00' ? 'selected' : '' }}>9.00</option>
	  <option value ="9.30" {{ old('pickup_time') == '9.30' ? 'selected' : '' }}>9.30</option>
	  <option value ="10.00" {{ old('pickup_time') == '10.00' ? 'selected' : ''}}>10.00</option>
	  <option value ="10.30" {{ old('pickup_time') == '10.30' ? 'selected' : ''}}>10.30</option>
	  <option value ="11.00" {{ old('pickup_time') == '11.00' ? 'selected' : ''}}>11.00</option>
	</select>
	  </div>
	  <p></p>
	  <div>
	  
	    Dropoff Date: <input type="date" name="dropoff_date"  value="{{ old('dropoff_date') }}"/> 
		Dropoff Time: <select name="dropoff_time" >
	  <option value ="9.00" {{ old('dropoff_time') == '9.00' ? 'selected' : '' }}>9.00</option>
	  <option value ="9.30" {{ old('dropoff_time') == '9.30' ? 'selected' : '' }}>9.30</option>
	  <option value ="10.00" {{ old('dropoff_time') == '10.00' ? 'selected' : ''}}>10.00</option>
	  <option value ="10.30" {{ old('dropoff_time') == '10.30' ? 'selected' : ''}}>10.30</option>
	  <option value ="11.00" {{ old('dropoff_time') == '11.00' ? 'selected' : ''}}>11.00</option>
	  </select>
	
	  </div>
	  
	  <div>
	   <input type="submit" value="Submit">
	  </div>
	  </form>
	  
<?php
#idjkhfjkvhjk
//xdebug_info();
 //$vehsearch  = "XYZ 9000 GT";
 //$vehsearch = preg_replace('/\s+/', '%', $vehsearch);
 //echo $vehsearch;
 $category = Categories :: withCount (['document' => function ($query) 
{
$query -> where (‘status’, 1);
}]) -> toSql();
echo $category;
 
 

?>