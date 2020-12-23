<?php

namespace App\Http\Livewire\Media;

use App\Gallary;
use Livewire\Component;

class GridMedia extends Component
{
    public $gallaries;
    public $searchInput = '';

    public $file_name;
    public $mime_type;
    public $created_at;
    public $size;
    public $dimension;

    public function click_modal($id)
    {
        $row_media_data = Gallary::findOrFail($id);
        
        $this->file_name = $row_media_data->file_name;
        $this->mime_type = $row_media_data->mime_type;
        $this->created_at = $row_media_data->created_at->toFormattedDateString();
        $this->size = $row_media_data->total_size();
        $this->dimension = $row_media_data->image_widht_height();

    }
    public function render()
    {
        try {
            $this->gallaries = Gallary::search($this->searchInput)->latest()->take(50)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('livewire.media.grid-media');
    }
}
