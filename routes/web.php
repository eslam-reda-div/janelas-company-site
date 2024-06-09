<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('ASSET_PREFIX', '').'/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(env('ASSET_PREFIX', '').'/livewire/livewire.js', $handle);
});
/*
/ END
*/

Route::group(['middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'CountVisitors'], 'prefix' => LaravelLocalization::setLocale()], function () {

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post(env('ASSET_PREFIX', '').'/livewire/update', $handle);
    });

    Livewire::setScriptRoute(function ($handle) {
        return Route::get(env('ASSET_PREFIX', '').'/livewire/livewire.js', $handle);
    });

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/gallery', function () {
        return view('gallery');
    })->name('gallery');

    Route::get('/blogs', function () {
        return view('blog');
    })->name('blog');

    Route::get('/case-studies', function () {
        //        dd(\App\Models\CaseCategory::with('CaseStudy')->get());

        return view('case-study');
    })->name('case-study');

    Route::get('/services', function () {
        return view('services');
    })->name('services');

    Route::get('/services', function () {
        return view('services');
    })->name('services');

    Route::get('/materials', function () {
        return view('materials');
    })->name('materials');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    //    Route::get('/pages/{id}', function ($id) {
    //        $page = \App\Models\CustomPage::where([
    //            'id' => $id,
    //            'is_published' => 1
    //        ])->first();
    //
    //        if ($page) {
    //            return view('page')->with(['page' => $page]);
    //        }
    //
    //        return redirect()->route('home')->with('error', 'Page not found.');
    //    })->name('pages');

    Route::get('/blogs/{id}', function ($id) {
        $post = \App\Models\Post::where([
            'id' => $id,
            'is_published' => 1,
        ])->with('categories')->first();

        if (! $post) {
            return redirect()->route('blog')->with('error', 'Post not found.');
        }

        return view('blog-details')->with(['post' => $post]);
    })->name('blog-details');

    Route::get('/case-studies/{id}', function ($id) {
        $caseStudy = \App\Models\CaseStudy::where([
            'id' => $id,
            'is_published' => 1,
        ])->with('CaseCategory')->first();

        $related = \App\Models\CaseStudy::where([
            'is_published' => 1,
        ])->whereHas('CaseCategory', function ($query) use ($caseStudy) {
            $query->whereIn('case_category_id', $caseStudy->CaseCategory->pluck('id')->toArray());
        })->where('id', '!=', $caseStudy->id)->get();

        if (! $caseStudy) {
            return redirect()->route('case-study')->with('error', 'Case study not found.');
        }

        return view('case-study-details')->with(['caseStudy' => $caseStudy, 'related' => $related]);
    })->name('case-study-details');

    Route::get('/services/{id}', function ($id) {
        $service = \App\Models\Services::where([
            'id' => $id,
            'is_published' => 1,
        ])->first();

        if (! $service) {
            return redirect()->route('services')->with('error', 'Service not found.');
        }

        return view('services-details')->with(['service' => $service]);
    })->name('services-details');

    Route::get('/materials/{id}', function ($id) {
        $material = \App\Models\Material::where([
            'id' => $id,
            'is_published' => 1,
        ])->first();

        if (! $material) {
            return redirect()->route('materials')->with('error', 'Material not found.');
        }

        return view('materials-details')->with(['material' => $material]);
    })->name('materials-details');

});

Route::get('/un-subscribe/{token}', function ($token) {
    $subscriber = \App\Models\Subscribers::where('token', $token)->first();
    if ($subscriber) {
        $subscriber->delete();

        return redirect()->route('home')->with('success', 'You have been successfully un-subscribed.');
    }

    return redirect()->route('home')->with('error', 'Invalid token.');
})->name('un-subscribe');

Route::get('/verify-subscriber/{token}', function ($token) {
    $subscriber = \App\Models\Subscribers::where('token', $token)->first();
    if ($subscriber) {
        $subscriber->update(['is_verified' => 1]);

        return redirect()->route('home')->with('success', 'You have been successfully verified.');
    }

    return redirect()->route('home')->with('error', 'Invalid token.');
})->name('verify-subscriber');

Route::post('/new-sub', function (\Illuminate\Http\Request $request) {
    $new = \App\Models\Subscribers::create([
        'email' => $request->email,
        'token' => hash('sha256', time()),
    ]);

    \App\Events\SendVerifyEmail::dispatch([
        'email' => $new->email,
        'token' => $new->token,
    ]);

    session()->flash('newSub', 'We send you verification email, please verify your email');

    return redirect()->back();
})->name('new-sub');

Route::post('/new-message', function (\Illuminate\Http\Request $request) {
    $new = \App\Models\ContactMessages::create([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone'),
        'subject' => $request->get('subject'),
        'message' => $request->get('message'),
        'is_read' => 0,
    ]);

    session()->flash('newMessage', 'Your message has been successfully sent');

    return redirect()->back();
})->name('new-message');
