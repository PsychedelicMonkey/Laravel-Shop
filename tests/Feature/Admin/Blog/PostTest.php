<?php

use App\Filament\Resources\Blog\PostResource;

// TODO: Write CRUD tests.

it('can render post resource', function () {
    $this->get(PostResource::getUrl())->assertSuccessful();
});
