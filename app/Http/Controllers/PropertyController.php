<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request) {
        $query = Property::query()->orderBy('created_at', 'desc');
        if ($price = $request->validated('price')){
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')){
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')){
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')){
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('property.index', [
            'properties'=> $query->paginate(10),
            'input' => $request->validated()
        ]);
    }
    public function show(string $slug, Property $property){
        $bonslug = $property->getslug();
        if ($slug != $bonslug){
            return to_route('property.show', ['slug' => $bonslug, 'property'=>$property]);
        }
        return view('property.show', [
            'property' => $property
        ]);
    }
    public function contact(Property $property, PropertyContactRequest $request){

    }
}
