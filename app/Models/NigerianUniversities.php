<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isEmpty;

class NigerianUniversities extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'acronym',
        'ownership',
        'url',
        'year',
    ];

    public function scopeSearch($query, $term){
    //     if(!is_null($term) || !isEmpty($term))
    //    { 
        $term = "%$term%";
        $query->where(function($query) use($term){
            $query->where('name', "like", $term);
        });
    // }
    }



    public function Uni(){
        return [
            [
                "name" => "Abubakar Tafawa Balewa University, Bauchi",
                "address" => "Ahmadu Bello Way, Bauchi",
                "type" => "Federal",
                "website" => "http://www.atbu.edu.ng"
            ],
            [
                "name" => "Ahmadu Bello University, Zaria",
                "address" => "Community Market, Zaira, Nigeria",
                "type" => "Federal",
                "website" => "http://www.abu.edu.ng"
            ],
            [
                "name" => "Bayero University, Kano",
                "address" => "BUK, Along new site Bayero university Kano, Kano",
                "type" => "Federal",
                "website" => "http://www.buk.edu.ng"
            ],
            [
                "name" => "Federal University Gashua, Yobe",
                "address" => "Sabon Gari, Nguru-Gashua-Damasak Road, Gashua",
                "type" => "Federal",
                "website" => "http://www.fugashua.edu.ng"
            ],
            [
                "name" => "Federal University of Petroleum Resources, Effurun",
                "address" => "Effurun-Port Harcourt Road, Effrun",
                "type" => "Federal",
                "website" => "http://www.fupre.edu.ng"
            ],
            [
                "name" => "Federal University of Technology, Akure",
                "address" => "FUTA Rd, Akure",
                "type" => "Federal",
                "website" => "http://www.futa.edu.ng"
            ],
            [
                "name" => "Federal University of Technology, Minna",
                "address" => "Minna",
                "type" => "Federal",
                "website" => "http://www.futminna.edu.ng"
            ],
            [
                "name" => "Federal University of Technology, Owerri",
                "address" => "Federal University of Technology, Owerri, PMB 1526",
                "type" => "Federal",
                "website" => "http://www.futo.edu.ng"
            ],
            [
                "name" => "Federal University, Dutse, Jigawa State",
                "address" => "Ibrahim Aliyu Way Bypass, Dutse",
                "type" => "Federal",
                "website" => "http://www.fud.edu.ng/"
            ],
            [
                "name" => "Federal University, Dutsin-Ma, Katsina",
                "address" => "Dutsinma Rd, Dutsin-Ma",
                "type" => "Federal",
                "website" => "http://www.fudutsinma.edu.ng"
            ],
            [
                "name" => "Federal University, Kashere, Gombe State",
                "address" => "Federal University of Kashere P.M.B. 0182 Gombe, Gombe State.",
                "type" => "Federal",
                "website" => "http://www.fukashere.edu.ng"
            ],
            [
                "name" => "Federal University, Lafia, Nasarawa State",
                "address" => "Nasarawa",
                "type" => "Federal",
                "website" => "http://www.fulafia.edu.ng"
            ],
            [
                "name" => "Federal University, Lokoja, Kogi State",
                "address" => "Federal University Lokoja, P.M.B 1154, Along Lokoja-Okene Road, Felele, Lokoja, Kogi State",
                "type" => "Federal",
                "website" => "http://www.fulokoja.edu.ng"
            ],
            [
                "name" => "Alex Ekwueme University, Ndufu-Alike, Ebonyi State",
                "address" => "Ndufu-Alike, Ikwo",
                "type" => "Federal",
                "website" => "http://www.funai.edu.ng"
            ],
            [
                "name" => "Federal University, Otuoke, Bayelsa",
                "address" => "Otuoke, Ogbia L.G.A, Bayelsa State",
                "type" => "Federal",
                "website" => "http://www.fuotuoke.edu.ng/"
            ],
            [
                "name" => "Federal University, Oye-Ekiti, Ekiti State",
                "address" => "Federal University Oye Ekiti, P. M. B. 373, Km 3 Oye – Afao Road, Ekiti State, Nigeria.",
                "type" => "Federal",
                "website" => "http://www.fuoye.edu.ng/"
            ],
            [
                "name" => "Federal University, Wukari, Taraba State",
                "address" => "Federal University 200 katsina-Ala Road, P.M.B 1020 Wukari,, A4, Wukari",
                "type" => "Federal",
                "website" => "http://www.fuwukari.edu.ng/"
            ],
            [
                "name" => "Federal University, Birnin Kebbi",
                "address" => "Birnin Kebbi Kalgo Road, Kalgo",
                "type" => "Federal",
                "website" => "http://www.fubk.edu.ng"
            ],
            [
                "name" => "Federal University, Gusau Zamfara",
                "address" => "Federal University Gusau P.M.B. 1001, Zaria Road, Gusau",
                "type" => "Federal",
                "website" => "http://www.fugusau.edu.ng"
            ],
            [
                "name" => "Michael Okpara University of Agricultural Umudike",
                "address" => "Umuahia - Ikot Ekpene Rd, Umudike",
                "type" => "Federal",
                "website" => "http://www.mouau.edu.ng"
            ],
            [
                "name" => "Modibbo Adama University of Technology, Yola",
                "address" => "",
                "type" => "Federal",
                "website" => "http://www.mautech.edu.ng"
            ],
            [
                "name" => "National Open University of Nigeria, Lagos",
                "address" => "Along Yola-Girei-Mubi Road, about 13 KM from Jimeta Town",
                "type" => "Federal",
                "website" => "http://www.nou.edu.ng"
            ],
            [
                "name" => "Nigeria Police Academy Wudil",
                "address" => "Wudil, Kano",
                "type" => "Federal",
                "website" => "http://polac.edu.ng/"
            ],
            [
                "name" => "Nigerian Defence Academy Kaduna",
                "address" => "",
                "type" => "Federal",
                "website" => "http://www.nda.edu.ng"
            ],
            [
                "name" => "Nnamdi Azikiwe University, Awka",
                "address" => "Nigerian Defence Academy, Kaduna State PMB 2109",
                "type" => "Federal",
                "website" => "http://www.unizik.edu.ng"
            ],
            [
                "name" => "Obafemi Awolowo University,Ile-Ife",
                "address" => "Obafemi Awolowo University, P.M.B. 13: Ile-Ife",
                "type" => "Federal",
                "website" => "http://www.oauife.edu.ng"
            ],
            [
                "name" => "University of Abuja, Gwagwalada",
                "address" => "KM 23 Airport -Giri Road Abuja, FCT, Nigeria",
                "type" => "Federal",
                "website" => "http://www.uniabuja.edu.ng"
            ],
            [
                "name" => "Federal University of Agriculture, Abeokuta",
                "address" => "University of Agriculture, PMB. 2240, Abeokuta",
                "type" => "Federal",
                "website" => "http://www.unaab.edu.ng"
            ],
            [
                "name" => "University of Agriculture, Makurdi",
                "address" => "University of Agriculture, Makurdi. P.M.B 2373. Makurdi, Benue State",
                "type" => "Federal",
                "website" => "http://www.uam.edu.ng"
            ],
            [
                "name" => "University of Benin",
                "address" => "Uselu, Benin City",
                "type" => "Federal",
                "website" => "http://www.uniben.edu.ng"
            ],
            [
                "name" => "University of Calabar",
                "address" => "University of Calabar, Etagbor, PMB 1115 Calaba",
                "type" => "Federal",
                "website" => "http://www.unical.edu.ng"
            ],
            [
                "name" => "University of Ibadan",
                "address" => "Oduduwa Road, Ibadan",
                "type" => "Federal",
                "website" => "http://www.ui.edu.ng"
            ],
            [
                "name" => "University of Ilorin",
                "address" => "P.M.B. 1515, Ilorin",
                "type" => "Federal",
                "website" => "http://www.unilorin.edu.ng"
            ],
            [
                "name" => "University of Jos",
                "address" => "University of Jos P.M.B 2084 Jos, Plateau State",
                "type" => "Federal",
                "website" => "http://www.unijos.edu.ng"
            ],
            [
                "name" => "University of Lagos",
                "address" => "University of Lagos, Akoka Rd, Yaba, Lagos",
                "type" => "Federal",
                "website" => "http://www.unilag.edu.ng"
            ],
            [
                "name" => "University of Maiduguri",
                "address" => "University of Maiduguri P.M.B. 1069, Bama Road Maiduguri, Borno State.",
                "type" => "Federal",
                "website" => "http://www.unimaid.edu.ng"
            ],
            [
                "name" => "University of Nigeria, Nsukka",
                "address" => "Nsukka Road, Nsukka",
                "type" => "Federal",
                "website" => "http://www.unn.edu.ng"
            ],
            [
                "name" => "University of Port-Harcourt",
                "address" => "University of Port Harcourt, East/West Road, PMB 5323 Choba, Rivers State",
                "type" => "Federal",
                "website" => "http://www.uniport.edu.ng"
            ],
            [
                "name" => "University of Uyo",
                "address" => "Ikpa Rd, Uyo",
                "type" => "Federal",
                "website" => "http://www.uniuyo.edu.ng"
            ],
            [
                "name" => "Usumanu Danfodiyo University",
                "address" => "Usmanu Danfodiyo University Sokoto, P.M.B. 2346",
                "type" => "Federal",
                "website" => "http://www.udusok.edu.ng"
            ],
            [
                "name" => "Nigerian Maritime University Okerenkoko, Delta State",
                "address" => "Okerenkoko",
                "type" => "Federal",
                "website" => ""
            ],
            [
                "name" => "Air Force Institute of Technology, Kaduna",
                "address" => "Nigerian Air Force Base, Kaduna, Kaduna State",
                "type" => "Federal",
                "website" => "https://afit.edu.ng"
            ],
            [
                "name" => "Nigerian Army University Biu",
                "address" => "Gombe Rd, Biu",
                "type" => "Federal",
                "website" => "https://naub.edu.ng/"
            ],
            [
                "name" => "Abia State University, Uturu",
                "address" => "Abia State University. P.M.B. 2000, Uturu Abia State",
                "type" => "State",
                "website" => "http://www.absu.edu.ng"
            ],
            [
                "name" => "Adamawa State University Mubi",
                "address" => "Adamawa State University P.M.B. 25, Mubi – Nigeria",
                "type" => "State",
                "website" => "http://www.adsu.edu.ng"
            ],
            [
                "name" => "Adekunle Ajasin University, Akungba",
                "address" => "Adekunle Ajasin University, P. M. B. 001, Akungba-Akoko, Ondo State",
                "type" => "State",
                "website" => "http://www.aaua.edu.ng"
            ],
            [
                "name" => "Akwa Ibom State University, Ikot Akpaden",
                "address" => "Ikot Akpaden,Mkpat Enin LGA",
                "type" => "State",
                "website" => "http://www.aksu.edu.ng"
            ],
            [
                "name" => "Ambrose Alli University, Ekpoma",
                "address" => "KM 70 Benin Auchi Road, P. M. B 14, Ekpoma Edo State",
                "type" => "State",
                "website" => "http://www.aauekpoma.edu.ng"
            ],
            [
                "name" => "Chukwuemeka Odumegwu Ojukwu University, Uli",
                "address" => "P.M.B.02 Uli. Ihiala L.G.A. Anambra State",
                "type" => "State",
                "website" => "http://coou.edu.ng/"
            ],
            [
                "name" => "Bauchi State University, Gadau",
                "address" => "KM 18, Azare Zaki road, Gadau, Itas-Gadau LGA, Bauchi State",
                "type" => "State",
                "website" => "http://www.basug.edu.ng"
            ],
            [
                "name" => "Benue State University, Makurdi",
                "address" => "Km 1, Gboko Road, Makurdi, Benue State",
                "type" => "State",
                "website" => "http://www.bsum.edu.ng"
            ],
            [
                "name" => "Yobe State University, Damaturu",
                "address" => "Km 7, Gujba Road, Damaturu, Damaturu, Yobe",
                "type" => "State",
                "website" => "http://www.ysu.edu.ng"
            ],
            [
                "name" => "Cross River State University of Technology, Calabar",
                "address" => "P.M.B 1123, Calabar",
                "type" => "State",
                "website" => "http://www.crutech.edu.ng"
            ],
            [
                "name" => "Delta State University Abraka",
                "address" => "1, Abraka, Asaba, Delta",
                "type" => "State",
                "website" => "http://www.delsu.edu.ng"
            ],
            [
                "name" => "Ebonyi State University, Abakaliki",
                "address" => "Enugu-Abakaliki Rd, Ntezi Abba, Abakaliki",
                "type" => "State",
                "website" => "http://www.ebsu.edu.ng"
            ],
            [
                "name" => "Ekiti State University",
                "address" => "Ekiti State University, Iworoko road, Ado Ekiti, Ekiti State",
                "type" => "State",
                "website" => "http://www.eksu.edu.ng"
            ],
            [
                "name" => "Enugu State University of Science and Technology, Enugu",
                "address" => "Enugu State University of Science and Technology (ESUT) PMB 01660, Agbani, Enugu State, Nigeria",
                "type" => "State",
                "website" => "http://www.esut.edu.ng"
            ],
            [
                "name" => "Gombe State Univeristy, Gombe",
                "address" => "Tudun Wada Quaters, PMB 127",
                "type" => "State",
                "website" => "http://www.gsu.edu.ng"
            ],
            [
                "name" => "Ibrahim Badamasi Babangida University, Lapai",
                "address" => "Km 3, Minna Road, Lapai, Suleja, Lapai, Niger",
                "type" => "State",
                "website" => "http://www.ibbu.edu.ng"
            ],
            [
                "name" => "Ignatius Ajuru University of Education,Rumuolumeni",
                "address" => "Rumuolumeni, Rivers State",
                "type" => "State",
                "website" => "http://www.iauoe.edu.ng"
            ],
            [
                "name" => "Imo State University, Owerri",
                "address" => "Okigwe Rd, Ugwu Orji, Owerri",
                "type" => "State",
                "website" => "http://www.imsu.edu.ng"
            ],
            [
                "name" => "Sule Lamido University, Kafin Hausa, Jigawa",
                "address" => "Kafin Hausa Road, Kofar Gadokaya, Kano",
                "type" => "State",
                "website" => "http://www.slu.edu.ng"
            ],
            [
                "name" => "Kaduna State University, Kaduna",
                "address" => "Tafawa Balewa Road, Kabala Coastain, Kaduna",
                "type" => "State",
                "website" => "http://www.kasu.edu.ng"
            ],
            [
                "name" => "Kano University of Science & Technology, Wudil",
                "address" => "P.M.B 3244, Kano",
                "type" => "State",
                "website" => "http://www.kust.edu.ng"
            ],
            [
                "name" => "Kebbi State University of Science and Technology, Aliero",
                "address" => "P.O.BOX 1144, Aliero, Kebbi State",
                "type" => "State",
                "website" => "http://www.ksusta.net/"
            ],
            [
                "name" => "Kogi State University Anyigba",
                "address" => "P.M.B 1008, Anyigba, Kogi State",
                "type" => "State",
                "website" => "http://www.ksu.edu.ng"
            ],
            [
                "name" => "Kwara State University, Ilorin",
                "address" => "P.M.B 1530, 23431, Malete, Kwara State",
                "type" => "State",
                "website" => "http://www.kwasu.edu.ng"
            ],
            [
                "name" => "Ladoke Akintola University of Technology, Ogbomoso",
                "address" => "P.M.B 4000, Ogbomosho Rd, Oyo",
                "type" => "State",
                "website" => "http://www.lautech.edu.ng"
            ],
            [
                "name" => "Ondo State University of Science and Technology Okitipupa",
                "address" => "Km 6, Okitipupa-Igbokoda road. P.M.B 353, Ondo State",
                "type" => "State",
                "website" => "http://www.osustech.edu.ng"
            ],
            [
                "name" => "River State University",
                "address" => "Westend, Old Port Harcourt Twp, Port Harcourt, Rivers state",
                "type" => "State",
                "website" => "http://www.rsu.edu.ng"
            ],
            [
                "name" => "Olabisi Onabanjo University, Ago Iwoye",
                "address" => "P.M.B. 2002. Ago-Iwoye, Ogun State",
                "type" => "State",
                "website" => "http://www.oouagoiwoye.edu.ng"
            ],
            [
                "name" => "Lagos State University, Ojo",
                "address" => "Lasu, Ojo Campus Ojo Local Government, 102101, Lagos State",
                "type" => "State",
                "website" => "http://www.lasu.edu.ng"
            ],
            [
                "name" => "Niger Delta University, Bayelsa state",
                "address" => "Wilberforce Island, Bayelsa State",
                "type" => "State",
                "website" => "http://www.ndu.edu.ng"
            ],
            [
                "name" => "Nasarawa State University Keffi",
                "address" => "Nasarawa State University, Keffi",
                "type" => "State",
                "website" => "http://www.nsuk.edu.ng"
            ],
            [
                "name" => "Plateau State University Bokkos",
                "address" => "Plateau State Univ., Bokkos",
                "type" => "State",
                "website" => "http://www.plasu.edu.ng"
            ],
            [
                "name" => "Tai Solarin University of Education Ijebu Ode",
                "address" => "Ijagun Road, Ijebu Ode, Ogun State",
                "type" => "State",
                "website" => "http://www.tasued.edu.ng"
            ],
            [
                "name" => "Umar Musa Yar' Adua University Katsina",
                "address" => "Along Dutsinma Road, Batagarawa, Katsin",
                "type" => "State",
                "website" => "http://www.umyu.edu.ng"
            ],
            [
                "name" => "Osun State University Osogbo",
                "address" => "Oke Baale PMB 4494. Oshogbo, Osun state",
                "type" => "State",
                "website" => "http://www.uniosun.edu.ng"
            ],
            [
                "name" => "Taraba State University, Jalingo",
                "address" => "Taraba State University, Jalingo P.M.B. 1167, Taraba State",
                "type" => "State",
                "website" => "http://www.tsuniversity.edu.ng"
            ],
            [
                "name" => "Sokoto State University",
                "address" => "Birnin Kebbi Road, Sokoto",
                "type" => "State",
                "website" => "http://www.ssu.edu.ng"
            ],
            [
                "name" => "Yusuf Maitama Sule University Kano",
                "address" => "Kofar Ruwa Road, Kofar Nassarawa, Kano",
                "type" => "State",
                "website" => "http://www.nwu.edu.ng"
            ],
            [
                "name" => "Oyo State Technical University Ibadan",
                "address" => "KM 15, Ibadan-Lagos Expressway, Ibadan",
                "type" => "State",
                "website" => "https://tech-u.edu.ng/"
            ],
            [
                "name" => "Ondo State University of Medical Sciences",
                "address" => "Laje Road, Ondo state",
                "type" => "State",
                "website" => "http://www.unimed.edu.ng"
            ],
            [
                "name" => "Edo University Iyamo",
                "address" => "Km7, Auchi-Abuja Road, Iyamho-Uzairue Edo Stat",
                "type" => "State",
                "website" => "http://www.edouniversity.edu.ng/"
            ],
            [
                "name" => "Eastern Palm University Ogboko, Imo State",
                "address" => "Ogboko, Ideato South LGA Imo State",
                "type" => "State",
                "website" => "https://www.epu.edu.ng/"
            ],
            [
                "name" => "University of Africa Toru Orua, Bayelsa State",
                "address" => "Liaison Office: Room 237, 242 Bayelsa State Old Secretariat Complex Melford Okilo Expressway, Yenagoa Bayelsa State",
                "type" => "State",
                "website" => "https://www.uat.edu.ng/public/"
            ],
            [
                "name" => "Bornu State University, Maiduguri",
                "address" => "Maiduguri, Kano Road, Njimtilo, Maiduguri",
                "type" => "State",
                "website" => ""
            ],
            [
                "name" => "Moshood Abiola University of Science and Technology Abeokuta",
                "address" => "Abeokuta, Ogun state",
                "type" => "State",
                "website" => ""
            ],
            [
                "name" => "Zamfara State University",
                "address" => "Zamfara State",
                "type" => "State",
                "website" => ""
            ],
            [
                "name" => "Bayelsa Medical University",
                "address" => "Onopa, Yenagoa, Bayelsa state",
                "type" => "State",
                "website" => "bmu.edu.ng"
            ],
            [
                "name" => "Achievers University, Owo",
                "address" => "KM 1 ldasen/Uteh Road, Owo, Ondo State",
                "type" => "Private",
                "website" => "http://www.achievers.edu.ng"
            ],
            [
                "name" => "Adeleke University, Ede",
                "address" => "P.M.B 250, Loogun-Ogberin Road, Ede, Osun State",
                "type" => "Private",
                "website" => "http://www.adelekeuniversity.edu.ng"
            ],
            [
                "name" => "Afe Babalola University, Ado-Ekiti - Ekiti State",
                "address" => "Km 8.5, Afe Babalola Way, P.M.B 5454, Fajuyi Park, Ado Ekiti, Ekiti",
                "type" => "Private",
                "website" => "http://www.abuad.edu.ng"
            ],
            [
                "name" => "African University of Science & Technology, Abuja",
                "address" => "Airport Rd, Galadimawa, Abuja",
                "type" => "Private",
                "website" => "http://aust.edu.ng"
            ],
            [
                "name" => "Ajayi Crowther University, Ibadan",
                "address" => "Oke-Ebo, Oyo state",
                "type" => "Private",
                "website" => "http://www.acu.edu.ng"
            ],
            [
                "name" => "Al-Hikmah University, Ilorin",
                "address" => "11, Benin City RoadAdewole Estate, Ilorin, Kwara State",
                "type" => "Private",
                "website" => "https://www.alhikmah.edu.ng"
            ],
            [
                "name" => "Al-Qalam University, Katsina",
                "address" => "IBB way Dutsinma Road, P. M. B. 2137, Katsina-Nigeria",
                "type" => "Private",
                "website" => "http://www.auk.edu.ng"
            ],
            [
                "name" => "American University of Nigeria, Yola",
                "address" => "98 Lamido Zubairu Way, Wuro Hausa 640101, Yola",
                "type" => "Private",
                "website" => "http://www.aun.edu.ng"
            ],
            [
                "name" => "Augustine University",
                "address" => "Igbonla Road, Epe, Lagos state.",
                "type" => "Private",
                "website" => "http://www.augustineuniversity.edu.ng/"
            ],
            [
                "name" => "Babcock University,Ilishan-Remo",
                "address" => "PMB 4003, Ilishan Remo, Ogun State",
                "type" => "Private",
                "website" => "http://www.babcock.edu.ng"
            ],
            [
                "name" => "Baze University",
                "address" => "Plot 686, Jabi Airport Road Bypass, Cadastral Zone, Abuja",
                "type" => "Private",
                "website" => "http://www.bazeuniversity.edu.ng"
            ],
            [
                "name" => "Bells University of Technology, Otta",
                "address" => "Idiroko Rd, Benja Village, Ota, Ogun state",
                "type" => "Private",
                "website" => "http://www.bellsuniversity.edu.ng/"
            ],
            [
                "name" => "Benson Idahosa University, Benin City",
                "address" => "University Way, Off Upper, Adesuwa Rd, GRA, Benin City",
                "type" => "Private",
                "website" => "https://www.biu.edu.ng/"
            ],
            [
                "name" => "Bingham University, New Karu",
                "address" => "P.M.B 005, KM 26 Abuja-Keffi Expressway Kodope, Karu, Nasarawa State",
                "type" => "Private",
                "website" => "http://www.binghamuni.edu.ng"
            ],
            [
                "name" => "Bowen University, Iwo",
                "address" => "BOWEN University Iwo Local Government, Osun state",
                "type" => "Private",
                "website" => "http://www.bowenuniversity-edu.org"
            ],
            [
                "name" => "Caleb University, Lagos",
                "address" => "Ikorodu-Itoikin-Ijebu-Ode Road, Imota, Lagos",
                "type" => "Private",
                "website" => "http://www.calebuniversity.edu.ng"
            ],
            [
                "name" => "Caritas University, Enugu",
                "address" => "Amorji nike, Enugu",
                "type" => "Private",
                "website" => "http://www.caritasuni.edu.ng/"
            ],
            [
                "name" => "Chrisland University",
                "address" => "Ajebo Road after FMC, Abeokuta, Ogun state",
                "type" => "Private",
                "website" => "http://www.chrislanduniversity.edu.ng"
            ],
            [
                "name" => "Covenant University Ota",
                "address" => "KM 10 Idiroko Rd, Ota, Ogun state",
                "type" => "Private",
                "website" => "http://www.covenantuniversity.edu.ng/"
            ],
            [
                "name" => "Crawford University Igbesa",
                "address" => "Faith City, Igbesa, Ogun State",
                "type" => "Private",
                "website" => "http://www.crawforduniversity.edu.ng"
            ],
            [
                "name" => "Crescent University",
                "address" => "KM. 5, Lafenwa, Abeokuta-Idofa Road, Abeokuta",
                "type" => "Private",
                "website" => "http://www.crescent-university.edu.ng"
            ],
            [
                "name" => "Edwin Clark University, Kaigbodo",
                "address" => " Edwin Clark University, Kiagbodo, Forcados, Burutu, Delta",
                "type" => "Private",
                "website" => "http://www.edwinclarkuniversity.edu.ng/"
            ],
            [
                "name" => "Elizade University, Ilara-Mokin",
                "address" => "P.M.B. 002, Ilara-Mokin, Ondo State",
                "type" => "Private",
                "website" => "http://www.elizadeuniversity.edu.ng"
            ],
            [
                "name" => "Evangel University, Akaeze",
                "address" => "KM 48 Ebonyi State, Abakaliki Rd, Enugu",
                "type" => "Private",
                "website" => "http://www.evangeluniversity.edu.ng"
            ],
            [
                "name" => "Fountain Unveristy, Oshogbo",
                "address" => "Opp. Olomola Hospital, Along Agric Settlement Road, Oke-Osun, Osogbo",
                "type" => "Private",
                "website" => "http://www.fountainuniversity.edu.ng"
            ],
            [
                "name" => "Godfrey Okoye University, Ugwuomu-Nike - Enugu State",
                "address" => "Ugwuomu-Nike,Enugu State",
                "type" => "Private",
                "website" => "http://www.gouni.edu.ng"
            ],
            [
                "name" => "Gregory University, Uturu",
                "address" => "Uturu, Abia state",
                "type" => "Private",
                "website" => "http://www.gregoryuniversity.com"
            ],
            [
                "name" => "Hallmark University, Ijebi Itele, Ogun",
                "address" => "KM, 65 Shagamu-Ore Expressway, Ijebu Itele, Ogun state",
                "type" => "Private",
                "website" => "http://www.hallmark.edu.ng"
            ],
            [
                "name" => "Hezekiah University, Umudi",
                "address" => "Nkwerre, Imo state",
                "type" => "Private",
                "website" => "http://hezekiah.edu.ng/"
            ],
            [
                "name" => "Igbinedion University Okada",
                "address" => "Mission Rd, Okada, Benin City",
                "type" => "Private",
                "website" => "http://www.iuokada.edu.ng"
            ],
            [
                "name" => "Joseph Ayo Babalola University, Ikeji-Arakeji",
                "address" => "Ikeji-Arakeji P.M.B. 5006, Ilesa Osun State",
                "type" => "Private",
                "website" => "http://www.jabu.edu.ng"
            ],
            [
                "name" => "Kings University, Ode Omu",
                "address" => "Kings University, P.M.B. 555, Ode-Omu, Osun State",
                "type" => "Private",
                "website" => "http://www.kingsuniversity.edu.ng/"
            ],
            [
                "name" => "Kwararafa University, Wukari",
                "address" => "Wukari, Taraba state",
                "type" => "Private",
                "website" => "http://www.kwararafauniversity.edu.ng"
            ],
            [
                "name" => "Landmark University, Omu-Aran.",
                "address" => "Km 4 Ipetu, Omu Aran Road, PMB 1001, Omu Aran, Kwara State",
                "type" => "Private",
                "website" => "http://www.lmu.edu.ng"
            ],
            [
                "name" => "Lead City University, Ibadan",
                "address" => "Off Oba Otudeko Avenue, Lagos - Ibadan Expy, Toll Gate Area, Ibadan",
                "type" => "Private",
                "website" => "http://www.lcu.edu.ng"
            ],
            [
                "name" => "Madonna University, Okija",
                "address" => "Madonna University Road P.M.B 05 Elele, Rivers State Nigeria, Okija, Anambra State ",
                "type" => "Private",
                "website" => "http://www.madonnauniversity.edu.ng"
            ],
            [
                "name" => "Mcpherson University, Seriki Sotayo, Ajebo",
                "address" => "KM 96, Lagos Ibadan Expressway, Seriki-Sotayo, Ogun State",
                "type" => "Private",
                "website" => "http://www.mcu.edu.ng"
            ],
            [
                "name" => "Micheal & Cecilia Ibru University",
                "address" => "Ibru Village Ughelli, Otor Ughelli North, Delta State",
                "type" => "Private",
                "website" => "http://mciu.edu.ng/"
            ],
            [
                "name" => "Mountain Top University",
                "address" => "Kilometre 12, Lagos-Ibadan Expressway, Prayer City, Ogun State",
                "type" => "Private",
                "website" => "http://www.mtu.edu.ng"
            ],
            [
                "name" => "Nile University of Nigeria, Abuja",
                "address" => "Plot 681, Cadastral Zone C-OO, Research & Institution Area, Airport Rd, Jabi, Abuja",
                "type" => "Private",
                "website" => "http://www.ntnu.edu.ng"
            ],
            [
                "name" => "Novena University, Ogume",
                "address" => "Ogume, PMB 2, Kwale, Delta State",
                "type" => "Private",
                "website" => "http://www.novenauniversity.edu.ng"
            ],
            [
                "name" => "Obong University, Obong Ntak",
                "address" => "Obong Ntak, Akwa Ibom State",
                "type" => "Private",
                "website" => "http://www.obonguniversity.net"
            ],
            [
                "name" => "Oduduwa University, Ipetumodu - Osun State",
                "address" => " Oduduwa University Ipetumodu, P.M.B. 5533, Ile Ife, Osun State",
                "type" => "Private",
                "website" => "http://www.oduduwauniversity.edu.ng"
            ],
            [
                "name" => "Pan-Atlantic University, Lagos",
                "address" => "Km 52, Lekki-Epe Expressway, Ibeju-Lekki, Lagos",
                "type" => "Private",
                "website" => "http://www.pau.edu.ng"
            ],
            [
                "name" => "Paul University, Awka - Anambra State",
                "address" => "1 Nnamdi Azikiwe Ave, Awka",
                "type" => "Private",
                "website" => "http://www.pauluniversity.edu.ng"
            ],
            [
                "name" => "Redeemer's University, Ede",
                "address" => "P.M.B. 230, Ede, Osun State",
                "type" => "Private",
                "website" => "http://www.run.edu.ng"
            ],
            [
                "name" => "Renaissance University, Enugu",
                "address" => "Ugbawka (off Enugu-Port Harcourt Express Road en route Ebonyi State) in Nkanu East Local Government Area of Enugu State",
                "type" => "Private",
                "website" => "http://www.rnu.edu.ng"
            ],
            [
                "name" => "Rhema University, Obeama-Asa - Rivers State",
                "address" => "153-155 Aba Owerri Road Aba, Abia State Nigeri",
                "type" => "Private",
                "website" => "http://www.rhemauniversity.edu.ng"
            ],
            [
                "name" => "Ritman University, Ikot Ekpene, Akwa Ibom",
                "address" => "104B Umuahia Road, Ikot Ekpene, Akwa Ibom Stat",
                "type" => "Private",
                "website" => "http://www.ritmanuniversity.edu.ng"
            ],
            [
                "name" => "Salem University, Lokoja",
                "address" => "Km. 16 Lokoja Ajaokuta Road Adankolo Lokoja Kogi",
                "type" => "Private",
                "website" => "http://www.salemuniversity.edu.ng"
            ],
            [
                "name" => "Samuel Adegboyega University, Ogwa.",
                "address" => "Km 1, Ogwa-Ehor Road, Ogwa, Edo",
                "type" => "Private",
                "website" => "http://www.sau.edu.ng"
            ],
            [
                "name" => "Southwestern University, Oku Owa",
                "address" => "Off Simbiat Abiola Road, 4 Olaide Tomori St, Ikeja, Lagos state",
                "type" => "Private",
                "website" => "http://www.southwesternuniversity.edu.ng"
            ],
            [
                "name" => "Summit University",
                "address" => "Irra Road, P.M.B 4412, Offa, Kwara State",
                "type" => "Private",
                "website" => "http://www.summituniversity.edu.ng"
            ],
            [
                "name" => "Tansian University, Umunya",
                "address" => "Along Enugu - Onitsha Expressway, P.M.B 0006, Umunya - Anambra State",
                "type" => "Private",
                "website" => "http://tansianuniversity.edu.ng/"
            ],
            [
                "name" => "University of Mkar, Mkar",
                "address" => "Off Mkar Road, Mkar, Benue",
                "type" => "Private",
                "website" => "http://www.unimkar.edu.ng"
            ],
            [
                "name" => "Veritas University, Abuja",
                "address" => "Area Council, Bwari, Abuja",
                "type" => "Private",
                "website" => "http://www.veritas.edu.ng"
            ],
            [
                "name" => "Wellspring University, Evbuobanosa - Edo State",
                "address" => "Irhirhi Road, Off Airport Rd by ADP junction, Benin City",
                "type" => "Private",
                "website" => "http://www.wellspringuniversity.net"
            ],
            [
                "name" => "Wesley University. of Science & Technology, Ondo",
                "address" => "Km 3 Ondo- Ife Rd, Ondo state.",
                "type" => "Private",
                "website" => "http://www.wusto.edu.ng"
            ],
            [
                "name" => "Western Delta University, Oghara Delta State",
                "address" => "Oghara, Delta State",
                "type" => "Private",
                "website" => "http://wdu.edu.ng"
            ],
            [
                "name" => "Christopher University Mowe",
                "address" => "KM 34 Lagos Ibadan Expressway Ibokun Aro, Mowe",
                "type" => "Private",
                "website" => "http://www.christopheruniversity.edu.ng/"
            ],
            [
                "name" => "Kola Daisi University Ibadan, Oyo State",
                "address" => "Ibadan KM 18, Ibadan-Oyo Express Road Ibadan, Oyo State",
                "type" => "Private",
                "website" => "http://www.koladaisiuniversity.edu.ng/"
            ],
            [
                "name" => "Anchor University Ayobo Lagos State",
                "address" => "Ayobo Road, Ipaja, Lagos",
                "type" => "Private",
                "website" => "http://www.aul.edu.ng/"
            ],
            [
                "name" => "Dominican University Ibadan Oyo State",
                "address" => " Plot 10A Educational Layout, Samonda, P.M.B. 5361, Ibadan, Oyo State",
                "type" => "Private",
                "website" => "http://www.dui.edu.ng/"
            ],
            [
                "name" => "Legacy University, Okija Anambra State",
                "address" => "Okija, Anambra State",
                "type" => "Private",
                "website" => "http://www.legacyuniversity.edu.ng/"
            ],
            [
                "name" => "Arthur Javis University Akpoyubo Cross river State",
                "address" => "Calabar Cl, Ikorodu, Ijede, Cross river state",
                "type" => "Private",
                "website" => "http://www.arthurjarvisuniversity.edu.ng/"
            ],
            [
                "name" => "Crown Hill University Eiyenkorin, Kwara State",
                "address" => "Ballah Road, Eiyenkorin, Ilorin, Kwara state",
                "type" => "Private",
                "website" => "http://www.crownhilluniversity.edu.ng/"
            ],
            [
                "name" => "Coal City University Enugu State",
                "address" => "KM 3 Enugu/Abakiliki Expressway, Emene, Enug",
                "type" => "Private",
                "website" => ""
            ],
            [
                "name" => "Clifford University Owerrinta Abia State",
                "address" => "Owerrinta, (Ihie Campus), off Okpuala Ngwa junction, Isiala-Ngwa North LGA, Abia State",
                "type" => "Private",
                "website" => "http://www.clifforduni.edu.ng/"
            ],
            [
                "name" => "Admiralty University, Ibusa Delta State",
                "address" => "Ibusa Ugwashi-Uku Expressway, Delta State",
                "type" => "Private",
                "website" => "http://www.adun.edu.ng"
            ],
            [
                "name" => "Spiritan University, Nneochi Abia State",
                "address" => "Nneato-Isuochi, Umunneochi L.G.A. in Abia State",
                "type" => "Private",
                "website" => "http://www.spiritanuniversity.edu.ng"
            ],
            [
                "name" => "Precious Cornerstone University, Oyo",
                "address" => "The Garden Of Victory, Olaogun Street, Off Old-Ife Rd, Agodi 200223, Ibadan",
                "type" => "Private",
                "website" => "http://www.pcu.edu.ng"
            ],
            [
                "name" => "PAMO University of Medical Sciences, Portharcourt",
                "address" => "No. 1, Tap Road, Off Port Harcourt - Aba Expy, Elelenwo, Port Harcourt",
                "type" => "Private",
                "website" => "http://www.pums.edu.ng"
            ],
            [
                "name" => "Atiba University Oyo",
                "address" => "Km 5, Oyo-Iseyin Road PMB 1077 Oyo town",
                "type" => "Private",
                "website" => ""
            ],
            [
                "name" => "Eko University of Medical and Health Sciences Ijanikin, Lagos",
                "address" => "Ijanikin, Lagos",
                "type" => "Private",
                "website" => "http://www.ekounivmed.edu.ng"
            ],
            [
                "name" => "Skyline University, Kano",
                "address" => "Kano-Zaria Rd, Trade Fair Area, Kano",
                "type" => "Private",
                "website" => "http://www.sun.edu.ng"
            ],
            [
                "name" => "Greenfield University, Kaduna",
                "address" => "KM 34, Kasarmi Village, Abuja - Kaduna - Zaria Express Way, Kaduna",
                "type" => "Private",
                "website" => "http://www.gfu.edu.ng"
            ],
            [
                "name" => "Dominion University Ibadan, Oyo State",
                "address" => "KLM 24 Ibadan - Lagos Expressway, City of Faith, Oyo State, Nigeria",
                "type" => "Private",
                "website" => "http://www.dominionuniversity.edu.ng/"
            ],
            [
                "name" => "Trinity University Ogun State",
                "address" => "Trinity Hills (College Premises) Ogun State, Ofada",
                "type" => "Private",
                "website" => ""
            ],
            [
                "name" => "Westland University Iwo, Osun State",
                "address" => "Iwo, Osun State",
                "type" => "Private",
                "website" => ""
            ]
            
        ];
    }
}
