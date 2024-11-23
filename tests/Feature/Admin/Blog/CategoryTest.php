<?php

use App\Filament\Resources\Blog\CategoryResource;

// TODO: Write CRUD tests.

it('can render category resource', function () {
    $this->get(CategoryResource::getUrl())->assertSuccessful();
});
