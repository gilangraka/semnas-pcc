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

        $medpartItems = [
            (object)[
                "name" => "Css Related Competitions",
                "imgUrl" => "css-related.webp",
            ],
            (object)[
                "name" => "Edaran Event",
                "imgUrl" => "edaran-event.webp",
            ],
            (object)[
                "name" => "Event H.id",
                "imgUrl" => "event-h.webp",
            ],
            (object)[
                "name" => "Event Mahasiswa",
                "imgUrl" => "event-mahasiswa.webp",
            ],
            (object)[
                "name" => "Info Lomba",
                "imgUrl" => "info-lomba.webp",
            ],
            (object)[
                "name" => "Kumpulan Event",
                "imgUrl" => "kumpulan-event.webp",
            ],
            (object)[
                "name" => "Lomba SMA",
                "imgUrl" => "lomba-sma.webp",
            ],
            (object)[
                "name" => "Media Partner",
                "imgUrl" => "media-partner.webp",
            ],
            (object)[
                "name" => "Mitra Lomba",
                "imgUrl" => "mitra-lomba.webp",
            ],
            (object)[
                "name" => "Seputar Info Id",
                "imgUrl" => "seputar-infoid.webp",
            ],
            (object)[
                "name" => "HME Undip",
                "imgUrl" => "hme-undip.webp",
            ],
            (object)[
                "name" => "Undip Menfess",
                "imgUrl" => "undip-menfess.webp",
            ],
            (object)[
                "name" => "Polines Menfess",
                "imgUrl" => "polines-menfess.webp",
            ],
            (object)[
                "name" => "Bem Polines",
                "imgUrl" => "bem-polines.webp",
            ],
            (object)[
                "name" => "Hme Polines",
                "imgUrl" => "hme-polines.webp",
            ],
            (object)[
                "name" => "Hima Polines",
                "imgUrl" => "hima-polines.webp",
            ],
            (object)[
                "name" => "Hmab Polines",
                "imgUrl" => "hmab-polines.webp",
            ],
        ];

        $sponsorItems = [
            (object)[
                "name" => "PT Iksa Media Indonesia",
                "imgUrl" => "ptiksa.webp",
            ],
            (object)[
                "name" => "Bebek Carok",
                "imgUrl" => "bebekcarok.webp",
            ],
            (object)[
                "name" => "Bank Jateng",
                "imgUrl" => "bankjateng.webp",
            ],
            (object)[
                "name" => "IDCloudHost",
                "imgUrl" => "idcloudhost.webp",
            ],
            (object)[
                "name" => "Annida",
                "imgUrl" => "annida.webp",
            ],
            (object)[
                "name" => "Baswara Konveksi",
                "imgUrl" => "baswara.webp",
            ],
            (object)[
                "name" => "Bebek Pak Eko",
                "imgUrl" => "bebekpakeko.webp",
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

        return view('pages.home', compact('navItems', 'benefitItems', 'faqItems', 'speakerItems','medpartItems', 'sponsorItems'));
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
