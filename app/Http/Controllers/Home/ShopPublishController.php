<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class ShopPublishController extends Controller
{

    public function publish($id)
    {
        return $this->setPublishProperty($id, true);
    }

    public function unpublish($id)
    {
        return $this->setPublishProperty($id, false);
    }

    private function setPublishProperty($id, $isPublished)
    {
        $shop = \App\Models\Shop::findOrFail($id);

        // Check if the user is the author of the shop or an admin
        if (! $shop->canManage(auth()->user())) {
            abort(403, 'Unauthorized action.');
        }

        $shop->update(['is_published' => $isPublished]);

        return redirect()->back();
    }
}
