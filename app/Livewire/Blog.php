<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    #[Url(as: 's')]
    public $search = '';

    #[Url(as: 'c')]
    public $category = '';

    public function render()
    {
        $posts = \App\Models\Post::with('categories')
            ->where('is_published', 1)
            ->where(function ($query) {
                $query->where('title_en', 'like', '%'.$this->search.'%')
                    ->orWhere('title_ar', 'like', '%'.$this->search.'%');
            })
            ->when($this->category, function ($query) {
                return $query->whereHas('categories', function ($query) {
                    $query->where('category_id', $this->category);
                });
            })
            ->paginate(4);

        return view('livewire.blog', [
            'allPosts' => $posts,
        ]);
    }
}
