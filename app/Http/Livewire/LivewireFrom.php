<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LivewireFrom as posts;
use PhpParser\Node\Expr\FuncCall;

class LivewireFrom extends Component
{

    public $posts;
    public $email;
    public $password;
    public $address;
    public $addressTwo;
    public $city;
    public $state;
    public $zip;
    public $check;
    public $validateData;
    public $post_id;
    public $updatePost = false;

    protected $rules = [
        'email' => 'required|min:6',
        'password' => 'required',
        'address' => 'required',
        'addressTwo' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
    ];

    public function resetField(){
        $this->email = '';
        $this->password = '';
        $this->address = '';
        $this->addressTwo = '';
        $this->city = '';
        $this->state = '';
        $this->zip = '';
        $this->check = '';
    }


    public function store()
    {
       $validatedData = $this->validate();
       try {

        posts::create([
            'email'=>$this->email,
            'password'=>$this->password,
            'address'=>$this->address,
            'addressTwo'=>$this->addressTwo,
            'state'=>$this->state,
            'city'=>$this->city,
            'zip'=>$this->zip,
        ]);
        session()->flash('message', 'from successfully Store!!');
        $this->resetField();

      } catch (Exception $e) {

        session()->flash(' ', 'something is wrong!!');

          return $e->getMessage();

      }

    }

    public function edit($id){
        $post = posts::findOrFail($id);
        $this->email = $post->email;
        $this->password = $post->password;
        $this->address = $post->address;
        $this->addressTwo = $post->addressTwo;
        $this->address = $post->address;
        $this->state = $post->state;
        $this->city = $post->city;
        $this->zip = $post->zip;
        $this->post_id = $post->id;
        $this->updatePost = true;

    }

    public function cancel(){
        $this->updatePost = false;
        $this->resetField();
    }

    public function update(){
         $this->validate();
        try {

         posts::find($this->post_id)->fill([
             'email'=>$this->email,
             'password'=>$this->password,
             'address'=>$this->address,
             'addressTwo'=>$this->addressTwo,
             'state'=>$this->state,
             'city'=>$this->city,
             'zip'=>$this->zip,
         ])->save();
         session()->flash('message', 'from successfully update!!');
         $this->resetField();

       } catch (Exception $e) {

         session()->flash(' ', 'something is wrong!!');

           return $e->getMessage();

       }
    }


    public function destroy($id){
        try {
            posts::find($id)->delete();
         session()->flash('message', 'Post delete successfully !!');
       }
       catch (Exception $e) {
         session()->flash(' ', 'something is wrong!!');
           return $e->getMessage();

       }
    }
    public function render()
    {
        // select('id','address', 'state', 'city', 'zip')
        $this->posts = posts::all();
        return view('livewire.livewire-from');
    }
}
