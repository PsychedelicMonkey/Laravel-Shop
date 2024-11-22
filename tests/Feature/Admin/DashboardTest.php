<?php

use Filament\Pages\Dashboard;

it('can render dashboard', function () {
    $this->get(Dashboard::getUrl())->assertSuccessful();
});
