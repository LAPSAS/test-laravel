<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GraphQLClient
{
    protected $endpoint;

    public function __construct(string $endpoint = 'https://mock.shop/api')
    {
        $this->endpoint = $endpoint;
    }

    public function query(string $graphqlQuery): ?array
    {
        try {
            $response = Http::post($this->endpoint, [
                'query' => $graphqlQuery,
            ]);

            if ($response->failed()) {
                // Log the error or handle it as needed
                Log::error('GraphQL query failed', [
                    'endpoint' => $this->endpoint,
                    'status' => $response->status(),
                    'response_body' => $response->body(),
                ]);

                // You might want to throw an exception or return a more specific error structure
                return null; // Or return ['errors' => $response->json('errors', [])] if the API returns errors in JSON
            }

            return $response->json();
        } catch (RequestException $e) {
            // This catches connection errors or other issues with the request itself
            Log::error('GraphQL request exception', [
                'endpoint' => $this->endpoint,
                'message' => $e->getMessage(),
            ]);

            return null;
        }
    }

    public function getProducts(): ?array
    {
        $query = <<<'GRAPHQL'
        {
            products(first: 100) {
                nodes {
                    id
                    title
                    description
                    featuredImage {
                        id
                        url
                    }
                }
            }
        }
        GRAPHQL;

        return $this->query($query);
    }
}
