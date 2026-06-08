<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accepted(Request $request, Article $article)
    {
        $request->session()->put('last_review_action', [
            'article_id' => $article->id,
            'previous_status' => $article->is_accepted,
        ]);

        $article->setAccepted(true);

        return redirect()->back()->with('message', "Hai accettato l'articolo {$article->title}");
    }

    public function reject(Request $request, Article $article)
    {
        $request->session()->put('last_review_action', [
            'article_id' => $article->id,
            'previous_status' => $article->is_accepted,
        ]);

        $article->setAccepted(false);

        return redirect()->back()->with('message', "Hai rifiutato l'articolo {$article->title}");
    }

    public function undo(Request $request)
{
    $lastAction = $request->session()->get('last_review_action');

    if (!$lastAction) {
        return redirect()->route('revisor.index')->with('message', 'Nessuna operazione da annullare');
    }

    $article = Article::find($lastAction['article_id']);

    if (!$article) {
        $request->session()->forget('last_review_action');
        return redirect()->route('revisor.index')->with('message', 'Articolo non trovato');
    }

    $article->is_accepted = $lastAction['previous_status'];
    $article->save();

    $request->session()->forget('last_review_action');

    return redirect()->route('revisor.index')->with('message', 'Ultima operazione annullata con successo');
}

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));

        return redirect()->route('home')->with('message', 'Complimenti, hai richiesto di diventare revisore');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);

        return redirect()->back()->with('message', "{$user->name} è diventato revisore");
    }
}