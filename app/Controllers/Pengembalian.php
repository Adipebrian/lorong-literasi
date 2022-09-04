<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ModelUser;
use CodeIgniter\I18n\Time;
use App\Models\ModelPeminjaman;
use App\Controllers\BaseController;

class Pengembalian extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new ModelPeminjaman();
        $this->modelUser = new ModelUser();
    }
    public function index()
    {
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,fullname,username,user_id');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $this->builder->where('loan_status', 1);
        $this->builder->where('return_status', 0);
        $this->builder->orderby('loanId', 'DESC');
        $query = $this->builder->get();


        $data = [
            'title' => 'Data Buku',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'time' => $this->time,
            'books' => $query->getResult()
        ];
        return view('return/index', $data);
    }
    public function code()
    {
        $data = [
            'title' => 'Konfirmasi Pengembalian',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
        ];
        return view('return/code', $data);
    }
    public function search_code()
    {
        $code = $this->mRequest->getVar('code');
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,fullname,username,user_id');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $this->builder->where('code', $code);
        $query = $this->builder->get();
        $data = [
            'title' => 'Konfirmasi Pengembalian',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult(),
            'time' => $this->time,
            'code' => $code
        ];
        return view('return/searchCode', $data);
    }
    public function qrcode()
    {
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,fullname,username');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $query = $this->builder->get();
        $data = [
            'title' => 'Konfirmasi Pengembalian',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult()
        ];
        return view('return/qrcode', $data);
    }
    public function qr_code_confirm()
    {
        $result = $this->mRequest->getVar('result');
        $hasil = $this->model->search_book_return($result);
        if ($hasil) {
            $this->builder = $this->db->table('book_loan_list');
            $this->builder->select('*');
            $this->builder->where('code', $result);
            $query = $this->builder->get()->getRow();
            if ($query) {
                $id = $query->id;
                $user_id = $query->user_id;
                $book_id = $query->book_id;
                $date_loan = $query->loan_date;
                $tenggat = $query->date_of_return;
                $diff = $this->time->difference($tenggat);
                $day = $diff->getDays();
                $date = Time::now('Asia/Jakarta', 'en_US');
                $return_status = $query->return_status;
                if ($return_status == 1) {
                    $data2 = [
                        'user_id' => $user_id,
                        'status' => 0,
                        'judul' => 'Pesan Konfirmasi Buku',
                        'content' => 'Gagal, Anda gagal mengembalikan buku ke perpustakaan <br> Silahkan Hubungi Staff Perpustakaan ',
                        'date_created' => $this->time,
                    ];

                    $this->builder = $this->db->table('notif');
                    $this->builder->select('*');
                    $this->builder->insert($data2);
                    session()->setFlashdata('gagal', 'Gagal! Data sudah ada!');
                    return redirect()->to('/pengembalian/qrcode');
                } else {
                    $data = [
                        'return_status' => 1,
                        'tanggal_dikembalikan' => $date,
                    ];
                    $this->model->update($id, $data);
                    $data2 = [
                        'user_id' => $user_id,
                        'status' => 0,
                        'judul' => 'Pesan Konfirmasi Buku',
                        'content' => 'Selamat, Anda telah berhasil mengembalikan buku ke perpustakaan <br> Ayo pinjam buku lagi untuk masa depan yang lebih cerah! ',
                        'date_created' => $this->time,
                    ];

                    $this->builder = $this->db->table('notif');
                    $this->builder->select('*');
                    $this->builder->insert($data2);

                    // hapus data di book_loan_list
                    $this->builder = $this->db->table('book_loan_list');
                    $this->builder->select('*');
                    $this->builder->where('id', $id);
                    $this->builder->delete();

                    // tambah data ke histori
                    $data3 = [
                        'user_id' => $user_id,
                        'book_id' => $book_id,
                        'date_loan' => $date_loan,
                        'date_return' => $date,
                    ];
                    $this->builder = $this->db->table('histori');
                    $this->builder->select('*');
                    $this->builder->insert($data3);

                    // hapus gambar qrcode
                    unlink('img/qrcode/' . $result . '.png');


                    // POIN 
                    // cek userid apakah ada
                    $cek_id = $this->modelUser->cek_id($user_id);
                    if ($cek_id) {
                        // poin
                        $Resultpoin = $this->modelUser->get_poin($user_id);
                        $poin = $Resultpoin->poin;
                        // jika id ada => update
                        // jika telat pengembaliannya berarti dikurangi 10
                        if ($day < 0) {
                            $data = [
                                'poin' => $poin - 10,
                                'date_created' => $this->time,
                            ];
                        } else {
                            $data = [
                                'poin' => $poin + 10,
                                'date_created' => $this->time,
                            ];
                        }
                        $this->builder = $this->db->table('poin');
                        $this->builder->select('*');
                        $this->builder->where('user_id', $user_id);
                        $this->builder->update($data);

                        if ($day < 0) {
                            $data2 = [
                                'user_id' => $user_id,
                                'status' => 0,
                                'judul' => 'Pesan Pengurangan Poin',
                                'content' => 'Gagal, Anda mendapatkan pengurangan 10 poin dari Pengembalian Buku pada tanggal ' . $this->time . ' karena telat pengembalian ' . abs($day) . ' hari',
                                'date_created' => $this->time,
                            ];
                        } else {
                            $data2 = [
                                'user_id' => $user_id,
                                'status' => 0,
                                'judul' => 'Pesan Penambahan Poin',
                                'content' => 'Selamat, Anda mendapatkan 10 poin dari Pengembalian Buku pada tanggal ' . $this->time,
                                'date_created' => $this->time,
                            ];
                        }

                        $this->builder = $this->db->table('notif');
                        $this->builder->select('*');
                        $this->builder->insert($data2);


                        session()->setFlashdata('pesan', 'Data berhasil di Update');
                        return redirect()->to('/pengembalian/qrcode');
                    } else {
                        // jika id tidak ada => tambah
                        // jika telat pengembaliannya berarti dikurangi 10
                        if ($day < 0) {
                            $data = [
                                'user_id' => $user_id,
                                'poin' => -10,
                                'date_created' => $this->time,
                            ];
                        } else {
                            $data = [
                                'user_id' => $user_id,
                                'poin' => 10,
                                'date_created' => $this->time,
                            ];
                        }
                        $this->builder = $this->db->table('poin');
                        $this->builder->select('*');
                        $this->builder->insert($data);

                        if ($day < 0) {
                            $data2 = [
                                'user_id' => $user_id,
                                'status' => 0,
                                'judul' => 'Pesan Pengurangan Poin',
                                'content' => 'Gagal, Anda mendapatkan pengurangan 10 poin dari Pengembalian Buku pada tanggal ' . $this->time . ' karena telat pengembalian' . abs($day) . ' hari',
                                'date_created' => $this->time,
                            ];
                        } else {
                            $data2 = [
                                'user_id' => $user_id,
                                'status' => 0,
                                'judul' => 'Pesan Penambahan Poin',
                                'content' => 'Selamat, Anda mendapatkan 10 poin dari Pengembalian Buku pada tanggal ' . $this->time,
                                'date_created' => $this->time,
                            ];
                        }

                        

                        session()->setFlashdata('pesan', 'Data berhasil di Update');
                        return redirect()->to('/pengembalian/qrcode');
                    }
                }
            } else {

                session()->setFlashdata('gagal', ' Gagal! Data tidak falid');
                return redirect()->to('/pengembalian/qrcode');
            }
        } else {
            session()->setFlashdata('gagal', ' Gagal! Anda belum konfirmasi peminjaman buku');
            return redirect()->to('/pengembalian/qrcode');
        }
    }
}
