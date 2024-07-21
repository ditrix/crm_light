Для реализации функционала CRUD, где можно просматривать и редактировать связанные элементы, вы можете воспользоваться Eloquent relationships в Laravel. Пример ниже покажет, как это можно сделать с использованием ресурсов, контроллеров и представлений.

### Модели

```php
// Master.php
class Master extends Model {
    public function details() {
        return $this->hasMany(Detail::class);
    }
}

// Detail.php
class Detail extends Model {
    public function master() {
        return $this->belongsTo(Master::class);
    }
    
    public function dictionary() {
        return $this->belongsTo(Dictonary::class);
    }
}

// Dictonary.php
class Dictonary extends Model {
    // Связь не обязательна, если не планируете обратные отношения
}
```

### Контроллеры

#### MasterController

```php
class MasterController extends Controller
{
    public function index()
    {
        return MasterResource::collection(Master::all());
    }
    
    public function show($id)
    {
        $master = Master::with('details.dictionary')->findOrFail($id);
        return new MasterResource($master);
    }
    
    public function edit($id)
    {
        $master = Master::with('details.dictionary')->findOrFail($id);
        $dictionaries = Dictonary::all();
        return view('masters.edit', compact('master', 'dictionaries'));
    }

    public function update(Request $request, $id)
    {
        $master = Master::findOrFail($id);
        $master->update($request->all());
        
        // Обновление связанных деталей
        foreach ($request->details as $detailData) {
            $detail = Detail::findOrFail($detailData['id']);
            $detail->update($detailData);
        }

        return redirect()->route('masters.show', $master->id);
    }
}
```

### Ресурсы

#### MasterResource

```php
class MasterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'master_info' => $this->master_info,
            'details' => DetailResource::collection($this->details),
        ];
    }
}

#### DetailResource

```php
class DetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dictionary' => new DictonaryResource($this->dictionary),
        ];
    }
}

#### DictonaryResource

```php
class DictonaryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dictonary_info' => $this->dictonary_info,
        ];
    }
}
```

### Представления

#### master.blade.php

```html
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $master->master_info }}</h1>

    <h2>Details</h2>
    <ul>
        @foreach($master->details as $detail)
            <li>{{ $detail->dictionary->dictonary_info }}</li>
        @endforeach
    </ul>

    <h2>Edit Master</h2>
    <form method="POST" action="{{ route('masters.update', $master->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="master_info">Master Info</label>
            <input type="text" name="master_info" value="{{ $master->master_info }}" class="form-control">
        </div>

        <h3>Details</h3>
        @foreach($master->details as $detail)
            <div class="form-group">
                <label for="detail_{{ $detail->id }}">Detail {{ $loop->iteration }}</label>
                <select name="details[{{ $loop->index }}][dictonary_id]" class="form-control">
                    @foreach($dictionaries as $dictionary)
                        <option value="{{ $dictionary->id }}" {{ $detail->dictionary_id == $dictionary->id ? 'selected' : '' }}>
                            {{ $dictionary->dictonary_info }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
```

Этот пример показывает, как можно реализовать CRUD функционал, включая просмотр и редактирование связанных элементов. Вы можете использовать Eloquent relationships для загрузки связанных данных, и ресурсы для представления данных в формате JSON. Представления (blade или vue) позволяют редактировать связанные элементы через формы и отправлять их обратно на сервер для обновления.
