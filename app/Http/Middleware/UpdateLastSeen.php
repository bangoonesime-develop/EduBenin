<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $utilisateur = auth()->user();

            // Assignation directe plutôt qu'un update() en masse :
            // "last_seen_at" n'étant pas dans $fillable du modèle
            // User, un update() de masse était silencieusement
            // ignoré par Laravel — la colonne ne se mettait donc
            // jamais à jour, d'où le compteur bloqué à 0.
            $utilisateur->timestamps = false; // évite de modifier "updated_at" à chaque page vue
            $utilisateur->last_seen_at = now();
            $utilisateur->save();
        }

        return $next($request);
    }
}