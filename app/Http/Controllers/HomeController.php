<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
                "answer" => "LinkedIn yang diikuti oleh beberapa sub materi, yaitu : 
                            Pengenalan apa itu LinkedIn, manfaat menggunakan LinkedIn, penjelasan tentang dunia karir dengan LinkedIn, tips menggunakan LinkedIn secara profesional, meningkatkan daya tarik profil di mata HRD dan membangun personal branding melalui LinkedIn."
            ],
            (object)[
                "question" => "Seminar Nasional dilaksanakan dimana saja?",
                "answer" => "Seminar dilakukan secara hybrid yaitu secara online via zoom dan offline di Gedung Kerjasama Terpadu Polines dengan alamat Jl. Prof. Sudarto, Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah  atau bisa dilihat dengan link: https://maps.app.goo.gl/SJBbNzSH14CV4AsT7"
            ],
            (object)[
                "question" => "Siapa pengisi suara di Seminar Nasional nanti?",
                "answer" => "Untuk pengisi materi sendiri akan kami umumkan di instargam techcomfest instagram.com/techcomfest, jadi stay tune terus yaaaa"
            ],
            (object)[
                "question" => "Metode pembayarannya bagaimana?",
                "answer" => "..."
            ],
            (object)[
                "question" => "HTM untuk Seminar nasional berapa?",
                "answer" => "Early Bird 25k, Presale 1 30k, Presale 2 35k"
            ],
        ];

        $speakerItems = [
            (object)[
                "name"=>"",
                "imgUrl"=>"siluet-speakers.png",
                "job"=>"Speakers"
            ],
            (object)[
                "name"=>"",
                "imgUrl"=>"siluet-moderator.png",
                "job"=>"Moderator"
            ],
        ];

        $speakerItems = $this->updateSpeakerItems($speakerItems);

        return view('pages.home', compact('navItems', 'benefitItems', 'faqItems', 'speakerItems'));
    }

    private function updateSpeakerItems($speakerItems) {
        $currentDate = Carbon::now(); 
        
        if ($currentDate->isSameDay(Carbon::createFromDate($currentDate->year, 12, 12))) {
            $speakerItems[0]->name = "Belinda Azzahra";
            $speakerItems[0]->imgUrl = "Belinda_Azzahra.png"; 

            $speakerItems[1]->name = "Sevaldo Bargi Putra"; 
            $speakerItems[1]->imgUrl = "Sevaldo.png";
        }

        return $speakerItems;
    }
}
