<?php
// app/Livewire/VideoFilter.php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;

class VideoFilter extends Component
{
    use WithPagination;

    public $filter = 'all';
    public $search = '';
    public $gridCols = 3;
    public $videoCategory;

    protected $queryString = ['filter', 'search'];

    public function mount($videoCategory = null)
    {
        $this->videoCategory = $videoCategory;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilter()
    {
        $this->resetPage();
    }

    public function setFilter($value)
    {
        $this->filter = $value;
    }

    public function setGridCols($cols)
    {
        $this->gridCols = $cols;
    }

    public function render()
    {
        $query = Video::query();


        $query =  $query->where('category', $this->videoCategory);


        // Recherche
        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        // Filtres
        switch ($this->filter) {
            case 'recent':
                $query->latest('created_at');
                break;

            case 'old':
                $query->oldest('created_at');
                break;

            case 'recommended':
                $query->where('highlighted', true)->latest('created_at');
                break;

            case 'max_views':
                $query->orderBy('views', 'desc');
                break;

            case 'all':
            default:
                $query->latest('created_at');
                break;
        }

        // Pagination de 3 pour tous les filtres
        $videos = $query->paginate(3);

        $advisoriesImagesUrl = \App\Models\Advisory::where('position', 'slide-category-page')
            ->where('visible', 1)
            ->pluck('file')
            ->map(fn($file) => asset('storage/' . $file))
            ->toArray();

        return view('livewire.video-filter', [
            'videos' => $videos,
            'advisoriesImagesUrl' => $advisoriesImagesUrl
        ]);
    }
}
