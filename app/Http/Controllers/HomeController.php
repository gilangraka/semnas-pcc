<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $navItems = [
            (object)['name' => 'Home','href' => '#'],
            (object)['name' => 'About','href' => '#about'],
            (object)['name' => 'Speakers','href' => '#speakers'],
            (object)['name' => 'Benefit','href' => '#benefit'],
            (object)['name' => 'FAQ','href' => '#faq'],
            (object)['name' => 'Techcomfest','href' => 'https://techcomfest.ukmpcc.org'],
        ];

        $benefitItems = [
            (object)[
                "title" => "Knowledge",
                "imgUrl" => "knowledge.webp"
            ],
            (object)[
                "title" => "Training",
                "imgUrl" => "training.webp"
            ],
            (object)[
                "title" => "E-Certificate",
                "imgUrl" => "certificate.webp"
            ],
            (object)[
                "title" => "Relationship",
                "imgUrl" => "relationship.webp"
            ],
            (object)[
                "title" => "Experience",
                "imgUrl" => "experience.webp"
            ],
            (object)[
                "title" => "Goodie Bag",
                "imgUrl" => "goodie-bag.webp"
            ],
            (object)[
                "title" => "Doorprize",
                "imgUrl" => "doorprize.webp"
            ],
        ];

        $faqItems = [
            (object)[
                "question" => "Apa itu Seminar Nasional?",
                "answer" => "Seminar Nasional merupakan salah satu wujud misi dan peran aktif UKM Polytechnic Computer Club 
                            dalam mengikuti perkembangan teknologi dalam bidang IT melalui lomba SMA/ SMK sederajat dan Mahasiswa Umum Se-Indonesia."
            ],
            (object)[
                "question" => "Materi apa yang disampaikan di Seminar Nasional?",
                "answer" => "LinkedIn yang diikuti oleh beberapa sub materi, yaitu..."
            ],
            (object)[
                "question" => "Seminar Nasional dilaksanakan dimana saja?",
                "answer" => "Seminar dilakukan secara hybrid yaitu secara online via zoom dan offline di Gedung Kerjasama Terpadu Polines 
                            dengan alamat Jl. Prof. Sudarto, Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah atau bisa klik disini."
            ],
            (object)[
                "question" => "Siapa pengisi suara di Seminar Nasional nanti?",
                "answer" => "Untuk pengisi materi sendiri akan kami umumkan di instagram Techcomfest, 
                            jadi stay tune terus yaaaa"
            ],
            (object)[
                "question" => "Hal apa saja yang perlu disiapkan di Seminar Nasional TECHCOMFEST nanti?",
                "answer" => "Untuk perlengkapan yang perlu dibawa waktu seminar nasional TECHCOMFEST akan diumumkan menyusul. Jadi stay tune terus yaaa"
            ],
            (object)[
                "question" => "Metode pembayarannya bagaimana?",
                "answer" => "..."
            ],
            (object)[
                "question" => "HTM untuk Seminar nasional berapa?",
                "answer" => "..."
            ],
        ];

        $speakerItems = [
            (object)[
                "name"=>"Belinda Azzahra",
                "imgUrl"=>"Belinda_Azzahra.png",
                "job"=>"Speakers"
            ],
            (object)[
                "name"=>"Sevaldo Bargi Putra",
                "imgUrl"=>"Sevaldo.png",
                "job"=>"Moderator"
            ],
        ];

        return view('pages.home', compact('navItems', 'benefitItems', 'faqItems', 'speakerItems'));
    }
}
