<?php

namespace App\Http\Livewire\Manager;

use App\Models\Leave as ModelsLeave;
use Livewire\Component;

class Leave extends Component
{
    public $search;
    public $orderField = 'created_at';
    public $orderDirection = 'ASC';


    protected $listeners = [
        'leaveAdded' => '$refresh',
        'leaveUpdated' => '$refresh',
        'leaveDeleted' => '$refresh',
    ];

    public function render()
    {
        $leaves = $this->getLeaves();
        return view('livewire.manager.leave', compact('leaves'))
            ->extends('layouts.admin', ['title' => "Leaves"])
            ->section('main');
    }

    public function setOrderField(string $name)
    {
        if ($name === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }

    public function getLeaves()
    {
        $query = ModelsLeave::query();
        $search = '%' . $this->search . '%';

        $query->where('status', 'LIKE', $search);
        $query->orWhereDate('start_date', $this->search);
        $query->orWhereDate('end_date', $this->search);
        $query->orWhereHas('notices', function ($query) use ($search) {
            $query->where('content', 'LIKE', $search);
        });

        $query->orderBy($this->orderField, $this->orderDirection);


        return $query->latest()->paginate(10);
    }
}
