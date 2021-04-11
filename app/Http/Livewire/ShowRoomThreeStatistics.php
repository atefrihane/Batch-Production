<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Modules\Batch\Models\Batch;

class ShowRoomThreeStatistics extends Component
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
        $statistics = Batch::thirdStep()
            ->selectRaw('count(*) as totalBatches')
            ->selectRaw('COALESCE( SUM(weight),0) as totalWeights')
            ->first();
          

        $thirdRoomBatches = Batch::query()
            ->thirdStep()
            ->search($this->search)
            ->with('country')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.show-room-three-statistics', [
            'thirdRoomBatches' => $thirdRoomBatches,
            'statistics' => $statistics
        ]);

    }
}
