<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllers extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $users = [
            'dylla putri' => [
                'password' => '1234567',
                'email' => 'jenolee23@example.com',
                'join_date' => 'Mei 2025'
            ]
        ];

        $username = $request->username;

        if (array_key_exists($username, $users) &&
            $users[$username]['password'] === $request->password) {

            session([
                'username' => $username,
                'email' => $users[$username]['email'],
                'join_date' => $users[$username]['join_date']
            ]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['Username atau password salah.']);
    }

    public function dashboard(Request $request)
    {
        $username = $request->session()->get('username', 'Guest');

        return view('dashboard', compact('username'));
    }

    public function pengelolaan(Request $request)
    {
        $username = session('username', 'Guest');

        $dataBuku = session('dataBuku', [
            ['id' => 1, 'judul' => 'Atomic Habits', 'pengarang' => 'James Clear', 'tahun' => 2019],
            ['id' => 2, 'judul' => 'Seporsi Mie Ayam Sebelum Mati', 'pengarang' => 'Brian Khrisna', 'tahun' => 2025],
            ['id' => 3, 'judul' => 'Laut Bercerita', 'pengarang' => 'Leila S. Chudori', 'tahun' => 2017],
            ['id' => 4, 'judul' => 'Seorang Wanita yang Ingin Menjadi Pohon Semangka di Kehidupan Berikutnya', 'pengarang' => 'dr. Andreas Kurniawan, Sp.KJ', 'tahun' => 2025],
            ['id' => 5, 'judul' => 'The Psychology of Money Edisi Revisi', 'pengarang' => 'Morgan Housel', 'tahun' => 2024],
            ['id' => 6, 'judul' => '48 Laws of Power Versi Ringkas', 'pengarang' => 'Robert Greene', 'tahun' => 2024],
            ['id' => 7, 'judul' => 'Hello, Cello!', 'pengarang' => 'Nadia Ristivani', 'tahun' => 2022],
            ['id' => 8, 'judul' => 'Ayah, Ini arahnya ke Mana, ya?', 'pengarang' => 'Khoirul Trian', 'tahun' => 2024],
            ['id' => 9, 'judul' => 'Bicara Itu Ada Seninya', 'pengarang' => 'Oh Su Hyang', 'tahun' => 2018],
            ['id' => 10, 'judul' => '3726 MDPL', 'pengarang' => 'Nurwina Sari', 'tahun' => 2024],
            ['id' => 11, 'judul' => 'The Things You Can See Only When You Slow Down', 'pengarang' => 'Haemin Sumin', 'tahun' => 2012],
            ['id' => 12, 'judul' => 'Is It Bad or Good Habits', 'pengarang' => 'Sabrina Ara', 'tahun' => 2021],
        ]);

        $aksi = $request->input('aksi');
        $editBuku = null;

        if ($aksi) {
            if (str_starts_with($aksi, 'edit-')) {
                $id = intval(str_replace('edit-', '', $aksi));
                $editBuku = collect($dataBuku)->firstWhere('id', $id);

            } elseif (str_starts_with($aksi, 'hapus-')) {
                $id = intval(str_replace('hapus-', '', $aksi));
                $dataBuku = array_values(array_filter($dataBuku, fn($buku) => $buku['id'] != $id));

            } elseif ($aksi === 'simpan') {
                $id = intval($request->input('id'));
                foreach ($dataBuku as &$buku) {
                    if ($buku['id'] == $id) {
                        $buku['judul'] = $request->input('judul');
                        $buku['pengarang'] = $request->input('pengarang');
                        $buku['tahun'] = $request->input('tahun');
                        break;
                    }
                }

            } elseif ($aksi === 'tambah') {
                $newId = collect($dataBuku)->max('id') + 1;
                $dataBuku[] = [
                    'id' => $newId,
                    'judul' => $request->input('judul'),
                    'pengarang' => $request->input('pengarang'),
                    'tahun' => $request->input('tahun'),
                ];
            }

            session(['dataBuku' => $dataBuku]);
        }

        return view('pengelolaan', [
            'username' => $username,
            'dataBuku' => $dataBuku,
            'editBuku' => $editBuku
        ]);
    }

    public function profile(Request $request)
    {
        $userData = [
            'username' => session('username', 'Guest'),
            'email' => session('email', 'jenolee23@example.com'),
            'join_date' => session('join_date', 'Mei 2025')
        ];

        return view('profile', $userData);
    }

    public function logout()
    {
        session()->forget('username'); 
        return redirect('/login');
    }

    public function riwayat()
    {
        $username = session('username', 'Guest');

        $riwayat = [
            ['judul' => 'Atomic Habits', 'pengarang' => 'James Clear', 'tanggal' => '28 April 2025'],
            ['judul' => 'The Things You Can See Only When You Slow Down', 'pengarang' => 'Haemin Sumin', 'tanggal' => '18 Maret 2025'],
        ];

        return view('riwayat', compact('username', 'riwayat'));
    }

    public function sedangDibaca()
    {
        $username = session('username', 'Guest');

        $sedangDibaca = [
            [
                'judul' => 'Hello, Cello!',
                'pengarang' => 'Nadia Ristivani',
                'total_halaman' => 200,
                'halaman_dibaca' => 120
            ]];

        return view('sedangDibaca', compact('username', 'sedangDibaca'));
    }

    public function updateProgress(Request $request)
    {
        $request->validate([
            'index' => 'required|integer',
            'halaman_dibaca' => 'required|integer|min:0'
        ]);

        $index = $request->input('index');
        $halamanDibaca = $request->input('halaman_dibaca');

        $sedangDibaca = session('sedangDibaca', []);

        if (isset($sedangDibaca[$index])) {
            $sedangDibaca[$index]['halaman_dibaca'] = min($halamanDibaca, $sedangDibaca[$index]['total_halaman']);
            session(['sedangDibaca' => $sedangDibaca]);
        }

        return redirect()->back();
    }

    public function tambahBukuSedangDibaca(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'pengarang' => 'required|string',
            'total_halaman' => 'required|integer|min:1'
        ]);

        $bukuBaru = [
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'total_halaman' => $request->total_halaman,
            'halaman_dibaca' => 0
        ];

        $sedangDibaca = session('sedangDibaca', []);
        $sedangDibaca[] = $bukuBaru;

        session(['sedangDibaca' => $sedangDibaca]);

        return redirect()->back();
    }

}
