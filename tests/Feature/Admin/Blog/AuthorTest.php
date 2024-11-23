<?php

use App\Filament\Resources\Blog\AuthorResource;

// TODO: Write CRUD tests.

it('can render author resource', function () {
    $this->get(AuthorResource::getUrl())->assertSuccessful();
});
