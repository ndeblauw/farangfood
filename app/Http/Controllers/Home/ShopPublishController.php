<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Notifications\ShopPublishedNotification;

class ShopPublishController extends Controller
{
    public function publish($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->author->notify(new ShopPublishedNotification($shop));

        return $this->setPublishProperty($id, true);
    }

    public function unpublish($id)
    {
        return $this->setPublishProperty($id, false);
    }

    private function setPublishProperty($id, $isPublished)
    {
        $shop = Shop::findOrFail($id);

        // Check if the user is the author of the shop or an admin
        if (! $shop->canManage(auth()->user())) {
            abort(403, 'Unauthorized action.');
        }

        $shop->update(['is_published' => $isPublished]);
        cache()->forget('shops_index'); // Clear the cache for the shops index page

        return redirect()->back();
    }
}
