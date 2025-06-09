<?php

namespace App\Http\Controllers\User;

use App\Models\Keranjang;
use App\Models\IsiKeranjang;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    // Menampilkan Keranjang User
    public function index()
    {
        $keranjang = Auth::user()->keranjang;  // Mengakses keranjang langsung dari relasi

        // Jika tidak ada keranjang, tampilkan pesan atau redirect ke halaman lain
        if (!$keranjang) {
            return redirect()->route('user.home')->with('error', 'Keranjang kosong!');
        }

        return view('user.keranjang.index', compact('keranjang'));
    }

    // Menambahkan Buku ke Keranjang
    public function tambah(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id'
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        // Cek jika user sudah memiliki keranjang
        $keranjang = Auth::user()->keranjang;

        if (!$keranjang) {
            // Buat keranjang baru
            $keranjang = Keranjang::create([
                'user_id' => Auth::id(),
                'status' => 'draft'
            ]);
        }

        // Cek jika buku sudah ada di keranjang
        $item = $keranjang->isiKeranjang()->where('buku_id', $buku->id)->first();

        if ($item) {
            $item->update(['jumlah' => $item->jumlah + 1]);
        } else {
            $keranjang->isiKeranjang()->create([
                'buku_id' => $buku->id,
                'jumlah' => 1,
                'harga' => $buku->harga
            ]);
        }

        return redirect()->route('user.keranjang.index');
    }

    // Menghapus item dari keranjang
    public function hapus($id)
    {
        $item = IsiKeranjang::findOrFail($id);
        $item->delete();

        return redirect()->route('user.keranjang.index');
    }

    // Mengupdate jumlah item dalam keranjang
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $item = IsiKeranjang::findOrFail($id);
        $item->update(['jumlah' => $request->jumlah]);

        return redirect()->route('user.keranjang.index');
    }
}
