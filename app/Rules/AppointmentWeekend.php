<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AppointmentWeekend implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
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
        //
        $date = strtotime($value);
        return date('D', $date) != 'Sun' && date('D', $date) != 'Sat';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Appointment not available on weekend.';
    }
}
