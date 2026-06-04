<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateArticleForm extends Component
{
    #[validate('required|min:5')]
    public $title;
    #[validate('required|min:10')]
    public $description;
    #[validate('required|numeric')]
    public $price;
    #[validate('required')]
    public $category;
    public $article;

    public function store(){
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);

        $this->reset();
        session()->flash('success', 'Articolo creato correttamente');
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
