<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Repo extends Model
{
    use HasFactory;

    /**
     * Download top php repos from github API
     *
     * @return array|null Array of records that match DB field names on success, false on failure.
     */
    public static function download(): ?array
    {
        $response = Http::get(config('services.github.api'), [
            'q' => 'language:PHP',
            'sort' => 'stars',
            'order' => 'desc'
        ]);

        $ghRows = $response?->json();

        if ((! $response?->ok()) || empty($ghRows['items'])) {
            return NULL;
        }

        $result = [];

        foreach ($ghRows['items'] as $item) {
            $result[] = [
                'gh_repo_id' => $item['id'],
                'name' => $item['name'],
                'url' => $item['html_url'],
                'description' => $item['description'],
                'stars_num' => $item['stargazers_count'],
                'repo_created' => Carbon::parse($item['created_at'])->format('Y-m-d'),
                'repo_last_pushed' => Carbon::parse($item['pushed_at'])->format('Y-m-d')
            ];
        }
        
        return $result;
    }

    /**
     * Clear out existing data and store new values
     *
     * @return bool True on success, false on failure
     */
    public static function populate(): bool
    {
        $ghRows = self::download();

        if (is_null($ghRows)) {
            return false;
        }

        self::truncate();

        return self::insert($ghRows);
    }
}
