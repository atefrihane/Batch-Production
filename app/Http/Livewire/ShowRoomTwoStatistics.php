<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Batch\Models\Batch;

class ShowRoomTwoStatistics extends Component
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
        $statistics = Batch::secondStep()
            ->selectRaw('count(*) as totalBatches')
            ->selectRaw('COALESCE( SUM(weight),0) as totalWeights')
            ->first();
          

        $secondRoomBatches = Batch::query()
            ->secondStep()
            ->search($this->search)
            ->with('country')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.show-room-two-statistics', [
            'secondRoomBatches' => $secondRoomBatches,
            'statistics' => $statistics
        ]);

    }
}
