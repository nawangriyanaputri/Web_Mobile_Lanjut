<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getProducts();

        return response()->json([
            'data' => $products
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0'
            ]);

            Log::info('Produk baru dibuat', $validated);

            return response()->json([
                'message' => 'Produk berhasil dibuat',
                'data' => $validated
            ], 201);

        } catch (Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'Terjadi kesalahan pada server'
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Data produk tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data'    => $product
            ], 200);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Terjadi kesalahan pada server'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Data produk tidak ditemukan'
                ], 404);
            }

            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:100',
                'price' => 'sometimes|required|numeric|min:0',
                'stock' => 'sometimes|required|integer|min:0'
            ]);

            $product->update($validated);

            return response()->json([
                'message' => 'Data produk berhasil diubah',
                'data'    => $product
            ], 200);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Terjadi kesalahan pada server'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Data produk tidak ditemukan'
                ], 404);
            }

            $product->delete();

            return response()->json([
                'message' => 'Data produk berhasil dihapus'
            ], 200);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Terjadi kesalahan pada server'
            ], 500);
        }
    }
}