<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;

class Reservation extends Component
{
    /**
     * define public variable
     */
    public $name, $email, $phone_number, $date, $time, $quantity, $message, $category_id;


    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //'phone_number' => 'required|regex:/^(^\+62|0)(\d{8,15})$/',
        'date' => 'required|date',
        'time' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'message' => 'required|string',
        'category_id' => 'required|exists:categories,id'
    ];

    public function render()
    {
        $categories = \App\Models\Category::get();
        return view('livewire.reservation', compact('categories'));
    }

    /**
     * store the user inputted post data in the posts table
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            \App\Models\Reservation::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'date' => $this->date,
                'time' => $this->time,
                'quantity' => $this->quantity,
                'message' => $this->message,
                'status' => 'pending',
                'category_id' => $this->category_id,
            ]);
            session()->flash('success', 'Reservation created successfully');
            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong');
        }
    }
}