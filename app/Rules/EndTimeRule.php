<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class EndTimeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private  $startDate, 
	                            private  $endDate,
								private  $startTime,
								private  $endTime)
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(isset($this->startDate) && isset($this->endDate) && 
		   isset($this->startTime) && isset($this->endTime)){ 
		
		$startDate=Carbon::createFromFormat('Y-m-d',$this->startDate);
        $endDate=Carbon::createFromFormat('Y-m-d',$this->endDate);
        $startTime = Carbon::createFromFormat('H.i',$this->startTime);
        $endTime = Carbon::createFromFormat('H.i',$this->endTime);
        if($startDate == $endDate && $endTime <= $startTime){

            return false;
        }

        return true;
		
		}
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Pickup time must be less than Dropoff time';
    }
}
