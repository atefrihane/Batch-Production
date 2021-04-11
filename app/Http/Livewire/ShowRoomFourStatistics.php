<?php

namespace App\Http\Livewire;

use App\Modules\Batch\Models\Batch;
use Livewire\Component;

class ShowRoomFourStatistics extends Component
{

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {

    }
    public function render()
    {
        $statistics = Batch::extra()
            ->selectRaw('count(*) as totalBatches')
            ->selectRaw('COALESCE( SUM(weight),0) as totalWeights')
            ->first();

        $fourthRoomBatches = Batch::query()
            ->extra()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->with('category', 'season', 'quality', 'pricing')
            ->paginate($this->perPage);

        return view('livewire.show-room-four-statistics', [
            'fourthRoomBatches' => $fourthRoomBatches,
            'statistics' => $statistics,
        ]);

    }
}
